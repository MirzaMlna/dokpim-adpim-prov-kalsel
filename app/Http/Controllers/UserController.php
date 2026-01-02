<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
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

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:users,kode,' . $user->id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nip' => 'nullable|unique:users,nip,' . $user->id,
            'tanggal_lahir' => 'nullable|date',
            'jabatan' => 'nullable|string',
            'role' => 'required|in:super-admin,kepala,admin,staff',
            'password' => 'nullable|min:8',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
