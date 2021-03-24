<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function penjualan()
    {
        $tglAwal = null;
        $tglAkhir = null;
        $trans = Transaksi::orderByDesc('created_at')->get();
        return view('laporan.penjualan', compact('trans', 'tglAwal', 'tglAkhir'));
    }

    public function penjualan_filter(Request $req)
    {
        $tglAwal = $req->tglAwal;
        $tglAkhir = $req->tglAkhir;
        $trans = Transaksi::whereBetween('tanggal', [$tglAwal, $tglAkhir])->orderByDesc('created_at')->get();
        return view('laporan.penjualan', compact('trans', 'tglAwal', 'tglAkhir'));
    }

    public function penjualan_harian()
    {
        $tglAwal = null;
        $tglAkhir = null;
        $trans = null;
        return view('laporan.penjualan_harian', compact('trans', 'tglAwal', 'tglAkhir'));
    }

    public function penjualan_harian_filter(Request $req)
    {
        $tglAwal = $req->tglAwal;
        $tglAkhir = $req->tglAkhir;
        $trans = DB::table('transaksi')
        ->join('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.id_transaksi')
        ->select(DB::raw('transaksi.tanggal, SUM(detail_transaksi.qty) AS qty, SUM(detail_transaksi.total_harga) AS total'))
        ->whereBetween('transaksi.tanggal', [$tglAwal, $tglAkhir])
        ->groupBy('transaksi.tanggal')
        ->get();
        return view('laporan.penjualan_harian', compact('trans', 'tglAwal', 'tglAkhir'));
    }

    public function penjualan_kategori()
    {
        $tglAwal = null;
        $tglAkhir = null;
        $kat = null;
        $trans = null;
        $kategori = DB::table('kategori')->get();;
        return view('laporan.penjualan_kategori', compact('trans', 'tglAwal', 'tglAkhir', 'kat', 'kategori'));
    }

    public function penjualan_kategori_filter(Request $req)
    {
        $tglAwal = $req->tglAwal;
        $tglAkhir = $req->tglAkhir;
        $kat = $req->kategori;
        $trans = DB::table('transaksi')
        ->join('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.id_transaksi')
        ->join('menu', 'detail_transaksi.id_menu', '=', 'menu.id_menu')
        ->join('kategori', 'menu.id_kategori', '=', 'kategori.id_kategori')
        ->select(DB::raw('transaksi.tanggal, SUM(detail_transaksi.qty) AS qty, SUM(detail_transaksi.total_harga) AS total'))
        ->where('menu.id_kategori', $kat)
        ->whereBetween('transaksi.tanggal', [$tglAwal, $tglAkhir])
        ->groupBy('transaksi.tanggal', 'menu.id_kategori')
        ->get();
        $kategori = DB::table('kategori')->get();;
        return view('laporan.penjualan_kategori', compact('trans', 'tglAwal', 'tglAkhir', 'kat', 'kategori'));
    }
}
