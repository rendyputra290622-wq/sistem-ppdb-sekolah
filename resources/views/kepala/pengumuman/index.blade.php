@extends('layouts.kepala')

@section('title', 'Kelola Pengumuman - SMAN 1 Batang Gasan')
@section('header', 'Kelola Pengumuman')

@section('content')
<style>
    /* Custom styles untuk kelola pengumuman */
    .table-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 16px;
    }
    
    .modern-table {
        width: 100%;
        border-collapse: collapse;
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
        text-align: left;
    }
    
    .modern-table td {
        padding: 12px 16px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .modern-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .modern-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(245, 158, 11, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
    }
    
    /* Badge untuk target audiens */
    .badge-target {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
    }
    .badge-semua {
        background: #10B981;
        color: white;
    }
    .badge-siswa {
        background: #3B82F6;
        color: white;
    }
    .badge-diterima {
        background: #F59E0B;
        color: white;
    }
    
    /* Tombol aksi */
    .btn-action {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 500;
        padding: 6px 12px;
    }
    .btn-edit {
        background: linear-gradient(135deg, #EAB308, #CA8A04);
        color: white;
    }
    .btn-edit:hover {
        transform: translateY(-1px);
        filter: brightness(1.05);
        box-shadow: 0 4px 8px rgba(234, 179, 8, 0.3);
    }
    .btn-delete {
        background: linear-gradient(135deg, #EF4444, #DC2626);
        color: white;
    }
    .btn-delete:hover {
        transform: translateY(-1px);
        filter: brightness(1.05);
        box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
    }
    
    /* Tombol create */
    .btn-create {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 14px;
    }
    .btn-create:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(245, 158, 11, 0.3);
    }
    .btn-create:active {
        transform: translateY(1px);
    }
    
    /* Link lampiran */
    .doc-link {
        color: #F59E0B;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .doc-link:hover {
        text-decoration: underline;
        color: #D97706;
    }
    
    /* Header filter */
    .filter-bar {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .filter-input {
        flex: 1;
        min-width: 200px;
        position: relative;
    }
    .filter-input input {
        width: 100%;
        padding: 10px 14px 10px 38px;
        border: 1px solid #e5e7eb;
        border-radius: 40px;
        font-size: 13px;
        transition: all 0.3s ease;
        background: #f9fafb;
    }
    .filter-input input:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        background: white;
    }
    .filter-input i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }
    
    /* Info count */
    .info-count {
        background: #f3f4f6;
        border-radius: 30px;
        padding: 4px 12px;
        font-size: 12px;
        color: #4B5563;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .modern-table th,
        .modern-table td {
            padding: 10px 12px;
            font-size: 12px;
        }
        .btn-action {
            padding: 4px 10px;
            font-size: 11px;
        }
        .filter-bar {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-create {
            width: 100%;
            justify-content: center;
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
            border: 1px solid #e5e7eb;
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
            font-size: 11px;
        }
        .modern-table tbody td:last-child {
            border-bottom: none;
        }
    }
</style>

<div class="space-y-5">
    
    {{-- Header Card --}}
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden">
        <div class="px-6 py-6 md:px-8 md:py-7">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-bullhorn text-lg"></i>
                        </div>
                        <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">📢 Manajemen Pengumuman</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-bold mb-1">Kelola Pengumuman</h1>
                    <p class="text-white/85 text-sm max-w-lg leading-relaxed">Buat, edit, dan kelola pengumuman untuk siswa dan orang tua</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center">
                        <i class="fa-regular fa-newspaper text-2xl text-white/80"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter & Tombol Create --}}
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100">
        <div class="filter-bar">
            <div class="filter-input">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Cari judul pengumuman..." value="{{ request('search') }}">
            </div>
            <div class="flex gap-3">
                <a href="{{ route('kepala.pengumuman.create') }}" class="btn-create">
                    <i class="fa-solid fa-plus"></i> Buat Pengumuman Baru
                </a>
            </div>
        </div>
        
        <div class="flex justify-between items-center mt-3 pt-2 border-t border-gray-100">
            <div class="text-sm text-gray-500">
                <i class="fa-regular fa-chart-line text-accent"></i> 
                Total {{ $pengumumans->total() }} pengumuman
            </div>
            <div class="info-count">
                <i class="fa-regular fa-clock"></i> Terbaru
            </div>
        </div>
    </div>

    {{-- Tabel Pengumuman --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th class="text-center w-16">No</th>
                        <th>Judul Pengumuman</th>
                        <th class="text-center w-28">Tanggal</th>
                        <th class="text-center w-36">Target Audiens</th>
                        <th class="text-center w-28">Lampiran</th>
                        <th class="text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($pengumumans as $i => $p)
                    <tr>
                        <td class="text-center" data-label="No">{{ $pengumumans->firstItem() + $i }}</td>
                        <td data-label="Judul">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                    <i class="fa-regular fa-file-lines text-primary text-xs"></i>
                                </div>
                                <span class="font-medium">{{ $p->judul }}</span>
                            </div>
                        </td>
                        <td class="text-center" data-label="Tanggal">
                            <span class="inline-flex items-center gap-1 text-gray-600">
                                <i class="fa-regular fa-calendar-alt text-accent"></i>
                                {{ $p->tanggal ? \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d M Y') : '-' }}
                            </span>
                        </td>
                        <td class="text-center" data-label="Target">
                            @php
                                $targetClass = match($p->ditampilkan_ke) {
                                    'semua' => 'badge-semua',
                                    'siswa' => 'badge-siswa',
                                    'diterima' => 'badge-diterima',
                                    default => 'badge-semua'
                                };
                                $targetIcon = match($p->ditampilkan_ke) {
                                    'semua' => 'fa-solid fa-globe',
                                    'siswa' => 'fa-solid fa-users',
                                    'diterima' => 'fa-regular fa-circle-check',
                                    default => 'fa-solid fa-globe'
                                };
                            @endphp
                            <span class="badge-target {{ $targetClass }}">
                                <i class="{{ $targetIcon }} text-xs"></i>
                                {{ ucfirst($p->ditampilkan_ke ?? 'Semua') }}
                            </span>
                        </td>
                        <td class="text-center" data-label="Lampiran">
                            @if ($p->lampiran)
                                <a href="{{ asset('storage/' . $p->lampiran) }}" target="_blank" class="doc-link">
                                    <i class="fa-regular fa-file-pdf"></i> Lihat
                                </a>
                            @else
                                <span class="text-gray-400 text-sm flex items-center justify-center gap-1">
                                    <i class="fa-regular fa-circle-xmark"></i> Tidak ada
                                </span>
                            @endif
                        </td>
                        <td class="text-center" data-label="Aksi">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('kepala.pengumuman.edit', $p->id) }}" 
                                   class="btn-action btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                </a>
                                <button onclick="confirmDelete({{ $p->id }}, '{{ addslashes($p->judul) }}')" 
                                        class="btn-action btn-delete">
                                    <i class="fa-regular fa-trash-can"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-10">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fa-regular fa-bell-slash text-gray-300 text-2xl"></i>
                                </div>
                                <p class="text-gray-500 font-medium">Belum ada pengumuman</p>
                                <p class="text-gray-400 text-sm mt-1">Silakan buat pengumuman baru</p>
                                <a href="{{ route('kepala.pengumuman.create') }}" class="mt-4 inline-flex items-center gap-2 bg-accent text-white px-4 py-2 rounded-xl hover:bg-orange-600 transition">
                                    <i class="fa-solid fa-plus"></i> Buat Pengumuman
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            <table>
        </div>
        
        {{-- Pagination --}}
        @if($pengumumans->hasPages())
        <div class="p-5 border-t border-gray-100 bg-gray-50/50">
            {{ $pengumumans->links() }}
        </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi konfirmasi hapus dengan SweetAlert
    function confirmDelete(id, judul) {
        Swal.fire({
            title: '⚠️ Hapus Pengumuman',
            html: `Apakah Anda yakin ingin menghapus pengumuman<br><strong>"${judul}"</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Buat form delete dan submit
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route('kepala.pengumuman.destroy', '') }}/${id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
    
    // Filter pencarian real-time
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');
    const originalRows = tableBody ? Array.from(tableBody.querySelectorAll('tr')) : [];
    
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const url = new URL(window.location.href);
            url.searchParams.set('search', searchTerm);
            window.location.href = url.toString();
        });
    }
    
    // Efek klik pada tombol
    document.querySelectorAll('.btn-create, .btn-action, .doc-link').forEach(btn => {
        btn.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                if (this) this.style.transform = '';
            }, 120);
        });
    });
    
    // Auto focus pada search input
    if (searchInput && !searchInput.value) {
        searchInput.focus();
    }
</script>
@endsection