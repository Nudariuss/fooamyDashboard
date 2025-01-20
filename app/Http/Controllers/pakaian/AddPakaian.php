<?php

namespace App\Http\Controllers\Pakaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddPakaian extends Controller
{
    public function create()
    {
        return view('content.pakaian.add-pakaian');
    }

    public function store(Request $request)
    {
        // // Validasi data
        // $request->validate([
        //     'kategori' => 'required|string|max:255',
        //     'kategori_sub' => 'nullable|string|max:255',
        //     'nama' => 'required|string|max:255',
        //     'harga' => 'required|numeric|min:0',
        //     'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // Simpan logika penyimpanan pakaian di sini
        // Contoh response
        return redirect()->route('list-pakaian')->with('success', 'Pakaian berhasil ditambahkan.');
    }
}
