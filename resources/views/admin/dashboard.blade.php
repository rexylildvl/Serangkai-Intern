@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Selamat Datang, Admin!</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Total Peserta</h2>
        <p class="text-2xl mt-2">123 orang</p>
        <p class="text-sm">Jumlah peserta yang telah terdaftar.</p>
    </div>

    <div class="bg-green-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Berita</h2>
        <p class="text-2xl mt-2">5 berita</p>
        <p class="text-sm">Jumlah berita yang telah dipublikasikan.</p>
    </div>

    <div class="bg-cyan-500 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Galeri</h2>
        <p class="text-2xl mt-2">12 foto</p>
        <p class="text-sm">Jumlah gambar di galeri.</p>
    </div>
</div>
@endsection
