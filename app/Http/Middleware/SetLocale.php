<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }

    protected $supported_languages = ['my', 'en'];

    public function handle($request, Closure $next)
    {
        if(!session()->has('locale')) {
            session(['locale' => $request->getPreferredLanguage($this->supported_languages)]);
        }

        app()->setLocale(session('locale'));

        return $next($request);
    }
}
