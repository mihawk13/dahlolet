<?php

namespace App\Http\Middleware;

use Closure;
// use Auth;

class Dapur
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
        // if (auth()->user()->jabatan == 'Kasir') {
        //     return $next($request);
        // }

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->jabatan == 'Dapur') {
            return $next($request);
        }

        if (auth()->user()->jabatan == 'Kasir') {
            return redirect()->route('kasir.dashboard');
        }

        if (auth()->user()->jabatan == 'Admin') {
            return redirect()->route('admin.dashboard');
        }
        // return redirect('home')->with('error',"Kamu tidak punya akses disini!");
    }
}
