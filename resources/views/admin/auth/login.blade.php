<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Queens Fashion Hub</title>
        <meta charset="utf-8">
        <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="320" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <!-- FontAwesome 4.3.0 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{asset('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    </head>
    <body class="hold-transition login-page">
        <div id="loginBox" class="login-box">
            <div class="login-logo">
                Laravel Template
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <form role="form" method="POST" action="{{ url('/admin_login') }}">
                    {{ csrf_field() }}

                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" maxlength="255" class="form-control" placeholder="Id" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" maxlength="16" placeholder="Password" name="password" required>
                        <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat btn-login submit">
                                Login
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
<!--                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-flat btn-login submit">
                            Login
                        </button>
                    </div>-->
<!--                    <div class="social-auth-links text-center">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                            Facebook</a>
                        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                            Google+</a>
                    </div>-->
                    <!-- /.social-auth-links -->
                    <a class="btn btn-link" href="{{ url('/admin_password/reset') }}">
                        Forgot Your Password?
                    </a>
                </form>            
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </body>
</html>
