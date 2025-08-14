@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    {{-- Header Welcome --}}
    <div class="bg-gradient-to-r from-[#7a885d] to-[#3B3B1A] text-white rounded-xl px-8 py-6 shadow-lg mb-8">
        <div class="flex items-center">
            <div class="mr-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold">
                    Selamat Datang, {{ auth()->user()->name }}!
                </h1>
                <p class="text-sm md:text-base mt-1 opacity-90">Anda sedang berada di dashboard admin Magang TigaSerangkai.</p>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="flex flex-wrap gap-4 mb-8">
        <a href="{{ route('admin.lowongan.create') }}" 
            class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-[#7a885d] to-[#3B3B1A] hover:from-[#678a5c] hover:to-[#7aa06e] text-white text-sm font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Lowongan
        </a>
        <a href="{{ route('admin.berita.create') }}"
            class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-[#b4c486] to-[#c5d197] hover:from-[#9bad70] hover:to-[#b4c486] text-white text-sm font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Berita
        </a>
    </div>

    {{-- Info Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        {{-- Total Peserta --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-l-4 border-[#5d6f55]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600 uppercase tracking-wider">Total Peserta</h3>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalPendaftar }} <span class="text-lg">orang</span></p>
                    <p class="text-xs text-gray-500 mt-2">Jumlah peserta terdaftar</p>
                </div>
                <div class="bg-[#f0f7ed] text-[#5d6f55] p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Berita --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-l-4 border-[#c27a38]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600 uppercase tracking-wider">Total Berita</h3>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalBerita }} <span class="text-lg">berita</span></p>
                    <p class="text-xs text-gray-500 mt-2">Berita yang dipublikasikan</p>
                </div>
                <div class="bg-[#fdf6ef] text-[#c27a38] p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Galeri --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-l-4 border-[#419187]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600 uppercase tracking-wider">Total Galeri</h3>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalGaleri }} <span class="text-lg">foto</span></p>
                    <p class="text-xs text-gray-500 mt-2">Gambar di galeri</p>
                </div>
                <div class="bg-[#f0f9f7] text-[#419187] p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Lowongan --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-l-4 border-[#b8860b]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600 uppercase tracking-wider">Total Lowongan</h3>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalLowongan }} <span class="text-lg">posisi</span></p>
                    <p class="text-xs text-gray-500 mt-2">Lowongan tersedia</p>
                </div>
                <div class="bg-[#fff9e6] text-[#b8860b] p-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Section --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 mt-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Statistik Pendaftar Setiap Divisi</h3>
            <div class="flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                Data Terkini
            </div>
        </div>
        <canvas id="pendaftarChart" height="120"></canvas>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode(array_keys($statistikBidang)) !!};
    const data = {!! json_encode(array_values($statistikBidang)) !!};

    const ctx = document.getElementById('pendaftarChart').getContext('2d');
    const pendaftarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pendaftar',
                data: data,
                backgroundColor: 'rgba(122, 160, 110, 0.7)',
                borderColor: 'rgba(122, 160, 110, 1)',
                borderWidth: 1,
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#5d6f55',
                    titleFont: {
                        weight: 'bold'
                    },
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' pendaftar';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush
