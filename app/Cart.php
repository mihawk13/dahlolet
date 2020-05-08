<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    
    protected $fillable = [
        'id_user', 'id_menu', 'qty', 'harga'
    ];

    public $timestamps = false;
}
