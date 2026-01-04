<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-slate-900 leading-tight">
                Detail User
            </h2>


        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            {{-- Header Card --}}
            <div class="px-6 py-6 border-b border-slate-200 flex gap-6 items-center">

                {{-- FOTO BESAR 1:1 --}}
                <div
                    class="w-28 h-28 rounded-xl overflow-hidden
                           bg-slate-200 flex items-center justify-center
                           text-slate-700 font-semibold text-3xl shrink-0">

                    @if ($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}"
                            class="w-full h-full object-cover">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>

                {{-- BASIC INFO --}}
                <div>
                    <h3 class="text-xl font-semibold text-slate-900">
                        {{ $user->name }}
                    </h3>
                    <p class="text-sm text-slate-500">
                        {{ $user->email }}
                    </p>

                    <div class="mt-2">
                        <span
                            class="inline-flex px-3 py-1 text-xs rounded-full font-medium
                            @if ($user->role === 'super-admin') bg-red-100 text-red-800
                            @elseif ($user->role === 'kepala') bg-yellow-100 text-yellow-800
                            @elseif ($user->role === 'admin') bg-green-100 text-green-800
                            @else bg-blue-100 text-blue-800 @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-xs text-slate-500">Code</p>
                        <p class="font-medium text-slate-900">{{ $user->code }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">NIP</p>
                        <p class="font-medium text-slate-900">
                            {{ $user->nip ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Tanggal Lahir</p>
                        <p class="font-medium text-slate-900">
                            {{ $birthDate ? $birthDate->format('d M Y') : '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Usia</p>
                        <p class="font-medium text-slate-900">
                            {{ $age ? $age . ' tahun' : '-' }}
                        </p>

                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Jabatan</p>
                        <p class="font-medium text-slate-900">
                            {{ $user->position ?? '-' }}
                        </p>
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6 pt-6 border-t border-slate-200">
                    <a href="{{ route('users.edit', $user) }}"
                        class="px-4 py-2 rounded-lg bg-slate-900 text-white text-sm
                           hover:bg-slate-800 transition">
                        Edit
                    </a>
                    <a href="{{ route('users.index') }}"
                        class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 text-sm
                           hover:bg-slate-100 transition">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
