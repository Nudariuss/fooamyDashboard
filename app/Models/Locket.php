<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locket extends Model
{
    protected $table = 'locket'; // Nama tabel di database
    protected $primaryKey = 'locket_id'; // Primary key tabel
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'hq_id',
        'name',
        'address',
        'coordinate',
    ];

    public function hq()
    {
        return $this->belongsTo(HQ::class, 'hq_id', 'hq_id');
    }

    public function staffLogins()
    {
        return $this->morphMany(StaffLogin::class, 'location');
    }
}
