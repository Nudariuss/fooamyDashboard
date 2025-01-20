<?php

namespace App\Http\Controllers\Inventaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListInventaris extends Controller
{
    public function index()
    {
        $inventaris = [
            [
                'id' => 1,
                'nama_barang' => 'Mesin Cuci',
                'jenis_barang' => 'Elektronik',
                'kuantitas' => 3,
                'satuan_barang' => 'Unit',
                'tahun_buat' => 2020,
                'harga' => 15000000,
            ],
            [
                'id' => 2,
                'nama_barang' => 'Setrika',
                'jenis_barang' => 'Elektronik',
                'kuantitas' => 5,
                'satuan_barang' => 'Unit',
                'tahun_buat' => 2019,
                'harga' => 200000,
            ],
        ];

        return view('content.inventaris.list-inventaris', compact('inventaris'));
    }
}
