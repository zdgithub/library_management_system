<?php

namespace App\Http\Middleware;

use Closure;
//忘记加这个了导致失败
use Illuminate\Support\Facades\Auth;
class ReaderAuthMiddleware
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
        if (auth()->guard('reader')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('reader/login');
            }
        }
        return $next($request);
    }
}
