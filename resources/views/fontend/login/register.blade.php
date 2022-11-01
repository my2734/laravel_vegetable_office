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
        <style>
            body {
            background: #7fad39;
            background: linear-gradient(to right, #7fad39, #bae876);
            }
            .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
            }
            .btn-google {
            color: white !important;
            background-color: #ea4335;
            }
            .btn-facebook {
            color: white !important;
            background-color: #3b5998;
            }
        </style>
    </head>
    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-8 offset-sm-2 p-5" style="background-color: #fff;">
                    <form action="{{route('customer.post_register')}}" method="POST" class="border_form">
                        <h2 class="text-center mb-4">Đăng ký</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User name <span class="text-danger">*</span></label>
                                    <input type="text" name="user_name" value="{{old('user_name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('user_name')?$errors->first('user_name'):""}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ tên <span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" value="{{old('full_name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('full_name')?$errors->first('full_name'):""}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('email')?$errors->first('email'):""}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('phone')?$errors->first('phone'):""}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quốc gia <span class="text-danger">*</span></label>
                                    <input type="text" name="country" value="{{old('country')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('country')?$errors->first('country'):""}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                    <input type="text" name="conscious" value="{{old('conscious')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('conscious')?$errors->first('conscious'):""}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Huyện/Quận <span class="text-danger">*</span></label>
                                    <input type="text" name="district" value="{{old('district')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('district')?$errors->first('district'):""}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Xã/Thị xã <span class="text-danger">*</span></label>
                                    <input type="text" name="commune" value="{{old('commune')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;">{{$errors->has('commune')?$errors->first('commune'):""}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ chi tiết</label>
                            <input type="text" name="address_detail" value="{{old('address_detail')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-danger" style="font-size: 14px;"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" value="" class="form-control" id="exampleInputPassword1">
                            <span class="text-danger" style="font-size: 14px;">{{$errors->has('password')?$errors->first('password'):""}}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password confirm <span class="text-danger">*</span></label>
                            <input type="password" name="re_password" value="{{old('re_password')}}" class="form-control" id="exampleInputPassword1">
                            <span class="text-danger" style="font-size: 14px;">{{$errors->has('re_password')?$errors->first('re_password'):""}}</span>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-sm btn-login text-uppercase fw-bold" type="submit">Đăng ký</button>
                            <a class="btn btn-secondary float-right btn-sm btn-login text-uppercase fw-bold" href="{{route('customer.register')}}">Đăng nhập</a>
                        </div>
                        <hr class="my-4">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div>
        </div>
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
        <script></script>
    </body>
</html>