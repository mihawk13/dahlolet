<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class ManagerController extends Controller
{
    public function Dashboard()
    {
        return view('manager.dashboard');
    }
    // Users
    public function getUsers()
    {
        $jabatan = array(
            '0' => 'Manager',
            '1' => 'Kasir',
            '2' => 'Dapur'
        );
        $users = DB::table('users')->get();
        return view('manager.user', compact('users', 'jabatan'));
    }

    public function postUsers(Request $request)
    {
        try {
            User::create([
                'nama' => $request->nama,
                'telp' => $request->telp,
                'jabatan' => $request->jabatan,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);
            return redirect()->back()->with('berhasil', 'Data user berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function ubahUsers(Request $request)
    {
        try {
            if ($request->password == '') {
                User::where('id', $request->id)->update([
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'jabatan' => $request->jabatan,
                    'username' => $request->username,
                ]);
            } else {
                User::where('id', $request->id)->update([
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'jabatan' => $request->jabatan,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                ]);
            }


            return redirect()->back()->with('berhasil', 'Data user berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
