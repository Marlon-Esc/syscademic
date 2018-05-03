<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckLevel
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
        if (auth()->user()->users->visitas == 1) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
