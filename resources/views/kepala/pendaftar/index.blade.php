@extends('layouts.kepala')

@section('title', 'Data Pendaftar - SMAN 1 Batang Gasan')
@section('header', 'Data Pendaftar PPDB')

@section('content')
<style>
    /* Custom styles untuk data pendaftar */
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 20px;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.2);
    }
    
    .filter-group {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: flex-end;
    }
    .filter-input {
        flex: 1;
        min-width: 150px;
    }
    .filter-input label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #4B5563;
        margin-bottom: 4px;
    }
    .filter-input input, .filter-input select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        font-size: 13px;
        transition: all 0.3s ease;
        background: #f9fafb;
    }
    .filter-input input:focus, .filter-input select:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        background: white;
    }
    
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
    }
    .badge-diterima { background: #10B981; color: white; }
    .badge-cadangan { background: #F59E0B; color: white; }
    .badge-ditolak { background: #EF4444; color: white; }
    .badge-menunggu { background: #6B7280; color: white; }
    
    .pendaftar-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 16px;
        overflow: hidden;
    }
    .pendaftar-table thead tr {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
    }
    .pendaftar-table th {
        padding: 14px 12px;
        font-weight: 600;
        font-size: 13px;
        color: white;
        text-align: center;
    }
    .pendaftar-table td {
        padding: 12px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
    }
    .pendaftar-table tbody tr:hover {
        background: rgba(245, 158, 11, 0.05);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .filter-group {
            flex-direction: column;
            gap: 10px;
        }
        .filter-input {
            width: 100%;
        }
        .pendaftar-table th, .pendaftar-table td {
            padding: 8px 6px;
            font-size: 11px;
        }
        .stat-card .stat-value {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 640px) {
        .pendaftar-table thead {
            display: none;
        }
        .pendaftar-table tbody tr {
            display: block;
            margin-bottom: 16px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            background: white;
            border: 1px solid #e5e7eb;
        }
        .pendaftar-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 12px;
            border-bottom: 1px solid #f3f4f6;
            text-align: right;
        }
        .pendaftar-table tbody td:before {
            content: attr(data-label);
            font-weight: 600;
            color: #374151;
            text-align: left;
            flex: 1;
            font-size: 11px;
        }
        .pendaftar-table tbody td:last-child {
            border-bottom: none;
        }
    }
</style>

<div class="space-y-6">
    
    {{-- Header --}}
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden">
        <div class="px-6 py-6 md:px-8 md:py-7">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-users text-lg"></i>
                        </div>
                        <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Data Pendaftar</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-bold mb-1">Data Pendaftar PPDB</h1>
                    <p class="text-white/85 text-sm max-w-lg leading-relaxed">Informasi lengkap seluruh peserta pendaftaran PPDB SMAN 1 Batang Gasan</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center">
                        <i class="fa-solid fa-users-viewfinder text-2xl text-white/80"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Ringkas --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div><p class="text-sm font-medium text-white/80">Total Pendaftar</p><p class="text-3xl font-bold mt-1">{{ $totalPendaftar ?? $pendaftars->total() }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-solid fa-users text-lg"></i></div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div><p class="text-sm font-medium text-white/80">Diterima</p><p class="text-3xl font-bold mt-1">{{ $totalDiterima ?? 0 }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-regular fa-circle-check text-lg"></i></div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-yellow-500 to-orange-500 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div><p class="text-sm font-medium text-white/80">Cadangan</p><p class="text-3xl font-bold mt-1">{{ $totalCadangan ?? 0 }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-solid fa-clock text-lg"></i></div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-red-500 to-red-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div><p class="text-sm font-medium text-white/80">Ditolak</p><p class="text-3xl font-bold mt-1">{{ $totalDitolak ?? 0 }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-regular fa-circle-xmark text-lg"></i></div>
            </div>
        </div>
    </div>

    {{-- Filter Form --}}
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100">
        <form method="GET" action="{{ route('kepala.pendaftar.index') }}" id="filterForm">
            <div class="filter-group">
                <div class="filter-input">
                    <label><i class="fa-regular fa-user text-accent mr-1"></i> Cari Nama / Email</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik nama atau email...">
                </div>
                <div class="filter-input">
                    <label><i class="fa-solid fa-road text-accent mr-1"></i> Jalur Pendaftaran</label>
                    <select name="jalur">
                        <option value="">Semua Jalur</option>
                        <option value="reguler" {{ request('jalur') == 'reguler' ? 'selected' : '' }}>📚 Reguler</option>
                        <option value="prestasi" {{ request('jalur') == 'prestasi' ? 'selected' : '' }}>🏆 Prestasi</option>
                        <option value="afirmasi" {{ request('jalur') == 'afirmasi' ? 'selected' : '' }}>🤝 Afirmasi</option>
                        <option value="pindahan" {{ request('jalur') == 'pindahan' ? 'selected' : '' }}>🔄 Pindahan</option>
                        <option value="zonasi" {{ request('jalur') == 'zonasi' ? 'selected' : '' }}>📍 Zonasi</option>
                    </select>
                </div>
                <div class="filter-input">
                    <label><i class="fa-solid fa-filter text-accent mr-1"></i> Status</label>
                    <select name="status">
                        <option value="">Semua Status</option>
                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>✅ Diterima</option>
                        <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>⏳ Cadangan</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>❌ Ditolak</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>🕐 Menunggu</option>
                    </select>
                </div>
                <div class="filter-input">
                    <label><i class="fa-regular fa-calendar text-accent mr-1"></i> Tanggal Pendaftaran</label>
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}">
                </div>
                <div class="filter-input" style="flex: 0 0 auto;">
                    <label>&nbsp;</label>
                    <div class="flex gap-2">
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-accent to-orange-500 text-white rounded-xl hover:shadow-lg font-semibold text-sm flex items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i> Filter
                        </button>
                        <a href="{{ route('kepala.pendaftar.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 font-medium text-sm flex items-center gap-2">
                            <i class="fa-solid fa-rotate-right"></i> Reset
                        </a>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- Info hasil pencarian -->
        <div class="mt-4 pt-3 border-t border-gray-100 flex flex-wrap justify-between items-center gap-2">
            <div class="text-sm text-gray-500">
                <i class="fa-regular fa-chart-line text-accent"></i> 
                Menampilkan {{ $pendaftars->firstItem() ?? 0 }} - {{ $pendaftars->lastItem() ?? 0 }} 
                dari {{ $pendaftars->total() ?? 0 }} data
            </div>
            @if(request('search') || request('jalur') || request('status') || request('tanggal'))
                <div class="text-xs text-accent">
                    <i class="fa-regular fa-filter"></i> Filter aktif
                </div>
            @endif
        </div>
    </div>

    {{-- Tabel Data Pendaftar --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="pendaftar-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th><i class="fa-regular fa-user mr-1"></i> Nama Lengkap</th>
                        <th><i class="fa-regular fa-envelope mr-1"></i> Email</th>
                        <th><i class="fa-solid fa-road mr-1"></i> Jalur</th>
                        <th><i class="fa-solid fa-shield mr-1"></i> Status</th>
                        <th><i class="fa-regular fa-calendar mr-1"></i> Tanggal Daftar</th>
                        <th><i class="fa-solid fa-eye mr-1"></i> Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftars as $i => $ppdb)
                        <tr>
                            <td data-label="No">{{ $pendaftars->firstItem() + $i }}</td>
                            <td data-label="Nama">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                        <i class="fa-regular fa-user text-primary text-xs"></i>
                                    </div>
                                    <span class="font-medium">{{ $ppdb->user->name }}</span>
                                </div>
                            </td>
                            <td data-label="Email" class="text-sm">{{ $ppdb->user->email }}</td>
                            <td data-label="Jalur">
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
                                <span class="inline-flex items-center gap-1">{{ $jalurIcon }} {{ ucfirst($ppdb->jalur) }}</span>
                            </td>
                            <td data-label="Status">
                                @php
                                    $statusMap = [
                                        'accepted' => ['text' => 'Diterima', 'class' => 'badge-diterima', 'icon' => 'fa-regular fa-circle-check'],
                                        'cadangan' => ['text' => 'Cadangan', 'class' => 'badge-cadangan', 'icon' => 'fa-solid fa-clock'],
                                        'rejected' => ['text' => 'Ditolak', 'class' => 'badge-ditolak', 'icon' => 'fa-regular fa-circle-xmark'],
                                        'pending' => ['text' => 'Menunggu', 'class' => 'badge-menunggu', 'icon' => 'fa-regular fa-hourglass-half'],
                                    ];
                                    $status = $statusMap[$ppdb->status] ?? $statusMap['pending'];
                                @endphp
                                <span class="badge-status {{ $status['class'] }}">
                                    <i class="{{ $status['icon'] }} text-xs"></i> {{ $status['text'] }}
                                </span>
                            </td>
                            <td data-label="Tanggal Daftar">{{ $ppdb->created_at->translatedFormat('d F Y') }}</td>
                            <td data-label="Detail">
                                <a href="{{ route('kepala.pendaftar.show', $ppdb->id) }}" 
                                   class="inline-flex items-center gap-1 px-3 py-1.5 bg-primary/10 text-primary rounded-lg hover:bg-primary hover:text-white transition-all duration-300 text-xs font-medium">
                                    <i class="fa-regular fa-eye"></i> Lihat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                        <i class="fa-regular fa-users-slash text-gray-300 text-2xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">Tidak ada data pendaftar</p>
                                    <p class="text-gray-400 text-sm mt-1">Silakan coba filter yang berbeda</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    @if(isset($pendaftars) && $pendaftars->hasPages())
    <div class="bg-white rounded-2xl shadow-md p-4 border border-gray-100">
        {{ $pendaftars->appends(request()->query())->links() }}
    </div>
    @endif
</div>

<script>
    // Auto submit filter on change untuk select dan date
    document.getElementById('filterForm')?.querySelectorAll('select, input[type="date"]').forEach(el => {
        el.addEventListener('change', () => document.getElementById('filterForm').submit());
    });
    
    // Debounce untuk search input
    let searchTimeout;
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 500);
        });
    }
    
    // Efek klik pada tombol filter
    document.querySelectorAll('.btn-filter, .btn-reset, .btn-detail').forEach(btn => {
        btn.addEventListener('click', function() {
            this.style.transform = 'scale(0.97)';
            setTimeout(() => this.style.transform = '', 150);
        });
    });
</script>
@endsection