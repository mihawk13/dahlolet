<?php

use App\Cart;
use App\Menu;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function getJabatan()
{
    return [
        'Admin', 'Kasir', 'Dapur'
    ];
}

function getJmlPesanan()
{
    $jml = Cart::where('id_user', Auth::user()->id)->where('qty', '>', 0)->get();
    $qty = 0;
    foreach ($jml as $item) {
        $qty += $item->qty;
    }
    return $qty;
}

function getJmlMenu()
{
    $jml = Menu::where('status', 1)->count();
    return $jml;
}

function getTotalPendapatan()
{
    $total = DB::table('transaksi')->select(DB::raw('sum(grand_total) as total'))->where('status', 'Selesai')->first();
    return $total->total;
}

function getTotalPendapatanHariIni()
{
    $total = DB::table('transaksi')->select(DB::raw('sum(grand_total) as total'))->where('status', 'Selesai')->whereDate('created_at', Carbon::today())->first();
    return $total->total;
}

function getPenjualanHariIni()
{
    $total = DB::table('transaksi')->select(DB::raw('sum(qty) as total'))->where('status', 'Selesai')->whereDate('created_at', Carbon::today())->first();
    return $total->total;
}
