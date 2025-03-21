<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::user()->type == 1 ||
            Auth::user()->type == 2 ||
            Auth::user()->type == 3 ||
            Auth::user()->type == 4
            || Auth::user()->type == 5
        ) {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}
