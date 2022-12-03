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
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5 mb-2">@lang('lang.sign_in')</h5>
                            @if(session('register_success'))
                            <div class="alert alert-success alert-dismissible mt-2 fade show text-center" role="alert">
                              <strong>{{session('register_success')}}</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @endif
                            @if(session('login_fail'))
                            <div class="alert alert-success alert-dismissible mt-2 fade show text-center" role="alert">
                              <strong>{{session('login_fail')}}</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @endif
                            <form method="POST" action="{{route('customer.post_login')}}">
                                <div class="form-floating mb-3">
                                  <label for="floatingInput">@lang('lang.email_address')</label>
                                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="floatingInput" placeholder="name@example.com">
                                    @if($errors->has('email'))
                                        @foreach($errors->get('email') as $error)
                                            <span class="text-danger">{{$error}} *<br></span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                  <label for="floatingPassword">@lang('lang.password')</label>
                                    <input type="password" class="form-control" value="{{old('password')}}" name="password" id="floatingPassword" placeholder="Password">
                                    @if($errors->has('password'))
                                        @foreach($errors->get('password') as $error)
                                            <span class="text-danger">{{$error}} *<br></span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" name="remember" type="checkbox" value="" id="rememberPasswordCheck">
                                    <label class="form-check-label" for="rememberPasswordCheck">
                                    @lang('lang.remember_password')
                                    </label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-sm btn-login text-uppercase fw-bold" type="submit">@lang('lang.login')</button>
                                    <a class="btn btn-secondary float-right btn-sm btn-login text-uppercase fw-bold" href="{{route('customer.register')}}">@lang('lang.login')</a>
                                </div>
                                <hr class="my-4">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    </body>
</html>
