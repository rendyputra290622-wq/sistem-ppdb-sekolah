@extends('layouts.siswa')

@section('title', 'Dashboard Siswa - PPDB SMAN 1 Batang Gasan')
@section('header', 'Dashboard PPDB 2026')

@section('content')
<style>
    /* Reset & Base */
    * {
        -webkit-tap-highlight-color: transparent;
    }

    /* Animasi */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .animate-fade-up {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
    .delay-5 { animation-delay: 0.5s; }

    /* Modern Card */
    .modern-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 24px;
    }
    .modern-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
    }

    /* Icon Container */
    .icon-wrapper {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #0a3d2f, #1b5e4a);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .icon-wrapper-sm {
        width: 32px;
        height: 32px;
        background: rgba(245, 158, 11, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .icon-wrapper-sm i {
        font-size: 14px;
        color: #F59E0B;
    }

    /* Tombol Modern */
    .btn-modern {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        min-height: 48px;
    }
    .btn-modern:hover {
        transform: translateY(-2px);
        filter: brightness(1.05);
    }
    .btn-modern:active {
        transform: translateY(2px);
    }

    /* Status Badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(135deg, #0a3d2f 0%, #F59E0B 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Scrollbar */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
    ::-webkit-scrollbar-thumb { background: #F59E0B; border-radius: 10px; }

    /* Responsive */
    @media (max-width: 640px) {
        .icon-wrapper { width: 32px; height: 32px; }
        .status-badge { padding: 4px 10px; font-size: 10px; }
        .text-responsive { font-size: 0.75rem; }
    }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-5 md:space-y-6">
    
    {{-- GREETING CARD / KARTU SAPAAN --}}
    <div class="animate-fade-up">
        <div class="bg-gradient-to-r from-[#0a3d2f] via-[#1b5e4a] to-[#2d7a63] rounded-2xl shadow-xl overflow-hidden">
            <div class="px-5 py-6 md:px-7 md:py-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-regular fa-hand-peace text-lg"></i>
                            </div>
                            <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">✨ Selamat Datang ✨</span>
                        </div>
                        <h1 class="text-xl md:text-3xl font-extrabold mb-1">Halo, <span class="text-accent">{{ Auth::user()->name }}</span>! 👋</h1>
                        <p class="text-white/90 text-sm max-w-lg leading-relaxed">Selamat datang di dasbor Penerimaan Peserta Didik Baru SMAN 1 Batang Gasan. Pantau kemajuan pendaftaran dan lengkapi berkas Anda di sini.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-16 h-16 bg-white/15 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-graduation-cap text-3xl text-white/90"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKSES CEPAT / MODUL AKSES --}}
    <div class="animate-fade-up delay-1">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-3 mb-4">
                <div class="icon-wrapper">
                    <i class="fa-solid fa-bolt text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold gradient-text">Modul Akses Cepat</h2>
                <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">4 Menu Utama</span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <a href="{{ route('siswa.ppdb.index') }}" 
                   class="btn-modern flex flex-col items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white p-3 rounded-xl hover:shadow-lg transition-all font-semibold text-center">
                    <i class="fa-regular fa-pen-to-square text-xl"></i>
                    <span class="text-xs">Isi Formulir</span>
                    <span class="text-[10px] text-white/70">Mengisi data diri</span>
                </a>
                <a href="{{ route('siswa.dokumen.index') }}" 
                   class="btn-modern flex flex-col items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white p-3 rounded-xl hover:shadow-lg transition-all font-semibold text-center">
                    <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                    <span class="text-xs">Unggah Berkas</span>
                    <span class="text-[10px] text-white/70">Mengunggah dokumen</span>
                </a>
                <a href="{{ route('siswa.statusPendaftaran.index') }}" 
                   class="btn-modern flex flex-col items-center justify-center gap-2 bg-gradient-to-r from-yellow-500 to-orange-500 text-white p-3 rounded-xl hover:shadow-lg transition-all font-semibold text-center">
                    <i class="fa-regular fa-clock text-xl"></i>
                    <span class="text-xs">Cek Status</span>
                    <span class="text-[10px] text-white/70">Memantau perkembangan</span>
                </a>
                <a href="{{ route('siswa.ppdb.cetak') }}" 
                   class="btn-modern flex flex-col items-center justify-center gap-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white p-3 rounded-xl hover:shadow-lg transition-all font-semibold text-center">
                    <i class="fa-solid fa-print text-xl"></i>
                    <span class="text-xs">Cetak Bukti</span>
                    <span class="text-[10px] text-white/70">Mencetak tanda bukti</span>
                </a>
            </div>
        </div>
    </div>

    @php
        use Carbon\Carbon;
        $pendaftaran = \App\Models\PPDBPendaftaran::where('user_id', auth()->id())->first();
        $dokumen = \App\Models\PPDBDokumen::where('user_id', auth()->id())->first();
        
        $statusBg = 'bg-gray-500';
        $statusIcon = 'fa-regular fa-clock';
        $statusText = 'Belum Diverifikasi';
        $statusTextColor = 'text-gray-600';
        
        if ($pendaftaran) {
            if ($pendaftaran->status == 'Diterima') {
                $statusBg = 'bg-green-500';
                $statusIcon = 'fa-regular fa-circle-check';
                $statusText = 'Diterima';
                $statusTextColor = 'text-green-600';
            } elseif ($pendaftaran->status == 'Cadangan') {
                $statusBg = 'bg-yellow-500';
                $statusIcon = 'fa-solid fa-clock';
                $statusText = 'Cadangan';
                $statusTextColor = 'text-yellow-600';
            } elseif ($pendaftaran->status == 'Ditolak') {
                $statusBg = 'bg-red-500';
                $statusIcon = 'fa-regular fa-circle-xmark';
                $statusText = 'Ditolak';
                $statusTextColor = 'text-red-600';
            } elseif ($pendaftaran->status) {
                $statusBg = 'bg-[#0a3d2f]';
                $statusIcon = 'fa-regular fa-hourglass-half';
                $statusText = $pendaftaran->status;
                $statusTextColor = 'text-[#0a3d2f]';
            }
        }
    @endphp

    {{-- STATUS PENDAFTARAN --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 animate-fade-up delay-2">
        {{-- Kartu Status Pendaftaran --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-3 mb-4">
                <div class="icon-wrapper">
                    <i class="fa-regular fa-rectangle-list text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold gradient-text">Status Pendaftaran</h2>
            </div>
            
            @if ($pendaftaran)
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full {{ $statusBg }} flex items-center justify-center shadow-lg">
                            <i class="{{ $statusIcon }} text-white text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Status Saat Ini</p>
                            <p class="text-2xl md:text-3xl font-extrabold {{ $statusTextColor }}">{{ $statusText }}</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl px-4 py-2 text-center sm:text-left">
                        <p class="text-xs text-gray-400"><i class="fa-regular fa-calendar"></i> Tanggal Pendaftaran</p>
                        <p class="text-sm font-bold text-[#0a3d2f]">{{ Carbon::parse($pendaftaran->created_at)->translatedFormat('d F Y H:i') }} WIB</p>
                    </div>
                </div>
                
                @if($pendaftaran->status == 'Diterima')
                <div class="mt-4 p-3 bg-green-50 rounded-xl border-l-4 border-green-500">
                    <p class="text-sm text-green-700"><i class="fa-regular fa-face-smile mr-2"></i> Selamat! Anda dinyatakan diterima. Silakan lakukan daftar ulang pada tanggal 21-25 Maret 2026.</p>
                </div>
                @elseif($pendaftaran->status == 'Cadangan')
                <div class="mt-4 p-3 bg-yellow-50 rounded-xl border-l-4 border-yellow-500">
                    <p class="text-sm text-yellow-700"><i class="fa-regular fa-bell mr-2"></i> Status cadangan. Mohon pantau terus pengumuman selanjutnya melalui laman resmi.</p>
                </div>
                @elseif($pendaftaran->status == 'Ditolak')
                <div class="mt-4 p-3 bg-red-50 rounded-xl border-l-4 border-red-500">
                    <p class="text-sm text-red-700"><i class="fa-regular fa-circle-exclamation mr-2"></i> Mohon maaf, pendaftaran Anda belum berhasil. Hubungi panitia PPDB di (0752) 12345.</p>
                </div>
                @else
                <div class="mt-4 p-3 bg-[#0a3d2f]/5 rounded-xl border-l-4 border-accent">
                    <p class="text-sm text-gray-700"><i class="fa-regular fa-hourglass-half mr-2"></i> Berkas Anda sedang dalam proses verifikasi oleh panitia. Hasil akhir akan diumumkan pada tanggal 20 Maret 2026.</p>
                </div>
                @endif
            @else
                <div class="text-center py-8">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-regular fa-file-lines text-gray-300 text-3xl"></i>
                    </div>
                    <p class="text-red-500 font-bold">⚠️ Anda belum melakukan pendaftaran.</p>
                    <p class="text-gray-400 text-sm mt-2">Silakan mengisi formulir pendaftaran melalui tombol "Isi Formulir" di atas.</p>
                </div>
            @endif
        </div>

        {{-- Kartu Informasi Penting --}}
        <div class="bg-gradient-to-br from-accent/10 via-[#0a3d2f]/5 to-[#1b5e4a]/5 rounded-2xl shadow-lg p-5 md:p-6 border border-accent/20 modern-card">
            <div class="flex items-center gap-3 mb-4">
                <div class="icon-wrapper">
                    <i class="fa-regular fa-calendar-check text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold gradient-text">Informasi Penting</h2>
            </div>
            <div class="space-y-3">
                <div class="flex items-center gap-3 p-2 bg-white/60 rounded-xl">
                    <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-calendar text-accent text-xs"></i></div>
                    <p class="text-sm text-gray-700">📅 Pendaftaran ditutup <span class="font-bold text-[#0a3d2f]">28 Februari 2026</span></p>
                </div>
                <div class="flex items-center gap-3 p-2 bg-white/60 rounded-xl">
                    <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-bell text-accent text-xs"></i></div>
                    <p class="text-sm text-gray-700">📢 Pengumuman hasil: <span class="font-bold text-[#0a3d2f]">20 Maret 2026</span></p>
                </div>
                <div class="flex items-center gap-3 p-2 bg-white/60 rounded-xl">
                    <div class="w-6 h-6 bg-accent/20 rounded-full flex items-center justify-center"><i class="fa-regular fa-hand-peace text-accent text-xs"></i></div>
                    <p class="text-sm text-gray-700">📝 Daftar ulang: <span class="font-bold text-[#0a3d2f]">21-25 Maret 2026</span></p>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-accent/20">
                <div class="flex items-center gap-2 bg-white/60 rounded-xl p-2">
                    <i class="fa-solid fa-headset text-accent text-sm"></i>
                    <p class="text-xs text-gray-600">Butuh bantuan? Hubungi <span class="font-bold text-[#0a3d2f]">(0752) 12345</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- PENGUMUMAN TERBARU --}}
    <div class="animate-fade-up delay-3">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-3 mb-4">
                <div class="icon-wrapper">
                    <i class="fa-regular fa-bullhorn text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold gradient-text">Pengumuman Terbaru</h2>
                <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">Update Berkala</span>
            </div>

            @php
                $pengumuman = \App\Models\Pengumuman::where('ditampilkan_ke', 'siswa')
                    ->orWhere('ditampilkan_ke', 'semua')
                    ->latest()->first();
            @endphp

            @if ($pengumuman)
                <div class="bg-gray-50 rounded-xl p-4 border-l-4 border-accent">
                    <div class="flex gap-3">
                        <div class="w-10 h-10 bg-accent/15 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fa-regular fa-newspaper text-accent"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#0a3d2f]">{{ $pengumuman->judul }}</h3>
                            <div class="flex gap-3 text-xs text-gray-400 my-1">
                                <span><i class="fa-regular fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}</span>
                                <span><i class="fa-regular fa-user"></i> Panitia PPDB</span>
                            </div>
                            <p class="text-gray-700 text-sm">{!! nl2br(e($pengumuman->isi)) !!}</p>
                            @if ($pengumuman->lampiran)
                                <a href="{{ asset('storage/' . $pengumuman->lampiran) }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-accent hover:underline mt-2">
                                    <i class="fa-regular fa-file-pdf"></i> Lihat Lampiran
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-6">
                    <i class="fa-regular fa-bell-slash text-gray-300 text-3xl mb-2 block"></i>
                    <p class="text-gray-400">Belum ada pengumuman saat ini.</p>
                </div>
            @endif
        </div>
    </div>

    {{-- PROGRESS PENDAFTARAN --}}
    <div class="animate-fade-up delay-4">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-3 mb-5">
                <div class="icon-wrapper">
                    <i class="fa-solid fa-chart-line text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold gradient-text">Tahapan Pendaftaran</h2>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                @php
                    $steps = [
                        ['name' => 'Registrasi Akun', 'icon' => 'fa-regular fa-user', 'done' => true, 'ket' => 'Selesai'],
                        ['name' => 'Formulir', 'icon' => 'fa-regular fa-pen-to-square', 'done' => $pendaftaran ? true : false, 'ket' => $pendaftaran ? 'Tersimpan' : 'Belum'],
                        ['name' => 'Unggah Berkas', 'icon' => 'fa-regular fa-folder-open', 'done' => $dokumen ? true : false, 'ket' => $dokumen ? 'Lengkap' : 'Belum'],
                        ['name' => 'Verifikasi', 'icon' => 'fa-regular fa-hourglass-half', 'done' => $pendaftaran && $pendaftaran->status ? true : false, 'ket' => $pendaftaran && $pendaftaran->status ? 'Proses' : 'Menunggu'],
                        ['name' => 'Pengumuman', 'icon' => 'fa-regular fa-bell', 'done' => in_array($pendaftaran->status ?? '', ['Diterima', 'Cadangan']), 'ket' => in_array($pendaftaran->status ?? '', ['Diterima', 'Cadangan']) ? $pendaftaran->status : 'Belum'],
                    ];
                @endphp
                
                @foreach($steps as $step)
                <div class="text-center">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2 shadow-md
                        {{ $step['done'] ? 'bg-gradient-to-br from-accent to-orange-500' : 'bg-gray-200' }}">
                        <i class="{{ $step['icon'] }} {{ $step['done'] ? 'text-white' : 'text-gray-400' }} text-base"></i>
                    </div>
                    <p class="text-xs font-bold {{ $step['done'] ? 'text-[#0a3d2f]' : 'text-gray-400' }}">{{ $step['name'] }}</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">{{ $step['ket'] }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="mt-4 p-3 bg-[#0a3d2f]/5 rounded-xl text-center">
                <p class="text-xs text-gray-600"><i class="fa-regular fa-lightbulb text-accent mr-1"></i> Pastikan seluruh tahapan diselesaikan untuk memproses pendaftaran Anda.</p>
            </div>
        </div>
    </div>

    {{-- KETENTUAN PPDB --}}
    <div class="animate-fade-up delay-5">
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 modern-card border border-gray-100">
            <div class="flex items-center gap-3 mb-5">
                <div class="icon-wrapper">
                    <i class="fa-solid fa-scale-balanced text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-extrabold gradient-text">Ketentuan Penerimaan Peserta Didik Baru</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                {{-- Kolom Kiri --}}
                <div>
                    <div class="bg-gray-50 rounded-xl p-4 mb-4 border-l-4 border-accent">
                        <h3 class="font-bold text-[#0a3d2f] mb-2 flex items-center gap-2">
                            <i class="fa-solid fa-building-user text-accent"></i> Profil Satuan Pendidikan
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            SMAN 1 Batang Gasan merupakan satuan pendidikan tingkat menengah atas yang berlokasi di Jalan Pariaman - Tiku KM. 26, 
                            Kecamatan Batang Gasan, Kabupaten Padang Pariaman, Provinsi Sumatera Barat. Satuan pendidikan ini berkomitmen 
                            mencetak generasi unggul, berkarakter, dan berwawasan global dengan didukung sarana prasarana modern serta tenaga pendidik profesional.
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 rounded-xl p-4 mb-4 border-l-4 border-accent">
                        <h3 class="font-bold text-[#0a3d2f] mb-2 flex items-center gap-2">
                            <i class="fa-solid fa-road text-accent"></i> Jalur Pendaftaran
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> <strong>Jalur Reguler</strong> - Berdasarkan nilai rapor dan prestasi akademik.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> <strong>Jalur Prestasi</strong> - Diperuntukkan bagi calon peserta didik yang memiliki prestasi di bidang akademik maupun non-akademik.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> <strong>Jalur Afirmasi</strong> - Prioritas bagi calon peserta didik dari keluarga kurang mampu secara ekonomi.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> <strong>Jalur Pindahan</strong> - Untuk calon peserta didik yang hendak pindah dari satuan pendidikan lain.</li>
                        </ul>
                    </div>
                </div>
                
                {{-- Kolom Kanan --}}
                <div>
                    <div class="bg-gray-50 rounded-xl p-4 mb-4 border-l-4 border-accent">
                        <h3 class="font-bold text-[#0a3d2f] mb-2 flex items-center gap-2">
                            <i class="fa-regular fa-file-lines text-accent"></i> Persyaratan Administratif
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Fotokopi Kartu Keluarga (KK) yang masih berlaku.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Fotokopi Akta Kelahiran.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Fotokopi Rapor semester 1 s.d. semester 5.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Sertifikat prestasi (apabila ada).</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Pas foto berwarna ukuran 3x4 sebanyak 2 (dua) lembar.</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 rounded-xl p-4 mb-4 border-l-4 border-accent">
                        <h3 class="font-bold text-[#0a3d2f] mb-2 flex items-center gap-2">
                            <i class="fa-regular fa-calendar text-accent"></i> Jadwal Pelaksanaan
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Pendaftaran daring: 10 Januari s.d. 28 Februari 2026.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Verifikasi berkas: 1 s.d. 5 Maret 2026.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Pengumuman hasil seleksi: 20 Maret 2026.</li>
                            <li class="flex items-start gap-2"><span class="text-accent">•</span> Daftar ulang peserta didik diterima: 21 s.d. 25 Maret 2026.</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 p-3 bg-accent/10 rounded-xl text-center">
                <p class="text-xs text-gray-700"><i class="fa-regular fa-envelope text-accent mr-1"></i> Informasi lebih lanjut, hubungi panitia PPDB melalui alamat surel: <strong>ppdb@sman1batanggasan.sch.id</strong> atau nomor telepon <strong>(0752) 12345</strong>.</p>
            </div>
        </div>
    </div>

    {{-- KONTAK BANTUAN --}}
    <div class="animate-fade-up delay-5">
        <div class="bg-gradient-to-r from-[#0a3d2f] via-[#1b5e4a] to-[#0a3d2f] rounded-2xl shadow-xl p-5">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-headset text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-white">Layanan Bantuan</h3>
                        <p class="text-white/80 text-xs">Hubungi panitia untuk informasi lebih lanjut</p>
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
</div>

<script>
    // Efek klik untuk semua tombol
    document.querySelectorAll('.btn-modern, a[href]').forEach(btn => {
        btn.addEventListener('click', function() {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => { this.style.transform = ''; }, 150);
        });
    });
</script>
@endsection