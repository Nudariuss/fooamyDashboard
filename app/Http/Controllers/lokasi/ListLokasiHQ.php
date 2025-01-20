<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListLokasiHQ extends Controller
{
    public function index()
    {
        // Dummy data for the services
        $lokasihq = [
            ['id_hq' => 1, 'nama' => 'Fooamy 1', 'alamat' => 'Kebon Jeruk', 'koordinat' => '6.1840° S, 106.7681° E'],
            ['id_hq' => 2, 'nama' => 'Fooamy 2', 'alamat' => 'Tangerang', 'koordinat' => '6.1840° S, 106.7681° E'],
            ['id_hq' => 3, 'nama' => 'Fooamy 3', 'alamat' => 'Kuningan', 'koordinat' => '6.1840° S, 106.7681° E'],
        ];

        $selectedOption = 'HQ';

        return view('content.lokasi.list-lokasi-hq', compact('lokasihq','selectedOption'));
    }
}
