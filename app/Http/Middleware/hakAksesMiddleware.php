<?php

namespace App\Http\Middleware;

use Closure;

class hakAksesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $Rule)
    {
      if (auth()->check() && !auth()->User()->punyaRule($Rule)) {
        return redirect('/');
      }

        return $next($request);
    }
}
