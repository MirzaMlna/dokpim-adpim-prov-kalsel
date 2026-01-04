<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-slate-900 leading-tight">
                Tambahkan Pengguna
            </h2>
            <a href="{{ route('users.index') }}" class="text-sm text-slate-600 hover:text-slate-900 transition">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            {{-- Header Card --}}
            <div class="px-6 py-4 border-b border-slate-200">
                <h3 class="text-lg font-semibold text-slate-900">
                    Informasi Pengguna
                </h3>
                <p class="text-sm text-slate-500">
                    Lengkapi data pengguna dengan benar
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data"
                class="p-6 space-y-6">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Code --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Code
                        </label>
                        <input name="code" value="{{ old('code') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900"
                            required>
                    </div>

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Nama
                        </label>
                        <input name="name" value="{{ old('name') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900"
                            required>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900"
                            required>
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            NIP
                        </label>
                        <input name="nip" value="{{ old('nip') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900">
                    </div>

                    {{-- Birth Date --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Tanggal Lahir
                        </label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900">
                    </div>

                    {{-- Position --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Jabatan
                        </label>
                        <input name="position" value="{{ old('position') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900">
                    </div>

                    {{-- Role --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Role
                        </label>
                        <select name="role"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900"
                            required>
                            <option value="">-- Pilih Role --</option>
                            @foreach (['super-admin', 'kepala', 'admin', 'staff'] as $role)
                                <option value="{{ $role }}" @selected(old('role') === $role)>
                                    {{ ucfirst($role) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Password
                        </label>
                        <input type="password" name="password"
                            class="w-full rounded-lg border-slate-300 focus:border-slate-900 focus:ring-slate-900"
                            required>
                    </div>

                    {{-- Photo Upload --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Foto
                        </label>

                        <div
                            class="relative flex items-center justify-center w-full h-40
               border-2 border-dashed border-slate-300 rounded-xl
               cursor-pointer hover:border-slate-900 transition group">

                            {{-- Preview --}}
                            <img id="photoPreview"
                                class="absolute inset-0 w-full h-full object-cover rounded-xl hidden">

                            {{-- Placeholder --}}
                            <div id="photoPlaceholder" class="text-center pointer-events-none">
                                <div
                                    class="mx-auto mb-2 flex items-center justify-center
                       w-12 h-12 rounded-full bg-slate-100 text-slate-600
                       group-hover:bg-slate-900 group-hover:text-white transition">
                                    📷
                                </div>
                                <p class="text-sm text-slate-600">
                                    Klik untuk upload foto
                                </p>
                                <p class="text-xs text-slate-400 mt-1">
                                    JPG / PNG, maksimal 2MB
                                </p>
                            </div>

                            <input type="file" name="photo" accept="image/png,image/jpeg"
                                class="absolute inset-0 opacity-0 cursor-pointer"
                                onchange="
                if (!this.files || !this.files[0]) return;

                const file = this.files[0];

                // validasi ukuran 2MB (selaras controller)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran foto maksimal 2MB');
                    this.value = '';
                    return;
                }

                const img = document.getElementById('photoPreview');
                const placeholder = document.getElementById('photoPlaceholder');

                img.src = URL.createObjectURL(file);
                img.classList.remove('hidden');
                placeholder.classList.add('hidden');
            ">
                        </div>

                        @error('photo')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                </div>

                {{-- Action --}}
                <div class="flex justify-end gap-3 pt-6 border-t border-slate-200">
                    <a href="{{ route('users.index') }}"
                        class="px-5 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                        Batal
                    </a>
                    <button
                        class="px-5 py-2 rounded-lg bg-slate-900 text-white hover:bg-slate-800 transition font-medium">
                        Simpan Pengguna
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
