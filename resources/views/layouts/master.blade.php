<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">

        <title>@yield('title')</title>

    </head>
    <body class="antialiased">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <nav class="nav flex-column">
                        <a class="nav-link" href="/">Dashboard</a>
                        <a class="nav-link" href="/tasks">Tasks</a>
                        <a class="nav-link" href="/clients">Clients</a>
                    </nav>

                    <div class="row">
                        <div class="col-lg-6">
                            {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('logout') }}">
                                Log out
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
