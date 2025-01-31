<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hq;
use App\Models\Locket;
use App\Models\LoginHistory;
use Illuminate\Http\Request;

class Account extends Controller
{
  public function index($role = 'customer')
  {
    $accounts = User::with(['userMobile.staff', 'userWeb'])
      ->where('role', ucfirst($role))
      ->paginate(5);

    return view('content.account.list-account', [
      'accounts' => $accounts,
      'role' => $role,
      'roleDisplay' => ucfirst($role),
    ]);
  }

  public function create(Request $request)
  {
    $role = $request->get('role', 'customer'); // Default role adalah 'customer'
    return view('content.account.create-account', [
      'role' => $role,
      'roleDisplay' => ucfirst($role),
    ]);
  }


  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'password' => 'required|string|min:6',
      'role' => 'required|string|in:admin,customer,management,mitra,operational',
      'email' => 'nullable|email',
      'contact' => 'nullable|string|max:20',
      'status' => 'required|string|in:active,inactive',
      'driver_plate' => 'nullable|string|max:20',
      'driver_status' => 'required|string|in:Standby,Pickup,Delivery,Offline',
    ]);

    $user = User::create([
      'name' => $request->name,
      'password' => bcrypt($request->password),
      'role' => ucfirst($request->role),
    ]);

    if (in_array($request->role, ['customer', 'operational'])) {
      $userMobile = $user->userMobile()->create([
        'phone_number' => $request->contact,
        'is_active' => $request->status === 'active',
      ]);

      if ($request->role === 'operational') {
        $userMobile->staff()->create([
          'driver_plate' => $request->driver_plate,
          'driver_status' => $request->driver_status,
          'operational_status' => $request->status === 'active',
        ]);
      }
    }

    if (in_array($request->role, ['admin', 'management', 'mitra'])) {
      $user->userWeb()->create([
        'email' => $request->email,
        'is_active' => $request->status === 'active',
      ]);
    }

    return redirect()->route('list-account', ['role' => strtolower($request->role)])
      ->with('success', 'Account created successfully.');
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('list-account', ['role' => strtolower($user->role)])
      ->with('success', 'Account deleted successfully.');
  }

  public function detail($role, $id)
  {
    $account = User::with(['userMobile.staff', 'userWeb'])
      ->where('user_id', $id)
      ->where('role', ucfirst($role))
      ->firstOrFail();

    return view('content.account.detail-account-overview', [
      'account' => $account,
      'role' => $role,
      'roleDisplay' => ucfirst($role),
    ]);
  }

  public function updateStatus(Request $request, $id)
  {
    $request->validate([
      'status' => 'required|string|in:active,inactive',
    ]);

    $user = User::findOrFail($id);
    $isActive = $request->status === 'active';

    if ($user->role === 'Operational' && $user->userMobile) {
      $user->userMobile->update(['is_active' => $isActive]);
      $user->userMobile->staff->update(['operational_status' => $isActive]);
    } elseif (in_array($user->role, ['Admin', 'Management', 'Mitra'])) {
      $user->userWeb->update(['is_active' => $isActive]);
    }

    return redirect()->route('account-detail-overview', ['role' => strtolower($user->role), 'id' => $id])
      ->with('success', 'Status updated successfully.');
  }

  public function detailOverview($role, $id)
  {
    $account = User::with(['userMobile', 'userWeb', 'loginHistory'])->findOrFail($id);
    $loginHistory = LoginHistory::where('user_id', $id)->paginate(5);

    return view('content.account.detail-account-overview', [
      'account' => $account,
      'role' => $role,
      'loginHistory' => $loginHistory,
    ]);
  }

  public function detailOrder($id, $role)
  {
    $account = User::with(['userMobile', 'userWeb'])->findOrFail($id);
    $orders = Order::where('user_id', $id)->paginate(10);

    return view('content.account.detail-account-order', [
      'account' => $account,
      'role' => $role,
      'orders' => $orders,
    ]);
  }

  public function detailOperation($id, $role)
  {
    $account = User::with(['userMobile.staff'])->findOrFail($id);
    $driverStatuses = DriverStatus::where('user_id', $id)->paginate(10);

    return view('content.account.detail-account-operation', [
      'account' => $account,
      'role' => $role,
      'driverStatuses' => $driverStatuses,
    ]);
  }

  public function filter(Request $request)
  {
    $role = $request->get('role', 'customer'); // Default ke customer jika tidak ada input role
    $hqs = Hq::all(); // Ambil semua data HQ
    $lokets = Locket::all(); // Ambil semua data Locket

    return view('content.account.filter-account', [
      'role' => ucfirst($role), // Pastikan role pertama huruf besar
      'hqs' => $hqs,
      'lokets' => $lokets,
    ]);
  }



  public function filterResults(Request $request)
  {
    $query = User::query();

    // Filter berdasarkan Nama atau Email
    if ($request->filled('search')) {
      $query->where('name', 'like', '%' . $request->search . '%')
        ->orWhereHas('userWeb', function ($q) use ($request) {
          $q->where('email', 'like', '%' . $request->search . '%');
        });
    }

    // Filter berdasarkan Role
    $role = $request->input('role', 'customer'); // Default ke customer jika tidak ada input
    $roleDisplay = ucfirst($role); // Format untuk ditampilkan

    if ($request->filled('filter_role')) {
      $query->where('role', ucfirst($request->filter_role));
    }

    // Filter berdasarkan HQ
    if ($request->filled('hq')) {
      $query->whereHas('userMobile', function ($q) use ($request) {
        $q->where('hq_id', $request->hq);
      });
    }

    // Filter berdasarkan Locket
    if ($request->filled('loket')) {
      $query->whereHas('userMobile', function ($q) use ($request) {
        $q->where('loket_id', $request->loket);
      });
    }

    // Urutan berdasarkan akun terbaru atau terlama
    if ($request->filled('order')) {
      $query->orderBy('created_at', $request->order === 'new' ? 'desc' : 'asc');
    }

    // Filter berdasarkan Status Akun (Aktif/Nonaktif)
    if ($request->filled('status')) {
      $isActive = $request->status === 'active';
      $query->where(function ($q) use ($isActive) {
        $q->whereHas('userMobile', function ($subQuery) use ($isActive) {
          $subQuery->where('is_active', $isActive);
        })->orWhereHas('userWeb', function ($subQuery) use ($isActive) {
          $subQuery->where('is_active', $isActive);
        });
      });
    }

    $accounts = $query->paginate(10);

    return view('content.account.list-account', [
      'accounts' => $accounts,
      'role' => $role,
      'roleDisplay' => $roleDisplay, // Kirim roleDisplay agar tidak error
    ]);
  }
}
