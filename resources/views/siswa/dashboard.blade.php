@extends('layouts.siswa')

@section('title', 'Dashboard Siswa - PPDB SMAN 1 Batang Gasan')
@section('header', 'Dashboard PPDB 2026')

@section('content')
<style>
    /* Reset & Base */
    * {
        -webkit-tap-highlight-color: transparent;
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-5px); }
    }

    .animate-fade-up {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }

    /* Modern Card */
    .modern-card {
        transition: all 0.3s ease;
        border-radius: 24px;
    }
    .modern-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
    }

    /* Gradient Text dengan efek timbul */
    .gradient-text {
        background: linear-gradient(135deg, #1f2937 0%, #374151 50%, #4B5563 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.05);
    }
    
    /* Efek timbul untuk teks */
    .text-emboss {
        color: #374151;
        text-shadow: 0 1px 0 rgba(255,255,255,0.8), 0 2px 2px rgba(0,0,0,0.05);
    }
    
    .text-emboss-light {
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }
    
    /* Icon container dengan efek timbul */
    .icon-box {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .icon-box:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
    }
    
    /* Status badge dengan efek */
    .status-badge {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.2s ease;
    }
    .status-badge:hover {
        transform: scale(1.02);
    }

    /* Touch Friendly Button */
    .btn-modern {
        transition: all 0.3s ease;
        cursor: pointer;
        min-height: 48px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .btn-modern:active {
        transform: scale(0.97);
    }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
    ::-webkit-scrollbar-thumb { background: #F59E0B; border-radius: 10px; }

    /* Icon styling */
    .icon-shadow {
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }
    
    /* Text gradient untuk judul */
    .title-gradient {
        background: linear-gradient(135deg, #374151 0%, #F59E0B 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    @media (max-width: 640px) {
        .container-custom { padding-left: 16px; padding-right: 16px; }
        .text-responsive { font-size: 0.75rem; }
    }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-5 md:space-y-6">
    
    {{-- GREETING CARD --}}
    <div class="animate-fade-up">
        <div class="bg-gradient-to-r from-primary via-primary to-secondary rounded-2xl shadow-xl overflow-hidden">
            <div class="px-5 py-6 md:px-7 md:py-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center icon-shadow">
                                <i class="fa-regular fa-hand-peace text-lg"></i>
                            </div>
                            <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full shadow-sm">✨ Selamat Datang ✨</span>
                        </div>
                        <h1 class="text-xl md:text-3xl font-extrabold mb-1 tracking-tight text-white drop-shadow-md">Halo, <span class="text-accent">{{ Auth::user()->name }}</span>! 👋</h1>
                        <p class="text-white/90 text-sm max-w-lg leading-relaxed drop-shadow-sm">Pantau status pendaftaran dan lengkapi berkas Anda dengan mudah di dashboard ini.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-16 h-16 bg-white/15 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-graduation-cap text-3xl text-white/90 icon-shadow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKSES CEPAT --}}
    <div class="animate-fade-up delay-1">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center icon-box">
                    <i class="fa-solid fa-bolt text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold title-gradient">Akses Cepat</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <a href="{{ route('siswa.ppdb.index') }}" 
                   class="btn-modern flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-3 rounded-xl hover:shadow-lg transition-all font-semibold text-sm">
                    <i class="fa-regular fa-pen-to-square text-base icon-shadow"></i> 
                    <span>Isi Formulir</span>
                </a>
                <a href="{{ route('siswa.dokumen.index') }}" 
                   class="btn-modern flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-3 rounded-xl hover:shadow-lg transition-all font-semibold text-sm">
                    <i class="fa-solid fa-cloud-arrow-up text-base icon-shadow"></i> 
                    <span>Upload Dokumen</span>
                </a>
                <a href="{{ route('siswa.ppdb.cetak') }}" 
                   class="btn-modern flex items-center justify-center gap-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white px-3 py-3 rounded-xl hover:shadow-lg transition-all font-semibold text-sm">
                    <i class="fa-solid fa-print text-base icon-shadow"></i> 
                    <span>Cetak Bukti</span>
                </a>
            </div>
        </div>
    </div>

    @php
        use Carbon\Carbon;
        $pendaftaran = \App\Models\PPDBPendaftaran::where('user_id', auth()->id())->first();
        $dokumen = \App\Models\PPDBDokumen::where('user_id', auth()->id())->first();
        
        $statusColor = 'gray';
        $statusBg = 'bg-gray-500';
        $statusIcon = 'fa-regular fa-clock';
        $statusText = 'Belum Diverifikasi';
        $statusTextColor = 'text-gray-600';
        
        if ($pendaftaran) {
            if ($pendaftaran->status == 'Diterima') {
                $statusColor = 'green';
                $statusBg = 'bg-green-500';
                $statusIcon = 'fa-regular fa-circle-check';
                $statusText = 'Diterima';
                $statusTextColor = 'text-green-600';
            } elseif ($pendaftaran->status == 'Cadangan') {
                $statusColor = 'yellow';
                $statusBg = 'bg-yellow-500';
                $statusIcon = 'fa-solid fa-clock';
                $statusText = 'Cadangan';
                $statusTextColor = 'text-yellow-600';
            } elseif ($pendaftaran->status == 'Ditolak') {
                $statusColor = 'red';
                $statusBg = 'bg-red-500';
                $statusIcon = 'fa-regular fa-circle-xmark';
                $statusText = 'Ditolak';
                $statusTextColor = 'text-red-600';
            } elseif ($pendaftaran->status) {
                $statusBg = 'bg-primary';
                $statusIcon = 'fa-regular fa-hourglass-half';
                $statusText = $pendaftaran->status;
                $statusTextColor = 'text-primary';
            }
        }
    @endphp

    {{-- STATUS PENDAFTARAN & INFO PENTING --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 animate-fade-up delay-2">
        {{-- Status Card --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center icon-box">
                    <i class="fa-regular fa-rectangle-list text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold title-gradient">Status Pendaftaran</h2>
            </div>
            
            @if ($pendaftaran)
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full {{ $statusBg }} flex items-center justify-center shadow-lg status-badge">
                            <i class="{{ $statusIcon }} text-white text-2xl icon-shadow"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Status Saat Ini</p>
                            <p class="text-2xl md:text-3xl font-extrabold {{ $statusTextColor }} drop-shadow-sm">{{ $statusText }}</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl px-4 py-2 text-center sm:text-left shadow-inner">
                        <p class="text-xs text-gray-400 flex items-center justify-center sm:justify-start gap-1"><i class="fa-regular fa-calendar"></i> Tanggal Pendaftaran</p>
                        <p class="text-sm font-bold text-primary">{{ Carbon::parse($pendaftaran->created_at)->translatedFormat('d F Y H:i') }} WIB</p>
                    </div>
                </div>
                
                @if($pendaftaran->status == 'Diterima')
                <div class="mt-4 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border-l-4 border-green-500 flex gap-2 shadow-sm">
                    <i class="fa-regular fa-face-smile text-green-600 text-lg"></i>
                    <span class="text-sm text-green-700 font-medium">🎉 Selamat! Anda diterima. Silakan lakukan daftar ulang pada tanggal 21-25 Maret 2026.</span>
                </div>
                @elseif($pendaftaran->status == 'Cadangan')
                <div class="mt-4 p-3 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border-l-4 border-yellow-500 flex gap-2 shadow-sm">
                    <i class="fa-regular fa-bell text-yellow-600 text-lg"></i>
                    <span class="text-sm text-yellow-700 font-medium">⏳ Status cadangan. Pantau terus pengumuman selanjutnya melalui website.</span>
                </div>
                @elseif($pendaftaran->status == 'Ditolak')
                <div class="mt-4 p-3 bg-gradient-to-r from-red-50 to-rose-50 rounded-xl border-l-4 border-red-500 flex gap-2 shadow-sm">
                    <i class="fa-regular fa-circle-exclamation text-red-600 text-lg"></i>
                    <span class="text-sm text-red-700 font-medium">Mohon maaf, pendaftaran belum berhasil. Hubungi panitia PPDB di (0752) 12345.</span>
                </div>
                @else
                <div class="mt-4 p-3 bg-gradient-to-r from-primary/5 to-secondary/5 rounded-xl border-l-4 border-accent flex gap-2 shadow-sm">
                    <i class="fa-regular fa-hourglass-half text-primary text-lg"></i>
                    <span class="text-sm text-gray-700 font-medium">📋 Berkas Anda sedang dalam proses verifikasi oleh tim panitia. Hasil akan diumumkan pada 20 Maret 2026.</span>
                </div>
                @endif
            @else
                <div class="text-center py-8">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                        <i class="fa-regular fa-file-lines text-gray-300 text-3xl"></i>
                    </div>
                    <p class="text-red-500 font-bold text-base">⚠️ Anda belum melakukan pendaftaran.</p>
                    <p class="text-gray-400 text-sm mt-2">Silakan isi formulir pendaftaran melalui tombol "Isi Formulir" di atas.</p>
                </div>
            @endif
        </div>

        {{-- Info Penting Card --}}
        <div class="bg-gradient-to-br from-accent/10 via-primary/5 to-secondary/5 rounded-2xl shadow-lg p-5 md:p-6 border border-accent/20 modern-card">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-gradient-to-br from-accent to-orange-500 rounded-lg flex items-center justify-center icon-box">
                    <i class="fa-regular fa-calendar-check text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold title-gradient">Info Penting</h2>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-3 p-2 bg-white/60 rounded-xl shadow-sm">
                    <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-calendar text-accent text-xs"></i></div>
                    <p class="text-sm text-gray-700 font-medium">📅 Pendaftaran ditutup <span class="font-bold text-primary">28 Februari 2026</span></p>
                </div>
                <div class="flex items-center gap-3 p-2 bg-white/60 rounded-xl shadow-sm">
                    <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-bell text-accent text-xs"></i></div>
                    <p class="text-sm text-gray-700 font-medium">📢 Pengumuman hasil: <span class="font-bold text-primary">20 Maret 2026</span></p>
                </div>
                <div class="flex items-center gap-3 p-2 bg-white/60 rounded-xl shadow-sm">
                    <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-hand-peace text-accent text-xs"></i></div>
                    <p class="text-sm text-gray-700 font-medium">📝 Daftar ulang: <span class="font-bold text-primary">21-25 Maret 2026</span></p>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-accent/20">
                <div class="flex items-center gap-2 bg-white/60 rounded-xl p-2 shadow-sm">
                    <i class="fa-solid fa-headset text-accent text-sm animate-pulse"></i>
                    <p class="text-xs text-gray-600 font-medium">Butuh bantuan? Hubungi <span class="font-bold text-primary">(0752) 12345</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- PENGUMUMAN TERBARU --}}
    <div class="animate-fade-up delay-3">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center icon-box">
                        <i class="fa-regular fa-bullhorn text-white text-sm"></i>
                    </div>
                    <h2 class="text-base md:text-lg font-extrabold title-gradient">Pengumuman Terbaru</h2>
                </div>
                <span class="text-xs text-gray-400 bg-gray-100 px-3 py-1 rounded-full shadow-inner"><i class="fa-regular fa-clock"></i> Update Berkala</span>
            </div>

            @php
                $pengumuman = \App\Models\Pengumuman::where('ditampilkan_ke', 'siswa')
                    ->orWhere('ditampilkan_ke', 'semua')
                    ->latest()->first();
            @endphp

            @if ($pengumuman)
                <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-4 border-l-4 border-accent shadow-sm">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="w-12 h-12 bg-accent/15 rounded-xl flex items-center justify-center icon-box">
                            <i class="fa-regular fa-newspaper text-accent text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-extrabold text-primary text-base md:text-lg drop-shadow-sm">{{ $pengumuman->judul }}</h3>
                            <div class="flex gap-3 text-xs text-gray-400 my-2">
                                <span><i class="fa-regular fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}</span>
                                <span><i class="fa-regular fa-user"></i> Panitia PPDB</span>
                            </div>
                            <div class="text-gray-700 text-sm leading-relaxed font-medium">{!! nl2br(e($pengumuman->isi)) !!}</div>
                            @if ($pengumuman->lampiran)
                                <a href="{{ asset('storage/' . $pengumuman->lampiran) }}" target="_blank" class="inline-flex items-center gap-1 text-xs bg-primary/10 text-primary px-3 py-1.5 rounded-lg mt-3 hover:bg-primary hover:text-white transition shadow-sm">
                                    <i class="fa-regular fa-file-pdf"></i> Lihat Lampiran
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 shadow-inner">
                        <i class="fa-regular fa-bell-slash text-gray-300 text-2xl"></i>
                    </div>
                    <p class="text-gray-400 font-medium">Belum ada pengumuman saat ini.</p>
                    <p class="text-gray-300 text-xs mt-1">Silakan cek secara berkala.</p>
                </div>
            @endif
        </div>
    </div>

    {{-- PROGRESS PENDAFTARAN --}}
    <div class="animate-fade-up delay-4">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-2 mb-5">
                <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center icon-box">
                    <i class="fa-solid fa-chart-line text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold title-gradient">Progress Pendaftaran</h2>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                @php
                    $steps = [
                        ['name' => 'Registrasi Akun', 'icon' => 'fa-regular fa-user', 'done' => true, 'desc' => 'Selesai'],
                        ['name' => 'Formulir', 'icon' => 'fa-regular fa-pen-to-square', 'done' => $pendaftaran ? true : false, 'desc' => $pendaftaran ? 'Tersimpan' : 'Belum'],
                        ['name' => 'Dokumen', 'icon' => 'fa-regular fa-folder-open', 'done' => $dokumen ? true : false, 'desc' => $dokumen ? 'Lengkap' : 'Belum'],
                        ['name' => 'Verifikasi', 'icon' => 'fa-regular fa-hourglass-half', 'done' => $pendaftaran && $pendaftaran->status ? true : false, 'desc' => $pendaftaran && $pendaftaran->status ? 'Proses' : 'Menunggu'],
                        ['name' => 'Pengumuman', 'icon' => 'fa-regular fa-bell', 'done' => in_array($pendaftaran->status ?? '', ['Diterima', 'Cadangan']), 'desc' => in_array($pendaftaran->status ?? '', ['Diterima', 'Cadangan']) ? $pendaftaran->status : 'Belum'],
                    ];
                @endphp
                
                @foreach($steps as $step)
                <div class="text-center group">
                    <div class="relative mb-2 flex justify-center">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto transition-all duration-300 group-hover:scale-110 shadow-md
                            {{ $step['done'] ? 'bg-gradient-to-br from-accent to-orange-500' : 'bg-gray-200' }}">
                            <i class="{{ $step['icon'] }} {{ $step['done'] ? 'text-white' : 'text-gray-400' }} text-base"></i>
                        </div>
                    </div>
                    <p class="text-xs font-bold {{ $step['done'] ? 'text-primary' : 'text-gray-400' }}">{{ $step['name'] }}</p>
                    <p class="text-[10px] text-gray-400 mt-0.5 font-medium">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="mt-5 p-3 bg-gradient-to-r from-primary/5 to-secondary/5 rounded-xl text-center shadow-inner">
                <p class="text-xs text-gray-600 font-medium"><i class="fa-regular fa-lightbulb text-accent mr-1"></i> Pastikan semua langkah diselesaikan untuk memproses pendaftaran Anda.</p>
            </div>
        </div>
    </div>

    {{-- DOKUMEN ANDA --}}
    <div class="animate-fade-up delay-4">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center icon-box">
                        <i class="fa-regular fa-folder-open text-white text-sm"></i>
                    </div>
                    <h2 class="text-base md:text-lg font-extrabold title-gradient">Dokumen Anda</h2>
                </div>
                <a href="{{ route('siswa.dokumen.index') }}" class="text-xs font-semibold text-accent hover:text-primary transition flex items-center gap-1">
                    Kelola <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            
            @if ($dokumen)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-xl shadow-sm hover:shadow transition">
                        <span class="flex items-center gap-2 text-sm font-medium text-gray-700"><i class="fa-regular fa-id-card text-primary w-5"></i> Kartu Keluarga</span>
                        <span class="text-sm font-bold {{ $dokumen->kartu_keluarga ? 'text-green-500' : 'text-red-400' }}">{{ $dokumen->kartu_keluarga ? '✓ Terupload' : '✗ Belum' }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-xl shadow-sm hover:shadow transition">
                        <span class="flex items-center gap-2 text-sm font-medium text-gray-700"><i class="fa-regular fa-file-pdf text-primary w-5"></i> Akta Kelahiran</span>
                        <span class="text-sm font-bold {{ $dokumen->akta_kelahiran ? 'text-green-500' : 'text-red-400' }}">{{ $dokumen->akta_kelahiran ? '✓ Terupload' : '✗ Belum' }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-xl shadow-sm hover:shadow transition">
                        <span class="flex items-center gap-2 text-sm font-medium text-gray-700"><i class="fa-regular fa-file-lines text-primary w-5"></i> Rapor</span>
                        <span class="text-sm font-bold {{ $dokumen->rapor ? 'text-green-500' : 'text-red-400' }}">{{ $dokumen->rapor ? '✓ Terupload' : '✗ Belum' }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-xl shadow-sm hover:shadow transition">
                        <span class="flex items-center gap-2 text-sm font-medium text-gray-700"><i class="fa-regular fa-certificate text-primary w-5"></i> Sertifikat</span>
                        <span class="text-sm font-bold {{ $dokumen->sertifikat ? 'text-green-500' : 'text-gray-400' }}">{{ $dokumen->sertifikat ? '✓ Terupload' : '○ Opsional' }}</span>
                    </div>
                </div>
                <div class="mt-4 p-3 bg-primary/5 rounded-xl text-center shadow-inner">
                    <p class="text-xs text-gray-600 font-medium"><i class="fa-regular fa-shield-check text-accent mr-1"></i> Dokumen akan diverifikasi panitia. Format: PDF/JPG/PNG (Max 2MB per file)</p>
                </div>
            @else
                <div class="text-center py-6">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 shadow-inner">
                        <i class="fa-regular fa-folder-open text-gray-300 text-2xl"></i>
                    </div>
                    <p class="text-red-500 font-bold text-sm">⚠️ Belum ada dokumen yang diunggah.</p>
                    <p class="text-gray-400 text-xs mt-1">Silakan upload dokumen melalui menu "Upload Dokumen".</p>
                </div>
            @endif
        </div>
    </div>

    {{-- BANTUAN & KONTAK --}}
    <div class="animate-fade-up delay-4">
        <div class="bg-gradient-to-r from-primary via-secondary to-primary rounded-2xl shadow-xl p-5">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-headset text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-white text-base drop-shadow-sm">Butuh Bantuan?</h3>
                        <p class="text-white/80 text-xs">Hubungi panitia PPDB untuk informasi lebih lanjut</p>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center gap-2">
                    <a href="tel:075212345" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition shadow-md hover:shadow-lg">
                        <i class="fa-solid fa-phone"></i> Telepon
                    </a>
                    <a href="mailto:ppdb@sman1batanggasan.sch.id" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition shadow-md hover:shadow-lg">
                        <i class="fa-regular fa-envelope"></i> Email
                    </a>
                    <a href="https://wa.me/6281234567890" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition shadow-md hover:shadow-lg">
                        <i class="fa-brands fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Touch feedback untuk button
    document.querySelectorAll('.btn-modern, a[href]').forEach(btn => {
        btn.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.97)';
        });
        btn.addEventListener('touchend', function() {
            this.style.transform = '';
        });
    });
</script>
@endsection