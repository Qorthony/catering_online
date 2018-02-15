<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table='produk';
    protected $fillable=['id','id_kategori','nama_produk','harga','description','created_at','updated_at'];

    public function order()
    {
      return $this->beLongsTo(order::class);
    }

    public function kategori()
    {
      return $this->belongsTo('App\kategori');
    }
}
