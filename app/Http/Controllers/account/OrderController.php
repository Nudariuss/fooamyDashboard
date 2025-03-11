<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order; // Pastikan model Order diimport
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan berdasarkan user_id.
     */
    public function index($userId)
    {
        $orders = Order::where('user_id', $userId)->paginate(10);

        return view('content.account.detail-account-order', [
            'orders' => $orders,
            'userId' => $userId
        ]);
    }

    /**
     * Menampilkan detail order tertentu.
     */
    public function show($userId, $orderId)
    {
        $order = Order::where('user_id', $userId)->where('id', $orderId)->firstOrFail();

        return view('content.account.order-detail', [
            'order' => $order
        ]);
    }
}
