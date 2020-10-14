<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        } elseif (auth()->user()->jabatan == 'Admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('dapur.dashboard');
        }
        return view('auth.login');
    }

    public function getProfile()
    {
        return view('profile');
    }

    public function postProfile(Request $request)
    {
        try {
            if ($request->password == '') {
                User::where('id', Auth::user()->id)->update([
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'jabatan' => $request->jabatan,
                    'username' => $request->username,
                ]);
            } else {
                User::where('id', Auth::user()->id)->update([
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'jabatan' => $request->jabatan,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                ]);
            }


            return redirect()->back()->with('berhasil', 'Data profile berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
