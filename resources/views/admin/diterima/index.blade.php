@extends('layouts.admin')

@section('title', 'Siswa Diterima - PPDB SMAN 1 Batang Gasan')
@section('header', 'Siswa Diterima')

@section('content')
<style>
    /* Custom styles untuk tabel modern */
    .table-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 16px;
        overflow: hidden;
    }
    
    .modern-table thead tr {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
    }
    
    .modern-table th {
        padding: 14px 16px;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 0.5px;
        color: white;
        border-bottom: 2px solid #F59E0B;
    }
    
    .modern-table td {
        padding: 12px 16px;
        font-size: 14px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .modern-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .modern-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(245, 158, 11, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
        transform: scale(1.01);
    }
    
    /* Card style */
    .stat-card {
        background: white;
        border-radius: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 20px -12px rgba(0, 0, 0, 0.15);
    }
    
    /* Search bar modern */
    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }
    
    .search-input {
        padding-left: 40px;
        padding-right: 16px;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
        border-radius: 40px;
    }
    
    .search-input:focus {
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        outline: none;
    }
    
    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }
    
    /* Badge status */
    .badge-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
    }
    
    /* Button styles */
    .btn-detail {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .btn-detail:hover {
        background: linear-gradient(135deg, #4B5563 0%, #6B7280 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    /* Pagination modern */
    .pagination-modern {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }
    
    .pagination-modern .page-item {
        list-style: none;
    }
    
    .pagination-modern .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 8px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        color: #374151;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    
    .pagination-modern .page-link:hover {
        background: #F59E0B;
        border-color: #F59E0B;
        color: white;
        transform: translateY(-1px);
    }
    
    .pagination-modern .active .page-link {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
        border-color: #374151;
        color: white;
    }
    
    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 48px 20px;
    }
    
    .empty-icon {
        width: 80px;
        height: 80px;
        background: #f3f4f6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .modern-table th,
        .modern-table td {
            padding: 10px 12px;
            font-size: 12px;
        }
        
        .btn-detail {
            padding: 4px 8px;
            font-size: 11px;
        }
        
        .search-input {
            width: 100%;
        }
    }
    
    @media (max-width: 640px) {
        .modern-table thead {
            display: none;
        }
        
        .modern-table tbody tr {
            display: block;
            margin-bottom: 16px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            background: white;
        }
        
        .modern-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 14px;
            border-bottom: 1px solid #f3f4f6;
            text-align: right;
        }
        
        .modern-table tbody td:before {
            content: attr(data-label);
            font-weight: 600;
            color: #374151;
            text-align: left;
            flex: 1;
        }
        
        .modern-table tbody td:last-child {
            border-bottom: none;
        }
    }
</style>

<div class="space-y-5">
    
    {{-- Header Card dengan Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="stat-card rounded-2xl p-5 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Pendaftar</p>
                    <p class="text-3xl font-bold text-primary mt-1">{{ $totalPendaftar ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-users text-primary text-xl"></i>
                </div>
            </div>
        </div>
        <div class="stat-card rounded-2xl p-5 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Siswa Diterima</p>
                    <p class="text-3xl font-bold text-green-600 mt-1">{{ $pendaftars->total() ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-circle-check text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="stat-card rounded-2xl p-5 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Kuota Tersedia</p>
                    <p class="text-3xl font-bold text-accent mt-1">{{ $kuotaTersedia ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-accent/10 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-ticket text-accent text-xl"></i>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Tabel Card --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
        {{-- Header Tabel dengan Search --}}
        <div class="p-5 border-b border-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-check-circle text-primary text-sm"></i>
                    </div>
                    <h2 class="text-lg font-bold text-primary">Daftar Siswa Diterima</h2>
                    <span class="badge-success ml-2">{{ $pendaftars->total() }} Siswa</span>
                </div>
                
                {{-- Form Pencarian Modern --}}
                <form method="GET" action="{{ route('admin.diterima.index') }}" class="flex flex-col sm:flex-row gap-2">
                    <div class="search-wrapper w-full sm:w-64">
                        <i class="fa-solid fa-magnifying-glass search-icon text-sm"></i>
                        <input type="text" name="search" placeholder="Cari nama atau email..."
                            class="search-input w-full px-4 py-2.5 text-sm bg-gray-50 focus:bg-white"
                            value="{{ request('search') }}">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-5 py-2.5 bg-primary text-white rounded-xl hover:bg-secondary transition-all duration-300 flex items-center gap-2 text-sm font-medium">
                            <i class="fa-solid fa-magnifying-glass"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ route('admin.diterima.index') }}" class="px-4 py-2.5 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-all duration-300 flex items-center gap-1 text-sm">
                                <i class="fa-solid fa-times"></i> Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        
        {{-- Tabel Responsif --}}
        <div class="table-container p-5 pt-0">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th class="text-center w-16">No</th>
                        <th class="text-left">Nama Lengkap</th>
                        <th class="text-left">Email</th>
                        <th class="text-center w-24">Jalur</th>
                        <th class="text-center w-32">Tgl. Daftar</th>
                        <th class="text-center w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pendaftars as $index => $ppdb)
                        <tr>
                            <td class="text-center" data-label="No">
                                {{ $pendaftars->firstItem() + $index }}
                            </td>
                            <td data-label="Nama Lengkap" class="font-medium">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fa-regular fa-user text-primary text-xs"></i>
                                    </div>
                                    <span>{{ $ppdb->user->name ?? '-' }}</span>
                                </div>
                             </td>
                            <td data-label="Email">
                                <a href="mailto:{{ $ppdb->user->email ?? '' }}" class="text-accent hover:underline">
                                    {{ $ppdb->user->email ?? '-' }}
                                </a>
                             </td>
                            <td class="text-center" data-label="Jalur">
                                <span class="inline-flex items-center gap-1 px-2 py-1 bg-accent/10 text-accent rounded-full text-xs font-medium">
                                    <i class="fa-regular fa-road"></i> {{ ucfirst($ppdb->jalur) ?? '-' }}
                                </span>
                             </td>
                            <td class="text-center" data-label="Tgl. Daftar">
                                <span class="inline-flex items-center gap-1 text-gray-600 text-sm">
                                    <i class="fa-regular fa-calendar text-accent"></i>
                                    {{ $ppdb->created_at->format('d/m/Y') }}
                                </span>
                             </td>
                            <td class="text-center" data-label="Aksi">
                                <a href="{{ route('admin.ppdb.show', $ppdb->id) }}"
                                    class="btn-detail inline-flex items-center gap-1 px-3 py-1.5 bg-primary text-white rounded-lg text-xs font-medium transition-all duration-300">
                                    <i class="fa-regular fa-eye"></i> Detail
                                </a>
                             </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fa-regular fa-folder-open text-gray-300 text-3xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">Belum ada siswa yang diterima</p>
                                    <p class="text-gray-400 text-sm mt-1">Siswa akan muncul setelah diverifikasi</p>
                                </div>
                             </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination Modern --}}
        @if($pendaftars->hasPages())
        <div class="p-5 border-t border-gray-100 bg-gray-50/50">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="text-xs text-gray-500">
                    <i class="fa-regular fa-chart-line text-accent"></i>
                    Menampilkan {{ $pendaftars->firstItem() }} - {{ $pendaftars->lastItem() }} dari {{ $pendaftars->total() }} data
                </div>
                <div>
                    {{ $pendaftars->appends(request()->query())->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    // Efek hover pada baris tabel
    document.querySelectorAll('.modern-table tbody tr').forEach(row => {
        row.addEventListener('click', function(e) {
            // Jangan trigger jika klik pada link
            if (e.target.tagName !== 'A' && !e.target.closest('a')) {
                const detailLink = this.querySelector('.btn-detail');
                if (detailLink) {
                    window.location.href = detailLink.href;
                }
            }
        });
    });
</script>
@endsection