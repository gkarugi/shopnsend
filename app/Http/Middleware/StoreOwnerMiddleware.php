<?php

namespace App\Http\Middleware;

use Closure;

class StoreOwnerMiddleware
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
        if (auth()->check() && $request->user()->inRole('store_owner')) {
            return $next($request);
        }

        return redirect()->route('website.home');
    }
}
