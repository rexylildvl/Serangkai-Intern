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
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8 4-16 3 8h4" />
                </svg>
                <span class="text-sm font-medium">Dashboard</span>
            </a>
            <a href="{{ route('admin.pendaftar') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-sm font-medium">Data Pendaftar</span>
            </a>
            <a href="{{ route('admin.lowongan') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13V7H9V1L1 9l8 8z" />
                </svg>
                <span class="text-sm font-medium">Data Lowongan</span>
            </a>
            <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2h4l2 2h3a2 2 0 012 2v11a2 2 0 01-2 2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11h8M8 15h6" />
                </svg>
                <span class="text-sm font-medium">Berita</span>
            </a>
            <a href="{{ route('admin.galeri') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 10h18M3 15h18M3 20h18" />
                </svg>
                <span class="text-sm font-medium">Galeri</span>
            </a>
            <a href="{{ route('admin.faq') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-gray-700 hover:bg-[#f3f4f6] hover:text-[#4B6043] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#4B6043]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm font-medium">Pusat Informasi</span>
            </a>
        </nav>
    </div>

    <!-- Footer -->
    <div class="border-t border-gray-200 px-6 py-4">
        <a href="/" class="block text-sm text-gray-700 font-medium hover:text-[#4B6043] mb-3 transition">
            ← Ke Halaman Utama
        </a>
    </div>
</aside>
