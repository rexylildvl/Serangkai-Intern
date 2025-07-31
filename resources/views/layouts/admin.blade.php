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

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-[#5E6E52] text-white flex flex-col justify-between fixed top-0 left-0 h-screen z-40">
            <div>
                <div class="flex items-center gap-3 px-6 py-6">
                    <img src="{{ asset('images/logo-ts.png') }}" alt="Logo TS" class="h-10 w-auto">
                    <div class="leading-tight">
                        <div class="text-lg font-bold">Magang</div>
                        <div class="text-sm font-medium">TigaSerangkai</div>
                    </div>
                </div>

                <nav class="mt-4 text-white space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.dashboard') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                        Dashboard
                    </a>

                    <!-- Data Pendaftar -->
                    <a href="{{ route('admin.pendaftar.index') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.pendaftar.index') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        Data Pendaftar
                    </a>

                    <!-- Data Lowongan -->
                    <a href="{{ route('admin.lowongan.index') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.lowongan.index') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                        </svg>
                        Data Lowongan
                    </a>

                    <!-- Berita -->
                    <a href="{{ route('admin.berita.index') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.berita.index') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        Berita
                    </a>

                    <!-- Galeri -->
                    <a href="{{ route('admin.galeri') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.galeri') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        Galeri
                    </a>

                    <!-- Logbook Peserta -->
                    <a href="{{ route('admin.logbooks.index') }}"
                        class="flex items-center gap-2 py-2.5 px-6 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.logbooks.index') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        Logbook Peserta
                    </a>

                    <div class="px-6 pt-4 pb-1 text-xs font-semibold uppercase text-white/60 tracking-wider">
                        Pusat Informasi
                    </div>

                    <!-- Banner -->
                    <a href="{{ route('admin.banner.index') }}"
                        class="flex items-center gap-2 py-2.5 px-8 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.banner.index') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.33c-.653.328-1.027.385-1.243.832-.07.18-.105.575-.105.575h0m0 0s-.103-.22-.186-.495c-.095-.31-.222-.686-.376-1.089-.154-.403-.3-.812-.434-1.211-.134-.4-.24-.78-.309-1.13-.136-.698-.172-1.239-.172-1.38v0m0 0c0-.323.021-.653.063-.99.064-.519.172-1.023.324-1.52.152-.497.347-.973.583-1.427.236-.454.513-.88.829-1.266.315-.386.669-.73 1.06-1.03.39-.3.816-.554 1.271-.763.456-.21.94-.373 1.444-.486.505-.113 1.027-.17 1.558-.17h.75c.532 0 1.054.057 1.559.17.505.113.988.276 1.444.487.455.21.88.463 1.271.763.391.3.745.644 1.06 1.03.316.386.593.812.829 1.266.236.454.431.93.583 1.427.152.497.26 1.001.324 1.52.042.337.063.667.063.99v0m0 0s-.104.22-.187.495c-.095.31-.222.686-.376 1.089-.154.403-.3.812-.434 1.211-.134.4-.24.78-.309 1.13-.136.698-.172 1.239-.172 1.38v0" />
                        </svg>
                        Banner
                    </a>

                    <!-- FAQ -->
                    <a href="{{ route('admin.faq.index') }}"
                        class="flex items-center gap-2 py-2.5 px-8 hover:bg-[#6c7d5f] {{ request()->routeIs('admin.faq.index') ? 'bg-[#6c7d5f]' : '' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                        </svg>
                        FAQ
                    </a>
                </nav>
            </div>

            <div class="px-6 py-4 border-t border-white/20">
                <a href="/" class="block py-2.5 text-sm text-white hover:underline">← Ke Halaman Utama</a>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 flex flex-col pl-64">
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
            <div class="p-6 grow overflow-y-auto">
                @yield('content')
            </div>

            @stack('scripts')
        </main>
    </div>
</body>
</html>
