<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Login</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="{{url('app/dist/css/login.css?v=1.0')}}">
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>
<body class="hold-transition login-page">
<div class="login-reg-panel">
    <div class="login-info-box pb-100-btm-gap">
        <div class="col-lg-12 mb-4">
            <img class="animation__shake" src="{{asset('app/dist/img/logo.svg')}}" alt="{{ config('app.name') }}">
        </div>
        <h2>Have an account?</h2>
        <p>COPYRIGHT © 2021 {{ config('app.name') }}</p>
        <label id="label-register" for="log-reg-show">Login</label>
        <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
    </div>
    <div class="register-info-box">
        <div class="col-lg-12 mb-4">
            <img class="animation__shake" src="{{asset('app/dist/img/logo.svg')}}" alt="{{ config('app.name') }}">
        </div>
        <h2>Forgot your password?</h2>
        <p>COPYRIGHT © 2021 {{ config('app.name') }}</p>
        <label id="label-login" for="log-login-show">Forgot Password</label>
        <input type="radio" name="active-log-panel" id="log-login-show">
    </div>

    <div class="white-panel">
        <form method="POST" action="">
            @csrf
            <div class="login-show">
                <h2>LOGIN</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="text" name="username" class="@error('username') is-invalid @enderror" id="username"
                       placeholder="Username" autocomplete="off">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="submit" value="Login" class="login-btn" autocomplete="off" value="">
            </div>
        </form>
        <div class="register-show">
            <h2>FORGOT PASSWORD</h2>
            <input type="text" placeholder="Email" name="forgot_username" id="forgot_username">
            <div class="error_message"></div>
            <input type="button" value="Submit" id="forgot_password_btn">
        </div>
    </div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{url('app/dist/js/custom.js?v=1.0')}}"></script>
</body>
</html>
