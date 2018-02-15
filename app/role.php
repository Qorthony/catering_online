<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{


    protected $table='roles';

    public function user()
    {
      return $this->hasMany(user::class);
    }
    
}
