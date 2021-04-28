<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle"
    href="#" role="button" data-toggle="dropdown" v-pre>
        <i class="bi bi-globe"></i>
        @lang('localization.language')
        <span class="caret"></span>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('lang.locale', ['locale' => 'en']) }}">English</a>
        <a class="dropdown-item" href="{{ route('lang.locale', ['locale' => 'cs']) }}">Czech</a>
    </div>
</li>
