@extends('layouts.siswa')

@section('title', 'Status Pendaftaran PPDB - SMAN 1 Batang Gasan')
@section('header', 'Status Pendaftaran PPDB')

@section('content')
<style>
    /* Custom styles untuk status page */
    .status-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
    }
    .status-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
    }
    
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.3px;
    }
    .badge-pending {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
    }
    .badge-accepted {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    }
    .badge-rejected {
        background: linear-gradient(135deg, #EF4444, #DC2626);
        color: white;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
    }
    .badge-cadangan {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
    }
    
    /* Info box */
    .info-list {
        background: #f9fafb;
        border-radius: 20px;
        padding: 16px;
    }
    .info-list-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid #e5e7eb;
    }
    .info-list-item:last-child {
        border-bottom: none;
    }
    .info-icon {
        width: 36px;
        height: 36px;
        background: rgba(245, 158, 11, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .info-icon i {
        font-size: 16px;
        color: #F59E0B;
    }
    
    /* Button */
    .btn-primary {
        transition: all 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        background: linear-gradient(135deg, #374151, #4B5563);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 60px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        filter: brightness(1.02);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.25);
    }
    .btn-primary:active {
        transform: translateY(1px);
    }
    
    .btn-accent {
        background: linear-gradient(135deg, #F59E0B, #D97706);
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .info-list-item {
            flex-direction: column;
            gap: 8px;
        }
        .btn-primary {
            width: 100%;
            justify-content: center;
            padding: 12px;
        }
        .badge-status {
            font-size: 11px;
            padding: 4px 12px;
        }
    }
</style>

<div class="max-w-3xl mx-auto">
    
    {{-- Alert Session --}}
    @if(session('success'))
        <div class="mb-5 p-4 bg-green-50 rounded-xl border-l-4 border-green-500 flex items-start gap-3 animate-fade-in">
            <i class="fa-regular fa-circle-check text-green-500 text-lg"></i>
            <p class="text-green-700 text-sm">{{ session('success') }}</p>
        </div>
    @endif
    
    @if(session('error'))
        <div class="mb-5 p-4 bg-red-50 rounded-xl border-l-4 border-red-500 flex items-start gap-3">
            <i class="fa-regular fa-circle-exclamation text-red-500 text-lg"></i>
            <p class="text-red-700 text-sm">{{ session('error') }}</p>
        </div>
    @endif

    {{-- Main Card --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden status-card border border-gray-100">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-clock text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-white text-xl font-extrabold">Status Pendaftaran PPDB</h2>
                    <p class="text-white/80 text-sm">Informasi terkini mengenai pendaftaran Anda</p>
                </div>
            </div>
        </div>
        
        {{-- Body --}}
        <div class="p-6 md:p-8">
            
            @if($ppdb)
                {{-- Status Badge --}}
                <div class="flex justify-center mb-6">
                    @php
                        $statusBadge = match($ppdb->status) {
                            'pending' => ['class' => 'badge-pending', 'icon' => 'fa-regular fa-hourglass-half', 'text' => 'Menunggu Verifikasi'],
                            'accepted' => ['class' => 'badge-accepted', 'icon' => 'fa-regular fa-circle-check', 'text' => 'Diterima'],
                            'rejected' => ['class' => 'badge-rejected', 'icon' => 'fa-regular fa-circle-xmark', 'text' => 'Ditolak'],
                            'cadangan' => ['class' => 'badge-cadangan', 'icon' => 'fa-solid fa-clock', 'text' => 'Cadangan'],
                            default => ['class' => 'badge-pending', 'icon' => 'fa-regular fa-hourglass-half', 'text' => ucfirst($ppdb->status)],
                        };
                    @endphp
                    <span class="badge-status {{ $statusBadge['class'] }}">
                        <i class="{{ $statusBadge['icon'] }}"></i> {{ $statusBadge['text'] }}
                    </span>
                </div>
                
                {{-- Informasi Pendaftaran --}}
                <div class="info-list">
                    <div class="info-list-item">
                        <div class="info-icon"><i class="fa-regular fa-user"></i></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-400">Nama Lengkap</p>
                            <p class="font-semibold text-gray-800">{{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name }}</p>
                        </div>
                    </div>
                    <div class="info-list-item">
                        <div class="info-icon"><i class="fa-regular fa-envelope"></i></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-400">Email</p>
                            <p class="font-semibold text-gray-800">{{ $ppdb->user->email }}</p>
                        </div>
                    </div>
                    <div class="info-list-item">
                        <div class="info-icon"><i class="fa-solid fa-road"></i></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-400">Jalur Pendaftaran</p>
                            <p class="font-semibold text-gray-800">{{ ucfirst($ppdb->jalur) }}</p>
                        </div>
                    </div>
                    <div class="info-list-item">
                        <div class="info-icon"><i class="fa-regular fa-calendar"></i></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-400">Tanggal Pendaftaran</p>
                            <p class="font-semibold text-gray-800">{{ $ppdb->created_at->translatedFormat('d F Y H:i') }} WIB</p>
                        </div>
                    </div>
                </div>
                
                {{-- Informasi Tambahan Berdasarkan Status --}}
                @if($ppdb->status === 'pending')
                    <div class="mt-5 p-4 bg-yellow-50 rounded-xl border-l-4 border-yellow-500 flex items-start gap-3">
                        <i class="fa-regular fa-hourglass-half text-yellow-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-yellow-800">📋 Sedang Proses Verifikasi</p>
                            <p class="text-xs text-yellow-700 mt-1">Berkas Anda sedang diperiksa oleh panitia. Hasil akan diumumkan pada tanggal 20 Maret 2026.</p>
                        </div>
                    </div>
                @elseif($ppdb->status === 'accepted')
                    <div class="mt-5 p-4 bg-green-50 rounded-xl border-l-4 border-green-500 flex items-start gap-3">
                        <i class="fa-regular fa-face-smile text-green-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-green-800">🎉 Selamat! Anda Diterima</p>
                            <p class="text-xs text-green-700 mt-1">Silakan lakukan daftar ulang pada tanggal 21-25 Maret 2026. Jangan lupa mencetak bukti pendaftaran.</p>
                        </div>
                    </div>
                    {{-- Tombol Cetak --}}
                    <div class="mt-5 text-center">
                        <a href="{{ route('siswa.ppdb.cetak') }}" target="_blank" 
                           class="btn-primary btn-accent px-6 py-3 text-white font-bold">
                            <i class="fa-solid fa-print"></i> Cetak Bukti Pendaftaran
                        </a>
                    </div>
                @elseif($ppdb->status === 'cadangan')
                    <div class="mt-5 p-4 bg-orange-50 rounded-xl border-l-4 border-orange-500 flex items-start gap-3">
                        <i class="fa-regular fa-bell text-orange-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-orange-800">⏳ Status Cadangan</p>
                            <p class="text-xs text-orange-700 mt-1">Anda berada dalam daftar cadangan. Mohon pantau terus pengumuman selanjutnya.</p>
                        </div>
                    </div>
                @elseif($ppdb->status === 'rejected')
                    <div class="mt-5 p-4 bg-red-50 rounded-xl border-l-4 border-red-500 flex items-start gap-3">
                        <i class="fa-regular fa-circle-exclamation text-red-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-red-800">❌ Pendaftaran Belum Berhasil</p>
                            <p class="text-xs text-red-700 mt-1">Silakan hubungi panitia PPDB di nomor (0752) 12345 untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                @endif
                
                {{-- Informasi Jadwal --}}
                <div class="mt-5 p-4 bg-gray-50 rounded-xl">
                    <div class="flex items-center gap-2 mb-3">
                        <i class="fa-regular fa-calendar-alt text-accent"></i>
                        <span class="text-sm font-semibold text-primary">📅 Jadwal Penting PPDB 2026</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs text-gray-600">
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Pendaftaran: 10 Jan - 28 Feb 2026</div>
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Verifikasi: 1-5 Maret 2026</div>
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Pengumuman: 20 Maret 2026</div>
                        <div class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-accent"></i> Daftar Ulang: 21-25 Maret 2026</div>
                    </div>
                </div>
                
            @else
                {{-- Belum Mendaftar --}}
                <div class="text-center py-8">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                        <i class="fa-regular fa-file-lines text-gray-300 text-4xl"></i>
                    </div>
                    <p class="text-gray-500 font-medium">⚠️ Anda belum melakukan pendaftaran.</p>
                    <p class="text-gray-400 text-sm mt-2 max-w-md mx-auto">Silakan isi formulir pendaftaran untuk mengikuti seleksi PPDB SMAN 1 Batang Gasan.</p>
                    <div class="mt-6">
                        <a href="{{ route('siswa.ppdb.form') }}" class="btn-primary px-6 py-3 text-white font-bold">
                            <i class="fa-regular fa-pen-to-square"></i> Isi Formulir Pendaftaran
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    {{-- Kontak Bantuan --}}
    <div class="mt-6 bg-gradient-to-r from-[#0a3d2f] via-[#1b5e4a] to-[#0a3d2f] rounded-2xl shadow-xl p-4">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-3">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-headset text-white text-lg"></i>
                </div>
                <div>
                    <p class="text-white font-semibold text-sm">💬 Butuh Bantuan?</p>
                    <p class="text-white/70 text-xs">Hubungi panitia PPDB</p>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-2">
                <a href="tel:075212345" class="flex items-center gap-1 bg-white/20 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-white/30 transition">
                    <i class="fa-solid fa-phone"></i> (0752) 12345
                </a>
                <a href="mailto:ppdb@sman1batanggasan.sch.id" class="flex items-center gap-1 bg-white/20 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-white/30 transition">
                    <i class="fa-regular fa-envelope"></i> ppdb@sman1batanggasan.sch.id
                </a>
                <a href="https://wa.me/6281234567890" class="flex items-center gap-1 bg-white/20 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-white/30 transition">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Efek klik pada tombol
    document.querySelectorAll('.btn-primary, .btn-accent, a.btn-primary').forEach(btn => {
        btn.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.97)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
        
        btn.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.96)';
        });
        
        btn.addEventListener('touchend', function() {
            this.style.transform = '';
        });
    });
    
    // Animasi fade in untuk alert
    document.querySelectorAll('.animate-fade-in').forEach(el => {
        setTimeout(() => {
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        }, 5000);
    });
</script>
@endsection