<?php

namespace App\Http\Controllers\Layanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddLayanan extends Controller
{
    public function index()
    {
        return view('content.layanan.add-layanan');
    }

    public function save(Request $request)
    {
        // Dummy save logic
        // In production, you would save the data to the database
        $data = $request->all();

        return redirect()->route('layanan-list')->with('success', 'Layanan added successfully!');
    }
}
