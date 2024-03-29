@extends('fontend.layout.master')
@section('search_page_home')
<div class="hero__search__form" style="postion: relative;">
    <form action="{{route('home.search_product')}}" method="POST" style="postion: relative;">
        <input type="text" id="search_key" name="search_key" placeholder="What do yo u need?">
        <button type="submit" class="site-btn">SEARCH</button>
        @csrf
    </form>
</div>
<div class="autocomplete" style="margin-top: 64px;">
    <ul style="display: block;">
    </ul>
</div>
@endsection
@section('content')    
     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">@lang('lang.home')</a>
                            <span>@lang('lang.shop')</span>
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
                            <h4>@lang('lang.department')</h4>
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{route('home.category',$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Loc -->
                        <div class="sidebar__item">
                            <h4>@lang('lang.price')</h4>
                            <form method="POST" action="{{route('home.filter_product')}}">
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
                                    <input type="submit" value="Lọc" class="btn btn-sm primary-btn  mt-4">
                                </div>
                                @csrf
                            <form>    
                        </div>
                        <!-- End Loc -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                @if(!isset($search_key) && !isset($min))
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
                                    <a href="{{route('sort_low_to_high_all_product')}}" class="btn btn-default custom-btn-default {{$class_btn_low_to_high}}">
                                        <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>@lang('lang.low_to_high')</a>
                                    <a href="{{route('sort_high_to_low_all_product')}}" class="btn btn-default custom-btn-default {{$class_btn_high_to_low}}"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i>@lang('lang.high_to_low')</a>

                                </div>
                                @endif
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="filter__found">
                                    @if(isset($search_key))
                                    <h3><span style="font-weight: 700">@lang('lang.search_result') "{{$search_key}}"</span></h3>
                                    @elseif(isset($min))
                                    <h3><span style="font-weight: 700">@lang('lang.filter_result') {{number_format($min)}}vnđ - {{number_format($max)}}vnđ</span></h3>
                                    @elseif(isset($low_to_high))
                                    <h3><span style="font-weight: 700"></span>@lang('lang.result_sort_low_to_high')</h3>
                                    @elseif(isset($high_to_low))
                                    <h3><span style="font-weight: 700">@lang('lang.result_sort_high_to_low')</span></h3>
                                    @else            
                                    <h3><span style="font-weight: 700">@lang('lang.all_product')</span></h3>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        @if(count($products)<=0)
                            <h4 class="font-weight-bold">@lang('lang.not_found')</h4>
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
                                        @php 
                                        $inventory = $product->warehouse->import_quantity - $product->warehouse->export_quantity;
                                    @endphp
                                    <li><a href="javascript:void(0);" inventory="{{$inventory}}" id="{{$product->id}}" class="add_one_cart"  ><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <ul style="list-style:none; fon-size: 10px;color: #666;">
                                        <li><i class="fa fa-calendar-o"></i> {{$product->updated_at}}</li>
                                        <li><i class="fa fa-comment-o"></i> {{$product->comment->count()}}</li>
                                    </ul>
                                    <?php 
                                        $inventory = $product->warehouse->import_quantity - $product->warehouse->export_quantity;
                                    ?>
                                    <h6><a class="font-weight-bold" href="{{route('home.product',$product->slug)}}">{{$product->name}}</a>
                                        @if($inventory <=0 )
                                            <span>(@lang('lang.out_of_stock'))</span>
                                        @endif
                                    </h6>
                                    <h5>{{$product->price_promotion != 0 ? number_format($product->price_promotion) : number_format($product->price_unit)}}vnđ</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    {{-- {{$products->links()}} --}}
                    @if(!isset($min))
                    {{$products->links('vendor.pagination.custom')}}
                    @endif
                    {{-- {{$products->links('vendor.pagination.custom')}} --}}
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
                                                <span>(Hết hàng)</span>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection