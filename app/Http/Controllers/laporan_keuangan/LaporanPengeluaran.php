<?php

namespace App\Http\Controllers\laporan_keuangan;

use App\Http\Controllers\Controller;

class LaporanPengeluaran extends Controller
{
    public function index()
    {
        return view('content.laporankeuangan.laporan-pengeluaran');
    }
}
