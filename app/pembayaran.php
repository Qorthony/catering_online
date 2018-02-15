<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table='pembayaran';
    protected $fillable=['nama_produk','harga','jumlah','total_harga','status','tgl_order'];

    public function order()
    {
      return $this->hasOne(order::class);
    }
}
