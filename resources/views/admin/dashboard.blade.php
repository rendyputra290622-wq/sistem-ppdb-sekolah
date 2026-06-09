@extends('layouts.admin')

@section('title', 'Dashboard Admin - PPDB SMAN 1 Batang Gasan')
@section('header', 'Dashboard Admin')

@section('content')
<style>
    /* Custom styles untuk dashboard admin - Modern & Optimal */
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        isolation: isolate;
    }
    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 35px -12px rgba(0, 0, 0, 0.25);
    }
    
    .activity-item {
        transition: all 0.25s ease;
        cursor: pointer;
        border-radius: 16px;
    }
    .activity-item:hover {
        background: linear-gradient(90deg, rgba(245, 158, 11, 0.08) 0%, rgba(245, 158, 11, 0.02) 100%);
        transform: translateX(6px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    /* Badge status modern */
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 40px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.3px;
        backdrop-filter: blur(4px);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }
    
    /* Quick access buttons dengan efek modern */
    .quick-btn {
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        font-weight: 600;
    }
    .quick-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.35);
        transform: translate(-50%, -50%);
        transition: width 0.5s, height 0.5s;
    }
    .quick-btn:active::before {
        width: 250px;
        height: 250px;
    }
    .quick-btn:hover {
        transform: translateY(-3px);
        filter: brightness(1.05);
    }
    
    /* Icon container modern */
    .icon-container {
        transition: all 0.3s ease;
        border-radius: 18px;
    }
    .stat-card:hover .icon-container {
        transform: scale(1.08) rotate(5deg);
        background: rgba(255, 255, 255, 0.3);
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .stat-card .stat-value {
            font-size: 1.75rem;
        }
        .stat-card .stat-label {
            font-size: 0.7rem;
        }
        .quick-btn {
            padding: 12px 10px;
            font-size: 0.75rem;
        }
        .badge-status {
            padding: 3px 8px;
            font-size: 10px;
        }
    }
    
    @media (max-width: 480px) {
        .stat-card .stat-value {
            font-size: 1.5rem;
        }
        .stat-card .stat-label {
            font-size: 0.65rem;
        }
    }
    
    /* Animasi fade in */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes scaleIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .dashboard-section {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    .dashboard-section:nth-child(1) { animation-delay: 0s; }
    .dashboard-section:nth-child(2) { animation-delay: 0.08s; }
    .dashboard-section:nth-child(3) { animation-delay: 0.16s; }
    .dashboard-section:nth-child(4) { animation-delay: 0.24s; }
    .dashboard-section:nth-child(5) { animation-delay: 0.32s; }
    .dashboard-section:nth-child(6) { animation-delay: 0.4s; }
    
    /* Tooltip modern */
    [data-tooltip] {
        position: relative;
        cursor: help;
    }
    [data-tooltip]:before {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        padding: 5px 10px;
        background: #374151;
        color: white;
        font-size: 11px;
        border-radius: 8px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
        z-index: 10;
    }
    [data-tooltip]:hover:before {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-5px);
    }
</style>

<div class="space-y-6 md:space-y-8">
    
    {{-- GREETING CARD - Sapaan Pengguna Modern --}}
    <div class="dashboard-section">
        <div class="bg-gradient-to-br from-primary via-primary to-secondary rounded-2xl shadow-xl overflow-hidden relative">
            <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -ml-16 -mb-16"></div>
            <div class="relative px-5 py-6 md:px-7 md:py-7">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <i class="fa-regular fa-hand-peace text-lg"></i>
                            </div>
                            <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1.5 rounded-full">
                                <i class="fa-regular fa-shield-haltered mr-1"></i> Dashboard Admin
                            </span>
                        </div>
                        <h1 class="text-xl md:text-2xl font-extrabold mb-1">
                            Selamat Datang, <span class="text-accent">{{ Auth::user()->name }}</span>! 👋
                        </h1>
                        <p class="text-white/85 text-sm max-w-lg leading-relaxed">
                            Kelola data pendaftaran PPDB SMAN 1 Batang Gasan dengan mudah. Pantau statistik, verifikasi dokumen, dan kelola pengguna.
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-16 h-16 bg-white/15 rounded-2xl flex items-center justify-center backdrop-blur-sm shadow-lg">
                            <i class="fa-solid fa-chart-line text-2xl text-white/90"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK CARD - Dengan Icon Modern & Animasi --}}
    <div class="dashboard-section">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
            <!-- Total Pendaftar -->
            <div class="stat-card bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 text-white p-5 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-white/80">Total Pendaftar</p>
                        <p class="stat-value text-3xl md:text-4xl font-black mt-1 tracking-tight">{{ number_format(\App\Models\PPDBPendaftaran::count()) }}</p>
                        <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                            <i class="fa-regular fa-user"></i> Seluruh pendaftar
                        </p>
                    </div>
                    <div class="icon-container w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <i class="fa-solid fa-users text-xl"></i>
                    </div>
                </div>
            </div>
            
            <!-- Diterima -->
            <div class="stat-card bg-gradient-to-br from-green-500 via-green-600 to-emerald-600 text-white p-5 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-white/80">Diterima</p>
                        <p class="stat-value text-3xl md:text-4xl font-black mt-1 tracking-tight">{{ number_format(\App\Models\PPDBPendaftaran::where('status', 'Diterima')->count()) }}</p>
                        <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                            <i class="fa-regular fa-circle-check"></i> Lolos seleksi
                        </p>
                    </div>
                    <div class="icon-container w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <i class="fa-regular fa-circle-check text-xl"></i>
                    </div>
                </div>
            </div>
            
            <!-- Cadangan -->
            <div class="stat-card bg-gradient-to-br from-amber-500 via-yellow-500 to-orange-500 text-white p-5 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-white/80">Cadangan</p>
                        <p class="stat-value text-3xl md:text-4xl font-black mt-1 tracking-tight">{{ number_format(\App\Models\PPDBPendaftaran::where('status', 'Cadangan')->count()) }}</p>
                        <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                            <i class="fa-regular fa-clock"></i> Menunggu konfirmasi
                        </p>
                    </div>
                    <div class="icon-container w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <i class="fa-solid fa-hourglass-half text-xl"></i>
                    </div>
                </div>
            </div>
            
            <!-- Ditolak -->
            <div class="stat-card bg-gradient-to-br from-red-500 via-red-600 to-rose-600 text-white p-5 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-white/80">Ditolak</p>
                        <p class="stat-value text-3xl md:text-4xl font-black mt-1 tracking-tight">{{ number_format(\App\Models\PPDBPendaftaran::where('status', 'Ditolak')->count()) }}</p>
                        <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                            <i class="fa-regular fa-circle-xmark"></i> Tidak lolos
                        </p>
                    </div>
                    <div class="icon-container w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <i class="fa-regular fa-circle-xmark text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKTIVITAS TERAKHIR - Dengan Icon Modern --}}
    <div class="dashboard-section">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 bg-primary/10 rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-clock-rotate-left text-primary text-base"></i>
                        </div>
                        <h2 class="text-lg font-bold text-primary">Aktivitas Terakhir</h2>
                        <span class="text-xs text-gray-400 bg-gray-100 px-2.5 py-1 rounded-full ml-1">
                            <i class="fa-regular fa-sync-alt text-xs"></i> Realtime
                        </span>
                    </div>
                    <div class="text-xs text-gray-400">
                        <i class="fa-regular fa-list-alt mr-1"></i> 5 data terbaru
                    </div>
                </div>
            </div>
            <div class="p-5">
                @php
                    $recentActivities = \App\Models\PPDBPendaftaran::with('user')->latest()->take(5)->get();
                @endphp
                
                @if($recentActivities->count() > 0)
                    <div class="space-y-2.5">
                        @foreach($recentActivities as $item)
                            <div class="activity-item flex flex-col sm:flex-row sm:items-center justify-between p-3.5 border border-gray-100 bg-gray-50/30">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-primary/15 to-primary/5 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fa-regular fa-user text-primary text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800 text-sm">{{ $item->user->name ?? 'Pengguna Tidak Dikenal' }}</p>
                                        <div class="flex flex-wrap items-center gap-2 text-xs text-gray-400 mt-0.5">
                                            <span><i class="fa-regular fa-calendar-alt text-accent"></i> {{ $item->created_at->translatedFormat('d F Y') }}</span>
                                            <span><i class="fa-regular fa-clock"></i> {{ $item->created_at->format('H:i') }} WIB</span>
                                            <span><i class="fa-regular fa-road"></i> {{ ucfirst($item->jalur ?? 'Belum diisi') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 sm:mt-0">
                                    @php
                                        $statusClass = match($item->status) {
                                            'Diterima' => 'bg-gradient-to-r from-green-500 to-emerald-500',
                                            'Cadangan' => 'bg-gradient-to-r from-yellow-500 to-orange-500',
                                            'Ditolak' => 'bg-gradient-to-r from-red-500 to-rose-500',
                                            default => 'bg-gradient-to-r from-gray-400 to-gray-500'
                                        };
                                        $statusIcon = match($item->status) {
                                            'Diterima' => 'fa-regular fa-circle-check',
                                            'Cadangan' => 'fa-solid fa-clock',
                                            'Ditolak' => 'fa-regular fa-circle-xmark',
                                            default => 'fa-regular fa-hourglass-half'
                                        };
                                    @endphp
                                    <span class="badge-status {{ $statusClass }} text-white shadow-sm">
                                        <i class="{{ $statusIcon }} text-white text-xs"></i>
                                        {{ $item->status ?? 'Pending' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-10">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-regular fa-inbox text-gray-300 text-3xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium">Belum Ada Aktivitas</p>
                        <p class="text-gray-400 text-sm mt-1">Belum ada pendaftar yang mendaftar</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- STATISTIK JALUR PENDAFTARAN - Dengan Card Modern --}}
    <div class="dashboard-section">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-primary/10 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-chart-pie text-primary text-base"></i>
                    </div>
                    <h2 class="text-lg font-bold text-primary">Statistik Jalur Pendaftaran</h2>
                </div>
            </div>
            <div class="p-5">
                @php
                    $jalurList = \App\Models\PPDBPendaftaran::select('jalur', \DB::raw('count(*) as total'))
                        ->whereNotNull('jalur')
                        ->groupBy('jalur')
                        ->get();
                @endphp
                
                @if($jalurList->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($jalurList as $jalur)
                            @php
                                $jalurName = strtolower($jalur->jalur);
                                $color = match($jalurName) {
                                    'reguler', 'umum' => 'blue',
                                    'prestasi', 'unggulan' => 'purple',
                                    'afirmasi', 'zonasi' => 'green',
                                    'pindahan' => 'orange',
                                    default => 'primary'
                                };
                                $icon = match($jalurName) {
                                    'reguler', 'umum' => 'fa-regular fa-road',
                                    'prestasi', 'unggulan' => 'fa-solid fa-trophy',
                                    'afirmasi', 'zonasi' => 'fa-solid fa-hand-holding-heart',
                                    'pindahan' => 'fa-solid fa-arrow-right-arrow-left',
                                    default => 'fa-regular fa-clipboard'
                                };
                            @endphp
                            <div class="bg-gradient-to-br from-{{ $color }}-50/80 to-{{ $color }}-100/60 rounded-xl p-4 border border-{{ $color }}-200 shadow-sm hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-bold text-{{ $color }}-700 capitalize flex items-center gap-1">
                                            <i class="{{ $icon }} text-{{ $color }}-500 text-xs"></i> {{ $jalur->jalur }}
                                        </p>
                                        <p class="text-3xl font-black text-{{ $color }}-600 mt-2">{{ number_format($jalur->total) }}</p>
                                        <p class="text-xs text-{{ $color }}-500 mt-1">Pendaftar</p>
                                    </div>
                                    <div class="w-12 h-12 bg-{{ $color }}-200 rounded-xl flex items-center justify-center">
                                        <i class="{{ $icon }} text-{{ $color }}-600 text-lg"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-10">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-regular fa-chart-line text-gray-300 text-3xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium">Belum Ada Data</p>
                        <p class="text-gray-400 text-sm mt-1">Belum ada data jalur pendaftaran</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- INFORMASI SISTEM - Modern dengan Icon Grid --}}
    <div class="dashboard-section">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-primary/10 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-microchip text-primary text-base"></i>
                    </div>
                    <h2 class="text-lg font-bold text-primary">Informasi Sistem</h2>
                </div>
            </div>
            <div class="p-5">
                @php
                    use Carbon\Carbon;
                    $minDate = \App\Models\PPDBPendaftaran::min('created_at');
                    $lastUser = \App\Models\PPDBPendaftaran::with('user')->latest()->first();
                    $totalUsers = \App\Models\User::count();
                    $totalAdmins = \App\Models\User::where('role', 'admin')->count();
                    $totalSiswa = \App\Models\User::where('role', 'siswa')->count();
                @endphp
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="flex items-center gap-3 p-3.5 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-300 cursor-default">
                        <div class="w-11 h-11 bg-primary/10 rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-calendar-star text-primary text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Dibuka Sejak</p>
                            <p class="text-sm font-bold text-primary" data-tooltip="Tanggal pendaftaran pertama kali dibuka">{{ $minDate ? Carbon::parse($minDate)->translatedFormat('d M Y') : '-' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3.5 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-300 cursor-default">
                        <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-user-late text-green-600 text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Terakhir Mendaftar</p>
                            <p class="text-sm font-bold text-primary" data-tooltip="Pendaftar terbaru">{{ $lastUser?->user->name ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3.5 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-300 cursor-default">
                        <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-users-viewfinder text-blue-600 text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Total Pengguna</p>
                            <p class="text-sm font-bold text-primary">{{ number_format($totalUsers) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3.5 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-300 cursor-default">
                        <div class="w-11 h-11 bg-accent/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-user-graduate text-accent text-lg"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Total Siswa</p>
                            <p class="text-sm font-bold text-primary">{{ number_format($totalSiswa) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKSES CEPAT - Tombol Modern dengan Icon Premium --}}
    <div class="dashboard-section">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-primary/10 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-bolt text-primary text-base"></i>
                    </div>
                    <h2 class="text-lg font-bold text-primary">Akses Cepat</h2>
                    <span class="text-xs text-gray-400 bg-gray-100 px-2.5 py-1 rounded-full">
                        <i class="fa-regular fa-keyboard"></i> Shortcut
                    </span>
                </div>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <a href="{{ route('admin.ppdb.index') }}" 
                       class="quick-btn flex items-center justify-center gap-3 bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-600 text-white px-4 py-3.5 shadow-md hover:shadow-xl transition-all duration-300 font-bold text-sm md:text-base group">
                        <i class="fa-regular fa-file-lines text-base md:text-lg group-hover:scale-110 transition-transform"></i>
                        <span>📋 Data Pendaftar</span>
                    </a>
                    <a href="{{ route('admin.dokumen.index') }}" 
                       class="quick-btn flex items-center justify-center gap-3 bg-gradient-to-r from-emerald-500 via-green-500 to-teal-600 text-white px-4 py-3.5 shadow-md hover:shadow-xl transition-all duration-300 font-bold text-sm md:text-base group">
                        <i class="fa-regular fa-folder-open text-base md:text-lg group-hover:scale-110 transition-transform"></i>
                        <span>📁 Cek Dokumen</span>
                    </a>
                    <a href="{{ route('admin.laporan.index') }}" 
                       class="quick-btn flex items-center justify-center gap-3 bg-gradient-to-r from-amber-500 via-yellow-500 to-orange-600 text-white px-4 py-3.5 shadow-md hover:shadow-xl transition-all duration-300 font-bold text-sm md:text-base group">
                        <i class="fa-solid fa-chart-simple text-base md:text-lg group-hover:scale-110 transition-transform"></i>
                        <span>📊 Laporan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Efek animasi untuk stat card dengan touch feedback
    document.querySelectorAll('.stat-card, .quick-btn').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-4px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
        // Touch feedback untuk mobile
        card.addEventListener('touchstart', () => {
            card.style.transform = 'scale(0.98)';
        });
        card.addEventListener('touchend', () => {
            card.style.transform = '';
        });
    });
    
    // Efek hover untuk activity item
    document.querySelectorAll('.activity-item').forEach(item => {
        item.addEventListener('click', () => {
            // Bisa ditambahkan action jika diperlukan
            console.log('Activity item clicked');
        });
    });
</script>
@endsection