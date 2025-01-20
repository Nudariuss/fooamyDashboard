<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;

class ListLokasiLoket extends Controller
{
    public function index()
    {
        $loket = [
            ['id_loket' => 1, 'id_hq' => 1, 'nama' => 'Loket 1', 'alamat' => 'Cengkareng', 'koordinat' => '6.1200° S, 106.8000° E'],
            ['id_loket' => 2, 'id_hq' => 2, 'nama' => 'Loket 2', 'alamat' => 'BSD', 'koordinat' => '6.2400° S, 106.6500° E'],
        ];

        $selectedOption = 'Loket';
        return view('content.lokasi.list-lokasi-loket', compact('loket', 'selectedOption'));
    }
}
