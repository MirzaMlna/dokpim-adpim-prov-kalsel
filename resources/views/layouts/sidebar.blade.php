<aside x-data="{ open: false }" class="flex">
    <!-- Mobile overlay -->
    <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>

    <!-- Sidebar -->
    <div :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed z-40 inset-y-0 left-0 w-64 bg-slate-900 text-white transform transition-transform duration-200 ease-in-out
               lg:translate-x-0 lg:static lg:inset-0">
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <span class="font-semibold tracking-wide">
                DOKPIM ADPIM
            </span>
        </div>

        <!-- Menu -->
        <nav class="mt-4 px-4 space-y-2">
            <a href="{{ route('dashboard') }}"
                class="block px-4 py-2 rounded-lg text-sm
               {{ request()->routeIs('dashboard') ? 'bg-slate-800' : 'hover:bg-slate-800' }}">
                Dashboard
            </a>

            <a href="#" class="block px-4 py-2 rounded-lg text-sm hover:bg-slate-800">
                Manajemen User
            </a>

            <a href="#" class="block px-4 py-2 rounded-lg text-sm hover:bg-slate-800">
                Dokumen
            </a>
        </nav>
        <div class="absolute bottom-0 w-full border-t border-slate-800 p-4 text-sm">
            <div class="mb-2">
                {{ Auth::user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left hover:text-red-400">
                    Logout
                </button>
            </form>
        </div>
    </div>


</aside>
