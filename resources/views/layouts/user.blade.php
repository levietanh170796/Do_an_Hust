<!DOCTYPE html>
<html lang="en">

<head>
    <title>V-learning - Thi trực tuyến</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/common.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/user.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="top-header">
            <div class="top-left">
                <div class="col col-md-2">
                   <a href="/"><img class="img-logo" src="{{ asset('/images/logo/logo.png') }}" alt="logo"></a>
                </div>
                <div class="col col-md-2 align content-header">
                    <div class="icon">
                        <h4><i class="fa fa-phone"></i>   Tổng đài</h4>
                    </div>
                    <div class="text-header color-content">
                        <h4><a  class="color-content" href="tel:0982624421">0982624421</a></h4>
                    </div>
                </div>
                <div class="col col-md-3 align content-header">
                    <div class="icon">
                        <h4><i class="fa fa-envelope"></i>   Email</h4>
                    </div>
                    <div class="text-header color-content">
                        <h4>
                            <a class="color-content" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=va.learning.59@gmail.com" target="_blank">va.learning.59@gmail.com</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">V-LEARNING</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="{{ strpos(request()->path(), 'home') === false ? '' : 'active' }}"><a href="/home">VÀO THI</a></li>
                    <li class="{{ strpos(request()->path(), 'my_results') === false ? '' : 'active' }} {{ strpos(request()->path(), 'contest_results') === false ? '' : 'active' }}"><a href="/my_results">KẾT QUẢ</a></li>
                    <li class="{{ strpos(request()->path(), 'leader_boards') === false ? '' : 'active' }}"><a href="/leader_boards">XẾP HẠNG</a></li>
                    <li>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=va.learning.59@gmail.com" target="_blank">GÓP Ý</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-user">
                                </span> {{ auth()->user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/user_profiles"><i class="fa fa-user"></i>  Thông tin cá nhân</a></li>
                            <li><a href="/changePassword"><i class="fa fa-key"></i>  Đổi mật khẩu</a></li>
                            {{-- <li><a href="#">Đổi mật khẩu</a></li> --}}
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                 >
                                     <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                 </a>
                                 <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                     @if(config('adminlte.logout_method'))
                                         {{ method_field(config('adminlte.logout_method')) }}
                                     @endif
                                     {{ csrf_field() }}
                                 </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="content-site">
            @yield('content')
        </div>
    </div>
    
    <div class="footer-user">
        <div class="container">
            <div class="info-header">
                <h3>
                    <a href="/">V-LEARNING.</a> WEBSITE THI TRỰC TUYẾN TỐT NHẤT CHO BẠN.
                </h3>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="application/javascript"></script>
    <script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js" type="application/javascript"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
</body>

</html>
