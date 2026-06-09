@extends('layouts.siswa')

@section('title', 'Verifikasi Pendaftaran - SMAN 1 Batang Gasan')
@section('header', 'Verifikasi Pendaftaran')

@section('content')
<style>
    /* Custom styles untuk halaman verifikasi */
    .verification-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
        animation: fadeInUp 0.5s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .verification-icon {
        width: 80px;
        height: 80px;
        background: rgba(245, 158, 11, 0.15);
        border-radius: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.05);
            opacity: 0.8;
        }
    }
    
    .info-steps {
        background: #f9fafb;
        border-radius: 20px;
        padding: 20px;
        margin-top: 20px;
    }
    
    .step-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #e5e7eb;
    }
    .step-item:last-child {
        border-bottom: none;
    }
    .step-number {
        width: 28px;
        height: 28px;
        background: rgba(245, 158, 11, 0.15);
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
        color: #F59E0B;
        flex-shrink: 0;
    }
    
    .btn-back {
        transition: all 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        background: linear-gradient(135deg, #374151, #4B5563);
        border-radius: 60px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-back:hover {
        transform: translateY(-2px);
        filter: brightness(1.02);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.25);
    }
    .btn-back:active {
        transform: translateY(1px);
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .verification-icon {
            width: 60px;
            height: 60px;
        }
        .verification-icon i {
            font-size: 28px;
        }
        .info-steps {
            padding: 16px;
        }
        .step-item {
            padding: 10px 0;
        }
        .btn-back {
            width: 100%;
            justify-content: center;
            padding: 12px;
        }
    }
</style>

<div class="max-w-3xl mx-auto px-4 py-6">
    
    {{-- Main Card --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden verification-card border border-gray-100">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-hourglass-half text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-white text-xl font-extrabold">Verifikasi Pendaftaran</h2>
                    <p class="text-white/80 text-sm">Proses verifikasi data pendaftaran Anda</p>
                </div>
            </div>
        </div>
        
        {{-- Body --}}
        <div class="p-6 md:p-8 text-center">
            
            {{-- Icon Animasi --}}
            <div class="verification-icon">
                <i class="fa-regular fa-clock text-accent text-4xl"></i>
            </div>
            
            {{-- Pesan Utama --}}
            <h2 class="text-2xl font-extrabold text-primary mb-2">⏳ Menunggu Verifikasi</h2>
            <p class="text-gray-600 mb-2">Pendaftaran Anda masih <strong class="text-accent">menunggu verifikasi admin</strong>.</p>
            <p class="text-gray-500 text-sm">Silakan cek kembali nanti. Anda dapat melihat status pendaftaran pada halaman utama.</p>
            
            {{-- Informasi Tahapan --}}
            <div class="info-steps text-left">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fa-regular fa-list-alt text-accent"></i>
                    <span class="font-bold text-primary">Tahapan Verifikasi Pendaftaran</span>
                </div>
                
                <div class="step-item">
                    <div class="step-number">1</div>
                    <div>
                        <p class="font-semibold text-gray-800">Pengisian Formulir</p>
                        <p class="text-xs text-gray-500">Anda telah mengisi formulir pendaftaran dengan data yang valid.</p>
                    </div>
                </div>
                
                <div class="step-item">
                    <div class="step-number">2</div>
                    <div>
                        <p class="font-semibold text-gray-800">Unggah Dokumen</p>
                        <p class="text-xs text-gray-500">Dokumen pendukung telah diunggah sesuai persyaratan jalur pendaftaran.</p>
                    </div>
                </div>
                
                <div class="step-item">
                    <div class="step-number">3</div>
                    <div>
                        <p class="font-semibold text-gray-800">Verifikasi Admin</p>
                        <p class="text-xs text-gray-500" class="text-accent">⏳ Sedang dalam proses verifikasi oleh panitia PPDB.</p>
                    </div>
                </div>
                
                <div class="step-item">
                    <div class="step-number">4</div>
                    <div>
                        <p class="font-semibold text-gray-800">Pengumuman Hasil</p>
                        <p class="text-xs text-gray-500">Hasil verifikasi akan diumumkan pada tanggal 20 Maret 2026.</p>
                    </div>
                </div>
            </div>
            
            {{-- Informasi Jadwal --}}
            <div class="mt-5 p-4 bg-accent/10 rounded-xl">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <i class="fa-regular fa-calendar-alt text-accent"></i>
                    <span class="text-sm font-semibold text-primary">Jadwal Penting PPDB 2026</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-xs text-gray-600">
                    <div class="flex items-center gap-1 justify-center"><i class="fa-regular fa-circle-check text-accent"></i> Pendaftaran: 10 Jan - 28 Feb 2026</div>
                    <div class="flex items-center gap-1 justify-center"><i class="fa-regular fa-circle-check text-accent"></i> Verifikasi: 1-5 Maret 2026</div>
                    <div class="flex items-center gap-1 justify-center"><i class="fa-regular fa-circle-check text-accent"></i> Pengumuman: 20 Maret 2026</div>
                    <div class="flex items-center gap-1 justify-center"><i class="fa-regular fa-circle-check text-accent"></i> Daftar Ulang: 21-25 Maret 2026</div>
                </div>
            </div>
            
            {{-- Tombol Kembali --}}
            <div class="mt-6">
                <a href="{{ route('siswa.ppdb.index') }}" class="btn-back px-8 py-3 text-white font-bold">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Halaman Pendaftaran
                </a>
            </div>
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
    document.querySelectorAll('.btn-back, a.btn-back').forEach(btn => {
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
    
    // Efek animasi tambahan untuk icon
    const iconElement = document.querySelector('.verification-icon');
    if (iconElement) {
        setInterval(() => {
            iconElement.style.transform = 'scale(1.02)';
            setTimeout(() => {
                iconElement.style.transform = 'scale(1)';
            }, 500);
        }, 3000);
    }
</script>
@endsection