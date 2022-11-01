<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ogani Template">
        <meta name="keywords" content="Ogani, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ogani | Template</title>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
        <!-- Css Styles -->
        <link rel="stylesheet" href="{{asset('fontend/css/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/font-awesome.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/elegant-icons.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/nice-select.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/jquery-ui.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/owl.carousel.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/slicknav.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/style.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('fontend/css/style2.css')}}" type="text/css">
        <style>
            .btn_custom{
            border: none;
            background: transparent;
            color: #1c1c1c;
            font-size: 15px;
            }
        </style>
    </head>
    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <!-- Header Section Begin -->
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="header__top__left">
                                <ul>
                                    <li><i class="fa fa-envelope"></i> phammy773734@gmail.com</li>
                                    <li>Miễn phí ship trong bán kính 2km</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="header__top__right">
                                <div class="header__top__right__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                                @auth
                                <div class="header__top__right__language">
                                    <a href="{{route('checkout.lich_su_mua_hang')}}" style="color: #000;" class="">Lịch sử mua hàng</a>
                                </div>
                                
                                <div class="header__top__right__language">
                                    <a href="{{route('home.get_user_info')}}">
                                            
                                            @if(!Auth::user()->avatar)
                                                <div class="cover_img_avatar">
                                                    <img src="https://i.pinimg.com/280x280_RS/2e/45/66/2e4566fd829bcf9eb11ccdb5f252b02f.jpg">
                                                </div>
                                            @else
                                                <div class="cover_img_avatar">
                                                    <img src="{{asset('Uploads/'. Auth::user()->avatar)}}" alt="">
                                                </div>
                                            @endif
                                        <a style="color: #000;" href="{{route('home.get_user_info')}}">{{ Auth::user()->name }}</a>
                                    </a>
                                </div>
                                <button class="btn_custom" data-toggle="modal" data-target="#modalLogout"> Logout <i class="fa fa-sign-out" aria-hidden="true"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bạn chắn chắc muốn Logout</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                    <!-- <a href="{{route('logout')}}"><i class="fa fa-user"></i> Logout</a> -->
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger text-white">Chắc chắn</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                <a style="color: #000;" href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="{{route('home.index')}}"><img src="{{asset('fontend/img/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li><a href="{{route('home.index')}}">Home</a></li>
                                <li><a href="{{route('home.all_product')}}">Shop</a></li>
                                <li><a href="{{route('home.blog')}}">Blog</a></li>
                                <li><a href="{{route('home.contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__cart">
                            <ul>
                                <li><a href="{{route('home.get_wish_list')}}"><i class="fa fa-heart"></i> <span>{{isset($count_wish_list)?$count_wish_list:0}}</span></a></li>
                                <li><a href="{{route('cart.show_cart')}}"><i class="fa fa-shopping-bag"></i> <span id="qty_cart">{{Cart::count()}}</span></a></li>
                            </ul>
                            <div class="header__cart__price">item: <span class="cart_total_price">${{Cart::total()}}</span></div>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Header Section End -->
        <!-- Hero Section Begin -->
        <section class="hero hero-normal">
            <div class="container">
                @if(session('order_success'))
                <div class="row">
                    <div class="col-md-6 offset-md-6">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('order_success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All category</span>
                            </div>
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{route('home.category',$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            @yield('search_page_home')
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+65 11.188.888</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                        @yield('background_page_home')
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->
        @yield('content')
        <!-- Footer Section Begin -->
        <footer class="footer spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__about__logo">
                                <a href="./index.html"><img src="{{asset('fontend/img/logo.png')}}" alt=""></a>
                            </div>
                            <ul>
                                <li>Address: 60-49 Road 11378 New York</li>
                                <li>Phone: +65 11.188.888</li>
                                <li>Email: hello@colorlib.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                        <div class="footer__widget">
                            <h6>Useful Links</h6>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">About Our Shop</a></li>
                                <li><a href="#">Secure Shopping</a></li>
                                <li><a href="#">Delivery infomation</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Who We Are</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Innovation</a></li>
                                <li><a href="#">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                            <h6>Join Our Newsletter Now</h6>
                            <p>Get E-mail updates about our latest shop and special offers.</p>
                            <form action="#">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit" class="site-btn">Subscribe</button>
                            </form>
                            <div class="footer__widget__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__copyright">
                            <div class="footer__copyright__text">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                            <div class="footer__copyright__payment"><img src="{{asset('fontend/img/payment-item.png')}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
        <!-- Js Plugins -->
        <script src="{{asset('fontend/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('fontend/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('fontend/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('fontend/js/jquery.slicknav.js')}}"></script>
        <script src="{{asset('fontend/js/mixitup.min.js')}}"></script>
        <script src="{{asset('fontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('fontend/js/main.js')}}"></script>
        <script>
            $('.add_one_cart').click(function(){
                var id_product = $(this).attr('id');
                var qty = 1;
                // alert(id_product+" "+ qty);
                $.ajax({
                    url: "{{route('cart.add_one_cart')}}",
                    method: "GET",
                    data: {id_product:id_product,qty: qty},
                    success: function(data){
                       $('#qty_cart').html(data['cart_qty']);
                       $('.cart_total_price').html("$"+data['cart_total']);
                       $('.alert_add_pro_home_page').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Thêm vào giỏ hàng thành công</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);
            
                    }
                });
            });
            
            $('.add_mul_product').click(function(){
                var id_product = $(this).attr('id');
                var qty = $('.qty_mul_pro').val();
                // alert(id_product+"-"+qty);
                $.get({
                    url: "{{route('cart.add_one_cart')}}",
                    data: {id_product:id_product,qty: qty},
                    success: function(data){
                        $('.message_alert_add_cart').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Thêm vào giỏ hành thành công</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`)
                        $('#qty_cart').html(data['cart_qty']);
                        $('.cart_total_price').html("$"+data['cart_total']);
                        $('.qty_mul_pro').val(1)
                    }
                });
            });
            
            $('.update_cart').change(function(){
                var rowId = $(this).attr('id');
                var qty = $(this).val();
            
                $.get({
                    url:"{{route('cart.update_cart')}}",
                    data: {rowId:rowId,qty:qty},
                    success: function(data){
                        $('#qty_cart').html(data['total_count']);
                        $('#price_product'+data['rowId']).html("$"+data['price_pro']);
                        $('.cart_total_price').html("$"+data['total_cart']);
                        $('.alert_shopping_cart').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Cập nhật giỏ hàng thành công</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);
                        $('.btn_sub_total_shopping_cart').html("$"+data['total_cart']);
                        $('.btn_total_shopping_cart').html("$"+data['total_cart']);
            
                    }
                });
            });
        </script>
        <script>
            $('#dropdownMenu2').click(function(){
                $('#dropdownMenu2_show').css('display','block');
                window.onclick(function(){
                    $('#dropdownMenu2_show').css('display','none');
                });
            });
            
        </script>
        <script>
            $('.receive_order').click(function(){
                var order_id = $(this).attr('id');
                $.get({
                    url: "{{route('checkout.receive_order')}}",
                    data: {order_id: order_id},
                    success: function(){
                        location.reload();
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.header__menu ul li').click(function(){
                    var list_nav_header = $('.header__menu ul li');
                    for(var nav of list_nav_header){
                        if(nav.hasClass('active')){
                            nav.removeClass('active');
                        }
                    }
                    $(this).addClass('active');
                });
            });
        </script>
        <script>
            $('.autocomplete').hide();
            $(document).ready(function(){
                $('#customRange_price').change(function(){
                    const result = parseInt($(this).val());
                    var min = result-20;
                    var max = result + 20;
                    if(min<0) min=0;
                    if(max>540) max=540;
                    $('#min_price').html(min);
                });
                $('#search_key').keyup(function(){
                    const key = $(this).val();
                    if(key!=''){
                        $.get({
                        url:"{{route('home.search_ajax')}}",
                        data:{key:key},
                        success: function(data){
                            $('.autocomplete').show();
                            $('.autocomplete').html(data);
                        }
                    });
                    }else{
                        $('.autocomplete').hide();
                    }
                });
               
            });
            
        </script>
    </body>
</html>