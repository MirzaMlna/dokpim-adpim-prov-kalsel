<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">Kode</th>
                            <th class="p-2 border">Nama</th>
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Jabatan</th>
                            <th class="p-2 border">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="p-2 border">{{ $user->kode }}</td>
                                <td class="p-2 border">{{ $user->name }}</td>
                                <td class="p-2 border">{{ $user->email }}</td>
                                <td class="p-2 border">{{ $user->jabatan }}</td>
                                <td class="p-2 border font-semibold">{{ $user->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
