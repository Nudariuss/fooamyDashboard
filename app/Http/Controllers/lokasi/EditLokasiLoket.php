<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditLokasiLoket extends Controller
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

        return view('content.lokasi.edit-lokasi-loket', compact('loket'));
    }

    public function update(Request $request, $id_loket)
    {
        // Update data ke database (dummy response untuk saat ini)
        $data = $request->all();
        return redirect()->route('detail-lokasi-loket', ['id_loket' => $id_loket])->with('success', 'Data Loket berhasil diperbarui!');
    }
}
