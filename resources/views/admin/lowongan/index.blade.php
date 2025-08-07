@extends('layouts.admin')

@section('title', 'Daftar Lowongan Magang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manajemen Lowongan Magang</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola daftar lowongan magang yang tersedia</p>
        </div>
        <a href="{{ route('admin.lowongan.create') }}"
            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Lowongan
        </a>
    </div>

    @if($lowongans->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-100">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-3 text-lg font-medium text-gray-900">Belum ada lowongan</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan lowongan magang baru.</p>
            <div class="mt-6">
                <a href="{{ route('admin.lowongan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
                    Tambah Lowongan
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($lowongans as $lowongan)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-200 ease-in-out">
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-semibold tracking-wide uppercase bg-green-100 text-green-800">
                                {{ $lowongan->divisi }}
                            </span>
                            <span class="text-xs font-medium text-gray-500">
                                <svg class="w-4 h-4 inline mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $lowongan->lokasi }}
                            </span>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-gray-900 leading-tight mb-2 line-clamp-2">
                            {{ $lowongan->judul }}
                        </h3>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                {{ \Carbon\Carbon::parse($lowongan->deadline)->format('d M Y') }}
                            </div>
                            
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'Ditutup' : 'Buka' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-5 py-4 border-t border-gray-100">
                        <div class="flex flex-wrap justify-between items-center gap-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.lowongan.show', $lowongan->id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200">
                                    Detail
                                </a>
                                
                                <a href="{{ route('admin.pendaftar.byLowongan', $lowongan->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
                                    Pendaftar
                                </a>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" 
                                   class="p-1.5 text-gray-500 hover:text-yellow-600 rounded-full hover:bg-yellow-50 transition-colors duration-200" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                
                                <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 rounded-full hover:bg-red-50 transition-colors duration-200 delete-btn" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="mt-3 pt-3 border-t border-gray-200">
                            <form action="{{ route('admin.lowongan.toggle', $lowongan->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-gray-700">Status Lowongan:</span>
                                    <div class="flex items-center space-x-4">
                                        <label class="inline-flex items-center">
                                          <input type="radio" name="status" value="buka"
                                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300"
                                                {{ $lowongan->status === 'buka' && !\Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'checked' : '' }}
                                                data-deadline="{{ $lowongan->deadline }}"
                                                data-edit-url="{{ route('admin.lowongan.edit', $lowongan->id) }}"
                                                onchange="handleStatusChange(this)">
                                            <span class="ml-2 text-sm text-gray-700">Aktif</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                           <input type="radio" name="status" value="tutup"
                                                class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300"
                                                {{ $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <span class="ml-2 text-sm text-gray-700">Tutup</span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if(method_exists($lowongans, 'links'))
            <div class="mt-8">
                {{ $lowongans->links() }}
            </div>
        @endif
    @endif
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Enhanced Deadline Alert
    function handleStatusChange(radio) {
        const deadline = new Date(radio.dataset.deadline);
        const today = new Date();
        const editUrl = radio.dataset.editUrl;

        if (deadline < today) {
            Swal.fire({
                title: '<div class="text-2xl font-bold text-gray-800 mb-2">Lowongan Sudah Melewati Deadline</div>',
                html: `
                    <div class="text-left">
                        <p class="text-gray-600 mb-4">Lowongan ini sudah melewati tanggal deadline. Untuk membuka kembali, Anda perlu memperbarui deadline terlebih dahulu.</p>
                        
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg mb-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-medium text-green-800">Deadline: ${deadline.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' })}</span>
                            </div>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: '<div class="flex items-center justify-center"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Edit Deadline</div>',
                cancelButtonText: '<div class="flex items-center justify-center"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</div>',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-200 mr-3',
                    cancelButton: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-md transition duration-200'
                },
                showCloseButton: true,
                focusConfirm: false,
                backdrop: 'rgba(0,0,0,0.4)'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = editUrl;
                } else {
                    const form = radio.closest('form');
                    const radios = form.querySelectorAll('input[type=radio][name=status]');
                    radios.forEach(r => {
                        if (r.value === 'tutup') r.checked = true;
                    });
                }
            });
        } else {
            radio.closest('form').submit();
        }
    }

    // Enhanced Delete Confirmation
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            const lowonganTitle = this.closest('.bg-white').querySelector('h3').textContent;
            const lowonganDivisi = this.closest('.bg-white').querySelector('span.bg-green-100').textContent;
            const lowonganDeadline = this.closest('.bg-white').querySelector('div.flex.items-center.text-sm').textContent.trim();
            
            Swal.fire({
                title: '<div class="text-2xl font-bold text-red-600 mb-2">Konfirmasi Penghapusan</div>',
                html: `
                    <div class="text-left">
                        <p class="text-gray-600 mb-4">Anda akan menghapus lowongan ini secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
                        
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg mb-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <span class="font-medium text-red-700">Data yang dihapus tidak dapat dikembalikan</span>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h4 class="font-semibold text-gray-800 mb-2">Detail Lowongan:</h4>
                            <div class="space-y-1 text-sm">
                                <div class="flex">
                                    <span class="text-gray-500 w-24">Judul:</span>
                                    <span class="text-gray-800 font-medium">${lowonganTitle}</span>
                                </div>
                                <div class="flex">
                                    <span class="text-gray-500 w-24">Divisi:</span>
                                    <span class="text-gray-800 font-medium">${lowonganDivisi}</span>
                                </div>
                                <div class="flex">
                                    <span class="text-gray-500 w-24">Deadline:</span>
                                    <span class="text-gray-800 font-medium">${lowonganDeadline}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: '<div class="flex items-center justify-center"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> Ya, Hapus</div>',
                cancelButtonText: '<div class="flex items-center justify-center"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</div>',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-200 mr-3',
                    cancelButton: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-md transition duration-200'
                },
                showCloseButton: true,
                focusConfirm: false,
                backdrop: 'rgba(0,0,0,0.4)'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Enhanced Success Notification
    @if(session('success'))
        Swal.fire({
            title: '<div class="flex items-center justify-center"><svg class="w-8 h-8 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><span class="text-2xl font-bold text-green-600">Sukses!</span></div>',
            html: `
                <div class="text-center py-4">
                    <p class="text-gray-700 text-lg mb-6">${@json(session('success'))}</p>
                    <button class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition duration-200" onclick="Swal.close()">
                        OK
                    </button>
                </div>
            `,
            showConfirmButton: false,
            showCloseButton: true,
            backdrop: 'rgba(0,0,0,0.4)'
        });
    @endif
</script>

<style>
    .swal2-popup {
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        max-width: 500px;
    }
    
    .swal2-title {
        padding: 0;
        margin-bottom: 1rem;
    }
    
    .swal2-html-container {
        margin: 1rem 0;
        padding: 0;
    }
    
    .swal2-close {
        font-size: 1.5rem;
        color: #6b7280;
    }
    
    .swal2-close:hover {
        color: #4b5563;
    }
</style>
@endsection