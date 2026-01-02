<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Pengguna
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-xl space-y-3">
                        <h2 class="text-lg font-semibold">Detail User</h2>

                        <div><strong>Kode:</strong> {{ $user->kode }}</div>
                        <div><strong>Nama:</strong> {{ $user->name }}</div>
                        <div><strong>Email:</strong> {{ $user->email }}</div>
                        <div><strong>NIP:</strong> {{ $user->nip }}</div>
                        <div><strong>Jabatan:</strong> {{ $user->jabatan }}</div>
                        <div><strong>Role:</strong> {{ ucfirst($user->role) }}</div>

                        <a href="{{ route('users.index') }}" class="text-blue-600">← Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
