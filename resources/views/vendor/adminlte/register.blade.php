<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>V-learning</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    <style>
        html,
        body {
            /* background-color: #fff; */
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background-image: url("/images/back-grounds/back-ground-home.jpg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            font-weight: bold;
        }
        
        .register-form {
            background-color: white;
            width: 600px;
            height: 450px;
            border-radius: 15px;
            margin-top: 120px;
            margin-left: 30%;
            position: fixed;
        }
        
        .register-box {
            margin-left: 50px;
            text-align: center;
            width: 500px;
            margin-top: 50px;
        }
        
        .btn-submit {
            text-align: center;
        }
        
        .btn-custom {
            background-color: #48910e;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
        }
        
        .login-box-msg {
            font-size: 14px;
        }
        
        .auth-links {
            margin-top: 15px;
            float: left;
            width: 100%;
        }
        
        .auth-links a {
            float: left;
        }
    </style>
</head>

<body>
    <div class="register-form">
        <div class="register-box">
            <div class="register-logo">
                <h1>
                    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">
                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                    </a>
                </h1>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
                <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span> @if ($errors->has('name'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{ trans('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span> @if ($errors->has('email'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control" placeholder="{{ trans('adminlte::adminlte.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span> @if ($errors->has('password'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span> @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span> @endif
                    </div>
                    <button type="submit" class="btn btn-custom btn-block btn-flat">{{ trans('adminlte::adminlte.register') }}</button>
                </form>
                <div class="auth-links">
                    <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
    </div>
</body>

</html>
