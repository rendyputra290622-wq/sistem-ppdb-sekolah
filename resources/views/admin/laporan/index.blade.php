@extends('layouts.admin')

@section('title', 'Laporan PPDB - SMAN 1 Batang Gasan')
@section('header', 'Laporan PPDB')

@section('content')
<style>
    /* Custom styles untuk laporan */
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 20px;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.2);
    }
    
    /* Filter form modern */
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
    
    /* Badge status */
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
    }
    .badge-diterima { background: linear-gradient(135deg, #10B981 0%, #059669 100%); color: white; }
    .badge-cadangan { background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%); color: white; }
    .badge-ditolak { background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%); color: white; }
    .badge-menunggu { background: linear-gradient(135deg, #6B7280 0%, #4B5563 100%); color: white; }
    
    /* Tabel modern */
    .laporan-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 16px;
        overflow: hidden;
    }
    .laporan-table thead tr {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
    }
    .laporan-table th {
        padding: 14px 12px;
        font-weight: 600;
        font-size: 13px;
        color: white;
        text-align: center;
        border-bottom: 2px solid #F59E0B;
    }
    .laporan-table td {
        padding: 12px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
    }
    .laporan-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(245, 158, 11, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
    }
    
    /* Print styles */
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
            margin: 0;
            padding: 20px;
            background: white;
        }
        .no-print {
            display: none !important;
        }
        .stat-card, .filter-section, .aksi-print, .btn-print, .pagination-section {
            display: none !important;
        }
        .laporan-table th, .laporan-table td {
            border: 1px solid #ddd !important;
        }
        .badge-status {
            border: none;
            padding: 2px 8px;
        }
        @page {
            size: landscape;
            margin: 1.5cm;
        }
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
        .laporan-table th, .laporan-table td {
            padding: 8px 6px;
            font-size: 11px;
        }
        .stat-card .stat-value {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 640px) {
        .laporan-table thead {
            display: none;
        }
        .laporan-table tbody tr {
            display: block;
            margin-bottom: 16px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            background: white;
        }
        .laporan-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 12px;
            border-bottom: 1px solid #f3f4f6;
            text-align: right;
        }
        .laporan-table tbody td:before {
            content: attr(data-label);
            font-weight: 600;
            color: #374151;
            text-align: left;
            flex: 1;
            font-size: 11px;
        }
        .laporan-table tbody td:last-child {
            border-bottom: none;
        }
    }
</style>

<div class="space-y-6">
    
    {{-- Header --}}
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden">
        <div class="px-5 py-6 md:px-7 md:py-7">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-chart-line text-lg"></i>
                        </div>
                        <span class="text-xs font-medium bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Laporan & Statistik</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-bold mb-1">Laporan Penerimaan Peserta Didik Baru</h1>
                    <p class="text-white/85 text-sm max-w-lg leading-relaxed">
                        Rekapitulasi data pendaftaran PPDB SMAN 1 Batang Gasan Tahun Ajaran 2026/2027
                    </p>
                </div>
                <div class="hidden md:block">
                    <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center">
                        <i class="fa-solid fa-print text-2xl text-white/80"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Card --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Total Pendaftar</p>
                    <p class="stat-value text-3xl font-bold mt-1">{{ $totalPendaftar ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-users text-lg"></i>
                </div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Diterima</p>
                    <p class="stat-value text-3xl font-bold mt-1">{{ $totalDiterima ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-circle-check text-lg"></i>
                </div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-yellow-500 to-orange-500 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Cadangan</p>
                    <p class="stat-value text-3xl font-bold mt-1">{{ $totalCadangan ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-clock text-lg"></i>
                </div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-red-500 to-red-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-white/80">Ditolak</p>
                    <p class="stat-value text-3xl font-bold mt-1">{{ $totalDitolak ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-circle-xmark text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Data --}}
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 no-print">
        <form method="GET" action="{{ route('admin.laporan.index') }}" id="filterForm">
            <div class="filter-group">
                <div class="filter-input">
                    <label><i class="fa-regular fa-user text-accent mr-1"></i> Cari Nama Siswa</label>
                    <input type="text" name="search" placeholder="Ketik nama siswa..." value="{{ request('search') }}">
                </div>
                <div class="filter-input">
                    <label><i class="fa-solid fa-filter text-accent mr-1"></i> Status</label>
                    <select name="status">
                        <option value="">Semua Status</option>
                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
                        <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                    </select>
                </div>
                <div class="filter-input">
                    <label><i class="fa-regular fa-calendar text-accent mr-1"></i> Tanggal Pendaftaran</label>
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}">
                </div>
                <div class="filter-input">
                    <label><i class="fa-solid fa-road text-accent mr-1"></i> Jalur</label>
                    <select name="jalur">
                        <option value="">Semua Jalur</option>
                        <option value="reguler" {{ request('jalur') == 'reguler' ? 'selected' : '' }}>Reguler</option>
                        <option value="prestasi" {{ request('jalur') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="afirmasi" {{ request('jalur') == 'afirmasi' ? 'selected' : '' }}>Afirmasi</option>
                        <option value="pindahan" {{ request('jalur') == 'pindahan' ? 'selected' : '' }}>Pindahan</option>
                    </select>
                </div>
                <div class="filter-input" style="flex: 0 0 auto;">
                    <label>&nbsp;</label>
                    <div class="flex gap-2">
                        <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-accent to-orange-500 text-white rounded-xl hover:shadow-lg transition-all font-semibold text-sm flex items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i> Filter
                        </button>
                        <a href="{{ route('admin.laporan.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-medium text-sm flex items-center gap-2">
                            <i class="fa-solid fa-rotate-right"></i> Reset
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Tombol Export & Print --}}
    <div class="flex flex-wrap justify-between items-center gap-3 no-print">
        <div class="text-sm text-gray-500">
            <i class="fa-regular fa-chart-line text-accent"></i> Menampilkan {{ $pendaftars->firstItem() ?? 0 }} - {{ $pendaftars->lastItem() ?? 0 }} dari {{ $pendaftars->total() ?? 0 }} data
        </div>
        <div class="flex gap-2">
            <button onclick="exportToExcel()" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all flex items-center gap-2 text-sm font-medium">
                <i class="fa-solid fa-file-excel"></i> Export Excel
            </button>
            <button onclick="printLaporan()" class="px-4 py-2 bg-primary text-white rounded-xl hover:bg-secondary transition-all flex items-center gap-2 text-sm font-medium">
                <i class="fa-solid fa-print"></i> Cetak Laporan
            </button>
        </div>
    </div>

    {{-- AREA CETAK / PRINT --}}
    <div id="print-area">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            {{-- Kop Surat untuk Cetak --}}
            <div class="text-center py-6 border-b border-gray-200" id="kop-surat">
                <img src="/logo.webp" alt="Logo SMAN 1 Batang Gasan" class="h-16 mx-auto mb-3">
                <h2 class="text-xl font-bold text-primary">SMAN 1 BATANG GASAN</h2>
                <p class="text-sm text-gray-600">Jl. Pariaman - Tiku KM. 26, Sungai Sarik Malai V Suku, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562</p>
                <p class="text-xs text-gray-500 mt-1">Email: info@sman1batanggasan.sch.id | Telp: (0752) 12345</p>
                <hr class="my-3 border-gray-300">
                <h3 class="text-lg font-bold text-primary">LAPORAN PENERIMAAN PESERTA DIDIK BARU</h3>
                <p class="text-sm text-gray-600">TAHUN AJARAN 2026/2027</p>
                <div class="mt-2 text-xs text-gray-500">
                    Tanggal Cetak: {{ date('d F Y H:i:s') }}
                    @if(request('search') || request('status') || request('tanggal') || request('jalur'))
                        <br>Filter: 
                        @if(request('search')) Nama: {{ request('search') }} | @endif
                        @if(request('status')) Status: {{ request('status') }} | @endif
                        @if(request('tanggal')) Tgl: {{ request('tanggal') }} | @endif
                        @if(request('jalur')) Jalur: {{ request('jalur') }} @endif
                    @endif
                </div>
            </div>
            
            {{-- Tabel Data --}}
            <div class="table-container p-5">
                <table class="laporan-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Jalur</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftars as $index => $pendaftar)
                        <tr>
                            <td data-label="No">{{ $loop->iteration }}</td>
                            <td data-label="NISN">{{ $pendaftar->siswa->nisn ?? '-' }}</td>
                            <td data-label="Nama Lengkap" class="font-medium">{{ $pendaftar->user->name ?? '-' }}</td>
                            <td data-label="Jalur">{{ ucfirst($pendaftar->jalur ?? '-') }}</td>
                            <td data-label="Jenis Kelamin">{{ $pendaftar->siswa->jenis_kelamin ?? '-' }}</td>
                            <td data-label="Asal Sekolah">{{ $pendaftar->siswa->asal_sekolah ?? '-' }}</td>
                            <td data-label="Tanggal Daftar">{{ $pendaftar->created_at ? $pendaftar->created_at->format('d/m/Y') : '-' }}</td>
                            <td data-label="Status">
                                @php
                                    $statusMap = [
                                        'accepted' => ['text' => 'Diterima', 'class' => 'badge-diterima'],
                                        'cadangan' => ['text' => 'Cadangan', 'class' => 'badge-cadangan'],
                                        'rejected' => ['text' => 'Ditolak', 'class' => 'badge-ditolak'],
                                        'pending' => ['text' => 'Menunggu', 'class' => 'badge-menunggu'],
                                    ];
                                    $currentStatus = $pendaftar->status ?? 'pending';
                                    $status = $statusMap[$currentStatus] ?? $statusMap['pending'];
                                @endphp
                                <span class="badge-status {{ $status['class'] }}">
                                    {{ $status['text'] }}
                                </span>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-8 text-gray-500">
                                    <i class="fa-regular fa-folder-open text-3xl mb-2 block"></i>
                                    Tidak ada data pendaftar
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Footer Laporan untuk Cetak --}}
            <div class="px-5 py-4 border-t border-gray-200 text-sm">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500">Dicetak oleh: {{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-gray-500 text-xs mt-1">Sistem Informasi PPDB SMAN 1 Batang Gasan</p>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-500">Padang Pariaman, {{ date('d F Y') }}</p>
                        <p class="font-bold mt-4">Kepala SMAN 1 Batang Gasan</p>
                        <div class="mt-8">
                            <p class="font-bold">Drs. Ahmad Fauzi, M.Pd.</p>
                            <p class="text-xs text-gray-500">NIP. 19651231 199003 1 123</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    @if(isset($pendaftars) && $pendaftars->hasPages())
    <div class="bg-white rounded-2xl shadow-md p-4 border border-gray-100 no-print">
        {{ $pendaftars->appends(request()->query())->links() }}
    </div>
    @endif
</div>

<script>
    // Fungsi Cetak Laporan
    function printLaporan() {
        const printContent = document.getElementById('print-area').innerHTML;
        const originalTitle = document.title;
        
        // Buat window baru untuk print
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Laporan PPDB SMAN 1 Batang Gasan</title>
                <meta charset="UTF-8">
                <style>
                    body {
                        font-family: 'Times New Roman', Arial, sans-serif;
                        margin: 0;
                        padding: 20px;
                        background: white;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 15px;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: center;
                        font-size: 11px;
                    }
                    th {
                        background: #374151;
                        color: white;
                        font-weight: bold;
                    }
                    .badge-status {
                        display: inline-block;
                        padding: 2px 8px;
                        border-radius: 20px;
                        font-size: 10px;
                        font-weight: bold;
                        color: white;
                    }
                    .badge-diterima { background: #10B981; }
                    .badge-cadangan { background: #F59E0B; }
                    .badge-ditolak { background: #EF4444; }
                    .badge-menunggu { background: #6B7280; }
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .header img {
                        height: 60px;
                        margin-bottom: 10px;
                    }
                    .footer {
                        margin-top: 30px;
                        font-size: 11px;
                    }
                    @page {
                        size: landscape;
                        margin: 1.5cm;
                    }
                    @media print {
                        body { margin: 0; padding: 0; }
                        .no-print { display: none; }
                    }
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
    
    // Fungsi Export ke Excel
    function exportToExcel() {
        const table = document.querySelector('#print-area table');
        const kop = document.querySelector('#kop-surat').cloneNode(true);
        const footer = document.querySelector('#print-area .border-t').cloneNode(true);
        
        // Sembunyikan badge untuk export
        const badges = table.querySelectorAll('.badge-status');
        badges.forEach(badge => {
            badge.style.border = 'none';
            badge.style.padding = '2px 8px';
        });
        
        let htmlContent = `
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Laporan_PPDB_SMAN1_Batang_Gasan.xls</title>
                <style>
                    th { background: #374151; color: white; padding: 8px; }
                    td { padding: 6px; }
                    table { border-collapse: collapse; width: 100%; }
                </style>
            </head>
            <body>
                ${kop.outerHTML}
                ${table.outerHTML}
                ${footer.outerHTML}
            </body>
            </html>
        `;
        
        const blob = new Blob([htmlContent], { type: 'application/vnd.ms-excel' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.href = url;
        link.download = 'Laporan_PPDB_SMAN1_Batang_Gasan_' + new Date().toISOString().slice(0,19).replace(/:/g, '-') + '.xls';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }
    
    // Auto submit filter on change
    document.querySelectorAll('select[name="status"], select[name="jalur"], input[name="tanggal"]').forEach(el => {
        el.addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });
    });
</script>
@endsection