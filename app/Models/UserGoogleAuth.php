<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGoogleAuth extends Model
{
    protected $table = 'user_google_auth'; // Nama tabel di database
    protected $primaryKey = 'user_google_auth_id'; // Primary key tabel
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'user_id',
        'google_id',
    ];

    /**
     * Relasi ke tabel 'user'.
     */
    public function userMobile()
    {
        return $this->belongsTo(UserMobile::class, 'user_mobile_id', 'user_mobile_id');
    }
}
