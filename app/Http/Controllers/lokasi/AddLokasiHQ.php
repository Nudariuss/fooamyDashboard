<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddLokasiHQ extends Controller
{
    public function index()
    {
        return view('content.lokasi.add-lokasi-hq');
    }

    public function store(Request $request)
    {
        // Simpan data ke database (contoh dengan dummy data sementara)
        $data = $request->only(['id_hq', 'nama', 'alamat', 'koordinat']);

        // Tambahkan logika penyimpanan ke database jika diperlukan
        // Contoh: LokasiHQ::create($data);

        // Redirect kembali ke list lokasi HQ dengan pesan sukses
        return redirect()->route('list-lokasi-hq')->with('success', 'Lokasi HQ berhasil ditambahkan!');
    }
}
