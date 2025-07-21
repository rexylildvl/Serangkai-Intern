<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#3B3B1A] leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#E7EFC7] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Lowongan yang Sudah Didaftar -->
            <div class="p-6 bg-white shadow-sm rounded-lg border border-[#AEC8A4]">
                <h2 class="text-lg font-bold text-[#3B3B1A] mb-4">Lowongan yang Sudah Didaftar</h2>
                @php
                    $pendaftarans = \App\Models\Pendaftaran::with('lowongan')
                        ->where('email', auth()->user()->email)
                        ->latest()
                        ->get();
                @endphp

                @if($pendaftarans->count())
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-[#3B3B1A]">
                            <thead>
                                <tr class="bg-[#AEC8A4]/60 text-left text-sm font-medium">
                                    <th class="px-4 py-2">Lowongan</th>
                                    <th class="px-4 py-2">Divisi</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendaftarans as $p)
                                <tr class="border-b border-[#AEC8A4]/40 hover:bg-[#F7E06B]/10 transition">
                                    <td class="px-4 py-2 font-semibold">{{ $p->lowongan->judul ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $p->lowongan->divisi ?? '-' }}</td>
                                    <td class="px-4 py-2">
                                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold
                                            @if($p->status === 'Menunggu') bg-yellow-100 text-yellow-800
                                            @elseif($p->status === 'Diterima') bg-green-100 text-green-800
                                            @elseif($p->status === 'Ditolak') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-[#8A784E]">Belum ada pendaftaran magang.</p>
                @endif
            </div>

            <!-- Update Profile Information -->
            <div class="p-6 bg-white shadow-sm rounded-lg border border-[#AEC8A4]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-white shadow-sm rounded-lg border border-[#AEC8A4]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-6 bg-white shadow-sm rounded-lg border border-[#AEC8A4]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
