<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12">

            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
                @php
                    Session::forget('error');
                @endphp
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">

                <div class="form-group">
                    @csrf
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger text-danger">{{ $errors->first('email')  }}</div>
                    @endif

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger text-danger">{{ $errors->first('password')  }}</div>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" value="Log in" class="btn btn-success btn-submit">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js')}}"></script>


</body>
</html>
