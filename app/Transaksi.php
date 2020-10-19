<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'tanggal', 'no_meja', 'nama_pelanggan', 'qty', 'grand_total', 'status'
    ];

    public function detail()
    {
        return $this->hasMany('App\DetailTransaksi', 'id_transaksi', 'id');
    }
}
