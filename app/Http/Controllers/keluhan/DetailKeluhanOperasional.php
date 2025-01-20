<?php

namespace App\Http\Controllers\Keluhan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailKeluhanOperasional extends Controller
{
  public function detail($id_keluhan)
  {
    // Dummy data for detail keluhan
    $keluhan = [
      [
        'id_keluhan' => 1,
        'judul_keluhan' => 'Keluhan tentang operasional HQ',
        'email' => 'user1@example.com',
        'nama' => 'User 1',
        'role' => 'HQ',
        'jenis' => 'Jenis 1',
        'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'status' => 'Finished',
        'tanggal' => '27-10-2023'
      ],
      [
        'id_keluhan' => 2,
        'judul_keluhan' => 'Lambatnya operasional',
        'email' => 'user2@example.com',
        'nama' => 'User 2',
        'role' => 'Loket',
        'jenis' => 'Jenis 2',
        'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'status' => 'Unfinished',
        'tanggal' => '28-10-2023'
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

    return view('content.keluhan.detail-keluhan-operasional', compact('keluhan','keluhanDetail'));
  }
}
