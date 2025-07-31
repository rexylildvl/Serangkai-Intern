{{-- Sidebar Admin --}}
<aside class="w-64 h-screen bg-white shadow-lg flex flex-col justify-between border-r border-gray-200">
    <!-- Logo & Brand -->
    <div>
        <div class="flex items-center gap-3 px-6 py-6 bg-gradient-to-r from-[#4B6043] to-[#73815D] text-white rounded-br-3xl">
            <img src="{{ asset('images/logo-ts.png') }}" alt="Logo TS" class="h-10 w-auto">
            <div class="leading-tight">
                <h1 class="text-lg font-bold">Magang</h1>
                <p class="text-sm font-medium">TigaSerangkai</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 space-y-1 px-4">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="text-sm font-medium">Dashboard</span>
            </a>

            <!-- Data Pendaftar -->
            <a href="{{ route('admin.pendaftar') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="text-sm font-medium">Data Pendaftar</span>
            </a>

            <!-- Data Lowongan -->
            <a href="{{ route('admin.lowongan.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="text-sm font-medium">Data Lowongan</span>
            </a>

            <!-- Berita -->
            <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span class="text-sm font-medium">Berita</span>
            </a>

            <!-- Galeri -->
            <a href="{{ route('admin.galeri') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-sm font-medium">Galeri</span>
            </a>

            <!-- Logbook Peserta -->
            <a href="{{ route('admin.logbooks.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="text-sm font-medium">Logbook Peserta</span>
            </a>

            <!-- Pusat Informasi Group -->
            <div class="mt-4">
                <div class="flex items-center gap-3 px-4 py-2 text-gray-500 font-semibold uppercase text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Pusat Informasi</span>
                </div>

                <a href="{{ route('admin.banner.index') }}" class="ml-6 flex items-center gap-2 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] text-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                    </svg>
                    Banner
                </a>

                <a href="{{ route('admin.faq.index') }}" class="ml-6 flex items-center gap-2 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] text-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    FAQ
                </a>
            </div>
        </nav>

    </div>

    <!-- Footer -->
    <div class="border-t border-gray-200 px-6 py-4">
        <a href="/" class="block text-sm text-gray-700 font-medium hover:text-[#4B6043] mb-3 transition">
            ← Ke Halaman Utama
        </a>
    </div>
</aside>
