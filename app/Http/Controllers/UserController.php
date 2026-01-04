<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'code'        => 'required|unique:users,code',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'nip'         => 'nullable|unique:users,nip',
            'birth_date'  => 'nullable|date',
            'position'    => 'nullable|string|max:255',
            'role'        => 'required|in:super-admin,kepala,admin,staff',
            'password'    => 'required|min:8',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload photo
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('users', 'public');
        }

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
        $birthDate = $user->birth_date
            ? Carbon::parse($user->birth_date)
            : null;

        $age = $birthDate ? $birthDate->age : null;

        return view('users.show', compact('user', 'birthDate', 'age'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'code'        => 'required|unique:users,code,' . $user->id,
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $user->id,
            'nip'         => 'nullable|unique:users,nip,' . $user->id,
            'birth_date'  => 'nullable|date',
            'position'    => 'nullable|string|max:255',
            'role'        => 'required|in:super-admin,kepala,admin,staff',
            'password'    => 'nullable|min:8',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update password jika diisi
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        // Update photo
        if ($request->hasFile('photo')) {
            // Hapus foto lama
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $validated['photo'] = $request->file('photo')
                ->store('users', 'public');
        }

        $user->update($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
