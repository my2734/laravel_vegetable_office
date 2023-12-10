@extends('fontend.layout.master')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>@lang('lang.go_shopping_cart')</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">@lang('lang.home')</a>
                        <span>@lang('lang.go_shopping_cart')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('checkout.lich_su_mua_hang')}}" class="float-right btn text-white mb-3" style="background: #7fad39;">@lang('lang.purchase_history')<i class="fa fa-history ml-2" aria-hidden="true"></i></a>
                <div class="alert_shopping_cart">
                </div>
                <div class="alert alert-danger alert-dismissible fade show d-none alert_error_quantity_cart" role="alert">
                    <strong>@lang('lang.please_check_quantity_cart')</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="shoping__cart__table" id="table_shoppingCart">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">@lang('lang.product')</th>
                                <th>@lang('lang.price')</th>
                                <th>@lang('lang.quantity')</th>
                                <th>@lang('lang.total')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $key => $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <a href="{{route('home.product',$cart->options->slug)}}">
                                        <img height="100px" width="100px" src="{{asset('Uploads/'.$cart->options->image)}}" alt="">
                                        <h5>{{$cart->name}}</h5>
                                    </a>
                                </td>
                                <td class="shoping__cart__price">
                                    {{number_format($cart->price)}}vnđ
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="form-group">
                                            <input statusError="false" class="fomr-control update_cart custom_input_qty" type="text" id="{{$cart->rowId}}" name="qty" value="{{$cart->qty}}">
                                            <br>
                                            <span class="text-danger fs-6 font-weight-bold error_quantity{{$cart->rowId}}"></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total" id="price_product{{$cart->rowId}}">
                                    {{number_format($cart->qty*$cart->price)}}vnđ
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{route('cart.delete_one_cart',$cart->rowId)}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="shoping__cart__btns">
                    <a  style="background: #408e52;" href="{{route('home.all_product')}}" class="text-white primary-btn cart-btn "><i class="fa fa-undo" aria-hidden="true"></i> TIẾP TỤC MUA SẮM</a>
                    <button type="button" data-toggle="modal" data-target="#discount" style="background: #408e52;" class="text-white primary-btn cart-btn "><i class="fa fa-qrcode" aria-hidden="true"></i> ÁP MÃ GIẢM GIÁ</button>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="discount" tabindex="-1" aria-labelledby="discountLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="discountLabel">@lang('lang.discount')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    @if(isset($arr_list_event))
                                    @foreach($arr_list_event as $event)
                                    <div class="d-flex my-2">
                                        <img width="50" height="50" style="object-fit: cover;" src="{{asset('fontend/img/sale.jpg')}}" alt="">
                                        <div class="px-3">
                                            <p class="" style="line-height: 16px;">Giảm {{$event->percent}}% cho mỗi đơn hàng</p>
                                            <p class="" style="line-height: 0px">Áp dụng đến hết ngày {{$event->end_date}}</p>
                                        </div>
                                        <input type="radio" name="discount" value="{{$event->id}}" id="">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="primary-btn cart-btn" data-dismiss="modal">@lang('lang.close')</button>
                            <button type="button" style="background: #408e52;" class="text-white primary-btn cart-btn btn-apply-discount">@lang('lang.apply')</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>@lang('lang.cart_total')</h5>
                    <ul>
                        
                        <li>@lang('lang.total') <span class="btn_total_shopping_cart">{{$sub_total}}vnđ</span></li>
                    </ul>
                    @if($quantity_cart > 0)
                        <a href="{{route('checkout.show')}}" class="primary-btn btn_click_showCart">@lang('lang.proceed_to_checkout')</a>
                    @else
                    <button  class="primary-btn btn-click-modal" data-toggle="modal" data-target="#exampleModal">@lang('lang.proceed_to_checkout')</button>
                    
                    @endif
                </div>
            </div>
            @if(Auth::id())
                <input type="hidden" value={{$name}} id="name">
                <input type="hidden" value={{$avatar}} id="avatar">
            @endif
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('lang.notification')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('lang.notify_cart_empty')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm primary-btn custom-primary-btn receive_order" data-dismiss="modal">@lang('lang.close')</button>
                        <a href="{{route('home.all_product')}}" type="button" class="btn btn-sm primary-btn custom-primary-btn custom-primary-btn-cancel text-white">@lang('lang.go_shopping_cart')</a>
                    </div>
                </div>
            </div>
          </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection