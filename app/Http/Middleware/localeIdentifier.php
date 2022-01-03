<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class localeIdentifier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale =  $request->header('locale');
        app()->setLocale($locale ?? 'en');
        return $next($request);
    }
}
