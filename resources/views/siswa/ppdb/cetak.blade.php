<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>Bukti Pendaftaran PPDB - SMAN 1 Batang Gasan</title>
    <style>
        /* Reset & Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #f3f4f6;
            padding: 20px;
            color: #374151;
        }
        
        /* Container utama */
        .certificate-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }
        
        /* Header dengan gradasi */
        .header {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            color: white;
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .header img {
            height: 80px;
            margin-bottom: 15px;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }
        
        .header h2 {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 1px;
            margin: 5px 0;
        }
        
        .header h4 {
            font-size: 16px;
            font-weight: 500;
            opacity: 0.9;
            margin: 5px 0;
        }
        
        .header p {
            font-size: 13px;
            opacity: 0.8;
            margin-top: 8px;
        }
        
        /* Badge status */
        .status-badge {
            display: inline-block;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 6px 20px;
            border-radius: 40px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }
        
        /* Section title */
        .section-title {
            font-size: 16px;
            font-weight: 800;
            margin-top: 25px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #F59E0B;
            color: #1f2937;
            display: inline-block;
        }
        
        /* Tabel informasi */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            background: #f9fafb;
            border-radius: 16px;
            overflow: hidden;
        }
        
        .info-table td {
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }
        
        .info-table tr:last-child td {
            border-bottom: none;
        }
        
        .info-table td:first-child {
            width: 180px;
            font-weight: 700;
            background: #f3f4f6;
            color: #374151;
        }
        
        .info-table td:last-child {
            color: #1f2937;
        }
        
        /* Signature table */
        .signature-table {
            width: 100%;
            margin-top: 30px;
        }
        
        .signature-table td {
            padding-top: 50px;
            text-align: center;
            font-size: 13px;
        }
        
        .signature-line {
            border-top: 1px solid #d1d5db;
            width: 200px;
            margin-top: 30px;
            padding-top: 8px;
        }
        
        /* Footer note */
        .footer-note {
            background: #fef3c7;
            padding: 12px 20px;
            text-align: center;
            font-size: 12px;
            color: #92400e;
            border-top: 1px solid #fde68a;
            margin-top: 10px;
        }
        
        /* Tombol aksi */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            text-decoration: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #374151, #4B5563);
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            filter: brightness(1.02);
        }
        
        .btn-primary:active {
            transform: translateY(1px);
        }
        
        .btn-accent {
            background: linear-gradient(135deg, #F59E0B, #D97706);
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .btn-accent:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }
        
        .btn-accent:active {
            transform: translateY(1px);
        }
        
        /* Print styles */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }
            .certificate-container {
                box-shadow: none;
                border-radius: 0;
            }
            .action-buttons {
                display: none;
            }
            .btn {
                display: none;
            }
            .footer-note {
                background: #fef3c7;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .header {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .status-badge {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            body {
                padding: 10px;
            }
            .info-table td:first-child {
                width: 120px;
                font-size: 12px;
            }
            .info-table td:last-child {
                font-size: 12px;
            }
            .header h2 {
                font-size: 18px;
            }
            .header h4 {
                font-size: 14px;
            }
            .header img {
                height: 60px;
            }
            .btn {
                padding: 8px 16px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="certificate-container">
        <!-- Header dengan Logo -->
        <div class="header">
            <img src="{{ public_path('logo.webp') }}" alt="Logo SMAN 1 Batang Gasan" onerror="this.src='/logo.webp'">
            <h2>BUKTI PENDAFTARAN PESERTA DIDIK BARU</h2>
            <h4>SMAN 1 BATANG GASAN</h4>
            <p>Tahun Pelajaran 2026/2027</p>
        </div>

        <!-- Body Certificate -->
        <div style="padding: 30px;">
            <!-- Status Penerimaan -->
            <div style="text-align: center; margin-bottom: 25px;">
                <span class="status-badge">
                    <i class="fa-regular fa-circle-check" style="margin-right: 6px;"></i> STATUS: DITERIMA
                </span>
            </div>

            <!-- Informasi Siswa -->
            <div>
                <div class="section-title">
                    <i class="fa-regular fa-user" style="margin-right: 8px; color: #F59E0B;"></i> INFORMASI SISWA
                </div>
                <table class="info-table">
                    <tr><td>Nama Lengkap</td><td>: {{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name ?? '-' }}</td></tr>
                    <tr><td>Email</td><td>: {{ $ppdb->user->email ?? '-' }}</td></tr>
                    <tr><td>NIK</td><td>: {{ $ppdb->siswa->nik ?? '-' }}</td></tr>
                    <tr><td>NISN</td><td>: {{ $ppdb->siswa->nisn ?? '-' }}</td></tr>
                    <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $ppdb->siswa->tempat_lahir ?? '-' }}, {{ isset($ppdb->siswa->tanggal_lahir) ? \Carbon\Carbon::parse($ppdb->siswa->tanggal_lahir)->format('d-m-Y') : '-' }}</td></tr>
                    <tr><td>Jenis Kelamin</td><td>: {{ $ppdb->siswa->jenis_kelamin ?? '-' }}</td></tr>
                    <tr><td>Agama</td><td>: {{ $ppdb->siswa->agama ?? '-' }}</td></tr>
                    <tr><td>No HP</td><td>: {{ $ppdb->siswa->no_hp ?? $ppdb->no_hp ?? '-' }}</td></tr>
                    <tr><td>Alamat</td><td>: {{ $ppdb->siswa->alamat ?? $ppdb->alamat ?? '-' }}</td></tr>
                    <tr><td>Asal Sekolah</td><td>: {{ $ppdb->siswa->asal_sekolah ?? '-' }}</td></tr>
                    <tr><td>Jalur Pendaftaran</td><td>: <strong>{{ ucfirst($ppdb->jalur ?? $ppdb->jalur_pendaftaran ?? '-') }}</strong></td></tr>
                    <tr><td>Tanggal Pendaftaran</td><td>: {{ \Carbon\Carbon::parse($ppdb->created_at)->translatedFormat('d F Y') }}</td></tr>
                </table>
            </div>

            <!-- Informasi Orang Tua -->
            <div style="margin-top: 25px;">
                <div class="section-title">
                    <i class="fa-regular fa-users" style="margin-right: 8px; color: #F59E0B;"></i> INFORMASI ORANG TUA
                </div>
                <table class="info-table">
                    <tr><td>Nama Ayah</td><td>: {{ $ppdb->siswa->nama_ayah ?? '-' }}</td></tr>
                    <tr><td>Pekerjaan Ayah</td><td>: {{ $ppdb->siswa->pekerjaan_ayah ?? '-' }}</td></tr>
                    <tr><td>Nama Ibu</td><td>: {{ $ppdb->siswa->nama_ibu ?? '-' }}</td></tr>
                    <tr><td>Pekerjaan Ibu</td><td>: {{ $ppdb->siswa->pekerjaan_ibu ?? '-' }}</td></tr>
                    <tr><td>No HP Orang Tua</td><td>: {{ $ppdb->siswa->no_hp_ortu ?? '-' }}</td></tr>
                </table>
            </div>

            <!-- Tanda Tangan -->
            <table class="signature-table">
                <tr>
                    <td width="50%">
                        <div>Orang Tua / Wali</div>
                        <div class="signature-line" style="margin: 0 auto; width: 180px;"></div>
                        <div style="margin-top: 5px;">(_______________________)</div>
                    </td>
                    <td width="50%">
                        <div>Batang Gasan, {{ now()->translatedFormat('d F Y') }}</div>
                        <div class="signature-line" style="margin: 0 auto; width: 180px;"></div>
                        <div style="margin-top: 5px;">Panitia PPDB SMAN 1 Batang Gasan</div>
                    </td>
                </tr>
            </table>

            <!-- Footer Note -->
            <div class="footer-note">
                <i class="fa-regular fa-circle-info" style="margin-right: 6px;"></i> 
                Bukti ini merupakan dokumen resmi pendaftaran PPDB SMAN 1 Batang Gasan. 
                Silakan simpan untuk keperluan daftar ulang.
            </div>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="action-buttons">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fa-solid fa-print"></i> Cetak Bukti
        </button>
        <a href="{{ route('siswa.dashboard') }}" class="btn btn-accent">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <!-- Font Awesome untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <script>
        // Efek klik pada tombol
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                // Efek visual klik
                this.style.transform = 'scale(0.97)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
            
            btn.addEventListener('touchstart', function() {
                this.style.transform = 'scale(0.96)';
            });
            
            btn.addEventListener('touchend', function() {
                this.style.transform = '';
            });
        });
        
        // Auto print (opsional - bisa diaktifkan jika diperlukan)
        // setTimeout(() => { window.print(); }, 500);
    </script>
</body>
</html>