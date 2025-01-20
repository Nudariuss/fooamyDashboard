<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddLokasiLoket extends Controller
{
    public function index()
    {
        return view('content.lokasi.add-lokasi-loket');
    }

    public function store(Request $request)
    {
        // Simpan data ke database (dummy response untuk saat ini)
        $data = $request->all();
        return redirect()->route('list-lokasi-loket')->with('success', 'Loket berhasil ditambahkan!');
    }
}
