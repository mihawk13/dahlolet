<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    
    protected $fillable = [
        'id_menu', 'id_kategori', 'nama', 'harga', 'gambar', 'status'
    ];

    public $timestamps = false;
}
