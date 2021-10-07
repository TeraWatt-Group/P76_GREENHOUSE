<?php

namespace Terawatt\Greenhouse\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccessCheck
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
        // auth()->setDefaultDriver(app('GreenhouseGuard'));

        // if (!Auth::guest()) {
            // dd(auth()->check());
        // }

        // if (auth()->check() && auth()->user()->can('super-admin')) {
            return $next($request);
        // }
        // abort(404);
    }
}
