@extends('layouts.kepala')

@section('title', 'Dashboard Kepala Sekolah - SMAN 1 Batang Gasan')
@section('header', 'Dashboard PPDB')

@section('content')
<style>
    /* Custom styles untuk dashboard kepala sekolah */
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 20px;
        cursor: pointer;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.2);
    }
    
    .stat-card:active {
        transform: translateY(-2px);
    }
    
    .jalur-card {
        transition: all 0.2s ease;
        border-radius: 16px;
        cursor: pointer;
    }
    .jalur-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px -6px rgba(0, 0, 0, 0.15);
    }
    .jalur-card:active {
        transform: translateY(-1px);
    }
    
    /* Warna gradient untuk stat card */
    .gradient-blue {
        background: linear-gradient(135deg, #3B82F6, #2563EB);
    }
    .gradient-green {
        background: linear-gradient(135deg, #10B981, #059669);
    }
    .gradient-yellow {
        background: linear-gradient(135deg, #F59E0B, #D97706);
    }
    .gradient-red {
        background: linear-gradient(135deg, #EF4444, #DC2626);
    }
    
    /* Warna untuk jalur */
    .jalur-reguler { background: linear-gradient(135deg, #3B82F6, #2563EB); }
    .jalur-prestasi { background: linear-gradient(135deg, #8B5CF6, #6D28D9); }
    .jalur-afirmasi { background: linear-gradient(135deg, #10B981, #059669); }
    .jalur-pindahan { background: linear-gradient(135deg, #F59E0B, #D97706); }
    .jalur-zonasi { background: linear-gradient(135deg, #EC4899, #BE185D); }
    
    /* Welcome card */
    .welcome-card {
        background: linear-gradient(135deg, #1f2937, #111827);
    }
    
    /* Ringkasan info */
    .info-card {
        background: #f9fafb;
        border-radius: 16px;
        padding: 16px;
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .stat-card .stat-value {
            font-size: 1.5rem;
        }
        .jalur-card {
            padding: 12px;
        }
        .jalur-card p:first-child {
            font-size: 14px;
        }
        .jalur-card p:last-child {
            font-size: 20px;
        }
    }
</style>

<div class="space-y-6">
    
    {{-- GREETING CARD - Sapaan Kepala Sekolah --}}
    <div class="welcome-card rounded-2xl shadow-xl overflow-hidden">
        <div class="px-6 py-6 md:px-8 md:py-7">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-hand-peace text-lg"></i>
                        </div>
                        <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">✨ Dashboard Kepala Sekolah ✨</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-extrabold mb-1">Selamat Datang, <span class="text-accent">{{ Auth::user()->name }}</span>! 👋</h1>
                    <p class="text-white/85 text-sm max-w-lg leading-relaxed">Pantau perkembangan PPDB SMAN 1 Batang Gasan Tahun Ajaran 2026/2027</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-16 h-16 bg-white/15 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-chart-line text-3xl text-white/90"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK CARD - Rekapitulasi Pendaftaran --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Total Pendaftar -->
        <div class="stat-card gradient-blue text-white p-4 rounded-xl shadow-lg" onclick="window.location.href='{{ route('kepala.pendaftar.index') }}'">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Total Pendaftar</p>
                    <p class="stat-value text-3xl md:text-4xl font-bold mt-1">{{ number_format($totalPendaftar) }}</p>
                    <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                        <i class="fa-regular fa-user"></i> Seluruh pendaftar
                    </p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-users text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Diterima -->
        <div class="stat-card gradient-green text-white p-4 rounded-xl shadow-lg" onclick="window.location.href='{{ route('kepala.pendaftar.index', ['status' => 'accepted']) }}'">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Diterima</p>
                    <p class="stat-value text-3xl md:text-4xl font-bold mt-1">{{ number_format($totalDiterima) }}</p>
                    <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                        <i class="fa-regular fa-circle-check"></i> Lolos seleksi
                    </p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-circle-check text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Cadangan -->
        <div class="stat-card gradient-yellow text-white p-4 rounded-xl shadow-lg" onclick="window.location.href='{{ route('kepala.pendaftar.index', ['status' => 'cadangan']) }}'">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Cadangan</p>
                    <p class="stat-value text-3xl md:text-4xl font-bold mt-1">{{ number_format($totalCadangan) }}</p>
                    <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                        <i class="fa-regular fa-clock"></i> Menunggu konfirmasi
                    </p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-clock text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Ditolak -->
        <div class="stat-card gradient-red text-white p-4 rounded-xl shadow-lg" onclick="window.location.href='{{ route('kepala.pendaftar.index', ['status' => 'rejected']) }}'">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Ditolak</p>
                    <p class="stat-value text-3xl md:text-4xl font-bold mt-1">{{ number_format($totalDitolak) }}</p>
                    <p class="text-xs text-white/70 mt-2 flex items-center gap-1">
                        <i class="fa-regular fa-circle-xmark"></i> Tidak lolos
                    </p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-circle-xmark text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK JALUR PENDAFTARAN --}}
    <div class="bg-white rounded-2xl shadow-md p-5 md:p-6 border border-gray-100">
        <div class="flex items-center gap-2 mb-5">
            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-chart-pie text-primary text-sm"></i>
            </div>
            <h2 class="text-base md:text-lg font-bold text-primary">Statistik Jalur Pendaftaran</h2>
            <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">Rekapitulasi</span>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
            @php
                $jalurWarna = [
                    'reguler' => 'jalur-reguler',
                    'prestasi' => 'jalur-prestasi',
                    'afirmasi' => 'jalur-afirmasi',
                    'pindahan' => 'jalur-pindahan',
                    'zonasi' => 'jalur-zonasi',
                ];
                $jalurIcon = [
                    'reguler' => 'fa-solid fa-chalkboard-user',
                    'prestasi' => 'fa-solid fa-trophy',
                    'afirmasi' => 'fa-solid fa-hand-holding-heart',
                    'pindahan' => 'fa-solid fa-arrow-right-arrow-left',
                    'zonasi' => 'fa-solid fa-location-dot',
                ];
            @endphp
            
            @foreach($rekapJalur as $jalur => $jumlah)
                @php
                    $colorClass = $jalurWarna[$jalur] ?? 'jalur-reguler';
                    $icon = $jalurIcon[$jalur] ?? 'fa-regular fa-road';
                    $label = match($jalur) {
                        'reguler' => 'Reguler',
                        'prestasi' => 'Prestasi',
                        'afirmasi' => 'Afirmasi',
                        'pindahan' => 'Pindahan',
                        'zonasi' => 'Zonasi',
                        default => ucfirst($jalur)
                    };
                @endphp
                <div class="jalur-card {{ $colorClass }} text-white p-4 rounded-xl shadow-md" onclick="window.location.href='{{ route('kepala.pendaftar.index', ['jalur' => $jalur]) }}'">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold capitalize flex items-center gap-1">
                                <i class="{{ $icon }} text-xs"></i> {{ $label }}
                            </p>
                            <p class="text-2xl md:text-3xl font-bold mt-2">{{ number_format($jumlah) }}</p>
                            <p class="text-xs text-white/80 mt-1">Pendaftar</p>
                        </div>
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="{{ $icon }} text-lg"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if(count($rekapJalur) == 0)
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i class="fa-regular fa-chart-line text-gray-300 text-2xl"></i>
                </div>
                <p class="text-gray-500">Belum ada data jalur pendaftaran</p>
            </div>
        @endif
    </div>

    {{-- INFORMASI SISTEM & AKTIVITAS --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Informasi Sistem --}}
        <div class="bg-white rounded-2xl shadow-md p-5 md:p-6 border border-gray-100">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-circle-info text-primary text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-bold text-primary">Informasi Sistem</h2>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                        <i class="fa-regular fa-calendar-check text-primary"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Periode PPDB</p>
                        <p class="text-sm font-bold text-primary">2026/2027</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center">
                        <i class="fa-regular fa-calendar text-accent"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Batas Pendaftaran</p>
                        <p class="text-sm font-bold text-primary">28 Februari 2026</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fa-regular fa-bell text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Pengumuman Hasil</p>
                        <p class="text-sm font-bold text-primary">20 Maret 2026</p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Aktivitas Terbaru --}}
        <div class="bg-white rounded-2xl shadow-md p-5 md:p-6 border border-gray-100">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                    <i class="fa-regular fa-clock-rotate-left text-primary text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-bold text-primary">Aktivitas Terbaru</h2>
                <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full ml-2">5 Terakhir</span>
            </div>
            <div class="space-y-2">
                @php
                    $recentActivities = \App\Models\PPDBPendaftaran::with('user')->latest()->take(5)->get();
                @endphp
                
                @if($recentActivities->count() > 0)
                    @foreach($recentActivities as $item)
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 transition">
                            <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <i class="fa-regular fa-user text-primary text-xs"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">{{ $item->user->name ?? '-' }}</p>
                                <p class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-500">{{ $item->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-6">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fa-regular fa-inbox text-gray-300 text-xl"></i>
                        </div>
                        <p class="text-gray-400 text-sm">Belum ada aktivitas</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- AKSES CEPAT --}}
    <div class="bg-white rounded-2xl shadow-md p-5 md:p-6 border border-gray-100">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-bolt text-primary text-sm"></i>
            </div>
            <h2 class="text-base md:text-lg font-bold text-primary">Akses Cepat</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <a href="{{ route('kepala.pendaftar.index') }}" 
               class="flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-3 rounded-xl hover:shadow-lg transition-all duration-300 font-semibold text-sm">
                <i class="fa-solid fa-users"></i> Data Pendaftar
            </a>
            <a href="{{ route('kepala.pengumuman.index') }}" 
               class="flex items-center justify-center gap-2 bg-gradient-to-r from-accent to-orange-500 text-white px-4 py-3 rounded-xl hover:shadow-lg transition-all duration-300 font-semibold text-sm">
                <i class="fa-regular fa-bullhorn"></i> Kelola Pengumuman
            </a>
            <a href="{{ route('kepala.laporan.index') }}" 
               class="flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-3 rounded-xl hover:shadow-lg transition-all duration-300 font-semibold text-sm">
                <i class="fa-solid fa-chart-simple"></i> Laporan PPDB
            </a>
        </div>
    </div>
</div>

<script>
    // Efek klik pada card statistik
    document.querySelectorAll('.stat-card, .jalur-card').forEach(card => {
        card.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 120);
        });
    });
    
    // Efek hover tambahan
    document.querySelectorAll('.stat-card, .jalur-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
@endsection