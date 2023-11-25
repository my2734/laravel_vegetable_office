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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(() => {
            $('#btnSubmitLogin').click((e) => {
                const isSubmit = validationFormLoginCustomer()
                if (isSubmit !== true) {
                    e.preventDefault();
                }
            })

            $('#btnSubmitRegisterCustomer').click((e) => {
                const isSubmit = validationFormRegisterCustomer()
                if(isSubmit !== true){
                    e.preventDefault();
                }
            })

            function validationFormRegisterCustomer() {
                const name = $('input[name="name"]').val()
                if(!name){
                    return displayError('Vui lòng nhập tên')
                }

                const email = $('input[name="email"]').val()
                if (!email) {
                    return displayError('Vui lòng nhập email')
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    return displayError('Email không hợp lệ')
                }

                const password = $('input[name="password"]').val()
                if (!password) {
                    return displayError('Vui lòng nhập mật khẩu')
                } else if (password.length < 6 || password.length > 8) {
                    return displayError('Độ dài mật khẩu không hợp lệ')
                }

                const password_confirmation = $('input[name="password_confirmation"]').val()
                if (!password_confirmation) {
                    return displayError('Vui lòng nhập mật khẩu')
                } else if (password.length < 6 || password.length > 8) {
                    return displayError('Độ dài mật khẩu không hợp lệ')
                }

                if(password !== password_confirmation){
                    return displayError('Mật khẩu xác nhận không chính xác')
                }
                return true
            }

            function validationFormLoginCustomer() {
                const email = $('input[name="email"]').val()
                if (!email) {
                    return displayError('Vui lòng nhập email')
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    return displayError('Email không hợp lệ')
                }

                const password = $('input[name="password"]').val()
                if (!password) {
                    return displayError('Vui lòng nhập mật khẩu')
                } else if (password.length < 6 || password.length > 8) {
                    return displayError('Độ dài mật khẩu không hợp lệ')
                }
                return true

            }

            function displayError(message) {
                Toastify({
                    text: message,
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "#C70039",
                    },
                }).showToast();
            }
        })
    </script>
</body>

</html>