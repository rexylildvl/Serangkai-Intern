<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-[#3B3B1A] via-[#626F47] to-[#3B3B1A] backdrop-blur-lg border-b border-[#AEC8A4]/20 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('beranda') }}" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#AEC8A4]/30 to-[#8A784E]/30 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                        <img src="{{ asset('images/logo-ts.png') }}" alt="Logo" class="relative h-10 w-auto drop-shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:drop-shadow-2xl">
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-lg font-bold text-[#E7EFC7] tracking-wide leading-tight drop-shadow-sm group-hover:text-[#AEC8A4] transition-colors duration-300">
                            Magang<br>
                            <span class="text-sm font-medium text-[#AEC8A4] group-hover:text-[#E7EFC7]">Tiga Serangkai</span>
                        </span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation - Hidden on mobile/tablet -->
            <div class="hidden lg:flex items-center space-x-1">
                <x-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-[#E7EFC7] hover:text-white hover:bg-[#3B3B1A]/80 transition-all duration-300">
                    {{ __('Beranda') }}
                </x-nav-link>
                <x-nav-link :href="route('coe.index')" :active="request()->routeIs('coe.index')" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-[#E7EFC7] hover:text-white hover:bg-[#3B3B1A]/80 transition-all duration-300">
                    {{ __('Center of Excellence') }}
                </x-nav-link>
                <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-[#E7EFC7] hover:text-white hover:bg-[#3B3B1A]/80 transition-all duration-300">
                    {{ __('Berita') }}
                </x-nav-link>
                <x-nav-link :href="route('lowongan.index')" :active="request()->routeIs('lowongan.index')" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-[#E7EFC7] hover:text-white hover:bg-[#3B3B1A]/80 transition-all duration-300">
                    {{ __('Lowongan Magang') }}
                </x-nav-link>
                <x-nav-link :href="route('galeri.index')" :active="request()->routeIs('galeri.index')" class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-[#E7EFC7] hover:text-white hover:bg-[#3B3B1A]/80 transition-all duration-300">
                    {{ __('Galeri') }}
                </x-nav-link>
            </div>

            <!-- Right Section - User/Login + Mobile Menu -->
            <div class="flex items-center space-x-3">
                <!-- Desktop User Section -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-[#3B3B1A] px-4 py-2 rounded-lg font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                            Dashboard Admin
                        </a>
                        @endif
                    @endauth
                    
                    @guest
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-[#AEC8A4] to-[#8A784E] text-[#3B3B1A] px-5 py-2 rounded-lg shadow-lg font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                            Login
                        </a>
                    @endguest

                    @auth
                        <div class="dropdown relative">
                            <button class="dropdown-toggle flex items-center space-x-2 bg-[#3B3B1A]/80 backdrop-blur-md text-[#E7EFC7] px-3 py-2 rounded-lg shadow-lg hover:bg-[#3B3B1A] transition-all duration-300 border border-[#AEC8A4]/20">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=AEC8A4&color=3B3B1A" alt="Avatar" class="w-7 h-7 rounded-full border-2 border-[#E7EFC7] shadow-md">
                                <span class="font-medium text-sm hidden xl:block">{{ Str::limit(Auth::user()->name, 15) }}</span>
                                <svg class="w-4 h-4 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu absolute right-0 mt-2 w-56 bg-[#3B3B1A]/95 backdrop-blur-lg rounded-xl shadow-2xl z-50 hidden border border-[#AEC8A4]/20 overflow-hidden">
                                <div class="p-4 bg-gradient-to-r from-[#AEC8A4]/10 to-[#8A784E]/10 border-b border-[#AEC8A4]/20">
                                    <div class="font-semibold text-[#E7EFC7] text-sm">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-[#AEC8A4]">{{ Auth::user()->email }}</div>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-[#E7EFC7] hover:bg-[#626F47]/50 transition-colors duration-200 text-sm">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ __('Profile') }}
                                </a>
                                <a href="{{ route('pendaftaran.histori') }}" class="block px-4 py-3 text-[#E7EFC7] hover:bg-[#626F47]/50 transition-colors duration-200 text-sm">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    {{ __('Riwayat Pendaftaran') }}
                                </a>
                                <a href="{{ route('logbooks.index') }}" class="block px-4 py-3 text-[#E7EFC7] hover:bg-[#626F47]/50 transition-colors duration-200 text-sm">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    {{ __('Logbook') }}
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-3 text-[#E7EFC7] hover:bg-[#8A784E]/50 transition-colors duration-200 border-t border-[#AEC8A4]/20 text-sm">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg text-[#E7EFC7] hover:bg-[#3B3B1A]/80 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#AEC8A4] focus:ring-offset-2 focus:ring-offset-[#626F47]">
                    <svg id="menu-icon" class="h-6 w-6 transition-transform duration-300" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="h-6 w-6 hidden transition-transform duration-300" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Mobile Navigation -->
    <div id="mobile-menu" class="hidden lg:hidden bg-[#3B3B1A]/95 backdrop-blur-lg border-t border-[#AEC8A4]/20 shadow-2xl overflow-y-auto" style="max-height: 80vh;">
        <div class="px-4 py-6 space-y-1">
            <!-- Navigation Links -->
            <div class="space-y-1 mb-6">
                <x-responsive-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                    <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    {{ __('Beranda') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('coe.index')" :active="request()->routeIs('coe.index')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                    <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    {{ __('Center of Excellence') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                    <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    {{ __('Berita') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('lowongan.index')" :active="request()->routeIs('lowongan.index')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                    <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 00-2 2H10a2 2 0 00-2-2V6m8 0h2a2 2 0 012 2v6.14l-2.24-2.24a2 2 0 00-2.83 0L15 15h-3V9a2 2 0 00-2-2H8a2 2 0 00-2 2v6l3-3h4v4z"/>
                    </svg>
                    {{ __('Lowongan Magang') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('galeri.index')" :active="request()->routeIs('galeri.index')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                    <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ __('Galeri') }}
                </x-responsive-nav-link>
            </div>

            <!-- User Section -->
            <div class="border-t border-[#AEC8A4]/20 pt-6">
                @guest
                    <a href="{{ route('login') }}" class="block w-full text-center bg-gradient-to-r from-[#AEC8A4] to-[#8A784E] text-[#3B3B1A] font-semibold py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Login
                    </a>
                @endguest

                @auth
                    <!-- User Info -->
                    <div class="bg-[#3B3B1A]/80 backdrop-blur-md rounded-lg p-4 mb-4 border border-[#AEC8A4]/20">
                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=AEC8A4&color=3B3B1A" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-[#E7EFC7] shadow-md">
                            <div>
                                <div class="font-semibold text-[#E7EFC7] text-sm">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-[#AEC8A4]">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Dashboard Button -->
                    @if(Auth::user()->role === 'admin')
                        <x-responsive-nav-link :href="route('admin.dashboard')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium mb-2 bg-gradient-to-r from-[#8A784E]/20 to-[#626F47]/20 border border-[#8A784E]/30">
                            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            {{ __('Dashboard Admin') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- User Menu Items -->
                    <div class="space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('pendaftaran.histori')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            {{ __('Riwayat Pendaftaran') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('logbooks.index')" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#626F47]/50 transition-all duration-300 font-medium">
                            <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            {{ __('Logbook') }}
                        </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-3 rounded-lg text-[#E7EFC7] hover:bg-[#8A784E]/50 transition-all duration-300 font-medium border-t border-[#AEC8A4]/20 mt-2 pt-4">
                                <svg class="w-5 h-5 inline mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Enhanced Styles -->
    <style>
        /* Active navigation link styles */
        .nav-link.active {
            background: rgba(174, 200, 164, 0.2) !important;
            color: #E7EFC7 !important;
            border: 1px solid rgba(174, 200, 164, 0.3) !important;
        }

        /* Dropdown hover effect */
        .dropdown:hover .dropdown-menu {
            display: block;
            animation: dropdownFadeIn 0.2s ease-out;
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile menu animation */
        #mobile-menu {
            transition: all 0.3s ease-in-out;
            overflow-y: auto; 
            -webkit-overflow-scrolling: touch; 
        }
        .mobile-menu-open {
        overflow: hidden;
        position: fixed;
        width: 100%;
        }

        #mobile-menu.show {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Logo animation */
        @keyframes logoGlow {
            0%, 100% { 
                filter: drop-shadow(0 0 5px rgba(174, 200, 164, 0.3));
            }
            50% { 
                filter: drop-shadow(0 0 20px rgba(174, 200, 164, 0.6));
            }
        }

        .logo-glow {
            animation: logoGlow 3s ease-in-out infinite;
        }

        /* Responsive text scaling */
        @media (max-width: 640px) {
            .navbar-brand-text {
                font-size: 0.875rem;
                line-height: 1.2;
            }
        }

        /* Enhanced focus styles */
        button:focus, a:focus {
            outline: 2px solid rgba(174, 200, 164, 0.5);
            outline-offset: 2px;
            border-radius: 8px;
        }

        /* Smooth transitions for all interactive elements */
        .nav-link, .dropdown-toggle, #mobile-menu-button, .dropdown-menu a {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Mobile breakpoint adjustments */
        @media (max-width: 1024px) {
            .navbar-hide-lg {
                display: none !important;
            }
        }

        @media (max-width: 768px) {
            .navbar-brand-text br {
                display: none;
            }
            .navbar-brand-text {
                white-space: nowrap;
            }
        }
    </style>
</nav>

<!-- Enhanced JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        
        // Toggle mobile menu with animation
mobileMenuButton.addEventListener('click', function() {
    const isHidden = mobileMenu.classList.contains('hidden');
    
    if (isHidden) {
        mobileMenu.classList.remove('hidden');
        menuIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        document.body.classList.add('mobile-menu-open'); // Gunakan class instead of inline style
    } else {
        mobileMenu.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        document.body.classList.remove('mobile-menu-open');
    }
});
        
        // Enhanced dropdown functionality
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const dropdownMenu = this.nextElementSibling;
                const isHidden = dropdownMenu.classList.contains('hidden');
                
                // Close all other dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) {
                        menu.classList.add('hidden');
                    }
                });
                
                // Toggle current dropdown
                if (isHidden) {
                    dropdownMenu.classList.remove('hidden');
                    // Rotate arrow icon
                    const arrow = this.querySelector('svg');
                    if (arrow) arrow.style.transform = 'rotate(180deg)';
                } else {
                    dropdownMenu.classList.add('hidden');
                    // Reset arrow icon
                    const arrow = this.querySelector('svg');
                    if (arrow) arrow.style.transform = 'rotate(0deg)';
                }
            });
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
                // Reset all arrow icons
                document.querySelectorAll('.dropdown-toggle svg').forEach(arrow => {
                    arrow.style.transform = 'rotate(0deg)';
                });
            }
        });
        
        // Close mobile menu when clicking on a link
        const mobileNavLinks = document.querySelectorAll('#mobile-menu a');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('show');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.style.overflow = '';
            });
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                // Close mobile menu on desktop
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('show');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
        
        // Keyboard navigation support
        document.addEventListener('keydown', function(e) {
            // Close dropdowns and mobile menu with Escape key
            if (e.key === 'Escape') {
                // Close dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
                document.querySelectorAll('.dropdown-toggle svg').forEach(arrow => {
                    arrow.style.transform = 'rotate(0deg)';
                });
                
                // Close mobile menu
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('show');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            }
        });
        
        // Add scroll effect to navbar
        let lastScrollTop = 0;
        const navbar = document.querySelector('nav');
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Add/remove backdrop blur based on scroll position
            if (scrollTop > 50) {
                navbar.classList.add('scrolled');
                navbar.style.backdropFilter = 'blur(20px)';
                navbar.style.background = 'linear-gradient(to right, rgba(59, 59, 26, 0.95), rgba(98, 111, 71, 0.95), rgba(59, 59, 26, 0.95))';
            } else {
                navbar.classList.remove('scrolled');
                navbar.style.backdropFilter = 'blur(16px)';
                navbar.style.background = 'linear-gradient(to right, rgb(59, 59, 26), rgb(98, 111, 71), rgb(59, 59, 26))';
            }
            
            lastScrollTop = scrollTop;
        });
        
        // Add loading animation to logo
        const logo = document.querySelector('nav img[alt="Logo"]');
        if (logo) {
            logo.addEventListener('load', function() {
                this.classList.add('logo-glow');
            });
        }
        
        // Touch/swipe support for mobile menu
        let touchStartY = 0;
        let touchEndY = 0;
        
        mobileMenu.addEventListener('touchstart', function(e) {
            touchStartY = e.changedTouches[0].screenY;
        });
        
        mobileMenu.addEventListener('touchend', function(e) {
            touchEndY = e.changedTouches[0].screenY;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartY - touchEndY;
            
            // Swipe up to close menu
            if (diff > swipeThreshold) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('show');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }
        
        // Initialize active link highlighting
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href && (currentPath === href || currentPath.startsWith(href + '/'))) {
                link.classList.add('active');
            }
        });
        
        // Add smooth hover effects
        const hoverElements = document.querySelectorAll('.nav-link, .dropdown-toggle, button');
        hoverElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            element.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Performance optimization: throttle scroll events
        let ticking = false;
        
        function updateNavbarOnScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            ticking = false;
        }
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(updateNavbarOnScroll);
                ticking = true;
            }
        });
    });
</script>