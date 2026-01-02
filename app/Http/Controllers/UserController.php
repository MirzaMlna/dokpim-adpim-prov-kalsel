<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nip' => 'nullable|unique:users',
            'tanggal_lahir' => 'nullable|date',
            'jabatan' => 'nullable|string',
            'role' => 'required|in:super-admin,kepala,admin,staff',
            'password' => 'required|min:8',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }
}
