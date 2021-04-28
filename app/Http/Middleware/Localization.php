<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
