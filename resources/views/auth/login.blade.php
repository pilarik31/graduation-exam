<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
</head>
<body>
    <form action="{{ route('login') }}" method="POST" class="login-box">
            @csrf
            @if(Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
                @php
                    Session::forget('error');
                @endphp
            </div>
            @endif
            <h1>@lang('auth.login.login')</h1>
            <div class="textbox">
                <input type="email" name="email" id="email" placeholder="Email">
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email')  }}</div>
                @endif
            </div>
            <div class="textbox">
                <input type="password" name="password" id="password" placeholder="@lang('general.password.word')">
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password')  }}</div>
                @endif
            </div>
            <input type="submit" value="@lang('auth.login.btn')" class="login-btn">
    </form>

</body>
</html>
