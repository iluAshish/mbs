
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{asset('app/images/favicon.svg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{@$siteInformation->brand_name}} | Login</title>
    <link rel="stylesheet" href="{{asset('app/dist/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/dist/css/sweetalert-overrides.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app/dist/css/login.css?v=1.0')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>
<body>
<div class="main fda">
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class=" alignText">
        <img class="animation__shake logo" src="{{url('/')}}/{{@$siteInformation->logo}}"
             alt="{{@$siteInformation->brand_name}}" >
    </div>
    <div class="signup login-show">
        <form method="post" id="loginForm">
            @csrf
            <label for="chk" aria-hidden="true">Login</label>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
{{--                    <button type="button" class="close" data-dismiss="alert">×</button>--}}
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
{{--                    <button type="button" class="close" data-dismiss="alert">×</button>--}}
                    {{ session('error') }}
                </div>
            @endif
            <span class="invalid-feedback auth_error" role="alert"></span>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span class="invalid-feedback" role="alert"><strong>{{ $error }}</strong></span>
                @endforeach
            @endif
            <input type="text" name="username" maxlength="254" class=" @error('username') is-invalid @enderror required"
                   id="username" required placeholder="Username">
            <input type="password" name="password" maxlength="50" id="password" placeholder="Password" required
                   class="required @error('password') is-invalid @enderror">
            <button class="login-btn primary_btn" data-url="/admin">Login</button>
        </form>
    </div>

    <div class="login register-show">
        <form method="post">
            @csrf
            <label for="chk" aria-hidden="true">Forgot Password</label>
            <input type="text" placeholder="Email" maxlength="254" name="forgot_username" id="forgot_username">
            <input class="login-btn" type="button" value="Submit" id="forgot_password_btn">
        </form>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('app/dist/js/sweetalert.min.js')}}"></script>
<script src="{{asset('app/dist/js/sweetalert-init.js')}}"></script>
<script src="{{url('app/dist/js/custom.js?v=1.0')}}"></script>
</body>
</html>
