<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class DetailAccount extends Controller
{
  public function index($id, $role = 'customer')
  {
    // Dummy data
    $accounts = [
      'driver' => [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'hq' => 'HQ 1', 'plat' => 'B 1234 ABC', 'status' => 'Pengantaran', 'active' => 'Active'],
        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'hq' => 'HQ 2', 'plat' => 'B 5678 XYZ', 'status' => 'Penjemputan', 'active' => 'Inactive'],
        ['id' => 3, 'name' => 'Robert Roe', 'email' => 'robert@example.com', 'hq' => 'HQ 3', 'plat' => 'B 1122 CDE', 'status' => 'Offline', 'active' => 'Active'],
      ],
      'customer' => [
        ['id' => 1, 'name' => 'Customer 1', 'email' => 'customer1@example.com', 'status' => '2025-01-18'],
        ['id' => 2, 'name' => 'Customer 2', 'email' => 'customer2@example.com', 'status' => '2025-01-17'],
      ],
      'hq' => [
        ['id' => 1, 'name' => 'HQ 1', 'email' => 'hq1@example.com', 'lokasi_hq' => 'HQ A', 'online' => true, 'active' => true],
        ['id' => 2, 'name' => 'HQ 2', 'email' => 'hq2@example.com', 'lokasi_hq' => 'HQ B', 'online' => false, 'active' => true],
      ],
      'loket' => [
        ['id' => 1, 'name' => 'Loket 1', 'email' => 'loket1@example.com', 'lokasi_hq' => 'HQ A', 'lokasi_loket' => 'Loket X', 'online' => true, 'active' => true],
        ['id' => 2, 'name' => 'Loket 2', 'email' => 'loket2@example.com', 'lokasi_hq' => 'HQ B', 'lokasi_loket' => 'Loket Y', 'online' => false, 'active' => false],
      ],
      'management' => [
        ['id' => 1, 'name' => 'Manager 1', 'email' => 'manager1@example.com', 'status' => '2025-01-16'],
        ['id' => 2, 'name' => 'Manager 2', 'email' => 'manager2@example.com', 'status' => '2025-01-15'],
      ],
      'mitra' => [
        ['id' => 1, 'nama_perusahaan' => 'Mitra Corp', 'email' => 'mitra@example.com', 'nama_pic' => 'PIC 1', 'status' => '2025-01-14'],
        ['id' => 2, 'nama_perusahaan' => 'Another Corp', 'email' => 'another@example.com', 'nama_pic' => 'PIC 2', 'status' => '2025-01-13'],
      ],
    ];

    // Validasi apakah role ada dalam data
    if (!array_key_exists($role, $accounts)) {
      abort(404, 'Role not found');
    }

    // Cari data berdasarkan ID
    $account = collect($accounts[$role])->firstWhere('id', $id);

    if (!$account) {
      abort(404, 'Account not found');
    }

    return view('content.account.detail-account', [
      'role' => $role,
      'account' => $account,
    ]);
  }
}
