<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>V-learning</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url("/images/back-grounds/back_ground_home.jpg");
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 50px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 50px;
                top: 20px;
            }

            .content {
                /* text-align: center; */
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                /* color: #636b6f; */
                /* padding: 0 25px; */
                /* font-size: 15px; */
                /* font-weight: 600; */
                /* letter-spacing: .1rem; */
                /* text-decoration: none; */
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .img-logo {
                width: 100px;
            }

            .btn-test {
                text-align: center;
                margin-top: 10px;
            }

            .btn-test>a>p {
                margin-top: 8px;
            }

            .btn-test>a {
                position: absolute;
                top: 55%;
                left: 40%;
                height: 60px;
                width: 200px;
                font-size: 20px;
                font-weight: 600;
                vertical-align: middle;

            }

            @keyframes shadow-pulse
            {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.7);
            }
            100% {
                box-shadow: 0 0 0 35px rgba(0, 0, 0, 0);
            }
            }

            @keyframes shadow-pulse-big
            {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.5);
            }
            100% {
                box-shadow: 0 0 0 70px rgba(0, 0, 0, 0);
            }
            }

            .btn-try
            {
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            animation: shadow-pulse 1s infinite;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-left">
                    <div class="logo">
                        <img class="img-logo" src="{{ asset('/images/logo/logo.png') }}" alt="logo">
                    </div>
                </div>
                <div class="top-right links">
                    
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Trang chủ</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Đăng ký</a>   
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="btn-test">
                    <a href="{{ url('/home') }}" class="btn btn-success btn-lg btn-try"><p>VÀO THI NGAY</p></a>
                </div>
            </div>
        </div>
    </body>
</html>
