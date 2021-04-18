<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('/css/app.css')}}">

        <title>@yield('title')</title>

    </head>
    <body class="antialiased">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <nav class="nav flex-column">
                        <a class="nav-link" href="/">@lang('general.dashboard')</a>
                        <a class="nav-link" href="/tasks">@lang('general.tasks.tasks')</a>
                        @can('view-any', auth()->user())
                            <a class="nav-link" href="/clients">@lang('general.clients.plural')</a>
                        @endcan

                    </nav>

                    <div class="row">
                        <div class="col-lg-6">
                            {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                            {{ __("roles." . auth()->user()->role->name) }}
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('logout') }}">
                                @lang('auth.logout')
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{ Gravatar::src(auth()->user()->email) }}" class="rounded-circle">
                        </div>
                    </div>
                </div>


                <div class="col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ mix('/js/manifest.js')}}"></script>
        <script src="{{ mix('/js/vendor.js')}}"></script>
        <script src="{{ mix('/js/app.js')}}"></script>
    </body>
</html>
