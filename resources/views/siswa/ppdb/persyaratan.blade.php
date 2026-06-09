@extends('layouts.siswa')

@section('title', 'Persyaratan Pendaftaran PPDB - SMAN 1 Batang Gasan')
@section('header', 'Persyaratan PPDB')

@section('content')
<style>
    /* Custom styles untuk halaman persyaratan */
    .requirement-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 24px;
    }
    .requirement-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
    }
    
    /* Icon wrapper */
    .icon-wrapper {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #0a3d2f, #1b5e4a);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 4px 8px -4px rgba(0, 0, 0, 0.1);
    }
    .icon-wrapper-sm {
        width: 36px;
        height: 36px;
        background: rgba(245, 158, 11, 0.12);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .icon-wrapper-sm i {
        font-size: 16px;
        color: #F59E0B;
    }
    .icon-wrapper:active {
        transform: scale(0.94);
    }
    
    /* Tombol */
    .btn-primary {
        transition: all 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        min-height: 48px;
        font-weight: 600;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #0a3d2f, #1b5e4a);
        color: white;
        padding: 12px 28px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        filter: brightness(1.03);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.25);
    }
    .btn-primary:active {
        transform: translateY(1px);
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #F59E0B, #D97706);
    }
    .btn-edit:hover {
        filter: brightness(1.05);
    }
    
    .btn-disabled {
        background: linear-gradient(135deg, #9ca3af, #6b7280);
        cursor: not-allowed;
        opacity: 0.7;
        pointer-events: none;
    }
    
    /* Alert info */
    .alert-info {
        background: linear-gradient(135deg, #dbeafe, #eff6ff);
        border-left: 4px solid #3b82f6;
        border-radius: 16px;
    }
    
    .alert-warning {
        background: linear-gradient(135deg, #fef3c7, #fffbeb);
        border-left: 4px solid #F59E0B;
        border-radius: 16px;
    }
    
    /* List styling */
    .requirement-list {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }
    .requirement-list li {
        padding: 10px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    .requirement-list li:last-child {
        border-bottom: none;
    }
    .list-icon {
        width: 28px;
        height: 28px;
        background: rgba(245, 158, 11, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .list-icon i {
        font-size: 13px;
        color: #F59E0B;
    }
    
    /* Sub section card */
    .sub-section {
        background: #f8fafc;
        border-radius: 18px;
        padding: 16px;
        margin-bottom: 16px;
        border: 1px solid #eef2f6;
        transition: all 0.2s ease;
    }
    .sub-section:hover {
        background: #f1f5f9;
        border-color: #e2e8f0;
    }
    
    /* Header gradasi */
    .gradient-header {
        background: linear-gradient(135deg, #0a3d2f, #1b5e4a);
        border-radius: 20px;
    }
    
    /* Badge */
    .badge-info {
        background: rgba(245, 158, 11, 0.15);
        color: #F59E0B;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .badge-success {
        background: rgba(16, 185, 129, 0.15);
        color: #10b981;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
    }
    
    /* Responsif */
    @media (max-width: 640px) {
        .icon-wrapper { width: 40px; height: 40px; }
        .icon-wrapper-sm { width: 30px; height: 30px; }
        .icon-wrapper-sm i { font-size: 13px; }
        .btn-primary { padding: 10px 20px; font-size: 14px; }
        .requirement-list li { padding: 8px 0; font-size: 13px; }
        .list-icon { width: 24px; height: 24px; }
        .list-icon i { font-size: 11px; }
        .sub-section { padding: 12px; }
    }
    
    @media (max-width: 480px) {
        .requirement-card { border-radius: 20px; }
        .gradient-header { border-radius: 16px; }
    }
</style>

@php
    use App\Models\PPDBPendaftaran;
    $pendaftaran = PPDBPendaftaran::where('user_id', auth()->id())->first();
    $hasFilledForm = $pendaftaran ? true : false;
@endphp

<div class="max-w-5xl mx-auto px-4 sm:px-6 py-6 md:py-8">
    
    {{-- HEADER / KARTU SAPAAN --}}
    <div class="gradient-header shadow-xl overflow-hidden mb-6">
        <div class="px-6 py-7 md:px-8 md:py-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-clipboard text-lg"></i>
                        </div>
                        <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">📋 Informasi Awal</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-extrabold mb-1">Persyaratan Pendaftaran PPDB</h1>
                    <p class="text-white/85 text-sm max-w-xl leading-relaxed">Simak dan pahami persyaratan umum dan khusus sebelum melanjutkan ke formulir pendaftaran.</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-check-circle text-2xl text-white/90"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ALERT STATUS PENDAFTARAN --}}
    @if($hasFilledForm)
    <div class="alert-info p-4 mb-6 flex items-start gap-3">
        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fa-regular fa-circle-check text-white text-sm"></i>
        </div>
        <div>
            <h3 class="font-bold text-blue-800 text-sm">✅ Formulir Pendaftaran Telah Diisi</h3>
            <p class="text-blue-700 text-xs mt-1">Anda telah mengisi formulir pendaftaran. Saat ini Anda hanya dapat mengedit berkas dokumen yang telah diunggah melalui menu "Unggah Berkas" pada dasbor utama.</p>
        </div>
    </div>
    @endif

    {{-- PERSYARATAN UMUM --}}
    <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 requirement-card border border-gray-100 mb-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="icon-wrapper">
                <i class="fa-regular fa-circle-check text-white text-sm"></i>
            </div>
            <h2 class="text-base md:text-lg font-extrabold text-[#0a3d2f]">Persyaratan Umum</h2>
            <span class="badge-info">Wajib</span>
        </div>
        <ul class="requirement-list">
            <li><span class="list-icon"><i class="fa-regular fa-calendar"></i></span> <span>Usia maksimal <strong>21 tahun</strong> pada tanggal 1 Juli tahun ajaran berjalan.</span></li>
            <li><span class="list-icon"><i class="fa-regular fa-graduation-cap"></i></span> <span>Telah menyelesaikan pendidikan kelas 9 SMP/MTs atau sederajat.</span></li>
            <li><span class="list-icon"><i class="fa-regular fa-file-pdf"></i></span> <span>Akta kelahiran atau surat keterangan lahir yang telah dilegalisasi oleh pejabat berwenang.</span></li>
            <li><span class="list-icon"><i class="fa-regular fa-id-card"></i></span> <span>Kartu Keluarga (KK) minimal terbit 1 (satu) tahun sebelum masa pendaftaran.</span></li>
            <li><span class="list-icon"><i class="fa-regular fa-building"></i></span> <span>Apabila terjadi perubahan data pada KK, wajib melampirkan surat keterangan dari Dinas Kependudukan dan Pencatatan Sipil.</span></li>
        </ul>
    </div>

    {{-- PERSYARATAN KHUSUS PER JALUR --}}
    <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 requirement-card border border-gray-100 mb-6">
        <div class="flex items-center gap-3 mb-5">
            <div class="icon-wrapper">
                <i class="fa-solid fa-road text-white text-sm"></i>
            </div>
            <h2 class="text-base md:text-lg font-extrabold text-[#0a3d2f]">Persyaratan Khusus per Jalur Pendaftaran</h2>
            <span class="badge-info">Sesuai Jalur</span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Jalur Zonasi --}}
            <div class="sub-section">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-map-pin text-blue-500 text-sm"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Jalur Zonasi</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Domisili calon peserta didik sesuai dengan alamat dalam Kartu Keluarga (KK).</li>
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Jarak tempat tinggal ke sekolah menjadi pertimbangan utama.</li>
                </ul>
            </div>
            
            {{-- Jalur Afirmasi --}}
            <div class="sub-section">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-hand-holding-heart text-pink-500 text-sm"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Jalur Afirmasi</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Kartu Indonesia Pintar (KIP), PKH, atau surat keterangan tidak mampu.</li>
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Surat keterangan disabilitas dari dokter/psikolog klinis (jika ada).</li>
                </ul>
            </div>
            
            {{-- Jalur Perpindahan Tugas --}}
            <div class="sub-section">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-briefcase text-indigo-500 text-sm"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Jalur Perpindahan Tugas</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Surat penugasan/mutasi dari instansi/perusahaan orang tua.</li>
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Surat keterangan pindah domisili dari Dinas Dukcapil.</li>
                </ul>
            </div>
            
            {{-- Jalur Prestasi --}}
            <div class="sub-section">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-trophy text-orange-500 text-sm"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Jalur Prestasi</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Rapor 5 semester terakhir yang terdata dalam Dapodik.</li>
                    <li class="flex items-start gap-2"><i class="fa-regular fa-circle-check text-accent text-xs mt-0.5"></i> Sertifikat prestasi resmi (maksimal 3 tahun, min 6 bulan sebelum pendaftaran).</li>
                </ul>
            </div>
        </div>
        
        <div class="mt-4 p-3 bg-accent/10 rounded-xl text-center">
            <p class="text-xs text-gray-700"><i class="fa-regular fa-info-circle text-accent mr-1"></i> Setiap berkas yang diunggah harus dalam format <strong>PDF</strong> dengan ukuran maksimal <strong>2 Megabyte (MB)</strong> per dokumen.</p>
        </div>
    </div>

    {{-- INFORMASI TAMBAHAN --}}
    <div class="bg-gradient-to-br from-accent/10 via-[#0a3d2f]/5 to-[#1b5e4a]/5 rounded-2xl shadow-lg p-5 md:p-6 border border-accent/20 mb-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="icon-wrapper">
                <i class="fa-regular fa-lightbulb text-white text-sm"></i>
            </div>
            <h2 class="text-base md:text-lg font-extrabold text-[#0a3d2f]">💡 Hal yang Perlu Diperhatikan</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div class="flex items-start gap-3 p-2 bg-white/60 rounded-xl">
                <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-clock text-accent text-xs"></i></div>
                <p class="text-sm text-gray-700">Siapkan seluruh dokumen sebelum mengisi formulir.</p>
            </div>
            <div class="flex items-start gap-3 p-2 bg-white/60 rounded-xl">
                <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-eye text-accent text-xs"></i></div>
                <p class="text-sm text-gray-700">Dokumen harus terbaca jelas (tidak buram/terpotong).</p>
            </div>
            <div class="flex items-start gap-3 p-2 bg-white/60 rounded-xl">
                <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-calendar text-accent text-xs"></i></div>
                <p class="text-sm text-gray-700">Batas unggah dokumen: 28 Februari 2026.</p>
            </div>
            <div class="flex items-start gap-3 p-2 bg-white/60 rounded-xl">
                <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-circle-check text-accent text-xs"></i></div>
                <p class="text-sm text-gray-700">Verifikasi dokumen setelah pendaftaran ditutup.</p>
            </div>
        </div>
    </div>

    {{-- TOMBOL LANJUTKAN / EDIT BERKAS --}}
    <div class="text-center">
        @if(!$hasFilledForm)
            {{-- Belum mengisi formulir - tampilkan tombol lanjut --}}
            <a href="{{ route('siswa.ppdb.form') }}" class="btn-primary">
                <i class="fa-solid fa-arrow-right-long"></i> Lanjutkan ke Formulir Pendaftaran
            </a>
            <p class="text-xs text-gray-400 mt-3">Pastikan Anda telah memahami seluruh persyaratan sebelum melanjutkan.</p>
        @else
            {{-- Sudah mengisi formulir - tampilkan tombol edit berkas --}}
            <div class="alert-warning p-4 mb-4 flex items-start gap-3 text-left">
                <div class="w-8 h-8 bg-accent rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-regular fa-pen-to-square text-white text-sm"></i>
                </div>
                <div>
                    <h3 class="font-bold text-accent-800 text-sm">📝 Formulir Sudah Diisi</h3>
                    <p class="text-gray-600 text-xs mt-1">Anda tidak dapat mengisi formulir kembali. Gunakan tombol di bawah untuk mengelola berkas dokumen Anda.</p>
                </div>
            </div>
            <a href="{{ route('siswa.dokumen.index') }}" class="btn-primary btn-edit">
                <i class="fa-solid fa-folder-open"></i> Kelola Berkas Pendaftaran
            </a>
            <p class="text-xs text-gray-400 mt-3">Unggah atau perbarui dokumen pendukung Anda melalui halaman kelola berkas.</p>
        @endif
    </div>

    {{-- LAYANAN BANTUAN --}}
    <div class="mt-8 bg-gradient-to-r from-[#0a3d2f] via-[#1b5e4a] to-[#0a3d2f] rounded-2xl shadow-xl p-5">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-headset text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-white">💬 Butuh Bantuan?</h3>
                    <p class="text-white/80 text-xs">Hubungi panitia PPDB untuk informasi lebih lanjut</p>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-2">
                <a href="tel:075212345" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition">
                    <i class="fa-solid fa-phone"></i> Telepon
                </a>
                <a href="mailto:ppdb@sman1batanggasan.sch.id" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition">
                    <i class="fa-regular fa-envelope"></i> Surel
                </a>
                <a href="https://wa.me/6281234567890" class="flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:bg-white/30 transition">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Efek klik pada tombol
    document.querySelectorAll('.btn-primary, a[href]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.href && !this.href.startsWith('javascript:')) {
                this.style.transform = 'scale(0.97)';
                setTimeout(() => {
                    if (this) this.style.transform = '';
                }, 150);
            }
        });
        btn.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.96)';
        });
        btn.addEventListener('touchend', function() {
            this.style.transform = '';
        });
    });
</script>
@endsection