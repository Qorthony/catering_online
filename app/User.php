<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
      return $this->beLongsTo(role::class);
    }
    public function pelanggan()
    {
      return $this->hasOne(pelanggan::class);
    }

    public function punyaRule($namaRule)
    {

      if ($this->role->nama_role==$namaRule) {
        return true;
      }
      else {
        return false;
      }
    }
}
