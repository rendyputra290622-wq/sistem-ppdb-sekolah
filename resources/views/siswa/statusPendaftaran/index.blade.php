@extends('layouts.siswa')

@section('title', 'Status Pendaftaran PPDB - SMAN 1 Batang Gasan')
@section('header', 'Status Pendaftaran PPDB')

@section('content')
<style>
    /* Custom styles untuk status page */
    .status-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
    }
    .status-card:hover {
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
    .badge-pending {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
    }
    .badge-accepted {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
    }
    .badge-rejected {
        background: linear-gradient(135deg, #EF4444, #DC2626);
        color: white;
    }
    .badge-cadangan {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
    }
    
    .status-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }
    .status-table td {
        padding: 12px 16px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }
    .status-table td:first-child {
        width: 180px;
        font-weight: 600;
        color: #374151;
    }
    .status-table td:last-child {
        color: #1f2937;
    }
    
    .doc-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }
    .doc-available {
        background: #10B981;
        color: white;
    }
    .doc-missing {
        background: #EF4444;
        color: white;
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .info-section {
            padding: 16px;
        }
        .status-table td {
            padding: 10px 12px;
        }
        .status-table td:first-child {
            width: 120px;
            font-size: 13px;
        }
        .badge-status {
            font-size: 11px;
            padding: 4px 12px;
        }
        .doc-status {
            font-size: 10px;
            padding: 3px 10px;
        }
    }
    
    @media (max-width: 480px) {
        .status-table td {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .status-table td:first-child {
            width: 100%;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .status-table td:last-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    }
</style>

<div class="max-w-4xl mx-auto">
    
    {{-- Main Card --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden status-card border border-gray-100">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-clock text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-white text-xl font-extrabold">Status Pendaftaran PPDB</h2>
                    <p class="text-white/80 text-sm">Informasi terkini mengenai pendaftaran Anda</p>
                </div>
            </div>
        </div>
        
        {{-- Body --}}
        <div class="p-6 md:p-8">
            
            @if(isset($error))
                {{-- Error / Belum Daftar --}}
                <div class="text-center py-10">
                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-regular fa-circle-xmark text-red-400 text-4xl"></i>
                    </div>
                    <p class="text-red-500 font-medium text-lg">⚠️ {{ $error }}</p>
                    <p class="text-gray-400 text-sm mt-2">Silakan lakukan pendaftaran terlebih dahulu melalui menu "Formulir PPDB".</p>
                    <div class="mt-6">
                        <a href="{{ route('siswa.ppdb.form') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-accent to-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition">
                            <i class="fa-regular fa-pen-to-square"></i> Isi Formulir Pendaftaran
                        </a>
                    </div>
                </div>
                
            @elseif(isset($pending) && $pending === true)
                {{-- Menunggu Verifikasi --}}
                <div class="text-center py-8">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse">
                        <i class="fa-regular fa-hourglass-half text-yellow-500 text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">⏳ Menunggu Verifikasi</h3>
                    <p class="text-gray-600">Anda sudah mengirim formulir pendaftaran.</p>
                    <p class="text-gray-500 text-sm mt-1">Status saat ini: <strong class="text-accent">Menunggu Verifikasi Admin</strong></p>
                    <div class="mt-4 p-4 bg-yellow-50 rounded-xl border-l-4 border-yellow-500 text-left">
                        <p class="text-sm text-yellow-800 flex items-center gap-2">
                            <i class="fa-regular fa-clock"></i> Proses verifikasi membutuhkan waktu 1-3 hari kerja.
                        </p>
                        <p class="text-sm text-yellow-800 mt-2 flex items-center gap-2">
                            <i class="fa-regular fa-bell"></i> Hasil verifikasi akan diumumkan pada tanggal 20 Maret 2026.
                        </p>
                    </div>
                </div>
                
            @else
                {{-- Sudah Diverifikasi --}}
                
                {{-- Biodata Pendaftar --}}
                <div class="info-section mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                            <i class="fa-regular fa-user text-accent text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary">Biodata Pendaftar</h3>
                    </div>
                    <table class="status-table">
                        <tr><td>Nama Lengkap</td><td>{{ $siswa->nama_lengkap ?? '-' }}</td></tr>
                        <tr><td>NIK</td><td>{{ $siswa->nik ?? '-' }}</td></tr>
                        <tr><td>Tempat, Tanggal Lahir</td><td>{{ $siswa->tempat_lahir ?? '-' }}, {{ $siswa->tanggal_lahir ?? '-' }}</td></tr>
                        <tr><td>Jenis Kelamin</td><td>{{ $siswa->jenis_kelamin ?? '-' }}</td></tr>
                        <tr><td>Agama</td><td>{{ $siswa->agama ?? '-' }}</td></tr>
                        <tr><td>Alamat</td><td>{{ $siswa->alamat ?? '-' }}</td></tr>
                        <tr><td>No HP</td><td>{{ $siswa->no_hp ?? '-' }}</td></tr>
                        <tr><td>Asal Sekolah</td><td>{{ $siswa->asal_sekolah ?? '-' }}</td></tr>
                    </table>
                </div>
                
                {{-- Status Pendaftaran --}}
                <div class="info-section mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                            <i class="fa-regular fa-rectangle-list text-accent text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary">Status Pendaftaran</h3>
                    </div>
                    <table class="status-table">
                        <tr>
                            <td>Status Pendaftaran</td>
                            <td>
                                @php
                                    $statusBadge = match($pendaftaran->status) {
                                        'accepted' => ['class' => 'badge-accepted', 'icon' => 'fa-regular fa-circle-check', 'text' => 'Diterima'],
                                        'cadangan' => ['class' => 'badge-cadangan', 'icon' => 'fa-solid fa-clock', 'text' => 'Cadangan'],
                                        'rejected' => ['class' => 'badge-rejected', 'icon' => 'fa-regular fa-circle-xmark', 'text' => 'Ditolak'],
                                        default => ['class' => 'badge-pending', 'icon' => 'fa-regular fa-hourglass-half', 'text' => 'Dalam Proses'],
                                    };
                                @endphp
                                <span class="badge-status {{ $statusBadge['class'] }}">
                                    <i class="{{ $statusBadge['icon'] }}"></i> {{ $statusBadge['text'] }}
                                </span>
                            </td>
                        </tr>
                        <tr><td>Jalur Pendaftaran</td><td><strong>{{ ucfirst($pendaftaran->jalur) }}</strong></td></tr>
                        <tr><td>Tanggal Pendaftaran</td><td>{{ $pendaftaran->created_at->translatedFormat('d F Y H:i') }} WIB</td></tr>
                        <tr><td>Terakhir Diperbarui</td><td>{{ $pendaftaran->updated_at->translatedFormat('d F Y H:i') }} WIB</td></tr>
                    </table>
                </div>
                
                {{-- Status Dokumen --}}
                <div class="info-section mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                            <i class="fa-regular fa-folder-open text-accent text-sm"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary">Status Dokumen</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @php
                            $dokumenList = [
                                'kartu_keluarga' => ['label' => '📄 Kartu Keluarga', 'icon' => 'fa-regular fa-id-card'],
                                'akta_kelahiran' => ['label' => '📄 Akta Kelahiran', 'icon' => 'fa-regular fa-file-pdf'],
                                'rapor' => ['label' => '📄 Rapor', 'icon' => 'fa-regular fa-file-lines'],
                                'sertifikat' => ['label' => '🏆 Sertifikat', 'icon' => 'fa-regular fa-certificate'],
                                'bukti_kip_pkh' => ['label' => '🤝 Bukti KIP/PKH', 'icon' => 'fa-regular fa-receipt'],
                                'surat_disabilitas' => ['label' => '♿ Surat Disabilitas', 'icon' => 'fa-regular fa-handicap'],
                                'surat_penugasan' => ['label' => '📜 Surat Penugasan', 'icon' => 'fa-regular fa-envelope'],
                                'surat_pindah' => ['label' => '🔄 Surat Pindah', 'icon' => 'fa-regular fa-arrow-right-arrow-left'],
                            ];
                        @endphp
                        @foreach ($dokumenList as $key => $item)
                            <div class="flex justify-between items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100">
                                <div class="flex items-center gap-2">
                                    <i class="{{ $item['icon'] }} text-accent w-5"></i>
                                    <span class="text-sm text-gray-700">{{ $item['label'] }}</span>
                                </div>
                                <div>
                                    @if ($dokumen && $dokumen->{$key})
                                        <span class="doc-status doc-available">
                                            <i class="fa-regular fa-circle-check text-xs"></i> Ada
                                        </span>
                                    @else
                                        <span class="doc-status doc-missing">
                                            <i class="fa-regular fa-circle-xmark text-xs"></i> Tidak Ada
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Informasi Tambahan Berdasarkan Status --}}
                @if($pendaftaran->status === 'accepted')
                    <div class="bg-green-50 rounded-xl p-4 border-l-4 border-green-500 flex items-start gap-3">
                        <i class="fa-regular fa-face-smile text-green-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-green-800">🎉 Selamat! Anda Diterima</p>
                            <p class="text-xs text-green-700 mt-1">Silakan lakukan daftar ulang pada tanggal 21-25 Maret 2026. Jangan lupa mencetak bukti pendaftaran.</p>
                            <div class="mt-3">
                                <a href="{{ route('siswa.ppdb.cetak') }}" target="_blank" class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition">
                                    <i class="fa-solid fa-print"></i> Cetak Bukti Pendaftaran
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif($pendaftaran->status === 'cadangan')
                    <div class="bg-yellow-50 rounded-xl p-4 border-l-4 border-yellow-500 flex items-start gap-3">
                        <i class="fa-regular fa-bell text-yellow-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-yellow-800">⏳ Status Cadangan</p>
                            <p class="text-xs text-yellow-700 mt-1">Anda berada dalam daftar cadangan. Mohon pantau terus pengumuman selanjutnya.</p>
                        </div>
                    </div>
                @elseif($pendaftaran->status === 'rejected')
                    <div class="bg-red-50 rounded-xl p-4 border-l-4 border-red-500 flex items-start gap-3">
                        <i class="fa-regular fa-circle-exclamation text-red-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-red-800">❌ Pendaftaran Belum Berhasil</p>
                            <p class="text-xs text-red-700 mt-1">Silakan hubungi panitia PPDB di nomor (0752) 12345 untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                @endif
                
                {{-- Jadwal Penting --}}
                <div class="mt-6 p-4 bg-gray-50 rounded-xl">
                    <div class="flex items-center gap-2 mb-3">
                        <i class="fa-regular fa-calendar-alt text-accent"></i>
                        <span class="text-sm font-semibold text-primary">📅 Jadwal Penting PPDB 2026</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs text-gray-600">
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Pendaftaran: 10 Jan - 28 Feb 2026</div>
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Verifikasi: 1-5 Maret 2026</div>
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Pengumuman: 20 Maret 2026</div>
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Daftar Ulang: 21-25 Maret 2026</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    {{-- Kontak Bantuan --}}
    <div class="mt-6 bg-gradient-to-r from-[#0a3d2f] via-[#1b5e4a] to-[#0a3d2f] rounded-2xl shadow-xl p-4">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-3">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-headset text-white text-lg"></i>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm">💬 Butuh Bantuan?</p>
                    <p class="text-white/70 text-xs">Hubungi panitia PPDB</p>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-2">
                <a href="tel:075212345" class="flex items-center gap-1 bg-white/20 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-white/30 transition">
                    <i class="fa-solid fa-phone"></i> (0752) 12345
                </a>
                <a href="mailto:ppdb@sman1batanggasan.sch.id" class="flex items-center gap-1 bg-white/20 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-white/30 transition">
                    <i class="fa-regular fa-envelope"></i> ppdb@sman1batanggasan.sch.id
                </a>
                <a href="https://wa.me/6281234567890" class="flex items-center gap-1 bg-white/20 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-white/30 transition">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Efek klik pada tombol
    document.querySelectorAll('a.btn-primary, a.btn-accent, .btn-print, a[href]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.97)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
</script>
@endsection