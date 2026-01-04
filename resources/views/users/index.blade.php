<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manajemen User
            </h2>

            <a href="{{ route('users.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                <i class="bi bi-plus-lg"></i>
                Tambah User
            </a>
        </div>
    </x-slot>

    <div class="max-w-full mx-auto">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">

            {{-- EMPTY STATE --}}
            @if ($users->isEmpty())
                <div class="p-10 text-center text-gray-500">
                    <i class="bi bi-people text-4xl"></i>
                    <p class="mt-3 text-sm">Belum ada user.</p>
                </div>
            @else
                {{-- TABLE SCROLL AREA --}}
                <div class="relative overflow-x-auto">
                    <table class="w-max min-w-full text-sm">
                        <thead class="bg-slate-900 text-white">
                            <tr>
                                <th class="px-4 py-3 whitespace-nowrap text-left">Pengguna</th>
                                <th class="px-4 py-3 whitespace-nowrap text-left">Email</th>
                                <th class="px-4 py-3 whitespace-nowrap text-left">Jabatan</th>
                                <th class="px-4 py-3 whitespace-nowrap text-left">Role</th>
                                <th class="px-4 py-3 whitespace-nowrap text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-9 h-9 rounded-full overflow-hidden flex items-center justify-center
            bg-slate-200 text-slate-700 font-semibold">

                                                @if ($user->photo)
                                                    <img src="{{ asset('storage/' . $user->photo) }}"
                                                        alt="{{ $user->name }}" class="w-full h-full object-cover">
                                                @else
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                @endif
                                            </div>

                                            <div>
                                                <div class="font-medium text-gray-800">{{ $user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $user->code }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        {{ $user->position }}
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs rounded-full font-medium
                                            @if ($user->role === 'super-admin') bg-red-100 text-red-800
                                            @elseif ($user->role === 'kepala') bg-yellow-100 text-yellow-800
                                            @elseif ($user->role === 'admin') bg-green-100 text-green-800
                                            @else bg-blue-100 text-blue-800 @endif">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex justify-center gap-3 text-base">
                                            <a href="{{ route('users.show', $user) }}"
                                                class="text-blue-600 hover:text-blue-800">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{ route('users.edit', $user) }}"
                                                class="text-yellow-600 hover:text-yellow-800">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-800">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION --}}
                <div class="p-4">
                    {{ $users->links() }}
                </div>

            @endif
        </div>
    </div>
</x-app-layout>
