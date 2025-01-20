<?php

namespace App\Http\Controllers\Promo;

use App\Http\Controllers\Controller;

class ListPromo extends Controller
{
    public function index()
    {
        $promos = [
            [
                'id' => 1,
                'nama' => 'Promo Diskon 50%',
                'maks_penggunaan' => '5x per akun',
                'maks_akun' => '100 akun',
                'terpakai' => 50,
                'sisa' => 50,
                'status' => 'active',
            ],
            [
                'id' => 2,
                'nama' => 'Promo Cashback 30%',
                'maks_penggunaan' => '3x per akun',
                'maks_akun' => '200 akun',
                'terpakai' => 100,
                'sisa' => 100,
                'status' => 'inactive',
            ],
        ];

        return view('content.promo.list-promo', compact('promos'));
    }
}
