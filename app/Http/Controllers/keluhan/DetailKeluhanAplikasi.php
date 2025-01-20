<?php

namespace App\Http\Controllers\Keluhan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailKeluhanAplikasi extends Controller
{
  public function detail($id_keluhan)
  {
    // Dummy data for detail keluhan
    $keluhan = [
      [
        'id_keluhan' => 1,
        'judul_keluhan' => 'Bug Pembayaran',
        'email' => 'user1@example.com',
        'nama' => 'User 1',
        'role' => 'User',
        'jenis' => 'Jenis 1',
        'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'status' => 'Finished',
        'tanggal' => '27-10-2023'
      ],
      [
        'id_keluhan' => 2,
        'judul_keluhan' => 'Aplikasi lambat',
        'email' => 'user2@example.com',
        'nama' => 'User 2',
        'role' => 'User',
        'jenis' => 'Jenis 2',
        'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'status' => 'Unfinished',
        'tanggal' => '28-10-2023'
      ],
      [
        'id_keluhan' => 3,
        'judul_keluhan' => 'Tidak dapat Login pada aplikasi',
        'email' => 'user3@example.com',
        'nama' => 'User 3',
        'role' => 'User',
        'jenis' => 'Jenis 3',
        'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'status' => 'Unfinished',
        'tanggal' => '29-10-2023'
      ],
    ];

    // Cari keluhan berdasarkan id_keluhan
    $keluhanDetail = array_filter($keluhan, function ($item) use ($id_keluhan) {
      return $item['id_keluhan'] == $id_keluhan;
    });

    // Ambil elemen pertama (karena array_filter mengembalikan array)
    $keluhanDetail = reset($keluhanDetail);

    // Jika data tidak ditemukan, beri respon error atau redirect
    if (!$keluhanDetail) {
      abort(404, 'Keluhan tidak ditemukan');
    }

    return view('content.keluhan.detail-keluhan-aplikasi', compact('keluhan','keluhanDetail'));
  }
}
