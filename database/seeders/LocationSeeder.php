<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Hq;
use App\Models\Locket;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HQ::insert([
            [
                'name' => 'HQ Jakarta',
                'address' => 'Jl. Sudirman No.1, Jakarta',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.200000 106.816666)")'), // Jakarta
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HQ Bandung',
                'address' => 'Jl. Asia Afrika No.2, Bandung',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.917464 107.619123)")'), // Bandung
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HQ Surabaya',
                'address' => 'Jl. Tunjungan No.3, Surabaya',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-7.250445 112.768845)")'), // Surabaya
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Locket::insert([
            [
                'hq_id' => 1, // HQ Jakarta
                'name' => 'Locket Jakarta Selatan',
                'address' => 'Jl. Mampang No.4, Jakarta Selatan',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.256178 106.816332)")'), // Jakarta Selatan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 1, // HQ Jakarta
                'name' => 'Locket Jakarta Timur',
                'address' => 'Jl. Matraman No.5, Jakarta Timur',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.221599 106.894232)")'), // Jakarta Timur
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 1, // HQ Jakarta
                'name' => 'Locket Jakarta Barat',
                'address' => 'Jl. Tanjung Duren No.6, Jakarta Barat',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.176654 106.790496)")'), // Jakarta Barat
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 2, // HQ Bandung
                'name' => 'Locket Bandung Utara',
                'address' => 'Jl. Dago No.7, Bandung Utara',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.885634 107.615515)")'), // Bandung Utara
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 2, // HQ Bandung
                'name' => 'Locket Bandung Selatan',
                'address' => 'Jl. Buah Batu No.8, Bandung Selatan',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.948453 107.622599)")'), // Bandung Selatan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 2, // HQ Bandung
                'name' => 'Locket Bandung Barat',
                'address' => 'Jl. Pasteur No.9, Bandung Barat',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-6.891479 107.581676)")'), // Bandung Barat
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 3, // HQ Surabaya
                'name' => 'Locket Surabaya Pusat',
                'address' => 'Jl. Basuki Rahmat No.10, Surabaya Pusat',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-7.265757 112.738227)")'), // Surabaya Pusat
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 3, // HQ Surabaya
                'name' => 'Locket Surabaya Timur',
                'address' => 'Jl. Merr No.11, Surabaya Timur',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-7.289166 112.762197)")'), // Surabaya Timur
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hq_id' => 3, // HQ Surabaya
                'name' => 'Locket Surabaya Barat',
                'address' => 'Jl. Darmo No.12, Surabaya Barat',
                'coordinate' => DB::raw('ST_GeomFromText("POINT(-7.273285 112.721198)")'), // Surabaya Barat
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
