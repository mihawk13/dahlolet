<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use League\Flysystem\File;
use Illuminate\Support\Facades\File;
// use Illuminate\Http\UploadedFile;
use Image;
use App\Cart;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KasirController extends Controller
{
    public function Dashboard()
    {
        return view('kasir.dashboard');
    }
    // Kategori
    public function getKategori()
    {
        $kategoris = DB::table('kategori')->get();
        return view('kasir.kategori', compact('kategoris'));
    }

    public function postKategori(Request $request)
    {
        try {
            DB::table('kategori')->insert([
                'nama' => $request->nama,
            ]);
            return redirect()->back()->with('berhasil', 'Data kategori berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function ubahKategori(Request $request)
    {
        try {
            DB::table('kategori')->where('id_kategori', $request->id)->update([
                'nama' => $request->nama
            ]);
            return redirect()->back()->with('berhasil', 'Data kategori berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    // Add Menu
    public function getMenu()
    {
        $res = DB::select("SELECT MAX(id_menu) As maxKode FROM menu");
        // $res = Menu::max('id_menu')->first();
        foreach ($res as $res) {
            $kode = $res->maxKode;
        }
        $noUrut = (int) substr($kode, 3, 4);
        $noUrut++;
        $kode = 'MN-' . sprintf("%04s", $noUrut);

        $kategori = DB::table('kategori')->get();
        $menus = Menu::join('kategori', 'menu.id_kategori', '=', 'kategori.id_kategori')
            ->select('menu.*', 'kategori.nama as kategori')->get();
        return view('kasir.menu', compact('menus', 'kategori', 'kode'));
    }

    public function postMenu(Request $request)
    {
        try {
            $this->validate($request, [
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imagename = $request->id . '.' . $request->file('gambar')->extension();
            // utk hosting, public dihapus
            Storage::putFileAs('public/menu', $request->file('gambar'), $imagename);

            Menu::insert([
                'id_menu' => $request->id,
                'id_kategori' => $request->kategori,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'gambar' => $imagename,
                'status' => 1,
            ]);
            return redirect()->back()->with('berhasil', 'Data menu berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function ubahMenu(Request $request)
    {
        try {
            if ($request->hasFile('gambar')) {
                $this->validate($request, [
                    'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                // hapus gambar menu sebelumnya
                $menu = Menu::where('id_menu', $request->id)->first();
                // Storage::delete('menu' . $menu->gambar);
                unlink(public_path('storage/menu/' . $menu->gambar));
                // File::unlink(public_path($menu->gambar));
                // hosting
                // unlink('/home/bbdb4393/public_html/dahlolet/storage/menu/' . $menu->gambar);

                $imagename = $request->id . '.' . $request->file('gambar')->extension();
                // utk hosting, public dihapus
                Storage::putFileAs('public/menu', $request->file('gambar'), $imagename);

                Menu::where('id_menu', $request->id)->update([
                    'id_kategori' => $request->kategori,
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'gambar' => $imagename,
                ]);
            } else {
                Menu::where('id_menu', $request->id)->update([
                    'id_kategori' => $request->kategori,
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                ]);
            }

            return redirect()->back()->with('berhasil', 'Data menu berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function setStatus(Request $request)
    {
        try {
            if ($request->status == 'Aktif') {
                Menu::where('id_menu', $request->id)->update([
                    'status' => 1
                ]);
            } else {
                Menu::where('id_menu', $request->id)->update([
                    'status' => 0
                ]);
            }

            return redirect()->back()->with('berhasil', 'Status berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
