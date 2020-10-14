<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class DapurController extends Controller
{
    public function dashboard()
    {
        // $trans = Transaksi::where('status', '<>', 'Selesai')->orderBy('status', 'DESC')->orderByDesc('created_at')->get();
        return view('dapur.dashboard');
    }

    public function getDataPesanan()
    {
        $trans = Transaksi::orderByDesc('created_at')->get();
        return view('dapur.data_pesanan', compact('trans'));
    }

    public function siapkanPesanan($id)
    {
        Transaksi::where('id', $id)->update([
            'status' => 'Disiapkan'
        ]);
        return redirect()->back()->with('berhasil', 'Pesanan sedang disiapkan!');
    }

    public function selesaiPesanan($id)
    {
        Transaksi::where('id', $id)->update([
            'status' => 'Selesai'
        ]);
        return redirect()->back()->with('berhasil', 'Pesanan sudah jadi!');
    }

    public function getPesananCard()
    {
        $trans = Transaksi::where('status', '<>', 'Selesai')->orderByDesc('status')->orderBy('created_at', 'ASC')->get();
        return view('dapur.pesanan_card', compact('trans'));
    }

    public function getInvoice($id)
    {
        $trx = Transaksi::find($id);
        return view('dapur.invoice', compact('trx'));
    }
}
