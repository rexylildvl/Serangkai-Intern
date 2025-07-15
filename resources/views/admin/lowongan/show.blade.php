@extends('layouts.admin')

@section('title', 'Detail Lowongan')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Detail Lowongan</h2>

        <div class="space-y-4 text-sm text-gray-700">
            <div>
                <strong>Judul:</strong> {{ $lowongan->judul }}
            </div>

            <div>
                <strong>Divisi:</strong> {{ $lowongan->divisi }}
            </div>

            <div>
                <strong>Lokasi:</strong> {{ $lowongan->lokasi }}
            </div>

            <div>
                <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($lowongan->deadline)->format('d M Y') }}
            </div>

            @if($lowongan->durasi)
                <div>
                    <strong>Durasi:</strong> {{ $lowongan->durasi }}
                </div>
            @endif

            @if($lowongan->pendidikan)
                <div>
                    <strong>Pendidikan:</strong> {{ $lowongan->pendidikan }}
                </div>
            @endif

            @if($lowongan->kualifikasi)
                <div>
                    <strong>Kualifikasi:</strong>
                    <ul class="list-disc ml-6 mt-1">
                        @foreach($lowongan->kualifikasi as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($lowongan->persyaratan_dokumen)
                <div>
                    <strong>Persyaratan Dokumen:</strong>
                    <ul class="list-disc ml-6 mt-1">
                        @foreach($lowongan->persyaratan_dokumen as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($lowongan->skill)
                <div>
                    <strong>Skill:</strong>
                    <ul class="list-disc ml-6 mt-1">
                        @foreach($lowongan->skill as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($lowongan->tanggung_jawab)
                <div>
                    <strong>Tanggung Jawab:</strong>
                    <ul class="list-disc ml-6 mt-1">
                        @foreach($lowongan->tanggung_jawab as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($lowongan->benefit)
                <div>
                    <strong>Benefit:</strong>
                    <ul class="list-disc ml-6 mt-1">
                        @foreach($lowongan->benefit as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($lowongan->deskripsi)
                <div>
                    <strong>Deskripsi:</strong>
                    <p class="mt-1">{{ $lowongan->deskripsi }}</p>
                </div>
            @endif
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}"
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            <a href="{{ route('admin.lowongan') }}"
               class="text-sm text-gray-600 hover:underline self-center">← Kembali</a>
        </div>
    </div>
@endsection
