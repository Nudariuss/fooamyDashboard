<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HQ extends Model
{ 
    protected $table = 'hq'; // Nama tabel di database
    protected $primaryKey = 'hq_id'; // Primary key tabel
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'name',
        'address',
        'coordinate',
    ];

    public function locket()
    {
        return $this->hasMany(Locket::class, 'hq_id', 'hq_id');
    }

    public function staffLogin()
    {
        return $this->morphMany(StaffLogin::class, 'location');
    }
}
