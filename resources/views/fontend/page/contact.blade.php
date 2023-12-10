@extends('fontend.layout.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>@lang('lang.contact')</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home.index')}}">@lang('lang.home')</a>
                            <span>@lang('lang.contact')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
        @if(session('message_success'))
        <div class="alert alert-success alert-dismissible mt-2 fade show text-center" role="alert">
            <strong>{{session('message_success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
                    <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>@lang('lang.Phone')</h4>
                        <p>+01-3-8888-6868</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>@lang('lang.address')</h4>
                        <p>Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>@lang('lang.open_time')</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>phammy773734@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Can Tho,Viet Nam&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
{{--        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Can Tho,Viet Nam&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpenation.com/">Minecraft Website</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:400px;}.gmap_iframe {width:600px!important;height:400px!important;}</style></div>--}}
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Cần Thơ</h4>
                <ul>
                    <li>Phone: +12-345-6789</li>
                    <li>Add: Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>@lang('lang.leave_message')</h2>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{route('home.post_mail_contact')}}">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                        <input type="text" value="{{old('name')}}" name="name" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <span class="text-danger"> @error('email') {{$message}}  @enderror</span>
                        <input type="text" name="email" value="{{old('email')}}"  placeholder="Your Email">
                    </div>
                    <span class="text-danger text-left">@error('content') {{$message}}  @enderror</span>
                    <div class="col-lg-12 text-center">
                        <textarea name="content" class="textAreaMessage" placeholder="Your message">{{old('content')}}</textarea>
                        @if($user_id)
                        <input type="hidden" id="name" value="<?php echo $name ?>">
                        <input type="hidden" id="avatar" value={{$avatar}}>
                        <input type="hidden" id="link" value="">
                        <button type="submit" class="site-btn btn_send_email">@lang('lang.send_message')</button>
                        @else
                        <a href="{{route('login')}}">
                            <span class="site-btn">@lang('lang.send_message')</span>
                        </a>
                        @endif
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
