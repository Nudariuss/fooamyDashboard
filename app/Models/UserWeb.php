<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWeb extends Model
{
    protected $table = 'user_web'; // Nama tabel di database
    protected $primaryKey = 'user_web_id'; // Primary key tabel
    public $timestamps = false; // Aktifkan timestamps

    protected $fillable = [
        'user_id',
        'email',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function mitraPic()
    {
        return $this->hasOne(MitraPic::class, 'user_web_id', 'user_web_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
