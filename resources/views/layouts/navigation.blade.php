<nav x-data="{ open: false }" class="bg-gradient-to-r from-[#4B6043] to-[#73815D] shadow-lg py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-15">
            <!-- Kiri: Logo dan Navigasi -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('beranda') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo-ts.png') }}" alt="Logo" class="h-11 w-auto">
                    <span class="text-2xl font-bold text-white tracking-wide">Serangkai Intern</span>
                </a>

                <!-- Navigasi -->
                <div class="hidden sm:flex space-x-6 ms-10 text-white text-[16px] font-medium">
                    <x-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')" class="hover:underline hover:underline-offset-8 hover:decoration-white hover:text-white"
                        :class="request()->routeIs('beranda') ? 'border-b-4 border-white pb-1' : ''">
                        {{ __('Beranda') }}
                    </x-nav-link>

                    <x-nav-link :href="route('beranda')" :active="request()->routeIs('coe')" class="hover:underline hover:underline-offset-8 hover:decoration-white hover:text-white"
                        :class="request()->routeIs('coe') ? 'border-b-4 border-white pb-1' : ''">
                        {{ __('Center of Excellence') }}
                    </x-nav-link>

                    <x-nav-link :href="route('berita')" :active="request()->routeIs('berita')" class="hover:underline hover:underline-offset-8 hover:decoration-white hover:text-white"
                        :class="request()->routeIs('berita') ? 'border-b-4 border-white pb-1' : ''">
                        {{ __('Berita') }}
                    </x-nav-link>

                    <x-nav-link :href="route('beranda')" :active="request()->routeIs('magang')" class="hover:underline hover:underline-offset-8 hover:decoration-white hover:text-white"
                        :class="request()->routeIs('magang') ? 'border-b-4 border-white pb-1' : ''">
                        {{ __('Lowongan Magang') }}
                    </x-nav-link>

                    <x-nav-link :href="route('galeri')" :active="request()->routeIs('galeri')" class="hover:underline hover:underline-offset-8 hover:decoration-white hover:text-white"
                        :class="request()->routeIs('galeri') ? 'border-b-4 border-white pb-1' : ''">
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
                    <a href="{{ route('login') }}" class="bg-white text-[#4B6043] px-4 py-2 rounded-full shadow hover:bg-gray-100 font-semibold transition">
                        Login
                    </a>
                @endguest

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center space-x-2 bg-white text-gray-700 px-3 py-2 rounded-full shadow hover:bg-gray-100 transition">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar" class="w-8 h-8 rounded-full">
                                <span class="font-semibold">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 
                                    10.586l3.293-3.293a1 1 0 
                                    111.414 1.414l-4 4a1 1 0 
                                    01-1.414 0l-4-4a1 1 0 
                                    010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <!-- Hamburger Icon -->
            <div class="sm:hidden">
                <button @click="open = !open" class="p-2 rounded-md text-white hover:bg-white hover:text-[#4B6043] transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-[#73815D] text-white px-4 pb-6 pt-4 space-y-1">
        <x-responsive-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')">
            {{ __('Beranda') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('beranda')" :active="request()->routeIs('coe')">
            {{ __('Center of Excellence') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('berita')" :active="request()->routeIs('berita')">
            {{ __('Berita') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('beranda')" :active="request()->routeIs('magang')">
            {{ __('Lowongan Magang') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('galeri')" :active="request()->routeIs('galeri')">
            {{ __('Galeri') }}
        </x-responsive-nav-link>

        <div class="border-t border-white/30 pt-4">
            @guest
                <a href="{{ route('login') }}" class="block text-white font-semibold">
                    Login
                </a>
            @endguest

            @auth
                <div class="font-medium text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-200">{{ Auth::user()->email }}</div>

                @if(Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')">
                        {{ __('Dashboard Admin') }}
                    </x-responsive-nav-link>
                @endif

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
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
</nav>
