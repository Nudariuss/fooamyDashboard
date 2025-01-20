<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory;

  protected $table = 'user'; // Nama tabel di database
  protected $primaryKey = 'user_id'; // Primary key tabel
  public $timestamps = true; // Aktifkan timestamps
  public $incrementing = true; // Primary key menggunakan auto-increment

  protected $fillable = [
    'name',
    'password',
    'phone_number',
    'role',
    'is_active',
  ];

  protected $hidden = [
    'password', // Sembunyikan password dari JSON
  ];

  protected $casts = [
    'is_active' => 'boolean', // Cast TINYINT ke boolean
    'role' => 'string',      // Cast ENUM ke string
  ];
}
