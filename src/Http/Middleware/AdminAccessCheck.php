<?php

namespace Terawatt\Greenhouse\Http\Middleware;

use Closure;

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
        if (auth()->check() && auth()->user()->can('super-admin')) {
            return $next($request);
        }
        abort(404);
    }
}
