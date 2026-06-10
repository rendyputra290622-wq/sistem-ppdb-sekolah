@extends('layouts.kepala')

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
    }
    .laporan-table td {
        padding: 12px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
    }
    .laporan-table tbody tr:hover {
        background: rgba(245, 158, 11, 0.05);
    }
    
    /* Print & Export styles */
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
        .stat-card, .filter-section, .action-buttons, .pagination-section {
            display: none !important;
        }
        .laporan-table th, .laporan-table td {
            border: 1px solid #ddd !important;
        }
        @page {
            size: landscape;
            margin: 1.5cm;
        }
    }
    
    /* Modal edit */
    .modal-overlay {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
    }
    .modal-container {
        animation: modalSlideIn 0.3s ease-out;
        max-width: 550px;
        width: 90%;
    }
    @keyframes modalSlideIn {
        from { opacity: 0; transform: scale(0.95) translateY(-20px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
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
    }
</style>

<!-- SweetAlert2 & Libraries -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<div class="space-y-6">
    
    {{-- Header --}}
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden">
        <div class="px-6 py-6 md:px-8 md:py-7">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-chart-line text-lg"></i>
                        </div>
                        <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Laporan PPDB</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-bold mb-1">Laporan Penerimaan Peserta Didik Baru</h1>
                    <p class="text-white/85 text-sm max-w-lg leading-relaxed">Rekapitulasi data pendaftaran PPDB SMAN 1 Batang Gasan</p>
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
                <div><p class="text-sm font-medium text-white/80">Total Pendaftar</p><p class="text-3xl font-bold mt-1">{{ $totalPendaftar }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-solid fa-users text-lg"></i></div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div><p class="text-sm font-medium text-white/80">Diterima</p><p class="text-3xl font-bold mt-1">{{ $totalDiterima }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-regular fa-circle-check text-lg"></i></div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-yellow-500 to-orange-500 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div><p class="text-sm font-medium text-white/80">Cadangan</p><p class="text-3xl font-bold mt-1">{{ $totalCadangan }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-solid fa-clock text-lg"></i></div>
            </div>
        </div>
        <div class="stat-card bg-gradient-to-br from-red-500 to-red-600 text-white p-4 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div><p class="text-sm font-medium text-white/80">Ditolak</p><p class="text-3xl font-bold mt-1">{{ $totalDitolak }}</p></div>
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="fa-regular fa-circle-xmark text-lg"></i></div>
            </div>
        </div>
    </div>

    {{-- Filter & Tombol Aksi --}}
    <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100 no-print">
        <form method="GET" action="{{ route('kepala.laporan.index') }}" id="filterForm">
            <div class="filter-group">
                <div class="filter-input"><label><i class="fa-regular fa-user text-accent mr-1"></i> Cari Nama</label><input type="text" name="search" placeholder="Ketik nama siswa..." value="{{ request('search') }}"></div>
                <div class="filter-input"><label><i class="fa-solid fa-filter text-accent mr-1"></i> Status</label>
                    <select name="status"><option value="">Semua Status</option><option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option><option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option><option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option><option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option></select>
                </div>
                <div class="filter-input"><label><i class="fa-regular fa-calendar text-accent mr-1"></i> Tanggal</label><input type="date" name="tanggal" value="{{ request('tanggal') }}"></div>
                <div class="filter-input"><label><i class="fa-solid fa-road text-accent mr-1"></i> Jalur</label>
                    <select name="jalur"><option value="">Semua Jalur</option><option value="reguler" {{ request('jalur') == 'reguler' ? 'selected' : '' }}>Reguler</option><option value="prestasi" {{ request('jalur') == 'prestasi' ? 'selected' : '' }}>Prestasi</option><option value="afirmasi" {{ request('jalur') == 'afirmasi' ? 'selected' : '' }}>Afirmasi</option><option value="pindahan" {{ request('jalur') == 'pindahan' ? 'selected' : '' }}>Pindahan</option></select>
                </div>
                <div class="filter-input" style="flex: 0 0 auto;"><label>&nbsp;</label><div class="flex gap-2"><button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-accent to-orange-500 text-white rounded-xl hover:shadow-lg font-semibold text-sm"><i class="fa-solid fa-magnifying-glass"></i> Filter</button><a href="{{ route('kepala.laporan.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 font-medium text-sm"><i class="fa-solid fa-rotate-right"></i> Reset</a></div></div>
            </div>
        </form>
        
        {{-- Tombol Export & Print --}}
        <div class="flex flex-wrap justify-between items-center gap-3 mt-5 pt-3 border-t border-gray-100">
            <div class="text-sm text-gray-500"><i class="fa-regular fa-chart-line text-accent"></i> Menampilkan {{ $pendaftars->firstItem() ?? 0 }} - {{ $pendaftars->lastItem() ?? 0 }} dari {{ $pendaftars->total() ?? 0 }} data</div>
            <div class="flex flex-wrap gap-2">
                <button onclick="openEditModal()" class="px-4 py-2 bg-primary text-white rounded-xl hover:bg-secondary transition flex items-center gap-2 text-sm font-medium"><i class="fa-regular fa-pen-to-square"></i> Edit Laporan</button>
                <button onclick="printReport()" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition flex items-center gap-2 text-sm font-medium"><i class="fa-solid fa-print"></i> Cetak</button>
                <button onclick="exportToExcel()" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition flex items-center gap-2 text-sm font-medium"><i class="fa-solid fa-file-excel"></i> Excel</button>
                <button onclick="exportToWord()" class="px-4 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition flex items-center gap-2 text-sm font-medium"><i class="fa-solid fa-file-word"></i> Word</button>
                <button onclick="exportToPDF()" class="px-4 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition flex items-center gap-2 text-sm font-medium"><i class="fa-solid fa-file-pdf"></i> PDF</button>
            </div>
        </div>
    </div>

    {{-- AREA CETAK / EXPORT --}}
    <div id="print-area">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="text-center py-6 border-b border-gray-200" id="kop-surat">
                <img src="/logo.webp" alt="Logo" class="h-16 mx-auto mb-3" onerror="this.style.display='none'">
                <h2 class="text-xl font-bold text-primary">SMAN 1 BATANG GASAN</h2>
                <p class="text-sm text-gray-600">Jl. Pariaman - Tiku KM. 26, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562</p>
                <hr class="my-3 border-gray-300">
                <h3 class="text-lg font-bold text-primary" id="laporan-title">LAPORAN PENERIMAAN PESERTA DIDIK BARU</h3>
                <p class="text-sm text-gray-600">TAHUN AJARAN 2026/2027</p>
                <div class="mt-2 text-xs text-gray-500">Tanggal Cetak: {{ date('d F Y H:i:s') }}</div>
                <div id="filter-info" class="mt-1 text-xs text-gray-500">
                    @if(request('search') || request('status') || request('tanggal') || request('jalur'))
                        Filter: @if(request('search')) Nama: {{ request('search') }} | @endif @if(request('status')) Status: {{ request('status') }} | @endif @if(request('tanggal')) Tgl: {{ request('tanggal') }} | @endif @if(request('jalur')) Jalur: {{ request('jalur') }} @endif
                    @endif
                </div>
            </div>
            
            <div class="table-container p-5">
                <table class="laporan-table" id="data-table">
                    <thead>
                        <tr><th>No</th><th>Nama Lengkap</th><th>NISN</th><th>Jalur</th><th>Jenis Kelamin</th><th>Asal Sekolah</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftars as $index => $p)
                            <tr>
                                <td data-label="No">{{ $loop->iteration }}</td>
                                <td data-label="Nama">{{ $p->user->name }}</td>
                                <td data-label="NISN">{{ $p->siswa->nisn ?? '-' }}</td>
                                <td data-label="Jalur">{{ ucfirst($p->jalur) }}</td>
                                <td data-label="JK">{{ $p->siswa->jenis_kelamin ?? '-' }}</td>
                                <td data-label="Asal Sekolah">{{ $p->siswa->asal_sekolah ?? '-' }}</td>
                                <td data-label="Status">
                                    @php
                                        $statusMap = ['accepted' => 'Diterima', 'cadangan' => 'Cadangan', 'rejected' => 'Ditolak', 'pending' => 'Menunggu'];
                                        $statusClass = ['accepted' => 'badge-diterima', 'cadangan' => 'badge-cadangan', 'rejected' => 'badge-ditolak', 'pending' => 'badge-menunggu'];
                                    @endphp
                                    <span class="badge-status {{ $statusClass[$p->status] }}">{{ $statusMap[$p->status] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center py-8 text-gray-500">Tidak ada data pendaftar</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="px-5 py-4 border-t border-gray-200 text-sm" id="footer-signature">
                <div class="flex justify-end">
                    <div class="text-center" style="min-width: 250px;">
                        <p class="text-gray-500">Padang Pariaman, {{ date('d F Y') }}</p>
                        <p class="font-bold mt-6">Kepala SMAN 1 Batang Gasan</p>
                        <div class="mt-6">
                            <p class="font-bold" id="kepsek-name">Drs. Ahmad Fauzi, M.Pd.</p>
                            <p class="text-xs text-gray-500" id="kepsek-nip">NIP. 19651231 199003 1 123</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination --}}
    @if(isset($pendaftars) && $pendaftars->hasPages())
    <div class="bg-white rounded-2xl shadow-md p-4 border border-gray-100 no-print">{{ $pendaftars->appends(request()->query())->links() }}</div>
    @endif
</div>

{{-- Modal Edit Data Laporan --}}
<div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center modal-overlay" onclick="closeEditModal()">
    <div class="modal-container bg-white rounded-2xl shadow-2xl overflow-hidden" onclick="event.stopPropagation()">
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="fa-regular fa-pen-to-square text-white"></i>
                <h3 class="text-white font-bold text-lg">Edit Tampilan Laporan</h3>
            </div>
            <button onclick="closeEditModal()" class="text-white/80 hover:text-white text-2xl">&times;</button>
        </div>
        <div class="p-6">
            <p class="text-sm text-gray-500 mb-4">Sesuaikan tampilan laporan sebelum dicetak atau diekspor.</p>
            
            <div class="space-y-4">
                <div class="border-b pb-3">
                    <h4 class="font-semibold text-primary mb-2">⚙️ Komponen Laporan</h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" id="edit_header" checked class="w-4 h-4 text-accent rounded"><span class="text-sm">Tampilkan Kop Surat (Header)</span></label>
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" id="edit_filter_info" checked class="w-4 h-4 text-accent rounded"><span class="text-sm">Tampilkan Informasi Filter</span></label>
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" id="edit_footer" checked class="w-4 h-4 text-accent rounded"><span class="text-sm">Tampilkan Tanda Tangan (Footer)</span></label>
                    </div>
                </div>
                
                <div class="border-b pb-3">
                    <h4 class="font-semibold text-primary mb-2">📝 Teks Laporan</h4>
                    <div class="space-y-3">
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Judul Laporan</label><input type="text" id="edit_title" value="LAPORAN PENERIMAAN PESERTA DIDIK BARU" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-accent focus:border-accent"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Nama Kepala Sekolah</label><input type="text" id="edit_kepsek" value="Drs. Ahmad Fauzi, M.Pd." class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-accent focus:border-accent"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">NIP Kepala Sekolah</label><input type="text" id="edit_nip" value="NIP. 19651231 199003 1 123" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-accent focus:border-accent"></div>
                    </div>
                </div>
                
                <div class="pt-2">
                    <h4 class="font-semibold text-primary mb-2">🎨 Informasi Tambahan</h4>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Catatan Kaki (Opsional)</label><textarea id="edit_footer_note" rows="2" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-accent focus:border-accent" placeholder="Tambahkan catatan kaki jika diperlukan..."></textarea></div>
                </div>
            </div>
            
            <div class="flex justify-end gap-3 mt-6 pt-4 border-t">
                <button onclick="closeEditModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition">Batal</button>
                <button onclick="applyEditsAndProceed()" class="px-4 py-2 bg-accent text-white rounded-xl hover:bg-orange-600 transition flex items-center gap-2"><i class="fa-regular fa-floppy-disk"></i> Terapkan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<script>
    let pendingAction = null;
    
    function openEditModal() {
        pendingAction = null;
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    
    function applyEditsAndProceed() {
        applyEdits();
        closeEditModal();
        if (pendingAction === 'print') window.print();
        else if (pendingAction === 'excel') exportToExcel();
        else if (pendingAction === 'word') exportToWord();
        else if (pendingAction === 'pdf') exportToPDF();
        else Swal.fire({ title: 'Berhasil!', text: 'Tampilan laporan telah diperbarui', icon: 'success', timer: 1500, showConfirmButton: false });
    }
    
    function applyEdits() {
        const showHeader = document.getElementById('edit_header').checked;
        const showFooter = document.getElementById('edit_footer').checked;
        const showFilterInfo = document.getElementById('edit_filter_info').checked;
        const newTitle = document.getElementById('edit_title').value;
        const newKepsek = document.getElementById('edit_kepsek').value;
        const newNip = document.getElementById('edit_nip').value;
        const footerNote = document.getElementById('edit_footer_note').value;
        
        const kopSurat = document.getElementById('kop-surat');
        const footerSection = document.getElementById('footer-signature');
        const filterInfo = document.getElementById('filter-info');
        const titleElement = document.getElementById('laporan-title');
        const kepsekElement = document.getElementById('kepsek-name');
        const nipElement = document.getElementById('kepsek-nip');
        
        if (kopSurat) kopSurat.style.display = showHeader ? 'block' : 'none';
        if (footerSection) footerSection.style.display = showFooter ? 'block' : 'none';
        if (filterInfo) filterInfo.style.display = showFilterInfo ? 'block' : 'none';
        if (titleElement && newTitle) titleElement.textContent = newTitle;
        if (kepsekElement && newKepsek) kepsekElement.textContent = newKepsek;
        if (nipElement && newNip) nipElement.textContent = newNip;
        
        let existingNote = document.getElementById('custom-footer-note');
        if (footerNote) {
            if (!existingNote) {
                const footerContainer = document.querySelector('#print-area .border-t');
                if (footerContainer) {
                    const noteDiv = document.createElement('div');
                    noteDiv.id = 'custom-footer-note';
                    noteDiv.className = 'text-center text-xs text-gray-400 mt-2 pt-2 border-t border-gray-100';
                    noteDiv.innerHTML = footerNote;
                    footerContainer.appendChild(noteDiv);
                }
            } else {
                existingNote.innerHTML = footerNote;
                existingNote.style.display = footerNote ? 'block' : 'none';
            }
        }
    }
    
    function printReport() { pendingAction = 'print'; applyEdits(); window.print(); }
    
    function exportToExcel() {
        applyEdits();
        const table = document.querySelector('#data-table');
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.table_to_sheet(table);
        XLSX.utils.book_append_sheet(wb, ws, 'Laporan_PPDB');
        XLSX.writeFile(wb, `Laporan_PPDB_${new Date().toISOString().slice(0,19).replace(/:/g, '-')}.xlsx`);
        Swal.fire({ title: 'Berhasil!', text: 'File Excel berhasil diunduh', icon: 'success', timer: 1500, showConfirmButton: false });
    }
    
    function exportToWord() {
        applyEdits();
        const printContent = document.getElementById('print-area').innerHTML;
        const blob = new Blob([`<html><head><meta charset="UTF-8"><title>Laporan PPDB</title><style>body{font-family:Arial,sans-serif;margin:20px}table{border-collapse:collapse;width:100%}th,td{border:1px solid #ddd;padding:8px}th{background:#374151;color:white}.badge-status{display:inline-block;padding:4px 12px;border-radius:30px;color:white}.badge-diterima{background:#10B981}.badge-cadangan{background:#F59E0B}.badge-ditolak{background:#EF4444}.badge-menunggu{background:#6B7280}</style></head><body>${printContent}</body></html>`], { type: 'application/msword' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `Laporan_PPDB_${new Date().toISOString().slice(0,19).replace(/:/g, '-')}.doc`;
        link.click();
        URL.revokeObjectURL(link.href);
        Swal.fire({ title: 'Berhasil!', text: 'File Word berhasil diunduh', icon: 'success', timer: 1500, showConfirmButton: false });
    }
    
    async function exportToPDF() {
        applyEdits();
        Swal.fire({ title: 'Membuat PDF...', text: 'Mohon tunggu sebentar', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
        const element = document.getElementById('print-area');
        const canvas = await html2canvas(element, { scale: 2, logging: false, useCORS: true });
        const imgData = canvas.toDataURL('image/png');
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('l', 'mm', 'a4');
        const imgWidth = 297;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
        pdf.save(`Laporan_PPDB_${new Date().toISOString().slice(0,19).replace(/:/g, '-')}.pdf`);
        Swal.fire({ title: 'Berhasil!', text: 'File PDF berhasil diunduh', icon: 'success', timer: 1500, showConfirmButton: false });
    }
    
    document.getElementById('filterForm').querySelectorAll('select, input[type="date"]').forEach(el => { el.addEventListener('change', () => document.getElementById('filterForm').submit()); });
    
    let searchTimeout; document.querySelector('input[name="search"]')?.addEventListener('keyup', function() { clearTimeout(searchTimeout); searchTimeout = setTimeout(() => document.getElementById('filterForm').submit(), 500); });
    
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeEditModal(); });
</script>
@endsection