@extends('fontend.layout.master')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Section Begin -->
<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{route('home.category',$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <form method="POST" action="{{route('home.filter_product_by_category')}}">
                                <div class="price-range-wrap">
                                    <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                        data-min="20000" data-max="1000000">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                    <div class="range-slider">
                                        <div class="price-input">
                                            <input type="text" class="" style="font-size: 11px;" name="minamount" id="minamount">
                                            <input type="text" class="ml-5" style="font-size: 11px;" name="maxamount" id="maxamount">
                                        </div>
                                    </div>
                                    <input type="hidden" name="cat_slug" value="{{$category_slug->slug}}">
                                    <input type="submit" value="Lọc" class="btn btn-sm primary-btn  mt-4">
                                </div>
                                @csrf
                            <form>    
                        </div>
                        
                       
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                
                                <div class="filter__sort">
                                     <!-- <span>Sort By</span> -->
                                     <?php
                                     $class_btn_low_to_high = "";
                                     if(isset($low_to_high) && $low_to_high==1){
                                         $class_btn_low_to_high = "active_btn_sort";
                                     }

                                     $class_btn_high_to_low = "";
                                     if(isset($high_to_low) && $high_to_low==1){
                                         $class_btn_high_to_low = "active_btn_sort";
                                     }
                                 ?>
                                    <a href="{{route('sort_low_to_high_category',$category_slug->slug)}}" class="btn btn-default custom-btn-default {{$class_btn_low_to_high}}"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i>Thấp đến cao</a>
                                    <a href="{{route('sort_high_to_low_category',$category_slug->slug)}}" class="btn btn-default custom-btn-default {{$class_btn_high_to_low}}"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i>Cao đến thấp</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="filter__found">
                                @if(isset($min))
                                <h5><span style="font-weight: 700">Kết quả lọc từ {{number_format($min)}}vnđ - {{number_format($max)}}vnđ</span></h5> 
                                @elseif(isset($low_to_high))
                                <h3><span style="font-weight: 700">Kết quả sắp xếp từ thấp đến cao</span></h3>
                                @elseif(isset($high_to_low))
                                <h3><span style="font-weight: 700">Kết quả sắp xếp từ cao đến thấp</span></h3>
                                @else
                                <h5><span style="font-weight: 700">Sản phẩm của {{$category_slug->name}}</span></h5>
                                @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        @if(count($products)<=0)
                            <h3 class="font-weight-bold">Không tìm thấy kết quả</h3>
                        @else
                        @foreach($products as $key => $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('Uploads/'.$product->image)}}">
                                <p>
                                    <?php 
                                        $qr_code = url('san-pham',$product->slug);
                                        echo QrCode::size(100)->generate($qr_code);
                                    ?>
                                </p>
                                    <ul class="product__item__pic__hover">
                                        <li> 
                                            <form method="POST" action="{{route('home.wish_list')}}">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <button type="submit" style="border:none;background-color: transparent">
                                                    <a href="javascript:void(0);"><i class="fa fa-heart"></i></a>
                                                </button>
                                                @csrf
                                            </form>
                                        </li>
                                        <li><a href="{{route('home.product',$product->slug)}}"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="javascript:void(0);" id="{{$product->id}}" class="add_one_cart"  ><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <ul style="list-style:none; fon-size: 10px;color: #666;">
                                        <li><i class="fa fa-calendar-o"></i> {{$product->updated_at}}</li>
                                        <li><i class="fa fa-comment-o"></i> {{$product->comment->count()}}</li>
                                    </ul>
                                    <?php 
                                        $inventory = $product->warehouse->import_quantity- $product->warehouse->export_quantity;
                                    ?>
                                    <h6><a class="font-weight-bold" href="{{route('home.product',$product->slug)}}">{{$product->name}}</a>
                                        @if($inventory <=0)
                                            <span>(Hết hàng)</span>
                                        @endif
                                    </h6>
                                    <h5>{{number_format($product->price_unit)}}vnđ</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    {{$products->links('vendor.pagination.custom')}}
                    <div class="product__discount mt-5">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($product_sales as $product)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{asset('Uploads/'.$product->image)}}">
                                           <div class='row'>
                                                <div class='col'>
                                                <p>
                                                    <?php 
                                                        $qr_code = url('san-pham',$product->slug);
                                                        echo QrCode::size(100)->generate($qr_code);
                                                    ?>
                                                </p>
                                                </div>
                                                <div class='col'>
                                                    <div class="product__discount__percent font-weight-bold">Sale</div>
                                                </div>
                                            
                                                
                                           </div>
                                            <ul class="product__item__pic__hover">
                                               <li> 
                                                    <form method="POST" action="{{route('home.wish_list')}}">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <button type="submit" style="border:none;background-color: transparent">
                                                            <a href="javascript:void(0);"><i class="fa fa-heart"></i></a>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </li>
                                                <li><a href="{{route('home.product',$product->slug)}}"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="javascript:void(0);" id="{{$product->id}}" class="add_one_cart"  ><i class="fa fa-shopping-cart"></i></a></li>

                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <ul style="list-style:none; fon-size: 10px;color: #666;">
                                                    <li><i class="fa fa-calendar-o"></i> {{$product->updated_at}}</li>
                                                    <li><i class="fa fa-comment-o"></i> {{$product->comment->count()}}</li>
                                            </ul>
                                            <?php 
                                                $inventory = $product->warehouse->import_quantity - $product->warehouse->export_quantity;
                                            ?>
                                            <h6><a class="font-weight-bold" href="{{route('home.product',$product->slug)}}">{{$product->name}}</a>
                                            @if($inventory <= 0)
                                                <span>(Hết hàng)</span>
                                            @endif
                                            </h6>
                                            <h5>{{number_format($product->price_unit)}}vnđ</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
<!-- Product Section End -->
@endsection

