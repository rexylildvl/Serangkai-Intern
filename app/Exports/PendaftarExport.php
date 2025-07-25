<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pendaftaran::select([
            'nama_lengkap',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'no_hp',
            'email',
            'universitas',
            'jurusan',
            'jenjang',
            'semester',
            'bidang',
            'periode',
            'status',
            'tujuan',
            'keahlian',
            'lowongan_id'
        ])->get();
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Nomor HP',
            'Email',
            'Universitas',
            'Jurusan',
            'Jenjang',
            'Semester',
            'Bidang',
            'Periode',
            'Status',
            'Tujuan',
            'Keahlian',
            'ID Lowongan'
        ];
    }
}
