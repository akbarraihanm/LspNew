<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    //
    protected $fillable = [
      'jumlah_barang',
      'total_harga',
      'idPengguna',
      'idProduk'
    ];

    public function user(){
      $this->belongsTo('App\Pengguna');
    }

    public function produk(){
      $this->belongsTo('App\Produk');
    }
}
