<?php

namespace App\Http\Controllers\laporan_keuangan;

use App\Http\Controllers\Controller;

class LaporanPemasukan extends Controller
{
    public function index()
    {
        return view('content.laporankeuangan.laporan-pemasukan');
    }
}
