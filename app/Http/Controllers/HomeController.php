<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //cek sudah login / belum
        if (auth()->user()->jabatan == 'Kasir') {
            return redirect()->route('kasir.dashboard');
        } elseif (auth()->user()->jabatan == 'Manager') {
            return redirect()->route('manager.dashboard');
        } else {
            return redirect()->route('dapur.dashboard');
        }
        return view('auth.login');
    }
}
