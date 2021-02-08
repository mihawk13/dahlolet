<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getGrafikPendapatan()
    {
        $grafik = DB::table('transaksi')->select(DB::raw('sum(grand_total) as total, tanggal'))->whereMonth('tanggal', date('m'))->where('status', 'Selesai')->groupBy('tanggal')->get();
        return response()->json($grafik, 200);
    }
    public function getGrafikPenjualan()
    {
        $grafik = DB::table('transaksi')->select(DB::raw('count(id) as jml, tanggal'))->whereMonth('tanggal', date('m'))->where('status', 'Selesai')->groupBy('tanggal')->get();
        return response()->json($grafik, 200);
    }
}
