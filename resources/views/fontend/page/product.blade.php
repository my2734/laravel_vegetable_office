@extends('fontend.layout.master')
@section('content')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Vegetable’s Package</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Vegetables</a>
                        <span>Vegetable’s Package</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img height="575.555px;" class="product__details__pic__item--large"
                            src="{{asset('Uploads/'.$product_slug->image)}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        @foreach($product_slug->product_image as $product_img)
                        <img style="height: 150px;object-fit:cover;" data-imgbigurl="{{asset('Uploads/'.$product_img->image)}}"
                            src="{{asset('Uploads/'.$product_img->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="message_alert_add_cart">

                </div>
                <div class="product__details__text">
                    <h3>{{$product_slug->name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>({{$quantity_comment}} reviews)</span>
                    </div>
                    <div class="product__details__price">{{($product_slug->price_promotion) ? number_format($product_slug->price_promotion) : number_format($product_slug->price_unit)}}vnđ</div>
                    <p>{{$product_slug->description}}</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <form action="" method="POST">
                                <div class="pro-qty">
                                    <input type="text" class="qty_mul_pro" value="1">
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php 
                        $inventory = $product_slug->warehouse->import_quantity - $product_slug->warehouse->export_quantity;
                    ?>
                    
                    @if($inventory > 0)
                        <button  id="{{$product_slug->id}}" class="primary-btn add_mul_product">ADD TO CARD <?php echo $inventory ?> </button>
                    @else
                        <button  data-toggle="modal" data-target="#notification_add_cart" class="primary-btn">ADD TO CARD </button>
                    @endif

                    <!-- Modal notification_add_cart -->
                    <div class="modal fade" id="notification_add_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Số lượng sản phẩm không đủ. Vui lòng chọn sản phẩm khác.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-danger">Save changes</button> -->
                        </div>
                        </div>
                    </div>
                    </div>


                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span><?php echo ($product_slug->warehouse->import_quantity - $product_slug->export_quantity)>0 ? "In Stock" : "Out In Stock" ?></span></li>
                        <li><b>Quanlity</b> <span> {{ ($product_slug->warehouse->import_quantity - $product_slug->export_quantity)}}</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Bình luận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <p class="font-weight-bold">{{$comments->count()}} bình luận</p>
                                <hr>
                                @foreach($comments as $comment)
                                    <div style="height: 80px">
                                        <h6>{{$comment->User->name}}</h6>
                                        <p>{{$comment->content}} <span class="float-right">
                                       @if(Auth::user()->id && Auth::user()->id===$comment->user_id)
                                                    <a class="badge badge-danger" href="{{route('delete.comment',$comment->id)}}">Xóa</a>
                                        @endif
                                    </div>
                                    <hr class="">
                                    @if($comment->reply!="")
                                    <div style="height: 80px; margin-left: 100px;">
                                        <h6>Admin<span style="margin-left: 10px;font-weight: 300; font-size: 16;">( Trả lời bình luận <span style="font-weight: 900;">{{$comment->User->name}}</span>)<span> </h6>
                                        <p>{{$comment->reply}} <span class="float-right">
                                    </div>
                                    <hr class="">
                                    @endif
                                @endforeach
                                <form class="mt-5" action="{{isset($comment_edit)?route('update.comment',$comment_edit->id):route('product.post_comment')}}" method="POST">
                                    <span class="text-danger">{{$errors->has('content')?$errors->first('content'):""}}</span>
                                    <textarea  rows="5" style="width: 100%; padding: 20px;" name="content">{{isset($comment_edit)?$comment_edit->content:old('content')}}
                                    </textarea>
                                    @auth
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id?Auth::user()->id:''}}">
                                    @endauth
                                    <input type="hidden" name="product_id" value="{{$product_slug->id}}">
                                    <button type="submit" class="btn float-right text-white" style="background: #7fad39;">Bình luận</button>
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane " id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Mô tả</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($product_relate as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('Uploads/'.$product->image)}}">
                    <p>
                            <?php 
                                $qr_code = url('san-pham',$product->slug);
                                echo QrCode::size(100)->generate($qr_code);
                            ?>
                        </p>
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{route('home.product',$product->slug)}}"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{route('home.product',$product->slug)}}">{{$product->name}}</a></h6>
                        <h5>${{$product->price_unit}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection
