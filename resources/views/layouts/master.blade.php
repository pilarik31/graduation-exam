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
                <div class="col-lg-2 col-md-2 sidebar vh-100">
                    <nav class="nav flex-column">
                        <a class="nav-link {{ activeMenu('/') }}" href="/">
                            <i class="bi bi-file-bar-graph-fill"></i>
                            @lang('general.dashboard')
                        </a>
                        <a class="nav-link {{ activeMenu('tasks') }}" href="{{ route('tasks.index') }}">
                            <i class="bi bi-ui-checks"></i>
                            @lang('tasks.plural')
                        </a>
                        <a class="nav-link {{ activeMenu('tasklists') }}" href="{{ route('tasklists.index') }}">
                            <i class="bi bi-list-task"></i>
                            @lang('tasklists.plural')
                        </a>
                        @can('view-any', auth()->user())
                            <a class="nav-link {{ activeMenu('clients') }}" href="{{ route('clients.index') }}">
                                <i class="bi bi-people-fill"></i>
                                @lang('clients.plural')
                            </a>
                        @endcan

                    </nav>

                    <div class="row">
                        <div class="col-lg-12 ">
                            <img src="{{ Gravatar::src(auth()->user()->email) }}" class="rounded-circle" alt="Profile picture">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('clients.show', auth()->user()->id) }}">
                                {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 role">
                            {{ __("roles." . auth()->user()->role->name) }}
                        </div>

                        <div class="col-lg-6">
                            <a href="{{ route('logout') }}">
                                @lang('auth.logout')
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ mix('/js/manifest.js')}}"></script>
        <script src="{{ mix('/js/vendor.js')}}"></script>
        <script src="{{ mix('/js/app.js')}}"></script>
    </body>
</html>
