<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = ['username' => $input['username'], 'password' => $input['password']];

        if (Auth()->guard('web')->attempt($credentials, false, false)) {
            if (auth()->user()->jabatan == 'Kasir') {
                return redirect()->route('kasir.dashboard');
            } elseif (auth()->user()->jabatan == 'Manager') {
                return redirect()->route('manager.dashboard');
            } else {
                return redirect()->route('dapur.dashboard');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Username atau Password yang anda masukkan salah!');
        }
    }
}
