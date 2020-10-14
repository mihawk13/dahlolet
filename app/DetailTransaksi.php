<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'id_transaksi', 'id_menu', 'qty', 'harga', 'total_harga'
    ];

    public $timestamps = false;

    public function menu()
    {
        return $this->hasOne('App\Menu', 'id_menu', 'id_menu');
    }
}
