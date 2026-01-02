<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambahkan Pengguna
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Kode</label>
                    <input name="kode" value="{{ old('kode') }}"
                        class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Nama</label>
                    <input name="name" value="{{ old('name') }}"
                        class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium">NIP</label>
                    <input name="nip" value="{{ old('nip') }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Jabatan</label>
                    <input name="jabatan" value="{{ old('jabatan') }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Role</label>
                    <select name="role" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih Role --</option>
                        @foreach (['super-admin','kepala','admin','staff'] as $role)
                            <option value="{{ $role }}" @selected(old('role') === $role)>
                                {{ ucfirst($role) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Password</label>
                    <input type="password" name="password"
                        class="w-full border rounded p-2" required>
                </div>

                <div class="flex gap-2">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                    <a href="{{ route('users.index') }}"
                        class="px-4 py-2 border rounded">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
