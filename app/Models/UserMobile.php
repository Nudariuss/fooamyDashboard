<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMobile extends Model
{
    protected $table = 'user_mobile'; // Nama tabel di database
    protected $primaryKey = 'user_mobile_id'; // Primary key tabel
    public $timestamps = false; // Aktifkan timestamps

    protected $fillable = [
        'user_id',
        'phone_number',
        'gender',
        'is_active',
    ];

    protected $casts = [
        'gender' => 'string',
        'is_active' => 'boolean',
    ];

    public function userGoogleAuth()
    {
        return $this->hasOne(UserGoogleAuth::class, 'user_mobile_id', 'user_mobile_id');
    }

    public function staff()
    {
        return $this->hasOne(Staff::class, 'user_mobile_id', 'user_mobile_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
