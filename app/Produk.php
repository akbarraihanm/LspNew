<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $fillable = [
      'nama',
      'harga'
    ];

    public function keranjang(){
      $this->hasMany('App\Keranjang');
    }
}
