<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    protected $table='dataPelanggan';
    protected $fillable=['no_telp','alamat'];
    

    public function user()
    {
      return $this->beLongsTo(User::class);
    }

    public function order()
    {
      return $this->hasMany(order::class);
    }
}
