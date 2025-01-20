<?php

namespace App\Http\Controllers\Pakaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListPakaian extends Controller
{
    public function index()
    {
        // Dummy data for pakaian
        $pakaian = [
            ['nama' => 'Kemeja', 'deskripsi' => 'Cotton Shirt', 'harga' => 50000, 'image' => 'assets/img/elements/1.jpg'],
            ['nama' => 'Jeans', 'deskripsi' => 'Blue Denim', 'harga' => 75000, 'image' => 'assets/img/elements/2.jpg'],
            ['nama' => 'Jaket', 'deskripsi' => 'Winter Jacket', 'harga' => 120000, 'image' => 'assets/img/elements/3.jpg'],
            ['nama' => 'Kaos', 'deskripsi' => 'T-Shirt', 'harga' => 30000, 'image' => 'assets/img/elements/4.jpg'],
            ['nama' => 'Kemeja', 'deskripsi' => 'Cotton Shirt', 'harga' => 50000, 'image' => 'assets/img/elements/1.jpg'],
            ['nama' => 'Jeans', 'deskripsi' => 'Blue Denim', 'harga' => 75000, 'image' => 'assets/img/elements/2.jpg'],
            ['nama' => 'Jaket', 'deskripsi' => 'Winter Jacket', 'harga' => 120000, 'image' => 'assets/img/elements/3.jpg'],
            ['nama' => 'Kaos', 'deskripsi' => 'T-Shirt', 'harga' => 30000, 'image' => 'assets/img/elements/4.jpg'],
        ];

        return view('content.pakaian.list-pakaian', compact('pakaian'));
    }
}
