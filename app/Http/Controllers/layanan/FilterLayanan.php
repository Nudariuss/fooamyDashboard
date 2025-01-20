<?php

namespace App\Http\Controllers\Layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterLayanan extends Controller
{
    public function index()
    {
        return view('content.layanan.filter-layanan');
    }

    public function filterResults(Request $request)
    {
        $filters = $request->all();

        // Contoh logika filter
        return response()->json([
            'success' => true,
            'filters' => $filters,
        ]);
    }
}
