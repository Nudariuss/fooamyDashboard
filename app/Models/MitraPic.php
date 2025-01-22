<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraPic extends Model
{
    protected $table = 'mitra_pic'; // Nama tabel di database
    protected $primaryKey = 'mitra_pic_id'; // Primary key tabel
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'mitra_id',
        'user_web_id',
    ];

    public function mitraPicContact()
    {
        return $this->hasMany(MitraPicContact::class, 'mitra_pic_id', 'mitra_pic_id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitra_id', 'mitra_id');
    }

    public function userWeb()
    {
        return $this->belongsTo(UserWeb::class, 'user_web_id', 'user_web_id');
    }
}
