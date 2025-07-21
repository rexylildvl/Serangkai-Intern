@extends('layouts.admin')

@section('title', 'Daftar Banner')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Banner</h2>
        <a href="{{ route('admin.banner.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Tambah Banner
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @foreach ($banners as $banner)
        <div class="flex items-center justify-between p-4 border rounded">
            <div class="flex items-center gap-4">
                {{-- Checkbox Aktif --}}
                <form action="{{ route('admin.banner.toggle', $banner->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label class="relative inline-flex items-center cursor-pointer mr-3">
                        <input type="checkbox" name="is_active" onchange="this.form.submit()" class="sr-only peer" {{ $banner->is_active ? 'checked' : '' }}>
                        <div class="w-9 h-5 bg-gray-300 rounded-full peer peer-checked:bg-green-500 transition-all duration-300"></div>
                        <div class="absolute left-0.5 top-0.5 bg-white w-5 h-5 rounded-full shadow-md transform peer-checked:translate-x-full transition-all duration-300"></div>
                    </label>
                </form>

                {{-- Gambar dan Judul --}}
                <img src="{{ asset('storage/' . $banner->gambar) }}" alt="{{ $banner->judul }}" class="h-16 w-28 object-cover rounded">
                <div>
                    <div class="font-semibold text-gray-800">{{ $banner->judul }}</div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex gap-2">
                <form action="{{ route('admin.banner.edit', $banner->id) }}" method="GET">
                    <button type="submit" class="text-sm px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition">
                        Edit
                    </button>
                </form>
                <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600 transition">
                        Hapus
                    </button>
                </form>
            </div>

        </div>
    @endforeach

    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-active').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const id = this.dataset.id;
                fetch(`/admin/banner/${id}/toggle-active`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                })
                .then(res => res.json())
                .then(data => {
                    if (!data.success) {
                        alert('Gagal memperbarui status banner');
                    }
                })
                .catch(err => {
                    alert('Terjadi kesalahan');
                    this.checked = !this.checked; // Balikkan checkbox kalau gagal
                });
            });
        });
    });
</script>

