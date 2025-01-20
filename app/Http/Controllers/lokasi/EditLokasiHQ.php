<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditLokasiHQ extends Controller
{
    public function index($id_hq)
    {
        $lokasi = [
            'id_hq' => $id_hq,
            'nama' => 'Lokasi HQ ' . $id_hq,
            'alamat' => 'Alamat HQ ' . $id_hq,
            'koordinat' => '6.1840° S, 106.7681° E',
        ];

        return view('content.lokasi.edit-lokasi-hq', compact('lokasi'));
    }

    public function update(Request $request, $id_hq)
    {
        // Logic for updating the data (e.g., saving to database)
        return redirect()->route('detail-lokasi-hq', ['id_hq' => $id_hq])->with('success', 'Lokasi HQ updated successfully.');
    }
}
