<?php

namespace App\Http\Controllers\Pakaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterPakaian extends Controller
{
    public function index()
    {
        return view('content.pakaian.filter-pakaian');
    }

    public function filter(Request $request)
    {
        // Logika filter bisa ditambahkan di sini
        // Contoh dummy filter result
        $filters = $request->all();

        // Redirect kembali ke halaman list pakaian dengan hasil filter (dummy response)
        return redirect()->route('list-pakaian')->with('filters', $filters);
    }
}
