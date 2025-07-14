@extends('layouts.admin')

@section('title', 'Data Lowongan')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Data Lowongan</h1>
    <a href="{{ route('admin.lowongan.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
        + Tambah Lowongan
    </a>
</div>

<!-- Tabel Data Lowongan -->
<div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-6 py-4">#</th>
                <th class="px-6 py-4">Judul</th>
                <th class="px-6 py-4">Departemen</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Contoh Data Dummy --}}
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">Web Developer Intern</td>
                <td class="px-6 py-4">IT Department</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">Aktif</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <a href="#" class="text-blue-500 hover:underline text-sm">Edit</a>
                        <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            {{-- Tambahkan data dinamis dari controller di sini --}}
        </tbody>
    </table>
</div>
@endsection
