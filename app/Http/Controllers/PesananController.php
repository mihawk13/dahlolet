<?php

namespace App\Http\Controllers;

use App\Cart;
use App\DetailTransaksi;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    //  List Menu
    public function getListMenu()
    {
        $idkat = 0;
        $cari = '';
        $kategori = DB::table('kategori')->get();
        $menus = DB::table('menu')
            ->leftjoin('cart', 'menu.id_menu', '=', 'cart.id_menu')
            ->select('menu.*', 'cart.qty')->where('status', 1)
            ->orderBy('id_menu')->get();
        return view('kasir.listmenu', compact('menus', 'kategori', 'idkat', 'cari'));
    }

    public function masukKeranjang(Request $request)
    {
        try {
            if ($request->qty == '0') {
                $this->tambahKeranjang($request);
            } else {
                $krnj = new Cart;
                $krnj->id_user = Auth::user()->id;
                $krnj->id_menu = $request->id;
                $krnj->qty = 1;
                $krnj->harga = $request->harga;
                $krnj->save();
            }


            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function kurangiKeranjang(Request $request)
    {
        try {
            $qty = $request->qty - 1;
            Cart::where('id_menu', $request->id)
                ->where('id_user', Auth::user()->id)
                ->update(['qty' => $qty]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function tambahKeranjang(Request $request)
    {
        try {
            $qty = $request->qty + 1;
            Cart::where('id_menu', $request->id)
                ->where('id_user', Auth::user()->id)
                ->update(['qty' => $qty]);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }

    public function cariKategori(Request $request)
    {
        $idkat = $request->idkat;
        $cari = '';
        $kategori = DB::table('kategori')->get();
        $menus = DB::table('menu')
            ->leftjoin('cart', 'menu.id_menu', '=', 'cart.id_menu')
            ->select('menu.*', 'cart.qty')->where('status', 1)
            ->where('id_kategori', $idkat)
            ->orderBy('id_menu')->get();
        return view('kasir.listmenu', compact('menus', 'kategori', 'idkat', 'cari'));
    }

    public function cariMenu(Request $request)
    {
        $idkat = 0;
        $cari = $request->cari;
        $kategori = DB::table('kategori')->get();
        $menus = DB::table('menu')
            ->leftjoin('cart', 'menu.id_menu', '=', 'cart.id_menu')
            ->select('menu.*', 'cart.qty')->where('status', 1)
            ->where('menu.nama', 'LIKE', '%' . $cari . '%')
            ->orderBy('id_menu')->get();
        return view('kasir.listmenu', compact('menus', 'kategori', 'idkat', 'cari'));
    }

    public function getListPesanan()
    {
        // $res = DB::select("SELECT MAX(id_menu) As maxKode FROM menu");
        // // $res = Menu::max('id_menu')->first();
        // foreach ($res as $res) {
        //     $kode = $res->maxKode;
        // }
        // $noUrut = (int) substr($kode, 3, 4);
        // $noUrut++;
        // $kode = 'MN-' . sprintf("%04s", $noUrut);

        $pesanan = DB::table('cart as a')
            ->join('menu as b', 'a.id_menu', '=', 'b.id_menu')
            ->select('a.*', 'b.nama', 'b.gambar')->where('id_user', Auth::user()->id)->where('qty', '>', 0)
            ->orderBy('id_menu')->get();
        return view('kasir.listpesanan', compact('pesanan'));
    }

    public function hapusPesanan($idmenu)
    {
        Cart::where('id_menu', $idmenu)
            ->where('id_user', Auth::user()->id)
            ->delete();

        return redirect()->back();
    }

    public function plusminusListPesanan(Request $request)
    {
        $qty = $request->qty;
        Cart::where('id_menu', $request->id)
            ->where('id_user', Auth::user()->id)
            ->update(['qty' => $qty]);
        $jml = Cart::where('id_user', Auth::user()->id)->where('qty', '>', 0)->get();
        $qty = 0;
        foreach ($jml as $item) {
            $qty += $item->qty;
        }
        return response()->json($qty);
    }

    public function getDataPesanan()
    {
        $trans = Transaksi::orderByDesc('created_at')->get();
        return view('kasir.pesanan.data_pesanan', compact('trans'));
    }

    public function postCheckOut(Request $req)
    {
        $cart = Cart::where('id_user', Auth::user()->id)->where('qty', '>', 0)->get();
        $qty = 0;
        $total = 0;
        foreach ($cart as $crt) {
            $qty += $crt->qty;
            $total += $crt->harga * $crt->qty;
        }
        $trans = Transaksi::create([
            'tanggal' => Carbon::today(),
            'nama_pelanggan' => $req->nama_pelanggan,
            'qty' => $qty,
            'grand_total' => $total,
            'status' => 'Dipesan',
        ]);
        foreach ($cart as $crt) {
            DetailTransaksi::create([
                'id_transaksi' => $trans->id,
                'id_menu' => $crt->id_menu,
                'qty' => $crt->qty,
                'harga' => $crt->harga,
                'total_harga' => $crt->qty * $crt->harga,
            ]);
        }
        Cart::where('id_user', Auth::user()->id)->delete();
        return redirect()->back()->with('berhasil', 'Pesanan berhasil dimasukkan!');
    }

    public function getInvoice($id)
    {
        $trx = Transaksi::find($id);
        return view('kasir.invoice', compact('trx'));
    }
}
