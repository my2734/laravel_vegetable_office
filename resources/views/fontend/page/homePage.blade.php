@extends('fontend.layout.master')
@section('search_page_home')
<div class="hero__search__form" style="postion: relative;">
    <form action="{{route('home.search_product')}}" method="POST" style="postion: relative;">
        <input type="text" id="search_key" name="search_key" placeholder="What do yo u need?">
        <button type="submit" class="site-btn">@lang('lang.search')</button>
        @csrf
    </form>
</div>
<div class="autocomplete">
    <ul style="display: block;">
        <!-- <li style="display:block;" class="mt-3">
            <img height="50" width="50" class="float-left mr-3" src="http://127.0.0.1:8001/Uploads/product-details-226.jpg" alt="">
            <span >
                <a class="">Hello ca nha yeu</a><br>
                <span class="info_search_item">2022-09-21 22:23:40</span>
            </span>
        </li>
        <li style="display:block;" class="mt-3">
            <img height="50" width="50" class="float-left mr-3" src="http://127.0.0.1:8001/Uploads/product-details-226.jpg" alt="">
            <span >
                <a class="">Hello ca nha yeu</a><br>
                <span class="info_search_item">2022-09-21 22:23:40</span>
            </span>
        </li> -->
        
    </ul>
</div>
@endsection
@section('background_page_home')
@if(Session::has('register_success'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>{{ session::get('register_success')}} @php session::forget('register_success')  @endphp</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="hero__item set-bg" data-setbg="{{asset('fontend/img/hero/banner.jpg')}}">
    <div class="hero__text">
        <span>@lang('lang.fruit_fresh')</span>
        <h2>Vegetable <br />100% Organic</h2>
        <p>@lang('lang.free_ship')</p>
        <a href="{{route('home.all_product')}}" class="primary-btn">@lang('lang.shop_now')</a>
    </div>
</div>
@endsection
@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    {{-- danh muc and anh --}}
                    @foreach($categories as $category)
                    <div class="col-lg-3">
                        <!-- <a href="facebook.com"> -->
                            <div class="categories__item set-bg" data-setbg="{{asset('Uploads/'.$category->image)}}">
                                <h5><a href="{{route('home.category',$category->slug)}}">{{$category->name}}</a></h5>
                            </div>
                        <!-- </a> -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <!-- Featured Section Begin -->

    <section class="featured spad" style="user-select: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>@lang('lang.popular_product')</h2>
                        <div class="alert_add_pro_home_page">

                        </div>

                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">@lang('lang.all')</li>
                            @foreach($categories as $key => $category)
                            <li data-filter=".demo{{$category->id}}">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div id="add_one_cart"></div>

            <div class="row featured__filter">
                @foreach($products as $key => $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix demo{{$product->cat_id}} fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('Uploads/'.$product->image)}}">
                        <p>
                            <?php 
                                $qr_code = url('san-pham',$product->slug);
                                echo QrCode::size(100)->generate($qr_code);
                            ?>
                        </p>
                            <ul class="featured__item__pic__hover">
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
                                @php 
                                    $inventory = $product->warehouse->import_quantity - $product->warehouse->export_quantity;
                                @endphp
                                 @php 
                                    $inventory = $product->warehouse->import_quantity - $product->warehouse->export_quantity;
                                @endphp
                                <li><a href="javascript:void(0);" inventory="{{$inventory}}" id="{{$product->id}}" class="add_one_cart"  ><i class="fa fa-shopping-cart"></i></a></li>
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
                                    <span>(@lang('lang.out_of_stock'))</span>
                                @endif
                            </h6>
                            {{-- <h5>{{number_format($product->price_unit)}}vnđ</h5> --}}
                            <h5>{{$product->price_promotion != 0 ? number_format($product->price_promotion) : number_format($product->price_unit)}}vnđ</h5>
                        </div>
                    </div>    
                </div>
                
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Section End -->
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('fontend/img/banner/banner-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('fontend/img/banner/banner-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>@lang('lang.laster_product')</h4>
                        <div class="latest-product__slider owl-carousel">
                            {{-- san pham moi dang --}}
                            <div class="latest-prdouct__slider__item">
                                @foreach($product_laster as $product)
                                <a href="{{route('home.product',$product->slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img height="110px" width="110px" style="object-fit: cover;" src="{{asset('Uploads/'.$product->image)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <?php 
                                            $inventory = $product->warehouse->import_quantity - $product->warehouse->export_quantity;
                                        ?>
                                        <h6>{{$product->name}}
                                            @if($inventory <= 0)
                                                <span>(@lang('lang.out_of_stock'))</span>
                                            @endif
                                        </h6>
                                        {{-- <span>{{number_format($product->price_unit)}}vnđ</span> --}}
                                        <h5>{{$product->price_promotion != 0 ? number_format($product->price_promotion) : number_format($product->price_unit)}}vnđ</h5>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>

                        {{-- {{$product_laster->links('fontend.partial.paginate')}} --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>@lang('lang.top_rated_product')</h4>
                        <div class="latest-product__slider owl-carousel">
                            {{-- san pham ban chay --}}
                            <div class="latest-prdouct__slider__item">
                                @foreach($product_top_rate as $product)
                                    <a href="{{route('home.product',$product->slug)}}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img height="110px" width="110px" style="object-fit: cover;" src="{{asset('Uploads/'.$product->image)}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                        <?php 
                                            $inventory = $product->warehouse->import_quantity - $product->warehouse->export_quantity;
                                        ?>
                                            <h6>{{$product->name}} @if($inventory <= 0)<span>(@lang('lang.out_of_stock'))</span>@endif
                                            </h6>
                                            {{-- <span>{{number_format($product->price_unit)}}vnđ</span> --}}
                                            <h5>{{$product->price_promotion != 0 ? number_format($product->price_promotion) : number_format($product->price_unit)}}vnđ</h5>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>@lang('lang.from_the_blog')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- blog  --}}
                @foreach($blogs as $key => $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img class="custom_img_blog" src="{{asset('Uploads/'.$blog->image)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$blog->updated_at}}</li>
                                {{-- <li><i class="fa fa-comment-o"></i>5</li> --}}
                            </ul>
                            <h5><a href="{{route('home.blog_detail',$blog->slug)}}">{{$blog->title}}</a></h5>
                            <p class="limit_text">{{$blog->detail_header}}</p>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section Ensd -->
@endsection
