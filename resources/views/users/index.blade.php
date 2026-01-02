<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between mb-4">
                    <h2 class="text-lg font-semibold">Manajemen User</h2>
                    <a href="{{ route('users.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        + Tambah User
                    </a>
                </div>

                <table class="w-full text-sm border rounded overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2">Kode</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Jabatan</th>
                            <th class="p-2">Role</th>
                            <th class="p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-2">{{ $user->kode }}</td>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">{{ $user->jabatan }}</td>
                                <td class="p-2 font-medium">{{ ucfirst($user->role) }}</td>
                                <td class="p-2 flex gap-2 justify-center">
                                    <a href="{{ route('users.show', $user) }}" class="text-blue-600">Detail</a>
                                    <a href="{{ route('users.edit', $user) }}" class="text-yellow-600">Edit</a>

                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
