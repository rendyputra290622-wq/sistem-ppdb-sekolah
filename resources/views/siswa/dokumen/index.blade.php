@extends('layouts.siswa')

@section('title', 'Dokumen PPDB - SMAN 1 Batang Gasan')
@section('header', 'Dokumen PPDB')

@section('content')
<style>
    /* Custom styles untuk halaman dokumen */
    .document-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 24px;
    }
    .document-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
    }
    
    /* Icon wrapper */
    .icon-doc {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, #0a3d2f, #1b5e4a);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }
    .icon-doc-sm {
        width: 36px;
        height: 36px;
        background: rgba(245, 158, 11, 0.12);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Tombol aksi */
    .btn-view, .btn-edit, .btn-update {
        transition: all 0.2s ease;
        cursor: pointer;
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    .btn-view {
        background: linear-gradient(135deg, #0a3d2f, #1b5e4a);
        color: white;
    }
    .btn-edit {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
    }
    .btn-update {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
    }
    .btn-view:hover, .btn-edit:hover, .btn-update:hover {
        transform: translateY(-2px);
        filter: brightness(1.05);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
    }
    .btn-view:active, .btn-edit:active, .btn-update:active {
        transform: translateY(1px);
    }
    
    /* Badge status */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
    }
    .status-uploaded {
        background: #10b981;
        color: white;
    }
    .status-missing {
        background: #ef4444;
        color: white;
    }
    
    /* Badge jalur */
    .jalur-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 600;
    }
    .jalur-reguler { background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; }
    .jalur-prestasi { background: linear-gradient(135deg, #f59e0b, #d97706); color: white; }
    .jalur-afirmasi { background: linear-gradient(135deg, #10b981, #059669); color: white; }
    .jalur-pindahan { background: linear-gradient(135deg, #8b5cf6, #6d28d9); color: white; }
    
    /* Modal styling */
    .modal-overlay {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        transition: all 0.3s ease;
        z-index: 1000;
    }
    .modal-container {
        animation: modalSlideIn 0.3s ease-out;
        max-width: 500px;
        width: 90%;
        margin: 20px;
    }
    @keyframes modalSlideIn {
        from { opacity: 0; transform: scale(0.95) translateY(-20px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    
    /* Tabel responsif */
    .doc-table-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 20px;
    }
    .doc-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 20px;
        overflow: hidden;
    }
    .doc-table thead tr {
        background: linear-gradient(135deg, #0a3d2f, #1b5e4a);
    }
    .doc-table th {
        padding: 14px 16px;
        font-weight: 600;
        font-size: 13px;
        color: white;
        text-align: left;
    }
    .doc-table td {
        padding: 14px 16px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
    }
    .doc-table tbody tr:hover {
        background: rgba(245, 158, 11, 0.05);
    }
    
    /* Action buttons container */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    /* Info box */
    .info-box {
        background: linear-gradient(135deg, #fef3c7, #fffbeb);
        border-left: 4px solid #F59E0B;
        border-radius: 16px;
    }
    
    /* Alert info jalur */
    .alert-jalur {
        background: linear-gradient(135deg, #dbeafe, #eff6ff);
        border-left: 4px solid #3b82f6;
        border-radius: 16px;
    }
    
    /* Responsif mobile */
    @media (max-width: 640px) {
        .doc-table thead {
            display: none;
        }
        .doc-table tbody tr {
            display: block;
            margin-bottom: 16px;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            background: white;
            border: 1px solid #e5e7eb;
        }
        .doc-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 14px;
            border-bottom: 1px solid #f3f4f6;
            text-align: right;
        }
        .doc-table tbody td:before {
            content: attr(data-label);
            font-weight: 600;
            color: #0a3d2f;
            text-align: left;
            flex: 1;
            font-size: 12px;
        }
        .doc-table tbody td:last-child {
            border-bottom: none;
        }
        .btn-view, .btn-edit, .btn-update {
            padding: 5px 12px;
            font-size: 10px;
        }
        .icon-doc {
            width: 36px;
            height: 36px;
        }
        .action-buttons {
            justify-content: flex-end;
        }
        .jalur-badge {
            padding: 4px 12px;
            font-size: 11px;
        }
    }
    
    @media (max-width: 480px) {
        .btn-view, .btn-edit, .btn-update {
            padding: 4px 10px;
            font-size: 9px;
        }
    }
</style>

@php
    use App\Models\PPDBPendaftaran;
    $pendaftaran = PPDBPendaftaran::where('user_id', auth()->id())->first();
    $selectedJalur = $pendaftaran ? $pendaftaran->jalur : null;
    
    // Definisi dokumen berdasarkan jalur
    $dokumenByJalur = [
        'reguler' => [
            'kartu_keluarga' => ['label' => '📄 Kartu Keluarga', 'wajib' => true, 'icon' => 'fa-regular fa-id-card'],
            'akta_kelahiran' => ['label' => '📄 Akta Kelahiran', 'wajib' => true, 'icon' => 'fa-regular fa-file-pdf'],
            'rapor' => ['label' => '📄 Rapor Semester 1-5', 'wajib' => true, 'icon' => 'fa-regular fa-file-lines'],
            'ijazah' => ['label' => '📄 Ijazah/SKL', 'wajib' => true, 'icon' => 'fa-regular fa-graduation-cap'],
            'pas_foto' => ['label' => '📷 Pas Foto 3x4', 'wajib' => true, 'icon' => 'fa-regular fa-camera'],
        ],
        'prestasi' => [
            'kartu_keluarga' => ['label' => '📄 Kartu Keluarga', 'wajib' => true, 'icon' => 'fa-regular fa-id-card'],
            'akta_kelahiran' => ['label' => '📄 Akta Kelahiran', 'wajib' => true, 'icon' => 'fa-regular fa-file-pdf'],
            'rapor' => ['label' => '📄 Rapor Semester 1-5', 'wajib' => true, 'icon' => 'fa-regular fa-file-lines'],
            'sertifikat_prestasi' => ['label' => '🏆 Sertifikat Prestasi', 'wajib' => true, 'icon' => 'fa-regular fa-certificate'],
            'rekomendasi_sekolah' => ['label' => '📜 Surat Rekomendasi Sekolah', 'wajib' => false, 'icon' => 'fa-regular fa-envelope'],
        ],
        'afirmasi' => [
            'kartu_keluarga' => ['label' => '📄 Kartu Keluarga', 'wajib' => true, 'icon' => 'fa-regular fa-id-card'],
            'akta_kelahiran' => ['label' => '📄 Akta Kelahiran', 'wajib' => true, 'icon' => 'fa-regular fa-file-pdf'],
            'rapor' => ['label' => '📄 Rapor Semester 1-5', 'wajib' => true, 'icon' => 'fa-regular fa-file-lines'],
            'bukti_kip_pkh' => ['label' => '🤝 Kartu KIP/PKH', 'wajib' => true, 'icon' => 'fa-regular fa-receipt'],
            'surat_tidak_mampu' => ['label' => '📜 Surat Keterangan Tidak Mampu', 'wajib' => true, 'icon' => 'fa-regular fa-file-lines'],
            'surat_disabilitas' => ['label' => '♿ Surat Keterangan Disabilitas', 'wajib' => false, 'icon' => 'fa-regular fa-handicap'],
        ],
        'pindahan' => [
            'kartu_keluarga' => ['label' => '📄 Kartu Keluarga', 'wajib' => true, 'icon' => 'fa-regular fa-id-card'],
            'akta_kelahiran' => ['label' => '📄 Akta Kelahiran', 'wajib' => true, 'icon' => 'fa-regular fa-file-pdf'],
            'rapor' => ['label' => '📄 Rapor Semester 1-5', 'wajib' => true, 'icon' => 'fa-regular fa-file-lines'],
            'surat_pindah' => ['label' => '🔄 Surat Keterangan Pindah', 'wajib' => true, 'icon' => 'fa-regular fa-arrow-right-arrow-left'],
            'surat_penugasan' => ['label' => '📜 Surat Penugasan Orang Tua', 'wajib' => true, 'icon' => 'fa-regular fa-envelope'],
        ]
    ];
    
    // Dokumen default jika belum pilih jalur
    $defaultDokumen = [
        'kartu_keluarga' => ['label' => '📄 Kartu Keluarga', 'wajib' => true, 'icon' => 'fa-regular fa-id-card'],
        'akta_kelahiran' => ['label' => '📄 Akta Kelahiran', 'wajib' => true, 'icon' => 'fa-regular fa-file-pdf'],
        'rapor' => ['label' => '📄 Rapor Semester 1-5', 'wajib' => true, 'icon' => 'fa-regular fa-file-lines'],
    ];
    
    $dokumenList = $selectedJalur && isset($dokumenByJalur[$selectedJalur]) 
        ? $dokumenByJalur[$selectedJalur] 
        : $defaultDokumen;
    
    // Mapping field database ke key dokumen
    $fieldMapping = [
        'kartu_keluarga' => 'kartu_keluarga',
        'akta_kelahiran' => 'akta_kelahiran',
        'rapor' => 'rapor',
        'ijazah' => 'ijazah',
        'pas_foto' => 'pas_foto',
        'sertifikat_prestasi' => 'sertifikat',
        'rekomendasi_sekolah' => 'rekomendasi_sekolah',
        'bukti_kip_pkh' => 'bukti_kip_pkh',
        'surat_tidak_mampu' => 'surat_tidak_mampu',
        'surat_disabilitas' => 'surat_disabilitas',
        'surat_pindah' => 'surat_pindah',
        'surat_penugasan' => 'surat_penugasan',
    ];
    
    $jalurClass = match($selectedJalur) {
        'reguler' => 'jalur-reguler',
        'prestasi' => 'jalur-prestasi',
        'afirmasi' => 'jalur-afirmasi',
        'pindahan' => 'jalur-pindahan',
        default => 'jalur-reguler'
    };
    
    $jalurLabel = match($selectedJalur) {
        'reguler' => 'Reguler',
        'prestasi' => 'Prestasi',
        'afirmasi' => 'Afirmasi',
        'pindahan' => 'Perpindahan Tugas Orang Tua',
        default => 'Belum Dipilih'
    };
@endphp

<div class="max-w-5xl mx-auto px-4 sm:px-6 py-6">
    
    {{-- HEADER CARD --}}
    <div class="bg-gradient-to-r from-[#0a3d2f] to-[#1b5e4a] rounded-2xl shadow-xl overflow-hidden mb-6">
        <div class="px-6 py-7 md:px-8 md:py-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-folder-open text-lg"></i>
                        </div>
                        <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">📁 Kelola Berkas</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-extrabold mb-1">Dokumen Pendaftaran PPDB</h1>
                    <p class="text-white/85 text-sm max-w-xl leading-relaxed">Kelola, lihat, dan perbarui dokumen yang telah Anda unggah untuk keperluan seleksi.</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-file-lines text-2xl text-white/90"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ALERT JALUR YANG DIPILIH --}}
    <div class="alert-jalur p-4 mb-6 shadow-sm">
        <div class="flex items-start gap-3 flex-wrap sm:flex-nowrap">
            <div class="w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-road text-blue-500 text-lg"></i>
            </div>
            <div class="flex-1">
                <h3 class="font-bold text-blue-800 text-sm md:text-base">📋 Jalur Pendaftaran Anda</h3>
                <div class="flex flex-wrap items-center gap-3 mt-2">
                    <span class="jalur-badge {{ $jalurClass }}">
                        <i class="fa-solid fa-check-circle"></i> {{ $jalurLabel }}
                    </span>
                    @if(!$selectedJalur)
                        <a href="{{ route('siswa.ppdb.form') }}" class="text-blue-600 text-sm font-semibold hover:underline flex items-center gap-1">
                            <i class="fa-solid fa-arrow-right"></i> Pilih Jalur Sekarang
                        </a>
                    @endif
                </div>
                <p class="text-gray-600 text-xs mt-2">
                    Berkas yang wajib diunggah disesuaikan dengan jalur pendaftaran yang Anda pilih. 
                    Pastikan semua dokumen wajib telah diunggah sebelum batas waktu berakhir.
                </p>
            </div>
        </div>
    </div>

    {{-- INFORMASI PERSYARATAN FILE --}}
    <div class="info-box p-4 md:p-5 mb-6 shadow-sm">
        <div class="flex items-start gap-3">
            <div class="icon-doc-sm flex-shrink-0">
                <i class="fa-regular fa-circle-info text-accent text-base"></i>
            </div>
            <div>
                <h3 class="font-bold text-[#0a3d2f] text-sm md:text-base">📄 Informasi Unggah Berkas</h3>
                <p class="text-gray-600 text-xs md:text-sm mt-1 leading-relaxed">
                    Setiap dokumen yang diunggah harus dalam format <strong class="text-accent">PDF</strong> dengan ukuran maksimal <strong class="text-accent">2 Megabyte (MB)</strong> per berkas. 
                    Pastikan dokumen Anda jelas dan terbaca. Jika dokumen bermasalah, Anda dapat menggantinya dengan mengklik tombol "Ganti".
                </p>
                <div class="flex flex-wrap gap-3 mt-2 text-xs text-gray-500">
                    <span class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Format PDF</span>
                    <span class="flex items-center gap-1"><i class="fa-regular fa-hard-drive text-accent"></i> Maksimal 2 MB</span>
                    <span class="flex items-center gap-1"><i class="fa-regular fa-eye text-accent"></i> Dokumen terbaca jelas</span>
                    <span class="flex items-center gap-1"><i class="fa-regular fa-pen-to-square text-accent"></i> Dapat diganti kapan saja</span>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL DOKUMEN --}}
    <div class="bg-white rounded-2xl shadow-lg modern-card border border-gray-100 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center gap-3">
                <div class="icon-doc">
                    <i class="fa-regular fa-rectangle-list text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold text-[#0a3d2f]">Daftar Dokumen Pendaftaran</h2>
                <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">
                    @if($selectedJalur) Jalur {{ ucfirst($selectedJalur) }} @else Persiapan @endif
                </span>
            </div>
            <p class="text-xs text-gray-500 mt-2 ml-12">
                Dokumen yang wajib diunggah (<span class="text-red-500">●</span>) dan opsional (<span class="text-gray-400">○</span>) sesuai jalur yang dipilih.
            </p>
        </div>

        <div class="p-5">
            @if($selectedJalur)
                <div class="doc-table-container">
                    <table class="doc-table">
                        <thead>
                            <tr>
                                <th><i class="fa-regular fa-file mr-2"></i>Nama Dokumen</th>
                                <th class="text-center w-32"><i class="fa-regular fa-circle-check mr-2"></i>Status</th>
                                <th class="text-center w-48"><i class="fa-solid fa-gear mr-2"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumenList as $key => $item)
                                @php
                                    $dbField = $fieldMapping[$key] ?? $key;
                                    $isUploaded = $dokumen && !empty($dokumen->{$dbField});
                                    $fileUrl = $isUploaded ? asset('storage/' . $dokumen->{$dbField}) : null;
                                @endphp
                                <tr>
                                    <td data-label="Nama Dokumen">
                                        <div class="flex items-center gap-3">
                                            <div class="icon-doc-sm">
                                                <i class="{{ $item['icon'] }} text-accent text-sm"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">{{ $item['label'] }}</span>
                                                @if($item['wajib'])
                                                    <span class="text-[10px] text-red-500 ml-2">(Wajib)</span>
                                                @else
                                                    <span class="text-[10px] text-gray-400 ml-2">(Opsional)</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Status" class="text-center">
                                        @if ($isUploaded)
                                            <span class="status-badge status-uploaded">
                                                <i class="fa-regular fa-circle-check text-xs"></i> Terunggah
                                            </span>
                                        @else
                                            <span class="status-badge status-missing">
                                                <i class="fa-regular fa-circle-xmark text-xs"></i> Belum
                                            </span>
                                        @endif
                                    </td>
                                    <td data-label="Aksi" class="text-center">
                                        <div class="action-buttons">
                                            @if ($isUploaded)
                                                <a href="{{ $fileUrl }}" target="_blank" class="btn-view">
                                                    <i class="fa-regular fa-eye"></i> Lihat
                                                </a>
                                                <button onclick="openUpdateModal('{{ $key }}', '{{ $item['label'] }}')" class="btn-edit">
                                                    <i class="fa-regular fa-pen-to-square"></i> Ganti
                                                </button>
                                            @else
                                                <button onclick="openUploadModal('{{ $key }}', '{{ $item['label'] }}')" class="btn-update">
                                                    <i class="fa-solid fa-cloud-arrow-up"></i> Unggah
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{-- PROGRES KELENGKAPAN DOKUMEN --}}
                @php
                    $totalWajib = 0;
                    $terunggahWajib = 0;
                    foreach ($dokumenList as $key => $item) {
                        if ($item['wajib']) {
                            $totalWajib++;
                            $dbField = $fieldMapping[$key] ?? $key;
                            if ($dokumen && !empty($dokumen->{$dbField})) {
                                $terunggahWajib++;
                            }
                        }
                    }
                    $progressPercent = $totalWajib > 0 ? round(($terunggahWajib / $totalWajib) * 100) : 0;
                @endphp
                
                <div class="mt-5 p-4 bg-[#0a3d2f]/5 rounded-xl">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-[#0a3d2f]">📊 Kelengkapan Dokumen Wajib</span>
                        <span class="text-sm font-bold text-accent">{{ $terunggahWajib }}/{{ $totalWajib }} ({{ $progressPercent }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-accent h-2.5 rounded-full transition-all duration-500" style="width: {{ $progressPercent }}%"></div>
                    </div>
                    @if($terunggahWajib == $totalWajib && $totalWajib > 0)
                        <p class="text-xs text-green-600 mt-2 flex items-center gap-1">
                            <i class="fa-regular fa-circle-check"></i> Semua dokumen wajib telah terunggah!
                        </p>
                    @else
                        <p class="text-xs text-gray-500 mt-2">
                            <i class="fa-regular fa-lightbulb text-accent mr-1"></i> 
                            Silakan unggah {{ $totalWajib - $terunggahWajib }} dokumen wajib yang masih kurang.
                        </p>
                    @endif
                </div>
                
                {{-- INFORMASI TAMBAHAN --}}
                <div class="mt-4 p-3 bg-[#0a3d2f]/5 rounded-xl text-center shadow-inner">
                    <p class="text-xs text-gray-600">
                        <i class="fa-regular fa-shield-check text-accent mr-1"></i> 
                        Dokumen yang sudah diunggah dapat diganti kapan saja sebelum batas waktu pendaftaran berakhir (28 Februari 2026). 
                        Pastikan dokumen pengganti sesuai dengan persyaratan.
                    </p>
                </div>
            @else
                {{-- BELUM MEMILIH JALUR --}}
                <div class="text-center py-10">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                        <i class="fa-regular fa-road text-gray-300 text-3xl"></i>
                    </div>
                    <p class="text-orange-500 font-bold text-base">⚠️ Jalur Pendaftaran Belum Dipilih</p>
                    <p class="text-gray-400 text-sm mt-2 max-w-md mx-auto">Anda belum memilih jalur pendaftaran. Silakan pilih jalur terlebih dahulu untuk mengetahui dokumen apa saja yang perlu diunggah.</p>
                    <a href="{{ route('siswa.ppdb.form') }}" class="inline-flex items-center gap-2 mt-4 px-5 py-2.5 bg-gradient-to-r from-accent to-orange-500 text-white rounded-xl hover:shadow-lg transition-all font-semibold text-sm">
                        <i class="fa-solid fa-pen-to-square"></i> Pilih Jalur Pendaftaran
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- KETENTUAN PERSYARATAN FILE --}}
    <div class="mt-6 bg-white rounded-2xl shadow-lg p-5 modern-card border border-gray-100">
        <div class="flex items-center gap-3 mb-4">
            <div class="icon-doc">
                <i class="fa-solid fa-scale-balanced text-white text-sm"></i>
            </div>
            <h2 class="text-base md:text-lg font-extrabold text-[#0a3d2f]">📋 Ketentuan Unggah Dokumen</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-xl">
                <div class="w-8 h-8 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-file-pdf text-accent text-sm"></i></div>
                <div><p class="text-sm font-medium text-gray-700">Format Berkas</p><p class="text-xs text-gray-500">Dokumen harus dalam format <strong>PDF</strong>.</p></div>
            </div>
            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-xl">
                <div class="w-8 h-8 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-hard-drive text-accent text-sm"></i></div>
                <div><p class="text-sm font-medium text-gray-700">Ukuran Maksimal</p><p class="text-xs text-gray-500">Maksimal <strong>2 Megabyte (MB)</strong> per berkas.</p></div>
            </div>
            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-xl">
                <div class="w-8 h-8 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0"><i class="fa-regular fa-eye text-accent text-sm"></i></div>
                <div><p class="text-sm font-medium text-gray-700">Kejelasan Dokumen</p><p class="text-xs text-gray-500">Dokumen harus terbaca dengan jelas (tidak buram/terpotong).</p></div>
            </div>
            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-xl">
                <div class="w-8 h-8 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0"><i class="fa-regular fa-clock text-accent text-sm"></i></div>
                <div><p class="text-sm font-medium text-gray-700">Batas Waktu Unggah</p><p class="text-xs text-gray-500">Unggah sebelum <strong>28 Februari 2026</strong>.</p></div>
            </div>
        </div>
    </div>

    {{-- LAYANAN BANTUAN --}}
    <div class="mt-6 bg-gradient-to-r from-[#0a3d2f] via-[#1b5e4a] to-[#0a3d2f] rounded-2xl shadow-xl p-5">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-solid fa-headset text-white text-xl"></i></div>
                <div><h3 class="font-bold text-white">💬 Butuh Bantuan?</h3><p class="text-white/80 text-xs">Hubungi panitia PPDB untuk informasi lebih lanjut</p></div>
            </div>
            <div class="flex flex-wrap justify-center gap-2">
                <a href="tel:075212345" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition"><i class="fa-solid fa-phone"></i> Telepon</a>
                <a href="mailto:ppdb@sman1batanggasan.sch.id" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition"><i class="fa-regular fa-envelope"></i> Surel</a>
                <a href="https://wa.me/6281234567890" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </div>
</div>

{{-- MODAL UNTUK UPDATE/GANTI DOKUMEN --}}
<div id="updateModal" class="fixed inset-0 z-50 hidden items-center justify-center modal-overlay" style="display: none;">
    <div class="modal-container bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-cloud-arrow-up text-white text-sm"></i>
                    </div>
                    <h3 id="modalTitle" class="text-white font-bold text-lg">Ganti Dokumen</h3>
                </div>
                <button onclick="closeModal()" class="text-white/80 hover:text-white transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>
        </div>
        
        <form id="updateForm" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            <input type="hidden" id="dokumenKey" name="dokumen_key">
            <input type="hidden" id="dokumenField" name="dokumen_field">
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fa-regular fa-file text-accent mr-1"></i> Dokumen: <span id="dokumenLabel" class="text-primary"></span>
                </label>
                <div class="relative">
                    <input type="file" id="fileInput" name="file" accept=".pdf,.jpg,.jpeg,.png" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                </div>
                <p class="text-xs text-gray-400 mt-2">
                    <i class="fa-regular fa-info-circle"></i> Format yang diterima: PDF, JPG, JPEG, PNG (Maksimal 2MB)
                </p>
            </div>
            
            <div class="bg-accent/10 rounded-xl p-3 mb-4">
                <p class="text-xs text-gray-600">
                    <i class="fa-regular fa-lightbulb text-accent mr-1"></i> 
                    Dokumen baru akan menggantikan dokumen lama. Pastikan dokumen pengganti sudah benar dan sesuai persyaratan.
                </p>
            </div>
            
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" onclick="closeModal()" 
                    class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 font-medium flex items-center gap-2">
                    <i class="fa-regular fa-times"></i> Batal
                </button>
                <button type="submit" 
                    class="px-5 py-2.5 bg-gradient-to-r from-accent to-orange-500 text-white rounded-xl hover:shadow-lg transition-all duration-300 font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> Unggah
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Mapping key dokumen ke field database
    const fieldMapping = {
        'kartu_keluarga': 'kartu_keluarga',
        'akta_kelahiran': 'akta_kelahiran',
        'rapor': 'rapor',
        'ijazah': 'ijazah',
        'pas_foto': 'pas_foto',
        'sertifikat_prestasi': 'sertifikat',
        'rekomendasi_sekolah': 'rekomendasi_sekolah',
        'bukti_kip_pkh': 'bukti_kip_pkh',
        'surat_tidak_mampu': 'surat_tidak_mampu',
        'surat_disabilitas': 'surat_disabilitas',
        'surat_pindah': 'surat_pindah',
        'surat_penugasan': 'surat_penugasan',
    };
    
    // Modal elements
    const modal = document.getElementById('updateModal');
    const modalTitle = document.getElementById('modalTitle');
    const dokumenLabel = document.getElementById('dokumenLabel');
    const dokumenKey = document.getElementById('dokumenKey');
    const dokumenField = document.getElementById('dokumenField');
    const updateForm = document.getElementById('updateForm');
    
    // Open update modal
    function openUpdateModal(key, label) {
        modalTitle.innerText = 'Ganti Dokumen';
        dokumenLabel.innerText = label;
        dokumenKey.value = key;
        dokumenField.value = fieldMapping[key] || key;
        updateForm.action = '{{ route("siswa.dokumen.update", auth()->id()) }}';
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }
    
    // Open upload modal untuk dokumen baru
    function openUploadModal(key, label) {
        modalTitle.innerText = 'Unggah Dokumen';
        dokumenLabel.innerText = label;
        dokumenKey.value = key;
        dokumenField.value = fieldMapping[key] || key;
        updateForm.action = '{{ route("siswa.dokumen.update", auth()->id()) }}';
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }
    
    // Close modal
    function closeModal() {
        modal.classList.add('hidden');
        modal.style.display = 'none';
        document.getElementById('fileInput').value = '';
    }
    
    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Efek klik pada tombol
    document.querySelectorAll('.btn-view, .btn-edit, .btn-update, a[href]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.href && !this.href.startsWith('javascript:')) {
                this.style.transform = 'scale(0.97)';
                setTimeout(() => { if (this) this.style.transform = ''; }, 120);
            }
        });
    });
    
    // Validasi file sebelum submit
    document.getElementById('fileInput')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const maxSize = 2 * 1024 * 1024; // 2MB
            const allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
            
            if (file.size > maxSize) {
                alert('❌ Ukuran file terlalu besar! Maksimal 2MB.');
                this.value = '';
                return;
            }
            
            if (!allowedTypes.includes(file.type)) {
                alert('❌ Format file tidak didukung! Gunakan PDF, JPG, JPEG, atau PNG.');
                this.value = '';
                return;
            }
            
            // Tampilkan konfirmasi
            if (confirm(`⚠️ Anda akan mengunggah dokumen ini.\n\nFile: ${file.name}\nUkuran: ${(file.size / 1024).toFixed(2)} KB\n\nLanjutkan?`)) {
                // Submit akan dilanjutkan
            } else {
                this.value = '';
            }
        }
    });
</script>
@endsection