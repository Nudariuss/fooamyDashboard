<?php

namespace App\Http\Controllers\Keluhan;

use App\Http\Controllers\Controller;

class ListKeluhanAplikasi extends Controller
{
    public function index()
    {
        // Dummy data
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
            'id_keluhan' => 2,
            'judul_keluhan' => 'Tidak dapat Login pada aplikasi',
            'email' => 'user2@example.com',
            'nama' => 'User 2',
            'role' => 'User',
            'jenis' => 'Jenis 2',
            'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'status' => 'Unfinished',
            'tanggal' => '28-10-2023'
          ],
      ];

        return view('content.keluhan.list-keluhan-aplikasi', compact('keluhan'));
    }
}
