<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ogani Template">
        <meta name="keywords" content="Ogani, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
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
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
                                    <li>@lang('lang.free_ship_2km')</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="header__top__right">
                                <div class="header__top__right__social">
                                    <a href="{{route('change.languge','vi')}}">@lang('lang.vietnames')</a>
                                    <a href="{{route('change.languge','en')}}">@lang('lang.english')</a>
                                </div>
                                @auth
                                <div class="header__top__right__language">
                                    <a href="{{route('checkout.lich_su_mua_hang')}}" style="color: #000;" class="">@lang('lang.purchase_history')</a>
                                </div>
                                <div class="header__top__right__language">
                                    <a href="{{route('home.get_user_info')}}">
                                        <!-- <h1>{{ Auth::user()->avatar }}</h1> -->
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
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('lang.do_you_want_sign_out')</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.no')</button>
                                                <!-- <a href="{{route('logout')}}"><i class="fa fa-user"></i> Logout</a> -->
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger text-white">@lang('lang.sure')</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <a style="color: #000;" href="{{route('login')}}"><i class="fa fa-user"></i> @lang('lang.login')</a>
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
                                <li><a href="{{route('home.index')}}">@lang('lang.home')</a></li>
                                <li><a href="{{route('home.all_product')}}">@lang('lang.shop')</a></li>
                                <li><a href="{{route('home.blog')}}">@lang('lang.blog')</a></li>
                                <li><a href="{{route('home.contact')}}">@lang('lang.contact')</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__cart">
                            <ul>
                                <li>
                                    <a href="{{route('home.get_wish_list')}}"><i class="fa fa-heart"></i> <span>{{isset($count_wish_list)?$count_wish_list:0}}</span></a></li>
                                <li>
                                    <a href="{{route('cart.show_cart')}}"><i class="fa fa-shopping-bag"></i> <span id="qty_cart">{{Cart::count()}}</span></a></li>
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
                                <span>@lang('lang.all_category')</span>
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
                                    <span>@lang('lang.suport_24')</span>
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
                                <li>@lang('lang.address'): 60-49 Road 11378 New York</li>
                                <li>@lang('lang.phone'): +65 11.188.888</li>
                                <li>Email: hello@colorlib.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                        <div class="footer__widget">
                            <h6>@lang('lang.usefull_link')</h6>
                            <ul>
                                <li><a href="#">@lang('lang.about_us')</a></li>
                                <li><a href="#">@lang('lang.our_shop')</a></li>
                                <li><a href="#">@lang('lang.secure_shopping')</a></li>
                                <li><a href="#">@lang('lang.delivery_infomation')</a></li>
                                <li><a href="#">@lang('lang.privacy_policy')</a></li>
                                <li><a href="#">@lang('lang.our_sitemap')</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">@lang('lang.who_we_are')</a></li>
                                <li><a href="#">@lang('lang.our_services')</a></li>
                                <li><a href="#">@lang('lang.projects')</a></li>
                                <li><a href="#">@lang('lang.contact')</a></li>
                                <li><a href="#">@lang('lang.innovation')</a></li>
                                <li><a href="#">@lang('lang.testimonials')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                            <h6>@lang('lang.join_our_newsletter_now')</h6>
                            <p>@lang('lang.get_mail_updates')</p>
                            <form action="#">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit" class="site-btn">@lang('lang.subscribe')</button>
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
                <input type="checkbox" isCheck="false" id="check"> 
                <label class="chat-btn" for="check"> 
                    <i class="fa fa-commenting-o comment"></i> 
                    <i style="color: white" class="fa fa-close close"></i> 
                </label> 
                <div id="wrapperMessage" class="wrapper">
                    <div class="header-custom">
                        <h6 style="color: white">Let's Chat - Online</h6>
                    </div>

                    <div class="chat-form"> 
                        <div id="message-content" style="height: 200px; overflow-y: scroll;">
                            {{-- <div>
                                <label for="">User</label>
                                <p>Shop oi</p>
                                <p class="span_time">2:18</p>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <label for="">Admin</label>
                                <p>Shop nghe</p>
                                <p class="span_time">2:18</p>
                            </div> --}}
                        </div>
                        <div class="d-flex">
                            <input id="message" type="text" class="form-control mr-3" placeholder=""> 
                            <button id="btn-send-client" class="btn btn-success">Send</button> 
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
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            $(document).ready(function(){

                $('#check').click(function(){
                    console.log($(this).attr('isCheck'))
                    if($(this).attr('isCheck') === 'false'){
                        $('#check').attr('isCheck', 'true') //open
                        $('#wrapperMessage').css("display", "block");
                    }else{
                        $('#check').attr('isCheck', 'false') //close
                        $('#wrapperMessage').css("display", "none");
                    }

                })
                function scrollChat(){
                    const chatMessageBox = document.querySelector("#message-content")

                    if(chatMessageBox) {
                        chatMessageBox.scrollTop =  chatMessageBox.scrollHeight
                    }

                }

                $.get({
                    url: "{{route('clientChat.index')}}",
                    method: "GET",
                    success: function(data){
                        const listMessage = JSON.parse(data)
                        // console.log(data)
                        var html = '';
                        listMessage.forEach((messageItem)=>{
                            if(messageItem['role']=='client'){
                                html = html + '<div><label for="">User</label><p>'+messageItem['message']+'</p><p class="span_time">'+messageItem['time']+'</p></div>'
                            }else{
                                html = html + '<div class="d-flex flex-column align-items-end"><label for="">Admin</label><p>'+messageItem['message']+'</p><p class="span_time">'+messageItem['time']+'</p></div>'
                            }
                        })
                        $('#message-content').html(html)
                        scrollChat()
                    }
                })

                $('#btn-send-client').click(function(e){
                    e.preventDefault();
                    var formComment = new FormData();
                    var message = $('#message').val();
                    $('#message').val('');
                    formComment.append('message', message);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        contentType: false,
                        processData: false,
                        url:"{{route('clientChat.submit')}}",
                        type: 'POST',
                        dataType: 'json',
                        data: formComment,
                        success: function (response) {
                            // console.log(response)
                            // $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + response.message + '</p></li>').appendTo($('.messages ul'));
                            // $('.message-input input').val(null);
                            console.log(response)
                            $('#message-content').append(`
                                <div>
                                    <label for="">User</label>
                                    <p>${response['message']}</p>
                                    <p class="span_time">${response['time']}</p>
                                </div>
                            `)
                            scrollChat()

                        }, error: function () {
                            alert("Có lỗi xảy ra");
                        },
                    });

                })
            })
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
                    //    $('.alert_add_pro_home_page').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                    //         <strong>Thêm vào giỏ hàng thành công</strong>
                    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //             <span aria-hidden="true">&times;</span>
                    //         </button>
                    //     </div>`);
                    Toastify({
                    text: "Add to cart success",
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "#A7D397",
                    },
                }).showToast();
                       
            
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
                    //     $('.message_alert_add_cart').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                    //     <strong>Thêm vào giỏ hành thành công</strong>
                    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //         <span aria-hidden="true">&times;</span>
                    //     </button>
                    // </div>`)
                    
                        $('#qty_cart').html(data['cart_qty']);
                        $('.cart_total_price').html("$"+data['cart_total']);
                        $('.qty_mul_pro').val(1)
                        Toastify({
                            text: "Add to cart success",
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "#A7D397",
                            },
                        }).showToast();
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
                        // $('.alert_shopping_cart').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     <strong>Cập nhật giỏ hàng thành công</strong>
                        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        //         <span aria-hidden="true">&times;</span>
                        //     </button>
                        // </div>`);
                        $('.btn_sub_total_shopping_cart').html("$"+data['total_cart']);
                        $('.btn_total_shopping_cart').html("$"+data['total_cart']);

                        Toastify({
                            text: "Update to cart success",
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "#A7D397",
                            },
                        }).showToast();
            
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
                console.log("hello ca nha yeu")
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
            
                $('.btn_delete_wish_list').click(function(){
                    const wish_list_id = $(this).attr('id');
                    $.get({
                        url: "{{route('home.delete_wish_list')}}",
                        data: {wish_list_id:wish_list_id},
                        success: function(data){
                            data = JSON.parse(data);
                            $('.row_wish_list'+data).remove();
                        }
                    });
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
        <script>
            // $('.btn_loc').click(function(){
            //     const min_string = $('#minamount').val();
            //     const min_array = min_string.split('$');
            //     const min = min_array[1];
            
            //     const max_string = $('#maxamount').val();
            //     const max_array = min_string.split('$');
            //     const max = min_array[1];
               
            // });
            
            
        </script>
    </body>
</html>