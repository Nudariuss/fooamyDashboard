<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

  public function getCoordinateAttribute($value)
  {
    if (!$value) {
      return null; // Pastikan nilai $value tidak null
    }

    // Decode GEOMETRY menggunakan parameter binding
    $result = DB::selectOne("SELECT ST_AsText(?) AS point", [$value]);

    return $result->point ?? null; // Kembalikan nilai POINT atau null
  }



  public function locket()
  {
    return $this->hasMany(Locket::class, 'hq_id', 'hq_id');
  }

  public function staffLogin()
  {
    return $this->morphMany(StaffLogin::class, 'location');
  }
}
