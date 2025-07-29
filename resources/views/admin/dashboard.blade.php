@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    {{-- Header Welcome --}}
    <div class="bg-[#5d6f55] text-white rounded-xl px-8 py-6 shadow mb-6">
        <h1 class="text-2xl md:text-3xl font-extrabold">
            Selamat Datang, {{ auth()->user()->name }}!
        </h1>
        <p class="text-sm md:text-base mt-1">Anda sedang berada di dashboard admin Magang TigaSerangkai.</p>
    </div>

    {{-- Quick Actions --}}
    <div class="flex flex-wrap gap-4 mb-6">
        <a href="{{ route('admin.lowongan.create') }}"
            class="inline-flex items-center px-4 py-2 bg-[#7aa06e] hover:bg-[#678a5c] text-white text-sm font-semibold rounded-lg shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Lowongan
        </a>
        <a href="{{ route('admin.berita.create') }}"
            class="inline-flex items-center px-4 py-2 bg-[#b4c486] hover:bg-[#9bad70] text-white text-sm font-semibold rounded-lg shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Berita
        </a>
    </div>

    {{-- Info Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        {{-- Total Peserta --}}
        <div class="bg-[#f5f7e8] p-6 rounded-xl shadow border border-[#dfe7c5]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600">Total Peserta</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalPendaftar }} orang</p>
                    <p class="text-sm text-gray-500">Jumlah peserta yang telah terdaftar</p>
                </div>
                <div class="bg-[#d9ead3] text-[#5d6f55] p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M9 21V3m6 18V3" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Berita --}}
        <div class="bg-[#f5f7e8] p-6 rounded-xl shadow border border-[#dfe7c5]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600">Total Berita</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalBerita }} berita</p>
                    <p class="text-sm text-gray-500">Jumlah berita yang dipublikasikan</p>
                </div>
                <div class="bg-[#f9e7cf] text-[#c27a38] p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Galeri --}}
        <div class="bg-[#f5f7e8] p-6 rounded-xl shadow border border-[#dfe7c5]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600">Total Galeri</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalGaleri }} foto</p>
                    <p class="text-sm text-gray-500">Jumlah gambar di galeri</p>
                </div>
                <div class="bg-[#e6f4f1] text-[#419187] p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Lowongan --}}
        <div class="bg-[#f5f7e8] p-6 rounded-xl shadow border border-[#dfe7c5]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm text-gray-600">Total Lowongan</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalLowongan }} posisi</p>
                    <p class="text-sm text-gray-500">Jumlah lowongan tersedia</p>
                </div>
                <div class="bg-[#fff3cd] text-[#b8860b] p-2 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m2 4H7m2-8h6m5-4v16H4V4h16z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Section --}}
    <div class="bg-white p-6 rounded-xl shadow border border-gray-200 mt-10">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Pendaftar Setiap Divisi</h3>
        <canvas id="pendaftarChart" height="100"></canvas>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode(array_keys($statistikBidang)) !!};
    const data = {!! json_encode(array_values($statistikBidang)) !!};

    const ctx = document.getElementById('pendaftarChart').getContext('2d');
    const pendaftarChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendaftar',
                data: data,
                backgroundColor: 'rgba(122, 160, 110, 0.2)',
                borderColor: 'rgba(122, 160, 110, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush
