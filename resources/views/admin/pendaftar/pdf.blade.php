<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pendaftar - {{ $pendaftar->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            background-color: #f9fafb;
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }
        
        h1 {
            color: #1e40af;
            font-size: 24px;
            margin-bottom: 5px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 10px;
        }
        
        h2 {
            color: #1e40af;
            font-size: 18px;
            margin-top: 25px;
            margin-bottom: 15px;
        }
        
        .header-info {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 20px;
        }
        
        .profile-section {
            display: flex;
            gap: 30px;
            margin-bottom: 25px;
        }
        
        .profile-main {
            flex: 1;
        }
        

        .status-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .status-label {
            font-weight: 600;
            color: #4b5563;
            min-width: 60px;
        }
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13px;
        }
        
        .status-menunggu { background: #fffbeb; color: #b45309; border: 1px solid #fcd34d; }
        .status-diterima { background: #ecfdf5; color: #065f46; border: 1px solid #6ee7b7; }
        .status-ditolak { background: #fef2f2; color: #991b1b; border: 1px solid #fca5a5; }
        
        .info-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 15px 0;
        }
        
        .info-table th {
            background-color: #f3f4f6;
            color: #374151;
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .info-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }
        
        .info-table tr:last-child td {
            border-bottom: none;
        }
        
        .info-table tr:hover td {
            background-color: #f9fafb;
        }
        
        .content-box {
            background-color: #f9fafb;
            border-radius: 6px;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #3b82f6;
        }
        
        .label {
            font-weight: 600;
            color: #4b5563;
            display: inline-block;
            min-width: 120px;
        }
        
        .value {
            margin-bottom: 10px;
        }
        
        .section-divider {
            border-top: 1px dashed #e5e7eb;
            margin: 25px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pendaftar Magang</h1>
        <div class="header-info">
            Lowongan: <strong>{{ $pendaftar->lowongan->judul ?? 'Tidak tersedia' }}</strong> | 
            Tanggal Daftar: {{ \Carbon\Carbon::parse($pendaftar->created_at)->format('d M Y H:i') }}
        </div>
        
        <div class="profile-section">
            <div class="profile-main">
                <div class="value">
                    <span class="label">Nama Lengkap:</span>
                    <strong>{{ $pendaftar->nama_lengkap }}</strong>
                </div>
                <div class="value">
                    <span class="label">Universitas:</span>
                    {{ $pendaftar->universitas }}
                </div>
                <div class="value">
                    <span class="label">Jurusan:</span>
                    {{ $pendaftar->jurusan }}
                </div>
                <div class="status-container">
                    <span class="status-label">Status:</span>
                    <span class="status-badge 
                        @if($pendaftar->status === 'Diterima') status-diterima
                        @elseif($pendaftar->status === 'Ditolak') status-ditolak
                        @else status-menunggu @endif">
                        {{ $pendaftar->status }}
                    </span>
                </div>
            </div>
        </div>
        
        <div class="section-divider"></div>
        
        <h2>Informasi Pribadi</h2>
        <table class="info-table">
            <tr>
                <th width="30%">Email</th>
                <td>{{ $pendaftar->email }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{ $pendaftar->no_hp }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pendaftar->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d F Y') }}</td>
            </tr>
            <tr>
                <th>Jenjang & Semester</th>
                <td>{{ $pendaftar->jenjang }} (Semester {{ $pendaftar->semester }})</td>
            </tr>
            <tr>
                <th>Bidang Minat</th>
                <td>{{ $pendaftar->bidang }}</td>
            </tr>
            <tr>
                <th>Periode Magang</th>
                <td>{{ $pendaftar->periode }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pendaftar->alamat }}</td>
            </tr>
        </table>
        
        <div class="section-divider"></div>
        
        <h2>Tujuan Magang</h2>
        <div class="content-box">
            {{ $pendaftar->tujuan }}
        </div>
        
        <h2>Keahlian</h2>
        <div class="content-box">
            {{ $pendaftar->keahlian }}
        </div>
    </div>
</body>
</html>