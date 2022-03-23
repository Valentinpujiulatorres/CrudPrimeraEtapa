<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Closure;

class Language
{
    // funcion para el cambio de lenguaje
    public function handle(Request $request, Closure $next) {
        if (session()->has('applocale')) {
            App::setlocale(session()->get('applocale'));
        }
        return $next($request);
    }
}