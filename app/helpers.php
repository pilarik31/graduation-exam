<?php

use Illuminate\Support\Facades\Request;

function activeMenu(string $route = ''): string
{
    $active = '';
    if (Request::is(Request::segment(1) . '/' . $route . '/*')
        || Request::is(Request::segment(1) . '/' . $route)
        || Request::is($route)
    ) {
        $active = 'active';
    }
    return $active;
}
