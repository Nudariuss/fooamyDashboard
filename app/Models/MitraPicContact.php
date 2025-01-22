<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraPicContact extends Model
{
    protected $table = 'mitra_pic_contact'; // Nama tabel di database
    protected $primaryKey = 'mitra_pic_contact_id'; // Primary key tabel
    public $timestamps = false; // Aktifkan timestamps

    protected $fillable = [
        'mitra_pic_id',
        'name',
        'phone_number',
        'email',
    ];

    public function mitraPic()
    {
        return $this->belongsTo(MitraPic::class, 'mitra_pic_id', 'mitra_pic_id');
    }
}
