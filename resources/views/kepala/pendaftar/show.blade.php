@extends('layouts.kepala')

@section('title', 'Detail Pendaftar - SMAN 1 Batang Gasan')
@section('header', 'Detail Pendaftar')

@section('content')
<style>
    /* Custom styles untuk detail pendaftar */
    .detail-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
    }
    .detail-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
    }
    
    .info-section {
        background: #f9fafb;
        border-radius: 20px;
        padding: 20px;
    }
    
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 700;
    }
    .badge-diterima { background: linear-gradient(135deg, #10B981, #059669); color: white; }
    .badge-cadangan { background: linear-gradient(135deg, #F59E0B, #D97706); color: white; }
    .badge-ditolak { background: linear-gradient(135deg, #EF4444, #DC2626); color: white; }
    .badge-menunggu { background: linear-gradient(135deg, #6B7280, #4B5563); color: white; }
    
    .doc-card {
        transition: all 0.2s ease;
        border-radius: 16px;
    }
    .doc-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px -6px rgba(0, 0, 0, 0.15);
    }
    
    .doc-status-ok {
        background: #10B981;
        color: white;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .doc-status-missing {
        background: #EF4444;
        color: white;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    
    /* Progress bar */
    .progress-bar {
        height: 8px;
        background: #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #10B981, #059669);
        border-radius: 10px;
        transition: width 0.5s ease;
    }
    
    /* Print styles - fokus pada data siswa dan dokumen */
    @media print {
        body * {
            visibility: hidden;
        }
        #print-area, #print-area * {
            visibility: visible;
        }
        #print-area {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: white;
        }
        .no-print {
            display: none !important;
        }
        .badge-status {
            border: 1px solid #000;
            background: transparent !important;
            color: #000 !important;
        }
        .doc-status-ok, .doc-status-missing {
            background: transparent !important;
            border: 1px solid #000;
            color: #000 !important;
        }
        .info-section {
            break-inside: avoid;
            page-break-inside: avoid;
        }
        @page {
            size: A4;
            margin: 1.5cm;
        }
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .info-section {
            padding: 16px;
        }
        .badge-status {
            font-size: 11px;
            padding: 4px 12px;
        }
        .doc-card {
            padding: 12px;
        }
    }
</style>

<div class="max-w-5xl mx-auto">
    
    {{-- Tombol Kembali - No Print --}}
    <div class="mb-4 no-print">
        <a href="{{ route('kepala.pendaftar.index') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 group">
            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            <span>Kembali ke Daftar Pendaftar</span>
        </a>
    </div>

    {{-- AREA CETAK --}}
    <div id="print-area">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden detail-card border border-gray-100">
            
            {{-- Header --}}
            <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-regular fa-user text-white text-lg"></i>
                            </div>
                            <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Detail Pendaftar</span>
                        </div>
                        <h1 class="text-xl md:text-2xl font-bold mb-1">{{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name }}</h1>
                        <p class="text-white/80 text-sm">Informasi lengkap data pendaftaran peserta didik</p>
                    </div>
                    <div class="hidden md:block no-print">
                        <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center">
                            <i class="fa-regular fa-id-card text-2xl text-white/80"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="p-6 md:p-8">
                
                {{-- Status Pendaftaran --}}
                <div class="info-section mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                                <i class="fa-regular fa-clock text-primary text-xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Status Saat Ini</p>
                                @php
                                    $statusMap = [
                                        'accepted' => ['class' => 'badge-diterima', 'icon' => 'fa-regular fa-circle-check', 'text' => 'DITERIMA'],
                                        'cadangan' => ['class' => 'badge-cadangan', 'icon' => 'fa-solid fa-clock', 'text' => 'CADANGAN'],
                                        'rejected' => ['class' => 'badge-ditolak', 'icon' => 'fa-regular fa-circle-xmark', 'text' => 'DITOLAK'],
                                        'pending' => ['class' => 'badge-menunggu', 'icon' => 'fa-regular fa-hourglass-half', 'text' => 'MENUNGGU VERIFIKASI'],
                                    ];
                                    $status = $statusMap[$ppdb->status] ?? $statusMap['pending'];
                                @endphp
                                <span class="badge-status {{ $status['class'] }}">
                                    <i class="{{ $status['icon'] }}"></i> {{ $status['text'] }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-xl px-4 py-2 text-center sm:text-left">
                            <p class="text-xs text-gray-400"><i class="fa-regular fa-calendar"></i> Tanggal Pendaftaran</p>
                            <p class="text-sm font-semibold text-primary">{{ $ppdb->created_at->translatedFormat('d F Y H:i') }} WIB</p>
                        </div>
                    </div>
                </div>
                
                {{-- Informasi Pendaftaran --}}
                <div class="info-section mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                            <i class="fa-regular fa-rectangle-list text-accent text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary">Informasi Pendaftaran</h3>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col p-3 bg-white rounded-xl">
                            <span class="text-xs text-gray-400">Jalur Pendaftaran</span>
                            <span class="text-sm font-semibold text-primary flex items-center gap-1 mt-1">
                                @php
                                    $jalurIcon = match($ppdb->jalur) {
                                        'reguler' => '📚',
                                        'prestasi' => '🏆',
                                        'afirmasi' => '🤝',
                                        'pindahan' => '🔄',
                                        'zonasi' => '📍',
                                        default => '📌'
                                    };
                                @endphp
                                {{ $jalurIcon }} {{ ucfirst($ppdb->jalur) }}
                            </span>
                        </div>
                        <div class="flex flex-col p-3 bg-white rounded-xl">
                            <span class="text-xs text-gray-400">Email Pendaftar</span>
                            <span class="text-sm font-semibold text-primary">{{ $ppdb->user->email }}</span>
                        </div>
                        @if($ppdb->jalur == 'prestasi' && isset($ppdb->nilai_rapor))
                        <div class="flex flex-col p-3 bg-white rounded-xl">
                            <span class="text-xs text-gray-400">Nilai Rata-rata Rapor</span>
                            <span class="text-sm font-semibold text-primary">{{ $ppdb->nilai_rapor }}</span>
                        </div>
                        @endif
                        <div class="flex flex-col p-3 bg-white rounded-xl">
                            <span class="text-xs text-gray-400">Terakhir Diperbarui</span>
                            <span class="text-sm font-semibold text-primary">{{ $ppdb->updated_at->translatedFormat('d F Y H:i') }} WIB</span>
                        </div>
                    </div>
                </div>
                
                {{-- Data Siswa --}}
                @if(isset($ppdb->siswa))
                <div class="info-section mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                            <i class="fa-regular fa-user text-accent text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary">Data Siswa</h3>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Nama Lengkap</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->nama_lengkap ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">NIK</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->nik ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">NISN</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->nisn ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Tempat, Tanggal Lahir</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->tempat_lahir ?? '-' }}, {{ isset($ppdb->siswa->tanggal_lahir) ? \Carbon\Carbon::parse($ppdb->siswa->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Jenis Kelamin</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->jenis_kelamin ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Agama</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->agama ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">No HP</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->no_hp ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Asal Sekolah</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->asal_sekolah ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl sm:col-span-2"><span class="text-xs text-gray-400">Alamat</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->alamat ?? '-' }}</span></div>
                    </div>
                </div>
                @endif
                
                {{-- Data Orang Tua --}}
                @if(isset($ppdb->siswa) && ($ppdb->siswa->nama_ayah || $ppdb->siswa->nama_ibu))
                <div class="info-section mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-people-arrows text-accent text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary">Data Orang Tua</h3>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Nama Ayah</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->nama_ayah ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Pekerjaan Ayah</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->pekerjaan_ayah ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Nama Ibu</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->nama_ibu ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">Pekerjaan Ibu</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->pekerjaan_ibu ?? '-' }}</span></div>
                        <div class="flex flex-col p-3 bg-white rounded-xl"><span class="text-xs text-gray-400">No HP Orang Tua</span><span class="text-sm font-semibold text-primary">{{ $ppdb->siswa->no_hp_ortu ?? '-' }}</span></div>
                    </div>
                </div>
                @endif
                
                {{-- DOKUMEN - FOKUS UTAMA UNTUK CETAK --}}
                <div class="info-section">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                            <i class="fa-regular fa-folder-open text-accent text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary">Status Kelengkapan Dokumen</h3>
                        @php
                            $totalDocs = 0;
                            $uploadedDocs = 0;
                            $dokumenFields = ['kartu_keluarga', 'akta_kelahiran', 'rapor', 'sertifikat', 'bukti_kip_pkh', 'surat_disabilitas', 'surat_penugasan', 'surat_pindah'];
                            foreach ($dokumenFields as $field) {
                                if ($ppdb->dokumen && $ppdb->dokumen->{$field}) {
                                    $uploadedDocs++;
                                }
                                $totalDocs++;
                            }
                            $progressPercent = ($uploadedDocs / $totalDocs) * 100;
                        @endphp
                        <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">{{ $uploadedDocs }}/{{ $totalDocs }} Terunggah</span>
                    </div>
                    
                    {{-- Progress Bar Kelengkapan Dokumen --}}
                    <div class="mb-5">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span>Progress Kelengkapan Dokumen</span>
                            <span class="font-semibold {{ $progressPercent == 100 ? 'text-green-600' : 'text-accent' }}">{{ round($progressPercent) }}%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $progressPercent }}%"></div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @php
                            $dokumenList = [
                                'kartu_keluarga' => ['label' => '📄 Kartu Keluarga', 'icon' => 'fa-regular fa-id-card', 'keterangan' => 'Dokumen wajib untuk verifikasi domisili'],
                                'akta_kelahiran' => ['label' => '📄 Akta Kelahiran', 'icon' => 'fa-regular fa-file-pdf', 'keterangan' => 'Dokumen identitas diri'],
                                'rapor' => ['label' => '📄 Rapor Semester 1-5', 'icon' => 'fa-regular fa-file-lines', 'keterangan' => 'Dokumen prestasi akademik'],
                                'sertifikat' => ['label' => '🏆 Sertifikat Prestasi', 'icon' => 'fa-regular fa-certificate', 'keterangan' => 'Dokumen pendukung jalur prestasi (opsional)'],
                                'bukti_kip_pkh' => ['label' => '🤝 Bukti KIP/PKH', 'icon' => 'fa-regular fa-receipt', 'keterangan' => 'Dokumen pendukung jalur afirmasi'],
                                'surat_disabilitas' => ['label' => '♿ Surat Disabilitas', 'icon' => 'fa-regular fa-handicap', 'keterangan' => 'Dokumen pendukung (jika ada)'],
                                'surat_penugasan' => ['label' => '📜 Surat Penugasan', 'icon' => 'fa-regular fa-envelope', 'keterangan' => 'Dokumen pendukung jalur perpindahan'],
                                'surat_pindah' => ['label' => '🔄 Surat Pindah', 'icon' => 'fa-regular fa-arrow-right-arrow-left', 'keterangan' => 'Dokumen pendukung jalur perpindahan'],
                            ];
                        @endphp
                        
                        @foreach($dokumenList as $key => $item)
                            @php
                                $isUploaded = $ppdb->dokumen && !empty($ppdb->dokumen->{$key});
                            @endphp
                            <div class="doc-card bg-white border {{ $isUploaded ? 'border-green-200' : 'border-red-100' }} rounded-xl p-4 shadow-sm hover:shadow-md">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 {{ $isUploaded ? 'bg-green-100' : 'bg-red-100' }} rounded-lg flex items-center justify-center">
                                            <i class="{{ $item['icon'] }} {{ $isUploaded ? 'text-green-600' : 'text-red-500' }} text-sm"></i>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">{{ $item['label'] }}</span>
                                    </div>
                                    @if($isUploaded)
                                        <span class="doc-status-ok">
                                            <i class="fa-regular fa-circle-check text-xs"></i> Terunggah
                                        </span>
                                    @else
                                        <span class="doc-status-missing">
                                            <i class="fa-regular fa-circle-xmark text-xs"></i> Belum
                                        </span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-400 mt-1">{{ $item['keterangan'] }}</p>
                                @if($isUploaded)
                                    <div class="mt-2">
                                        <a href="{{ route('kepala.pendaftar.show', ['id' => $ppdb->id, 'tipe' => $key]) }}" 
                                           target="_blank" 
                                           class="text-accent hover:text-primary transition text-xs flex items-center gap-1">
                                            <i class="fa-regular fa-eye"></i> Lihat Dokumen
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    
                    {{-- Rekomendasi Perbaikan Dokumen --}}
                    @if($uploadedDocs < $totalDocs)
                    <div class="mt-5 p-4 bg-yellow-50 rounded-xl border-l-4 border-accent">
                        <div class="flex items-start gap-3">
                            <i class="fa-regular fa-circle-exclamation text-accent text-lg mt-0.5"></i>
                            <div>
                                <h4 class="font-semibold text-primary text-sm">📋 Rekomendasi Perbaikan</h4>
                                <p class="text-xs text-gray-600 mt-1">
                                    Terdapat <strong class="text-accent">{{ $totalDocs - $uploadedDocs }} dokumen</strong> yang belum diunggah. 
                                    Segera lengkapi dokumen yang masih kosong agar proses verifikasi dapat segera diproses.
                                </p>
                                <ul class="list-disc list-inside text-xs text-gray-600 mt-2">
                                    @foreach($dokumenList as $key => $item)
                                        @if(!($ppdb->dokumen && !empty($ppdb->dokumen->{$key})))
                                            <li>{{ $item['label'] }} - {{ $item['keterangan'] }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="mt-5 p-4 bg-green-50 rounded-xl border-l-4 border-green-500">
                        <div class="flex items-start gap-3">
                            <i class="fa-regular fa-circle-check text-green-600 text-lg mt-0.5"></i>
                            <div>
                                <h4 class="font-semibold text-primary text-sm">✅ Dokumen Lengkap</h4>
                                <p class="text-xs text-gray-600 mt-1">
                                    Seluruh dokumen persyaratan telah diunggah dengan lengkap. Proses verifikasi akan segera dilakukan.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Footer Laporan untuk Cetak --}}
        <div class="mt-4 text-center text-xs text-gray-400 border-t pt-4 no-print">
            <p>Dokumen resmi - Sistem PPDB SMAN 1 Batang Gasan</p>
            <p>Dicetak pada: {{ date('d F Y H:i:s') }}</p>
        </div>
    </div>
    
    {{-- Tombol Aksi - No Print --}}
    <div class="mt-6 flex flex-wrap justify-end gap-3 no-print">
        <button onclick="printDetail()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white rounded-xl hover:bg-secondary transition-all duration-300">
            <i class="fa-solid fa-print"></i> Cetak Detail
        </button>
        <button onclick="printDokumenOnly()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-accent text-white rounded-xl hover:bg-orange-600 transition-all duration-300">
            <i class="fa-regular fa-file-lines"></i> Cetak Status Dokumen
        </button>
        <a href="{{ route('kepala.pendaftar.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<script>
    // Fungsi cetak detail lengkap
    function printDetail() {
        const printContent = document.getElementById('print-area').innerHTML;
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Detail Pendaftar - {{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name }}</title>
                <meta charset="UTF-8">
                <style>
                    body { font-family: 'Times New Roman', Arial, sans-serif; margin: 0; padding: 20px; }
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    th { background: #f5f5f5; }
                    .badge-status { border: 1px solid #000; background: transparent !important; color: #000 !important; padding: 4px 12px; border-radius: 20px; display: inline-block; }
                    .doc-status-ok, .doc-status-missing { background: transparent !important; border: 1px solid #000; color: #000 !important; }
                    @page { size: A4; margin: 1.5cm; }
                </style>
            </head>
            <body>
                ${printContent}
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }
    
    // Fungsi cetak hanya status dokumen (fokus pada berkas)
    function printDokumenOnly() {
        // Ambil bagian dokumen saja
        const dokumenSection = document.querySelector('.info-section:last-child').cloneNode(true);
        const headerSection = document.querySelector('.bg-gradient-to-r').cloneNode(true);
        const namaSiswa = "{{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name }}";
        
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Status Dokumen - ${namaSiswa}</title>
                <meta charset="UTF-8">
                <style>
                    body { font-family: 'Times New Roman', Arial, sans-serif; margin: 0; padding: 20px; }
                    .header { text-align: center; margin-bottom: 20px; }
                    .header h2 { margin: 0; color: #1f2937; }
                    .header p { color: #6b7280; margin: 5px 0; }
                    .info-section { margin-bottom: 20px; }
                    .doc-card { border: 1px solid #ddd; padding: 12px; border-radius: 8px; margin-bottom: 10px; }
                    .doc-status-ok, .doc-status-missing { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 11px; }
                    .doc-status-ok { border: 1px solid #10B981; color: #10B981; }
                    .doc-status-missing { border: 1px solid #EF4444; color: #EF4444; }
                    .progress-bar { height: 8px; background: #e5e7eb; border-radius: 10px; overflow: hidden; margin: 10px 0; }
                    .progress-fill { height: 100%; background: #10B981; width: 0%; }
                    .rekomendasi { background: #fef3c7; padding: 12px; border-left: 4px solid #F59E0B; margin-top: 15px; }
                    @page { size: A4; margin: 1.5cm; }
                </style>
            </head>
            <body>
                <div class="header">
                    <h2>LAPORAN STATUS DOKUMEN PPDB</h2>
                    <p>SMAN 1 BATANG GASAN - TAHUN AJARAN 2026/2027</p>
                    <p>Nama Pendaftar: <strong>${namaSiswa}</strong></p>
                    <p>Tanggal Cetak: {{ date('d F Y H:i:s') }}</p>
                </div>
                ${dokumenSection.outerHTML}
                <div style="margin-top: 30px; text-align: center; font-size: 10px; color: #9ca3af;">
                    Dokumen resmi - Sistem PPDB SMAN 1 Batang Gasan
                </div>
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }
    
    // Efek klik pada tombol
    document.querySelectorAll('a, button').forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.classList.contains('no-print-effect')) return;
            this.style.transform = 'scale(0.98)';
            setTimeout(() => { if (this) this.style.transform = ''; }, 120);
        });
    });
</script>
@endsection