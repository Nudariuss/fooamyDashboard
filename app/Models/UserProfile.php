<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile'; // Nama tabel di database
    protected $primaryKey = 'user_profile_id'; // Primary key tabel
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'user_id',
        'profile_picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
