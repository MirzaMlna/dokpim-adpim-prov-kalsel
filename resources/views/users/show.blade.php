<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="max-w-xl space-y-3">
                    <div><strong>Code:</strong> {{ $user->code }}</div>
                    <div><strong>Nama:</strong> {{ $user->name }}</div>
                    <div><strong>Email:</strong> {{ $user->email }}</div>
                    <div><strong>NIP:</strong> {{ $user->nip }}</div>
                    <div><strong>Birth Date:</strong> {{ $user->birth_date }}</div>
                    <div><strong>Position:</strong> {{ $user->position }}</div>
                    <div><strong>Role:</strong> {{ ucfirst($user->role) }}</div>

                    <a href="{{ route('users.index') }}" class="text-blue-600">
                        ← Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
