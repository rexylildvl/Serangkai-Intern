<x-app-layout>
    <div class="min-h-screen flex items-center justify-center relative bg-cover bg-center bg-no-repeat min-h-screen py-20" 
        style="background-image: url('/images/gelap.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <!-- Professional gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">

        <!-- Konten utama -->
        <div class="relative z-10 max-w-md mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 mb-4 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                                <path d="M12 7c-.55 0-1 .45-1 1v5c0 .55.45 1 1 1s1-.45 1-1V8c0-.55-.45-1-1-1zm-1 9c0 .55.45 1 1 1s1-.45 1-1-.45-1-1-1-1 .45-1 1z"/>
                            </svg>
                        </div>
                        
                        <h2 class="text-xl font-bold mb-3 text-gray-800">Akses Dibatasi</h2>
                        
                        <p class="text-sm text-gray-600 mb-6">
                            Anda harus terdaftar dalam Program Magang Mahasiswa Profesional di PT Tiga Serangkai untuk mengakses konten ini.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-3 w-full justify-center">
                            <a href="{{ route('beranda') }}" 
                               class="px-4 py-2 text-sm rounded-md font-medium bg-gray-800 text-white hover:bg-gray-700 transition-colors">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
</x-app-layout>
