<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifikasi Pengguna
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-4">

                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium">Kode</label>
                    <input name="kode" value="{{ old('kode', $user->kode) }}" class="w-full border rounded p-2"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Nama</label>
                    <input name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">NIP</label>
                    <input name="nip" value="{{ old('nip', $user->nip) }}" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Jabatan</label>
                    <input name="jabatan" value="{{ old('jabatan', $user->jabatan) }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Role</label>
                    <select name="role" class="w-full border rounded p-2" required>
                        @foreach (['super-admin', 'kepala', 'admin', 'staff'] as $role)
                            <option value="{{ $role }}" @selected(old('role', $user->role) === $role)>
                                {{ ucfirst($role) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">
                        Password <span class="text-xs text-gray-500">(kosongkan jika tidak diubah)</span>
                    </label>
                    <input type="password" name="password" class="w-full border rounded p-2">
                </div>

                <div class="flex gap-2">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Update
                    </button>
                    <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
