@extends('layouts.admin')

@section('title', 'Edit Lowongan')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-gray-700">Edit Lowongan</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.lowongan.update', $lowongan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $lowongan->judul) }}" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600">Divisi</label>
                    <input type="text" name="divisi" value="{{ old('divisi', $lowongan->divisi) }}" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $lowongan->lokasi) }}" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600">Deadline</label>
                    <input type="date" name="deadline" value="{{ old('deadline', $lowongan->deadline) }}" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600">Durasi</label>
                    <input type="text" name="durasi" value="{{ old('durasi', $lowongan->durasi) }}" class="w-full mt-1 p-2 border rounded">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600">Pendidikan</label>
                    <input type="text" name="pendidikan" value="{{ old('pendidikan', $lowongan->pendidikan) }}" class="w-full mt-1 p-2 border rounded">
                </div>
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full mt-1 p-2 border rounded">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
        </div>

        @php
            $fields = [
                'kualifikasi' => 'Kualifikasi',
                'persyaratan_dokumen' => 'Persyaratan Dokumen',
                'skill' => 'Skill',
                'tanggung_jawab' => 'Tanggung Jawab',
                'benefit' => 'Benefit',
            ];
        @endphp

        @foreach ($fields as $field => $label)
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-600">{{ $label }}</label>
                <div id="{{ $field }}-wrapper" class="space-y-2 mt-2">
                    @php
                        $items = old($field, $lowongan->$field ?? []);
                        if (!is_array($items)) $items = [];
                    @endphp
                    @forelse ($items as $item)
                        <div class="flex gap-2">
                            <input type="text" name="{{ $field }}[]" value="{{ $item }}" class="form-input w-full" />
                            <button type="button" onclick="hapusField(this)" class="text-red-500">✕</button>
                        </div>
                    @empty
                        <div class="flex gap-2">
                            <input type="text" name="{{ $field }}[]" class="form-input w-full" />
                            <button type="button" onclick="hapusField(this)" class="text-red-500">✕</button>
                        </div>
                    @endforelse
                </div>
                <button type="button" onclick="tambahField('{{ $field }}-wrapper', '{{ $field }}[]')"
                        class="mt-2 text-sm text-blue-600 hover:underline">
                    + Tambah {{ $label }}
                </button>
            </div>
        @endforeach

        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.lowongan') }}"
               class="ml-2 text-sm text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>

{{-- SCRIPT --}}
<script>
    function tambahField(wrapperId, inputName) {
        const wrapper = document.getElementById(wrapperId);
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="${inputName}" class="form-input w-full" />
            <button type="button" onclick="hapusField(this)" class="text-red-500">✕</button>
        `;
        wrapper.appendChild(div);
    }

    function hapusField(button) {
        button.parentElement.remove();
    }
</script>
@endsection
