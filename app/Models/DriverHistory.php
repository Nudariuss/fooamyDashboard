<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverHistory extends Model
{
    protected $table = 'driver_history'; // Nama tabel di database
    protected $primaryKey = 'driver_history_id'; // Primary key tabel
    public $timestamps = false; // Aktifkan timestamps

    protected $fillable = [
        'staff_id',
        'driver_plate',
        'driver_status',
        'activity_date',
    ];

    protected $casts = [
        'driver_status' => 'string',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }
}
