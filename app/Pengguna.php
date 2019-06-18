<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    //
    protected $fillable = [
      'username',
      'password',
      'nama'
    ];

    public function keranjang(){
      $this->hasMany('App\Keranjang');
    }
}
