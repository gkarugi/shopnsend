<?php

namespace App\Http\Middleware;

use Closure;

class HasConfirmedPhone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && !$request->user()->hasVerifiedPhone()) {
            session()->put('phone_confirmed',false);
        } else {
            session()->put('phone_confirmed',true);
        }

        return $next($request);
    }
}
