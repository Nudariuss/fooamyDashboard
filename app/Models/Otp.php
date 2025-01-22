<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $table = 'otp'; // Nama tabel di database
    protected $primaryKey = 'otp_id'; // Primary key tabel
    public $timestamps = false; // Aktifkan timestamps

    protected $fillable = [
        'user_id',
        'otp_code',
        'type',
        'created_at',
        'expired_at',
        'is_used',
    ];

    protected $casts = [
        'type' => 'string',
        'is_used' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
