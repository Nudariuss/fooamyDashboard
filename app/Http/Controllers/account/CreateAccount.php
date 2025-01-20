<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CreateAccount extends Controller
{
    public function index()
    {
        return view('content.account.create-account');
    }

    // public function store(Request $request)
    // {
    //     // Validasi Data
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'username' => 'required|string|max:255|unique:users,username',
    //         'password' => 'required|string|min:6',
    //         'contact' => 'nullable|string|max:15',
    //         'hq' => 'nullable|string',
    //         'loket' => 'nullable|string',
    //         'role' => 'required|string',
    //         'status' => 'required|string|in:active,suspended,inactive',
    //     ], [
    //         'name.required' => 'Name is required.',
    //         'username.required' => 'Username is required.',
    //         'username.unique' => 'Username has already been taken.',
    //         'password.required' => 'Password is required.',
    //         'role.required' => 'Role is required.',
    //         'status.required' => 'Status is required.',
    //     ]);

    //     // Simpan Data ke Database
    //     User::create([
    //         'name' => $validated['name'],
    //         'username' => $validated['username'],
    //         'password' => bcrypt($validated['password']),
    //         'contact' => $validated['contact'],
    //         'hq' => $validated['hq'],
    //         'loket' => $validated['loket'],
    //         'role' => $validated['role'],
    //         'status' => $validated['status'],
    //     ]);

    //     // Redirect ke List Account dengan Pesan Sukses
    //     return redirect()->route('account-list-account')->with('success', 'Account created successfully!');
    // }
}
