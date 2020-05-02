<?php

namespace App\Http\Middleware;

use Closure;

class IsKasir
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
        if (auth()->user()->is_kasir == 1) {
            return $next($request);
        }
        return redirect('home')->with('error',"Kamu tidak punya akses disini!");
    }
}
