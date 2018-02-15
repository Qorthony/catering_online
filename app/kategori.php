<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table='kategori';
    protected $fillable=['id','nama_kategori'];


    public function produk()
    {
      return $this->hasMany('App\produk');
    }
}
