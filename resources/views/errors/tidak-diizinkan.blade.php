<x-app-layout>
    <x-slot:title>
        Akses Ditolak | Magang Tiga Serangkai
    </x-slot:title>

    <div class="min-h-screen flex items-start justify-center bg-gradient-to-br from-green-50 to-green-100 pt-20 px-4"> <!-- Changed items-center to items-start and added pt-20 -->
        <div class="w-full max-w-md bg-white rounded-xl shadow-md overflow-hidden mt-8"> <!-- Added mt-8 -->
            <div class="bg-red-50 px-5 py-4 text-center border-b border-red-100">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            
            <div class="px-6 py-6 text-center">
                <div class="mb-1 text-xs font-semibold text-red-600 tracking-wide">
                    MAGANG TIGA SERANGKAI
                </div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">403 - Akses Ditolak</h1>
                <p class="text-gray-600 text-sm mb-6">
                    Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
                </p>
                
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('beranda') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 transition-colors duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                    
                    <p class="text-xs text-gray-500 mt-2">
                        Jika ini kesalahan, hubungi administrator.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>