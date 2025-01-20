<?php

namespace App\Http\Controllers\Layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListLayanan extends Controller
{
    public function index($id = null)
    {
        // Dummy data for the services
        $layanan = [
            ['id' => 1,'nama' => 'Layanan A', 'tipe' => 'Reguler', 'layanan' => 'Cuci Lipat', 'harga' => 'Rp. 30.000'],
            ['id' => 2,'nama' => 'Layanan B', 'tipe' => 'Express', 'layanan' => 'Cuci Gosok', 'harga' => 'Rp. 50.000'],
            ['id' => 3,'nama' => 'Layanan C', 'tipe' => 'Reguler', 'layanan' => 'Satuan', 'harga' => 'Rp. 25.000'],
            ['id' => 4,'nama' => 'Layanan D', 'tipe' => 'Express', 'layanan' => 'Cuci Lipat', 'harga' => 'Rp. 45.000'],
            ['id' => 5,'nama' => 'Layanan E', 'tipe' => 'Reguler', 'layanan' => 'Cuci Gosok', 'harga' => 'Rp. 35.000'],
        ];

        return view('content.layanan.list-layanan', compact('layanan'));
    }
}
