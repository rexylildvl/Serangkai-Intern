<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js for dropdown -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <div class="flex h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-[#5E6E52] text-white flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 px-6 py-6">
                    <img src="{{ asset('images/logo-ts.png') }}" alt="Logo TS" class="h-10 w-auto">
                    <div class="leading-tight">
                        <div class="text-lg font-bold">Magang</div>
                        <div class="text-sm font-medium">TigaSerangkai</div>
                    </div>
                </div>

                <nav class="mt-4 text-white space-y-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.dashboard') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 10h18M9 21V3m6 18V3" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.pendaftar') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.pendaftar') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Data Pendaftar
                    </a>
                    <a href="{{ route('admin.lowongan') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.lowongan') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 17v-6h13V7H9V1L1 9l8 8z" />
                        </svg>
                        Data Lowongan
                    </a>
                    <a href="{{ route('admin.berita.index') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.berita.index') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2h4l2 2h3a2 2 0 012 2v11a2 2 0 01-2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11h8M8 15h6" />
                        </svg>
                        Berita
                    </a>
                    <a href="{{ route('admin.galeri') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.galeri') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" 
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Galeri
                    </a>
                    <a href="{{ route('admin.faq') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.faq') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Pusat Informasi
                    </a>
                </nav>
            </div>

            <div class="px-6 py-4 border-t border-white/20">
                <a href="/" class="block py-2.5 text-sm text-white hover:underline">← Ke Halaman Utama</a>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 flex flex-col">
            {{-- Header --}}
            <header class="flex justify-between items-center px-6 py-4 bg-white border-b">
                <div></div> {{-- Kosong biar logo tidak tertutup --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                        <div class="w-9 h-9 bg-green-600 text-white flex items-center justify-center rounded-full">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="text-sm font-semibold">{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Dropdown --}}
                    <div x-show="open" @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
                            Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <div class="p-6 overflow-y-auto">
                @yield('content')
            </div>

            @stack('scripts')
        </main>
    </div>
</body>
</html>
