<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterInventaris extends Controller
{
    public function filter(Request $request)
    {
        // Ambil data filter
        $search = $request->input('search');
        $jenis = $request->input('jenis', []);
        $waktu = $request->input('waktu', 'terbaru');
        $harga = $request->input('harga', 'tertinggi');

        // Lakukan filter pada data inventaris
        $inventaris = [
            ['id' => 1, 'nama' => 'Laptop', 'jenis' => 'elektronik', 'harga' => 10000000, 'tanggal' => '2025-01-01'],
            ['id' => 2, 'nama' => 'Meja', 'jenis' => 'furniture', 'harga' => 500000, 'tanggal' => '2025-01-03'],
        ];

        // Contoh filter sederhana (real case harus menggunakan query database)
        $filteredInventaris = collect($inventaris)
            ->when($search, function ($query) use ($search) {
                return $query->filter(fn($item) => stripos($item['nama'], $search) !== false);
            })
            ->when($jenis, function ($query) use ($jenis) {
                return $query->whereIn('jenis', $jenis);
            })
            ->when($waktu === 'terbaru', fn($query) => $query->sortByDesc('tanggal'))
            ->when($waktu === 'terlama', fn($query) => $query->sortBy('tanggal'))
            ->when($harga === 'tertinggi', fn($query) => $query->sortByDesc('harga'))
            ->when($harga === 'terendah', fn($query) => $query->sortBy('harga'))
            ->values();

        return view('content.inventaris.list-inventaris', compact('filteredInventaris'));
    }
}
