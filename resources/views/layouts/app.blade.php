<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 overflow-hidden">
    <div class="flex h-screen">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Content --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Mobile Navigation --}}
            <div class="block lg:hidden">
                @include('layouts.navigation')
            </div>

            {{-- Page Heading --}}
            @isset($header)
                <div class="bg-white shadow shrink-0">
                    <div class="px-6 py-4">
                        {{ $header }}
                    </div>
                </div>
            @endisset

            {{-- Page Content --}}
            <main class="flex-1 p-6 overflow-y-auto">
                {{ $slot }}
            </main>

        </div>
    </div>
</body>

</html>
