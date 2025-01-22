<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff'; // Nama tabel di database
    protected $primaryKey = 'staff_id'; // Primary key tabel
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'user_mobile_id',
        'driver_plate',
        'driver_status',
        'operational_status',
    ];

    protected $casts = [
        'driver_status' => 'string',
        'operational_status' => 'boolean',
      ];

    public function staffLogin()
    {
        return $this->hasMany(StaffLogin::class, 'staff_id', 'staff_id');
    }

    public function driverHistory()
    {
        return $this->hasMany(DriverHistory::class, 'staff_id', 'staff_id');
    }

    public function userMobile()
    {
        return $this->belongsTo(UserMobile::class, 'user_mobile_id', 'user_mobile_id');
    }
}
