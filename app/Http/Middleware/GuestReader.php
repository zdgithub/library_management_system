<?php

namespace App\Http\Middleware;

use Closure;

class GuestReader
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
        if (auth()->guard('reader')->check()) {
           return redirect('/reader/dash');
        }
        return $next($request);
    }
}
