<?php

namespace App\Http\Controllers\laporan_keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterLaporan extends Controller
{
  public function index(Request $request)
  {
      $type = $request->get('type', 'pemasukan'); // Default ke 'pemasukan'

      return view('content.laporankeuangan.filter-laporan', compact('type'));
  }


  public function filterResults(Request $request)
{
    $type = $request->get('type', 'pemasukan'); // Default ke pemasukan jika type tidak disediakan
    $filters = $request->all();

    // Proses filter berdasarkan type
    if ($type === 'pemasukan') {
        // Proses filter pemasukan (contoh: query database)
        return redirect()->route('laporan-keuangan-pemasukan')->with('filters', $filters);
    } elseif ($type === 'pengeluaran') {
        // Proses filter pengeluaran (contoh: query database)
        return redirect()->route('laporan-keuangan-pengeluaran')->with('filters', $filters);
    }

    // Default fallback jika type tidak valid
    return redirect()->route('laporan-pemasukan');
}
}
