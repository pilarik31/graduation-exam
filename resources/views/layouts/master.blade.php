<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('/css/app.css')}}">

        <title>@yield('title')</title>

    </head>
    <body class="antialiased">
        <div class="container-fluid" id="app">
            <div class="row">
                <div class="col-lg-2 col-md-2 sidebar">

                    <div class="row text-center m-3">
                        <div class="col-lg-12 ">
                            <img src="{{ Gravatar::src(auth()->user()->email) }}" class="rounded-circle" alt="Profile picture">
                        </div>
                    </div>

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
                            <a class="nav-link {{ activeMenu('users') }}" href="{{ route('users.index') }}">
                                <i class="bi bi-people-fill"></i>
                                @lang('users.plural')
                            </a>
                        @endcan

                        @include('lang.lang')

                        <a class="nav-link {{ activeMenu('users/' . auth()->user()->id) }}" href="{{ route('users.show', auth()->user()->id) }}">
                            <i class="bi bi-person-circle"></i>
                            @lang('users.profile')
                        </a>

                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="bi bi-plug"></i>
                            @lang('auth.logout')
                        </a>
                    </nav>

                </div>

                <div class="col-lg-10 col-md-10 content">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ mix('/js/manifest.js')}}"></script>
        <script src="{{ mix('/js/vendor.js')}}"></script>
        <script src="{{ mix('/js/app.js')}}"></script>
    </body>
</html>
