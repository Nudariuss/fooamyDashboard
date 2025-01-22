<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitra'; // Nama tabel di database
    protected $primaryKey = 'mitra_id'; // Primary key tabel
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'company_name',
    ];

    public function mitraPic()
    {
        return $this->hasOne(MitraPic::class, 'mitra_id', 'mitra_id');
    }
}
