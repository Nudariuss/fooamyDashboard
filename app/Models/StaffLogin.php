<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffLogin extends Model
{
    protected $table = 'staff_login'; // Nama tabel di database
    protected $primaryKey = 'staff_login_id'; // Primary key tabel
    public $timestamps = false; // Aktifkan timestamps

    protected $fillable = [
        'staff_id',
        'location_type',
        'location_id',
        'activity_date',
    ];

    protected $casts = [
        'location_type' => 'string',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }

    public function location()
    {
        return $this->morphTo();
    }
}
