<footer class="bg-gradient-to-r from-[#3B3B1A] via-[#626F47] to-[#3B3B1A] text-[#E7EFC7] shadow-lg pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
        <!-- Kolom 1: Logo + Deskripsi -->
        <div class="flex flex-col sm:flex-row md:flex-col lg:flex-row gap-4">
            <div class="flex-shrink-0">
                <img src="{{ asset('images/logo-ts.png') }}" alt="Logo" class="h-12 w-12 object-contain" />
            </div>
            <div>
                <h2 class="font-serif font-bold text-lg mb-3">Magang<br>Tiga Serangkai</h2>
                <p class="text-[#AEC8A4] leading-relaxed mb-4 text-sm">
                    Program ini dikelola langsung oleh unit Center of Excellent, yang berfokus pada pelatihan, pembelajaran,
                    dan peningkatan kompetensi mahasiswa melalui pengalaman kerja nyata di dunia industri.
                </p>
                <p class="flex items-start gap-2 text-[#E7EFC7] text-sm">
                    <i class="fas fa-map-marker-alt mt-0.5 w-4"></i>
                    <span>Jl. Prof. DR. Supomo No.23, Sriwedari, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57141</span>
                </p>
            </div>
        </div>

        <!-- Kolom 2: Navigasi -->
        <div class="mt-4 md:mt-0">
            <h2 class="font-serif font-bold text-lg mb-4">Navigasi</h2>
            <ul class="space-y-3">
                <li><a href="#" class="text-[#E7EFC7] hover:text-white hover:underline underline-offset-4 decoration-[#AEC8A4] transition-colors duration-300 text-sm">Panduan</a></li>
                <li><a href="{{ route('lowongan.index') }}" class="text-[#E7EFC7] hover:text-white hover:underline underline-offset-4 decoration-[#AEC8A4] transition-colors duration-300 text-sm">Lowongan Magang</a></li>
                <li><a href="#" class="text-[#E7EFC7] hover:text-white hover:underline underline-offset-4 decoration-[#AEC8A4] transition-colors duration-300 text-sm">Pusat Informasi</a></li>
                <li><a href="#" class="text-[#E7EFC7] hover:text-white hover:underline underline-offset-4 decoration-[#AEC8A4] transition-colors duration-300 text-sm">Tentang Kami</a></li>
                <li><a href="{{ route('galeri.index') }}" class="text-[#E7EFC7] hover:text-white hover:underline underline-offset-4 decoration-[#AEC8A4] transition-colors duration-300 text-sm">Galeri</a></li>
            </ul>
        </div>

        <!-- Kolom 3: Kontak -->
        <div class="mt-4 md:mt-0">
            <h2 class="font-serif font-bold text-lg mb-4">Kontak</h2>
            <div class="space-y-3 text-sm">
                <p class="flex items-start gap-2 text-[#E7EFC7]">
                    <i class="fas fa-phone-alt mt-0.5 w-4"></i>
                    <span><span class="font-semibold">Telepon</span>: (0271) 714344</span>
                </p>
                <p class="flex items-start gap-2 text-[#E7EFC7]">
                    <i class="fas fa-envelope mt-0.5 w-4"></i>
                    <span><span class="font-semibold">Email</span>: tsi-recruitment@tigaserangkai.co.id</span>
                </p>
            </div>
            
            <div class="flex space-x-4 mt-6">
                <a href="#" class="text-[#E7EFC7] hover:text-[#AEC8A4] transition-colors duration-300" aria-label="LinkedIn">
                    <i class="fab fa-linkedin fa-lg"></i>
                </a>
                <a href="#" class="text-[#E7EFC7] hover:text-[#AEC8A4] transition-colors duration-300" aria-label="Instagram">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
                <a href="#" class="text-[#E7EFC7] hover:text-[#AEC8A4] transition-colors duration-300" aria-label="Website">
                    <i class="fas fa-globe fa-lg"></i>
                </a>
                <a href="#" class="text-[#E7EFC7] hover:text-[#AEC8A4] transition-colors duration-300" aria-label="TikTok">
                    <i class="fab fa-tiktok fa-lg"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="text-center text-[#AEC8A4] text-xs mt-12 pt-4 border-t border-[#AEC8A4]/20">
        © 2025 PT Tiga Serangkai Pustaka Mandiri. All rights reserved.
    </div>
</footer>