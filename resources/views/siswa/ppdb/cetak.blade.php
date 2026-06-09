<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran PPDB</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            color: #333;
            font-size: 14px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header img {
            height: 80px;
            margin-bottom: 10px;
        }

        .header h2 {
            font-size: 20px;
            margin: 0;
        }

        .header h4 {
            font-size: 16px;
            margin: 0;
        }

        .info-table, .signature-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 6px 10px;
            vertical-align: top;
        }

        .info-table td:first-child {
            width: 200px;
            font-weight: 600;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 30px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 6px;
        }

        .signature-table td {
            padding-top: 60px;
            text-align: center;
        }

        .footer-note {
            font-size: 12px;
            color: #777;
            margin-top: 40px;
            text-align: center;
        }

        .highlight {
            font-weight: bold;
            color: #1f8b4c;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('th.jpeg') }}" alt="Logo SMAN 1 Batang Gasan">
        <h2>BUKTI PENDAFTARAN PESERTA DIDIK BARU (PPDB)</h2>
        <h4>SMAN 1 BATANG GASAN</h4>
        <p>Tahun Pelajaran 2025/2026</p>
    </div>

    <div class="section-title">Informasi Siswa</div>
    <table class="info-table">
        <tr>
            <td>Nama Lengkap</td>
            <td>: {{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $ppdb->user->email }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $ppdb->siswa->nik ?? '-' }}</td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>: {{ $ppdb->siswa->nisn ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $ppdb->siswa->tempat_lahir ?? '-' }}, {{ \Carbon\Carbon::parse($ppdb->siswa->tanggal_lahir)->format('d-m-Y') ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $ppdb->siswa->jenis_kelamin ?? '-' }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: {{ $ppdb->siswa->agama ?? '-' }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: {{ $ppdb->siswa->no_hp ?? $ppdb->no_hp ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $ppdb->siswa->alamat ?? $ppdb->alamat ?? '-' }}</td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td>: {{ $ppdb->siswa->asal_sekolah ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jalur Pendaftaran</td>
            <td>: {{ ucfirst($ppdb->jalur_pendaftaran) }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: <span class="highlight">DITERIMA</span></td>
        </tr>
        <tr>
            <td>Tanggal Pendaftaran</td>
            <td>: {{ \Carbon\Carbon::parse($ppdb->created_at)->format('d-m-Y') }}</td>
        </tr>
    </table>

    <div class="section-title">Informasi Orang Tua</div>
    <table class="info-table">
        <tr>
            <td>Nama Ayah</td>
            <td>: {{ $ppdb->siswa->nama_ayah ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pekerjaan Ayah</td>
            <td>: {{ $ppdb->siswa->pekerjaan_ayah ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>: {{ $ppdb->siswa->nama_ibu ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pekerjaan Ibu</td>
            <td>: {{ $ppdb->siswa->pekerjaan_ibu ?? '-' }}</td>
        </tr>
        <tr>
            <td>No HP Orang Tua</td>
            <td>: {{ $ppdb->siswa->no_hp_ortu ?? '-' }}</td>
        </tr>
    </table>

    <br><br>
    <table class="signature-table">
        <tr>
            <td>Orang Tua / Wali</td>
            <td>Batang Gasan, {{ now()->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td height="80">(_______________________)</td>
            <td>(Panitia PPDB)</td>
        </tr>
    </table>

    <p class="footer-note">Silakan simpan dan cetak bukti ini sebagai dokumen resmi pendaftaran di SMAN 1 Batang Gasan.</p>
</body>
</html>
