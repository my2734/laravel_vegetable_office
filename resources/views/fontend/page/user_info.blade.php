@extends('fontend.layout.master')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>@lang('lang.profile')</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home.index')}}">@lang('lang.home')</a>
                        <span>@lang('lang.profile')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Contact Section Begin -->
<section class="contact spad">
    
<form method="POST" action="{{route('home.edit_user_info')}}" enctype="multipart/form-data">
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
        
        <div class="col-lg-8 col-md-6">
        <div class="checkout__input">
                <p>@lang('lang.username')</p>
                <input style="color: #333 !important" name="name" value="{{isset($user_edit->name)?$user_edit->name:''}}" type="text">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout__input">
                        <p>@lang('lang.full_name')</p>
                        <input style="color: #333 !important" name="full_name" value="{{isset($user_edit->full_name)?$user_edit->full_name:''}}" type="text">
                    </div>
                </div>
            </div>
            <div class="checkout__input">
                <p>@lang('lang.country')</p>
                <input style="color: #333 !important" name="country" value="{{isset($user_edit->country)?$user_edit->country:''}}" type="text">
            </div>
            <div class="checkout__input">
                <p>@lang('lang.city')</p>
                <input style="color: #333 !important" name="conscious" value="{{isset($user_edit->conscious)?$user_edit->conscious:''}}" type="text">
            </div>
            <div class="checkout__input">
                <p>@lang('lang.district')</p>
                <input style="color: #333 !important" name="district" type="text" value="{{isset($user_edit->district)?$user_edit->district:''}}" name="district">
            </div>
            <div class="checkout__input">
                <p>@lang('lang.commune')</p>
                <input style="color: #333 !important" name="commune" type="text" value="{{isset($user_edit->commune)?$user_edit->commune:''}}" name="district">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout__input">
                        <p>Email</p>
                        <input style="color: #333 !important" name="email" value="{{isset($user_edit->email)?$user_edit->email:''}}" type="email">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout__input">
                        <p>@lang('lang.phone')</p>
                        <input style="color: #333 !important" name="phone" value="{{isset($user_edit->phone)?$user_edit->phone:''}}" type="text">
                    </div>
                </div>
            </div>
            <div class="checkout__input">
                <p>@lang('lang.address_detail')</p>
                <textarea style="color: #333 !important" name="address_detail" value="{{isset($user_edit->full_name)?$user_edit->full_name:''}}" rows="4" class="form-control">{{ isset($user_edit->address_detail)?$user_edit->address_detail:"" }}</textarea>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="cover_img_user mx-auto">
                @if(!isset($user_edit->avatar))
                    <img src="https://i.pinimg.com/280x280_RS/2e/45/66/2e4566fd829bcf9eb11ccdb5f252b02f.jpg">
                @else
                    <img src="{{asset('Uploads/'.$user_edit->avatar)}}" alt="">
                @endif
                <div class="input-group my-4">
                    <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input input-upload-image-avatar" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">@lang('lang.choose_image')</label>
                    </div>
                    <br>
                </div>
                <div class=" text-center">
                    <button type="submit" class="btn text-white submit-form-profile" style="background-color: #7fad39">@lang('lang.update')</button>
                </div>
            </div>
        </div>
    </div>
    @csrf
</form>
</section>
<!-- Contact Section End -->
@endsection
