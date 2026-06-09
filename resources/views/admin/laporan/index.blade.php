@extends('layouts.admin')

@section('title', 'Laporan PPDB - SMAN 1 Batang Gasan')
@section('header', 'Laporan PPDB')

@section('content')
<style>
    /* Custom styles untuk laporan - Modern & Responsif */
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 20px;
        cursor: pointer;
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
    
    /* Print styles - Laporan resmi bersih */
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
            padding: 15px;
            background: white;
        }
        .no-print {
            display: none !important;
        }
        .stat-card, .filter-section, .aksi-print, .btn-print, .pagination-section {
            display: none !important;
        }
        .laporan-table th, .laporan-table td {
            border: 1px solid #000 !important;
            color: black !important;
        }
        .laporan-table th {
            background: #e0e0e0 !important;
            color: black !important;
            font-weight: bold !important;
        }
        .badge-status {
            border: 1px solid #000 !important;
            background: transparent !important;
            color: black !important;
            box-shadow: none !important;
        }
        @page {
            size: landscape;
            margin: 1.5cm;
        }
        .text-primary, .text-accent {
            color: black !important;
        }
        hr {
            border-color: black !important;
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
            border: 1px solid #e5e7eb;
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
        .badge-status {
            font-size: 10px;
            padding: 3px 8px;
        }
    }
    
    /* Loading animation */
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .loading-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 0.6s linear infinite;
        margin-right: 8px;
    }
    
    /* Editable field */
    .editable-field {
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-block;
        padding: 2px 8px;
        border-radius: 8px;
    }
    .editable-field:hover {
        background: rgba(245, 158, 11, 0.1);
        text-decoration: underline;
    }
    .edit-input {
        border: 1px solid #F59E0B;
        border-radius: 8px;
        padding: 4px 8px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
    }
</style>

<div class="space-y-6">
    
    {{-- Header --}}
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden no-print">
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
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 no-print">
        <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-xl shadow-lg" onclick="filterByStatus('')">
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
        <div class="stat-card bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-xl shadow-lg" onclick="filterByStatus('accepted')">
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
        <div class="stat-card bg-gradient-to-br from-yellow-500 to-orange-500 text-white p-4 rounded-xl shadow-lg" onclick="filterByStatus('cadangan')">
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
        <div class="stat-card bg-gradient-to-br from-red-500 to-red-600 text-white p-4 rounded-xl shadow-lg" onclick="filterByStatus('rejected')">
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
                    <input type="text" name="search" id="searchInput" placeholder="Ketik nama siswa..." value="{{ request('search') }}">
                </div>
                <div class="filter-input">
                    <label><i class="fa-solid fa-filter text-accent mr-1"></i> Status</label>
                    <select name="status" id="statusSelect">
                        <option value="">Semua Status</option>
                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
                        <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                    </select>
                </div>
                <div class="filter-input">
                    <label><i class="fa-regular fa-calendar text-accent mr-1"></i> Tanggal Pendaftaran</label>
                    <input type="date" name="tanggal" id="tanggalInput" value="{{ request('tanggal') }}">
                </div>
                <div class="filter-input">
                    <label><i class="fa-solid fa-road text-accent mr-1"></i> Jalur Pendaftaran</label>
                    <select name="jalur" id="jalurSelect">
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
                        <button type="submit" id="filterBtn" class="px-5 py-2.5 bg-gradient-to-r from-accent to-orange-500 text-white rounded-xl hover:shadow-lg transition-all font-semibold text-sm flex items-center gap-2">
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
    <div class="flex flex-wrap justify-end gap-3 no-print">
        <button onclick="printReport()" class="px-4 py-2 bg-primary text-white rounded-xl hover:bg-secondary transition-all flex items-center gap-2 text-sm font-medium shadow-md">
            <i class="fa-solid fa-print"></i> Cetak Laporan
        </button>
        <button onclick="exportToExcel()" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all flex items-center gap-2 text-sm font-medium shadow-md">
            <i class="fa-solid fa-file-excel"></i> Export Excel
        </button>
    </div>

    {{-- AREA CETAK / PRINT - Tampilan Bersih --}}
    <div id="print-area">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            {{-- Kop Surat --}}
            <div class="text-center py-6 border-b border-gray-200" id="kop-surat">
                <img src="/logo.webp" alt="Logo SMAN 1 Batang Gasan" class="h-16 mx-auto mb-3" onerror="this.style.display='none'">
                <h2 class="text-xl font-bold text-primary">SMAN 1 BATANG GASAN</h2>
                <p class="text-sm text-gray-600">Jl. Pariaman - Tiku KM. 26, Sungai Sarik Malai V Suku, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562</p>
                <p class="text-xs text-gray-500 mt-1">Email: info@sman1batanggasan.sch.id | Telp: (0752) 12345</p>
                <hr class="my-3 border-gray-300">
                <h3 class="text-lg font-bold text-primary">LAPORAN PENERIMAAN PESERTA DIDIK BARU</h3>
                <p class="text-sm text-gray-600">TAHUN AJARAN 2026/2027</p>
                <div class="mt-2 text-xs text-gray-500">
                    Tanggal Cetak: {{ date('d F Y H:i:s') }}
                </div>
            </div>
            
            {{-- Informasi Laporan & Jadwal --}}
            <div class="px-5 py-4 bg-gray-50 border-b border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p><i class="fa-regular fa-chart-line mr-2"></i><strong>Periode Laporan:</strong> {{ date('F Y') }}</p>
                        <p><i class="fa-regular fa-users mr-2"></i><strong>Total Pendaftar:</strong> {{ $totalPendaftar ?? 0 }} Orang</p>
                        <p><i class="fa-regular fa-circle-check mr-2 text-green-500"></i><strong>Diterima:</strong> {{ $totalDiterima ?? 0 }} Orang</p>
                        <p><i class="fa-solid fa-clock mr-2 text-yellow-500"></i><strong>Cadangan:</strong> {{ $totalCadangan ?? 0 }} Orang</p>
                        <p><i class="fa-regular fa-circle-xmark mr-2 text-red-500"></i><strong>Ditolak:</strong> {{ $totalDitolak ?? 0 }} Orang</p>
                    </div>
                    <div>
                        <p><i class="fa-regular fa-calendar mr-2"></i><strong>Jadwal PPDB 2026/2027:</strong></p>
                        <ul class="list-disc list-inside text-xs text-gray-600 mt-1 space-y-1">
                            <li>📅 Pendaftaran: 10 Jan - 28 Feb 2026</li>
                            <li>📋 Verifikasi Berkas: 1 - 5 Maret 2026</li>
                            <li>📢 Pengumuman: 20 Maret 2026</li>
                            <li>📝 Daftar Ulang: 21 - 25 Maret 2026</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            {{-- Tabel Data --}}
            <div class="table-container p-5">
                <table class="laporan-table" id="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Jalur</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Tgl Daftar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @forelse ($pendaftars as $index => $pendaftar)
                        <tr>
                            <td data-label="No">{{ $loop->iteration }}</td>
                            <td data-label="NISN">{{ $pendaftar->siswa->nisn ?? '-' }}</td>
                            <td data-label="Nama" class="font-medium">{{ $pendaftar->user->name ?? '-' }}</td>
                            <td data-label="Jalur">{{ ucfirst($pendaftar->jalur ?? '-') }}</td>
                            <td data-label="JK">{{ $pendaftar->siswa->jenis_kelamin ?? '-' }}</td>
                            <td data-label="Asal Sekolah">{{ $pendaftar->siswa->asal_sekolah ?? '-' }}</td>
                            <td data-label="Tgl Daftar">{{ $pendaftar->created_at ? $pendaftar->created_at->format('d/m/Y') : '-' }}</td>
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
                        </table>
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
            
            {{-- Footer Laporan dengan Tanda Tangan Kepala Sekolah (Nama & NIP bisa diedit) --}}
            <div class="px-5 py-4 border-t border-gray-200 text-sm">
                <div class="flex justify-end">
                    <div class="text-center" style="min-width: 250px;">
                        <p class="text-gray-500">Padang Pariaman, {{ date('d F Y') }}</p>
                        <p class="font-bold mt-6">Kepala SMAN 1 Batang Gasan</p>
                        <div class="mt-6">
                            <p id="kepala-sekolah-name" class="font-bold text-primary editable-field" onclick="editKepalaSekolah()">
                                Drs. Ahmad Fauzi, M.Pd.
                            </p>
                            <p id="kepala-sekolah-nip" class="text-xs text-gray-500 editable-field" onclick="editNIP()">
                                NIP. 19651231 199003 1 123
                            </p>
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
    // Storage keys
    const STORAGE_NAME_KEY = 'kepala_sekolah_name';
    const STORAGE_NIP_KEY = 'kepala_sekolah_nip';
    
    // Load saved data
    function loadKepalaSekolahData() {
        const savedName = localStorage.getItem(STORAGE_NAME_KEY);
        const savedNip = localStorage.getItem(STORAGE_NIP_KEY);
        if (savedName) {
            document.getElementById('kepala-sekolah-name').innerText = savedName;
        }
        if (savedNip) {
            document.getElementById('kepala-sekolah-nip').innerHTML = savedNip;
        }
    }
    
    // Edit Nama Kepala Sekolah
    function editKepalaSekolah() {
        const nameElement = document.getElementById('kepala-sekolah-name');
        const currentName = nameElement.innerText;
        
        const input = document.createElement('input');
        input.type = 'text';
        input.value = currentName;
        input.className = 'edit-input';
        input.style.fontWeight = 'bold';
        input.style.fontSize = '14px';
        input.style.width = '250px';
        
        nameElement.innerHTML = '';
        nameElement.appendChild(input);
        input.focus();
        
        const saveName = () => {
            const newName = input.value.trim();
            if (newName) {
                nameElement.innerText = newName;
                localStorage.setItem(STORAGE_NAME_KEY, newName);
            } else {
                nameElement.innerText = currentName;
            }
            nameElement.setAttribute('onclick', 'editKepalaSekolah()');
        };
        
        input.addEventListener('blur', saveName);
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') saveName();
        });
        nameElement.removeAttribute('onclick');
    }
    
    // Edit NIP Kepala Sekolah
    function editNIP() {
        const nipElement = document.getElementById('kepala-sekolah-nip');
        const currentNip = nipElement.innerText;
        
        const input = document.createElement('input');
        input.type = 'text';
        input.value = currentNip.replace('NIP. ', '');
        input.className = 'edit-input';
        input.style.fontSize = '12px';
        input.style.width = '200px';
        
        nipElement.innerHTML = '';
        nipElement.appendChild(input);
        input.focus();
        
        const saveNip = () => {
            const newNip = input.value.trim();
            if (newNip) {
                nipElement.innerText = 'NIP. ' + newNip;
                localStorage.setItem(STORAGE_NIP_KEY, 'NIP. ' + newNip);
            } else {
                nipElement.innerText = currentNip;
            }
            nipElement.setAttribute('onclick', 'editNIP()');
        };
        
        input.addEventListener('blur', saveNip);
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') saveNip();
        });
        nipElement.removeAttribute('onclick');
    }
    
    // Filter by status
    function filterByStatus(status) {
        const statusSelect = document.getElementById('statusSelect');
        if (statusSelect) {
            statusSelect.value = status;
            document.getElementById('filterForm').submit();
        }
    }
    
    // Cetak Laporan
    function printReport() {
        const printContent = document.getElementById('print-area').innerHTML;
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Laporan PPDB SMAN 1 Batang Gasan</title>
                <meta charset="UTF-8">
                <style>
                    body { font-family: 'Times New Roman', Arial, sans-serif; margin: 0; padding: 20px; background: white; }
                    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                    th, td { border: 1px solid #000; padding: 8px; text-align: center; font-size: 11px; }
                    th { background: #e0e0e0; font-weight: bold; }
                    .badge-status { border: 1px solid #000; background: transparent; color: black; padding: 2px 8px; border-radius: 20px; }
                    .editable-field { cursor: default; }
                    @page { size: landscape; margin: 1.5cm; }
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
    
    // Export ke Excel
    function exportToExcel() {
        const table = document.querySelector('#data-table');
        const kop = document.querySelector('#kop-surat').cloneNode(true);
        const infoLaporan = document.querySelector('.bg-gray-50').cloneNode(true);
        const footer = document.querySelector('#print-area .border-t').cloneNode(true);
        
        let htmlContent = `
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Laporan_PPDB_SMAN1_Batang_Gasan</title>
                <style>
                    th { background: #374151; color: white; padding: 8px; }
                    td { padding: 6px; border: 1px solid #ddd; }
                    table { border-collapse: collapse; width: 100%; }
                </style>
            </head>
            <body>
                ${kop.outerHTML}
                ${infoLaporan.outerHTML}
                ${table.outerHTML}
                ${footer.outerHTML}
            </body>
            </html>
        `;
        
        const blob = new Blob([htmlContent], { type: 'application/vnd.ms-excel' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.href = url;
        const dateStr = new Date().toISOString().slice(0,19).replace(/:/g, '-');
        link.download = `Laporan_PPDB_SMAN1_Batang_Gasan_${dateStr}.xls`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }
    
    // Auto submit filter dengan debounce
    let debounceTimer;
    document.querySelectorAll('select[name="status"], select[name="jalur"], input[name="tanggal"]').forEach(el => {
        el.addEventListener('change', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => document.getElementById('filterForm').submit(), 300);
        });
    });
    
    // Search debounce
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        let searchTimer;
        searchInput.addEventListener('keyup', () => {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => document.getElementById('filterForm').submit(), 500);
        });
    }
    
    // Load saved data
    loadKepalaSekolahData();
</script>
@endsection