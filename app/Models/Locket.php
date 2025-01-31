<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

  // Mutator untuk membaca GEOMETRY
  public function getCoordinateAttribute($value)
  {
    if (!$value) {
      return null; // Pastikan nilai $value tidak null
    }

    // Decode GEOMETRY menggunakan parameter binding
    $result = DB::selectOne("SELECT ST_AsText(?) AS point", [$value]);

    return $result->point ?? null; // Kembalikan nilai POINT atau null
  }


  public function hq()
  {
    return $this->belongsTo(HQ::class, 'hq_id', 'hq_id');
  }

  public function staffLogins()
  {
    return $this->morphMany(StaffLogin::class, 'location');
  }
}
