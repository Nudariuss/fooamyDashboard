<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;

class DetailLokasiHQ extends Controller
{
    public function index($id_hq)
    {
        $lokasi = [
            'id_hq' => $id_hq,
            'nama' => 'Lokasi HQ ' . $id_hq,
            'alamat' => 'Alamat HQ ' . $id_hq,
            'koordinat' => '6.1840° S, 106.7681° E',
        ];

        $lokets = [
            ['id_hq' => $id_hq, 'id_loket' => 1, 'nama' => 'Loket 1', 'alamat' => 'Alamat Loket 1', 'koordinat' => '6.1810° S, 106.7710° E'],
            ['id_hq' => $id_hq, 'id_loket' => 2, 'nama' => 'Loket 2', 'alamat' => 'Alamat Loket 2', 'koordinat' => '6.1820° S, 106.7720° E'],
        ];

        return view('content.lokasi.detail-lokasi-hq', compact('lokasi', 'lokets'));
    }
}
