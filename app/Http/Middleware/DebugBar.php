<?php

namespace App\Http\Middleware;

use Arr;
use Auth;
use Closure;

class DebugBar
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
        if ($request->hasSession() === true && $request->session()->get('enable_debugbar') === true) {
            \Debugbar::enable();
        }
        else {
            \Debugbar::disable();
        }

        return $next($request);
    }
}
