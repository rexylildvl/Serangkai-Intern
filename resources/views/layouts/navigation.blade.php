<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-[#4B6043] to-[#73815D] shadow-lg py-3">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Kiri: Logo dan Navigasi -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('beranda') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo-ts.png') }}" alt="Logo" class="h-11 w-auto drop-shadow-lg transition-transform group-hover:scale-105">
                    <span class="text-xl font-extrabold text-white tracking-wide leading-tight drop-shadow-sm">
                        Magang<br>
                        Tiga Serangkai
                    </span>
                </a>

                <!-- Navigasi Desktop -->
                <div class="hidden sm:flex space-x-8 ms-10 text-white text-base font-semibold">
                    <x-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')" class="nav-link">
                        {{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link :href="route('coe.index')" :active="request()->routeIs('coe.index')" class="nav-link">
                        {{ __('Center of Excellence') }}
                    </x-nav-link>
                    <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')" class="nav-link">
                        {{ __('Berita') }}
                    </x-nav-link>
                    <x-nav-link :href="route('lowongan.index')" :active="request()->routeIs('lowongan.index')" class="nav-link">
                        {{ __('Lowongan Magang') }}
                    </x-nav-link>
                    <x-nav-link :href="route('galeri.index')" :active="request()->routeIs('galeri.index')" class="nav-link">
                        {{ __('Galeri') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Kanan: Login / User -->
            <div class="hidden sm:flex items-center space-x-4">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="bg-yellow-300 text-black px-4 py-2 rounded-full font-semibold shadow hover:bg-yellow-400 transition">
                            Dashboard Admin
                        </a>
                    @endif
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="bg-white text-[#4B6043] px-5 py-2 rounded-full shadow font-semibold hover:bg-[#F7E06B] hover:text-[#4B6043] transition">
                        Login
                    </a>
                @endguest

                @auth
                    <div class="dropdown relative">
                        <button class="dropdown-toggle flex items-center space-x-2 bg-white text-gray-700 px-3 py-2 rounded-full shadow hover:bg-gray-100 transition">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar" class="w-8 h-8 rounded-full border-2 border-[#4B6043] shadow">
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 
                                10.586l3.293-3.293a1 1 0 
                                111.414 1.414l-4 4a1 1 0 
                                01-1.414 0l-4-4a1 1 0 
                                010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 hidden">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                {{ __('Profile') }}
                            </a>
                            <a href="{{ route('pendaftaran.histori') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                {{ __('Riwayat Pendaftaran') }}
                            </a>
                            <a href="{{ route('logbooks.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                {{ __('Logbook') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Hamburger Icon -->
            <div class="sm:hidden">
                <button id="mobile-menu-button" class="p-2 rounded-md text-white hover:bg-white hover:text-[#4B6043] transition focus:outline-none">
                    <svg id="menu-icon" class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="h-7 w-7 hidden" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden sm:hidden bg-[#73815D] text-white px-4 pb-6 pt-4 space-y-1 shadow-lg rounded-b-lg">
        <x-responsive-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')">
            {{ __('Beranda') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('coe.index')" :active="request()->routeIs('coe.index')">
            {{ __('Center of Excellence') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
            {{ __('Berita') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('lowongan.index')" :active="request()->routeIs('lowongan.index')">
            {{ __('Lowongan Magang') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('galeri.index')" :active="request()->routeIs('galeri.index')">
            {{ __('Galeri') }}
        </x-responsive-nav-link>

        <div class="border-t border-white/30 pt-4 mt-2">
            @guest
                <a href="{{ route('login') }}" class="block text-white font-semibold hover:text-[#F7E06B]">
                    Login
                </a>
            @endguest

            @auth
                <div class="font-medium text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-200 mb-2">{{ Auth::user()->email }}</div>

                @if(Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')">
                        {{ __('Dashboard Admin') }}
                    </x-responsive-nav-link>
                @endif

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pendaftaran.histori')">
                    {{ __('Riwayat Pendaftaran') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('logbooks.index')">
                    {{ __('Logbook') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            @endauth
        </div>
    </div>

    <style>
        .nav-link {
            @apply hover:underline hover:underline-offset-8 hover:decoration-[#F7E06B] hover:text-[#F7E06B] transition;
        }
        .nav-link.border-b-4 {
            border-color: #F7E06B !important;
            color: #F7E06B !important;
        }
        
        /* Style untuk dropdown */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        
        // Toggle mobile menu
        mobileMenuButton.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.toggle('hidden');
            
            if (isOpen) {
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            } else {
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }
        });
        
        // Dropdown functionality
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('hidden');
            });
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });
    });
</script>