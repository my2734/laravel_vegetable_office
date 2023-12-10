@extends('fontend.layout.master')
@section('content')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>@lang('lang.checkout')</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">@lang('lang.home')</a>
                        <span>@lang('lang.checkout')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <a href="{{route('checkout.lich_su_mua_hang')}}" class="float-right btn text-white" style="background: #7fad39;">@lang('lang.order_history')<i class="fa fa-history ml-2" aria-hidden="true"></i></a>
            <h4>@lang('lang.payment')</h4>
            <form action="{{route('check.add_order')}}" method="POST">
                <div class="row" >
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>@lang('lang.full_name')<span>*</span></p>
                                    <input style="color: #333 !important" name="full_name" value="{{isset($user_buy->full_name)?$user_buy->full_name:old('full_name')}}" type="text">
                                    @if($errors->has('first_name'))
                                        <span class="text-danger">{{$errors->first('first_name')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>@lang('lang.country')<span>*</span></p>
                            <input style="color: #333 !important" name="country" value="{{isset($user_buy->country)?$user_buy->country:old('country')}}" type="text">
                            @if($errors->has('country'))
                                <span class="text-danger">{{$errors->first('country')}}</span>
                            @endif
                        </div>
                        <div class="checkout__input">
                            <p>@lang('lang.city')<span>*</span></p>
                            <input style="color: #333 !important" name="conscious" value="{{isset($user_buy->conscious)?$user_buy->conscious:old('conscious')}}" type="text">
                            @if($errors->has('conscious'))
                                <span class="text-danger">{{$errors->first('conscious')}}</span>
                            @endif
                        </div>
                        <div class="checkout__input">
                            <p>@lang('lang.district')<span>*</span></p>
                            <input style="color: #333 !important" type="text" value="{{isset($user_buy->district)?$user_buy->district:old('district')}}" name="district">
                            @if($errors->has('district'))
                                <span class="text-danger">{{$errors->first('district')}}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input style="color: #333 !important" name="email" value="{{isset($user_buy->email)?$user_buy->email:old('email')}}" type="email">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>@lang('lang.phone')<span>*</span></p>
                                    <input style="color: #333 !important" name="phone" value="{{isset($user_buy->phone)?$user_buy->phone:old('phone')}}" type="text">
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>@lang('lang.note')</p>
                            <input name="order_note" type="text">
                        </div>
                        <div class="checkout__input">
                            <p>@lang('lang.address_detail')<span>*</span></p>
                            <textarea style="color: #333 !important" name="address_detail" rows="4" class="form-control address_detail">{{isset($user_buy->address_detail)?$user_buy->address_detail:old('address_detail')}}</textarea>
                            @if($errors->has('address_detail'))
                                <span class="text-danger">{{$errors->first('address_detail')}}</span>
                            @endif
                        </div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <h1>{{$error}}</h1>
                            @endforeach
                        @endif
                        <h1></h1>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>@lang('lang.your_order')</h4>
                            <div class="checkout__order__products">@lang('lang.product') <span>@lang('lang.total')</span></div>
                            <ul>
                                @foreach($carts as $cart)
                                <li class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <p>{{$cart->name}} x {{$cart->qty}}</p>
                                        <span>{{number_format($cart->price)}}vnđ</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @if(isset($event))
                            <div class="checkout__order__subtotal"><p>Giảm {{$event->percent}}%<span class="float-right">vnđ<span></p></div>
                            @endif
                            <div class="checkout__order__total">@lang('lang.total') <span>{{$sub_total}}vnđ</span></div>
                            <input type='hidden' name="total" value={{$sub_total}}>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="offline" type="radio" name="method_payment" checked>
                                    <label class="form-check-label">@lang('lang.ship_cod')</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="vnpay" type="radio" name="method_payment">
                                    <label class="form-check-label">@lang('lang.payment_vnpay')</label>
                                </div>
                                
                            </div>
                            <button type="submit" name="redirect" class="site-btn btn-submit-store-checkout">@lang('lang.place_order')</button>
                        </div>
                    </div>
                </div>
                @csrf
            </form>

            <!-- <form method='POST' action="{{route('checkout.payment_momo')}}">
                <button type="submit" name='redirect'>Thanh toan baag momo</button>
                @csrf
            </form> -->
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
