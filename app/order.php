<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table='order';
    protected $fillable=['nama_produk','harga','jumlah','total_harga','tgl_order'];

    public function pelanggan()
    {
      return $this->beLongsTo(pelanggan::class);
    }
    public function produk()
    {
      return $this->hasMany(produk::class);
    }
    public function pembayaran()
    {
      return $this->hasOne(pembayaran::class);
    }
}
