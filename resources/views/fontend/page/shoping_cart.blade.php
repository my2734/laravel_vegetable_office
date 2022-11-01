@extends('fontend.layout.master')
@section('content')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
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

                <a href="{{route('checkout.lich_su_mua_hang')}}" class="float-right btn text-white mb-3" style="background: #7fad39;">Lịch sử đơn hàng<i class="fa fa-history ml-2" aria-hidden="true"></i></a>

                    <div class="alert_shopping_cart">

                    </div>

                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
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
                                    ${{$cart->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="form-group">
                                            <input class="fomr-control update_cart custom_input_qty" type="text" id="{{$cart->rowId}}" name="qty" value="{{$cart->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total" id="price_product{{$cart->rowId}}">
                                    ${{($cart->qty*$cart->price)}}
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
                    <a style="background: #7fad39;" href="{{route('home.all_product')}}" class="text-white primary-btn cart-btn "><i class="fa fa-undo" aria-hidden="true"></i> CONTINUE SHOPPING</a>
{{--                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>--}}
{{--                        Upadate Cart</a>--}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span class="btn_sub_total_shopping_cart">${{$sub_total}}</span></li>
                        <li>Total <span class="btn_total_shopping_cart">${{$sub_total}}</span></li>
                    </ul>
                    <a href="{{route('checkout.show')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
