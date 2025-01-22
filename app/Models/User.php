<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  protected $table = 'user'; // Nama tabel di database
  protected $primaryKey = 'user_id'; // Primary key tabel
  public $timestamps = true; // Aktifkan timestamps

  protected $fillable = [
    'name',
    'password',
    'role',
  ];

  protected $hidden = [
    'password', // Sembunyikan password dari JSON
  ];

  protected $casts = [
    'role' => 'string',
  ];

  public function userMobile()
  {
      return $this->hasOne(UserMobile::class, 'user_id', 'user_id');
  }

  public function userWeb()
  {
      return $this->hasOne(UserWeb::class, 'user_id', 'user_id');
  }

  public function userProfile()
  {
    return $this->hasOne(UserProfile::class, 'user_id', 'user_id');
  }

  public function loginHistory()
  {
      return $this->hasMany(LoginHistory::class, 'user_id', 'user_id');
  }

  public function otp()
  {
      return $this->hasMany(Otp::class, 'user_id', 'user_id');
  }
}
