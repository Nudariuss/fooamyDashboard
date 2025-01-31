<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use App\Models\Hq;
use App\Models\Locket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Lokasi extends Controller
{
  public function listLokasi(Request $request, $type = 'hq')
  {
    // Validasi tipe
    if (!in_array($type, ['hq', 'locket'])) {
      abort(404);
    }

    // Query model berdasarkan tipe
    $model = $type === 'hq' ? Hq::query() : Locket::query();

    // Filter berdasarkan input
    if ($request->filled('nama')) {
      $model->where('name', 'like', '%' . $request->nama . '%');
    }

    if ($request->filled('alamat')) {
      $model->where('address', 'like', '%' . $request->alamat . '%');
    }

    if ($type === 'locket' && $request->filled('hq_id')) {
      $model->where('hq_id', $request->hq_id);
    }

    // Ambil data dengan pagination
    $lokasi = $model->paginate(5);

    return view('content.lokasi.list-lokasi', [
      'lokasi' => $lokasi,
      'selectedOption' => $type === 'hq' ? 'HQ' : 'Locket',
    ]);
  }

  public function destroy($type, $id)
  {
    // Validasi tipe lokasi
    if (!in_array($type, ['hq', 'locket'])) {
      abort(404);
    }

    // Tentukan model berdasarkan tipe
    $model = $type === 'hq' ? Hq::class : Locket::class;

    // Cari data berdasarkan ID dan hapus
    $lokasi = $model::findOrFail($id);
    $lokasi->delete();

    // Redirect kembali ke list dengan pesan sukses
    return redirect()->route('lokasi-list', ['type' => $type])
      ->with('success', ucfirst($type) . ' berhasil dihapus.');
  }

  public function detailLokasi($type, $id)
  {
    // Validasi tipe
    if (!in_array($type, ['hq', 'locket'])) {
      abort(404); // Jika tipe tidak valid
    }

    // Ambil data lokasi berdasarkan tipe
    $lokasi = $type === 'hq' ? Hq::findOrFail($id) : Locket::findOrFail($id);

    // Ambil daftar locket hanya jika tipe adalah HQ, dengan pagination
    $lokets = $type === 'hq'
      ? $lokasi->locket()->paginate(2) // Gunakan paginate untuk locket
      : collect(); // Jika bukan HQ, kosongkan data locket

    return view('content.lokasi.detail-lokasi', [
      'lokasi' => $lokasi,
      'lokets' => $lokets, // Paginated data
      'selectedOption' => $type === 'hq' ? 'HQ' : 'Locket',
    ]);
  }

  public function edit($type, $id)
  {
    // Validasi tipe
    if (!in_array($type, ['hq', 'locket'])) {
      abort(404); // Jika tipe tidak valid
    }

    // Ambil data lokasi berdasarkan tipe
    $lokasi = $type === 'hq' ? Hq::findOrFail($id) : Locket::findOrFail($id);

    return view('content.lokasi.edit-lokasi', [
      'lokasi' => $lokasi,
      'selectedOption' => $type === 'hq' ? 'HQ' : 'Locket',
    ]);
  }

  public function update(Request $request, $type, $id)
  {
    // Validasi tipe
    if (!in_array($type, ['hq', 'locket'])) {
      abort(404);
    }

    // Validasi input
    $validatedData = $request->validate([
      'nama' => 'required|string|max:255',
      'alamat' => 'required|string',
      'koordinat' => 'required|regex:/^-?\d{1,3}\.\d+ -?\d{1,3}\.\d+$/',
    ]);

    // Pecah koordinat menjadi latitude dan longitude
    [$latitude, $longitude] = explode(' ', $validatedData['koordinat']);

    // Ambil data lokasi berdasarkan tipe
    $lokasi = $type === 'hq' ? Hq::findOrFail($id) : Locket::findOrFail($id);

    // Update data
    $lokasi->update([
      'name' => $validatedData['nama'],
      'address' => $validatedData['alamat'],
      'coordinate' => DB::raw("ST_GeomFromText('POINT($latitude $longitude)')"), // Simpan dalam format POINT
    ]);

    // Flash pesan sukses ke session
    return redirect()->route('lokasi-detail', ['type' => $type, 'id' => $id])
      ->with('success', ucfirst($type) . ' berhasil diperbarui.');
  }

  public function create(Request $request, $type)
  {
    if (!in_array($type, ['hq', 'locket'])) {
      abort(404);
    }

    $hqs = $type === 'locket' ? Hq::all() : collect();

    return view('content.lokasi.create-lokasi', [
      'type' => $type,
      'hqs' => $hqs,
    ]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'type' => 'required|in:hq,locket',
      'nama' => 'required|string|max:255',
      'alamat' => 'required|string|max:255',
      'koordinat' => 'required|regex:/^-?\d{1,3}\.\d+ -?\d{1,3}\.\d+$/',
      'hq_id' => 'nullable|exists:hq,hq_id',
    ]);

    if ($validatedData['type'] === 'hq') {
      Hq::create([
        'name' => $validatedData['nama'],
        'address' => $validatedData['alamat'],
        'coordinate' => DB::raw("ST_GeomFromText('POINT({$validatedData['koordinat']})')"),
      ]);
    } else {
      Locket::create([
        'hq_id' => $validatedData['hq_id'],
        'name' => $validatedData['nama'],
        'address' => $validatedData['alamat'],
        'coordinate' => DB::raw("ST_GeomFromText('POINT({$validatedData['koordinat']})')"),
      ]);
    }

    return redirect()->route('lokasi-list', ['type' => $validatedData['type']])
      ->with('success', ucfirst($validatedData['type']) . ' berhasil ditambahkan.');
  }


  public function filter(Request $request, $type)
  {
    // Validasi tipe
    if (!in_array($type, ['hq', 'locket'])) {
      abort(404); // Jika tipe tidak valid
    }

    // Ambil data HQ atau Locket untuk dropdown (jika diperlukan)
    $hqs = $type === 'locket' ? Hq::all() : null;

    return view('content.lokasi.filter-lokasi', [
      'type' => ucfirst($type), // Ubah jadi format kapital
      'hqs' => $hqs,
    ]);
  }
}
