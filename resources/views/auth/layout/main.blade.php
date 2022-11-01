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
           @yield('content')
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