{{-- Sidebar Admin --}}
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-6 bg-gray-800 text-white text-xl font-bold">
            Admin Panel
        </div>
        <nav class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200">
                Dashboard
            </a>
            {{-- Tambahkan menu lain di sini --}}
            <a href="/" class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200">
                Ke Halaman Utama
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left py-2.5 px-4 text-red-600 hover:bg-gray-200">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 p-6 overflow-y-auto">
        @yield('content')
    </div>
</div>
