<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;

class DetailLokasiLoket extends Controller
{
    public function index($id_loket)
    {
        // Dummy data
        $loket = [
            'id_loket' => $id_loket,
            'id_hq' => 1,
            'nama' => 'Loket Example',
            'alamat' => 'Jl. Example No. 123',
            'koordinat' => '-6.2000, 106.8166',
        ];

        return view('content.lokasi.detail-lokasi-loket', compact('loket'));
    }
}
