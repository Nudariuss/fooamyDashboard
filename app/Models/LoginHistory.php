<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $table = 'login_history'; // Nama tabel di database
    protected $primaryKey = 'login_history_id'; // Primary key tabel
    public $timestamps = false; // Aktifkan timestamps

    protected $fillable = [
        'user_id',
        'device',
        'location',
        'platform',
        'activity_date',
    ];

    protected $casts = [
        'platform' => 'string',
        'activity_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
