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
        
        .login-form {
            background-color: white;
            width: 600px;
            height: 370px;
            border-radius: 15px;
            margin-top: 120px;
            margin-left: 30%;
            position: fixed;
        }
        
        .login-box {
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
    <div class="content-login">
        <div class="login-form">
            <div class="login-box">
                <div class="login-logo">
                    <h1>
                    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">
                      {!! config('adminlte.logo', '<b>V-learning</b>') !!}
                    </a>
                  </h1>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
                    <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                        {!! csrf_field() !!}

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
                        <div class="btn-submit">
                            <button type="submit" class="btn btn-custom btn-block btn-flat">{{ trans('adminlte::adminlte.sign_in') }}</button>
                        </div>
                    </form>
                    <div class="auth-links">
                        @if (config('adminlte.register_url', 'register'))
                        <div class="col col-md-6">
                            <a href="{{ url(config('adminlte.register_url', 'register')) }}" class="text-center">{{ trans('adminlte::adminlte.register_a_new_membership') }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
