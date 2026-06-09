<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>SMAN 1 Batang Gasan - PPDB 2026 | Sekolah Unggul Prestasi</title>
    <!-- Tailwind CSS + Font Awesome 6 -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts Inter modern -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Warna abu-abu elegan seperti celana seragam SMA
                        primary: '#374151',
                        secondary: '#4B5563',
                        accent: '#F59E0B',
                        neutral: '#F3F4F6',
                        card: '#FFFFFF',
                        dark: '#1F2937',
                        softGray: '#E5E7EB',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.4s ease-out',
                        'scale-in': 'scaleIn 0.3s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0.95)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                    },
                    borderRadius: {
                        'xl': '1rem',
                        '2xl': '1.25rem',
                        '3xl': '1.5rem',
                    }
                }
            }
        }
    </script>
    <style>
        /* custom smooth & clean */
        * {
            -webkit-tap-highlight-color: transparent;
        }
        body {
            scroll-behavior: smooth;
        }
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.1);
        }
        .section-badge {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            background: rgba(245, 158, 11, 0.12);
            color: #F59E0B;
            padding: 0.25rem 0.75rem;
            border-radius: 30px;
            margin-bottom: 0.75rem;
        }
        .section-title {
            position: relative;
            font-weight: 700;
            letter-spacing: -0.02em;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 70px;
            height: 3px;
            background: #F59E0B;
            border-radius: 3px;
        }
        /* smooth transition untuk semua interaksi */
        a, button {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @media (max-width: 640px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
        /* scrollbar halus */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #9CA3AF;
            border-radius: 4px;
        }
        /* perbaikan jarak icon dan teks */
        .icon-spacing {
            margin-right: 0.5rem;
            width: 1.25rem;
            text-align: center;
        }
        .contact-item {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body class="bg-neutral font-sans antialiased">

    <!-- Top Bar - jarak icon rapi -->
    <!-- Top Bar -->
<div class="bg-primary text-white text-xs md:text-sm py-3 px-4 border-b border-white/10 shadow-sm">
    <div class="container mx-auto flex flex-wrap justify-between items-center gap-3">
        <div class="flex flex-wrap items-center gap-4 md:gap-6">
            <span class="flex items-center gap-2"><i class="fa-solid fa-phone-flip w-4 text-accent"></i> <span>+62 812 3456 7890</span></span>
            <span class="flex items-center gap-2"><i class="fa-regular fa-envelope w-4 text-accent"></i> <span>ppdb@sman1batanggasan.sch.id</span></span>
            <span class="flex items-center gap-2 hidden sm:flex"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>Senin - Jumat, 07.30 - 16.00</span></span>
        </div>
        <div class="flex gap-4 text-sm">
            <a href="https://www.instagram.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110" aria-label="Instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.tiktok.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110" aria-label="TikTok">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="https://www.youtube.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110" aria-label="YouTube">
                <i class="fa-brands fa-youtube"></i>
            </a>
            <a href="https://www.facebook.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110" aria-label="Facebook">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-accent transition-all hover:scale-110" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="bg-white/95 backdrop-blur-sm sticky top-0 z-30 shadow-md border-b border-gray-100">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between flex-wrap">
        <!-- Logo dan Nama Sekolah -->
        <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-90 transition-opacity">
            <div class="w-11 h-11 md:w-12 md:h-12 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center shadow-md">
                <i class="fa-solid fa-graduation-cap text-white text-xl md:text-2xl"></i>
            </div>
            <div class="leading-tight">
                <h1 class="text-base md:text-xl font-extrabold text-primary tracking-tight">SMAN 1 BATANG GASAN</h1>
                <p class="text-[11px] md:text-xs text-gray-500 font-medium">Unggul, Berkarakter, Berwawasan Global</p>
            </div>
        </a>
        
        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center gap-1">
            <a href="{{ url('/') }}" class="px-3 py-2 text-dark font-semibold text-sm hover:text-primary transition border-b-2 border-transparent hover:border-accent">Beranda</a>
            <a href="{{ url('/profil') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition">Profil</a>
            <a href="{{ url('/akademik') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition">Akademik</a>
            <a href="{{ url('/kesiswaan') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition">Kesiswaan</a>
            <a href="{{ url('/ppdb') }}" class="px-3 py-2 text-accent font-bold text-sm border-b-2 border-accent bg-amber-50/30 rounded-t-lg">PPDB 2026</a>
            <a href="{{ url('/berita') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition">Berita</a>
            <a href="{{ url('/kontak') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition">Kontak</a>
            
            @auth
                <!-- Jika sudah login -->
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2">
                        <i class="fa-regular fa-user"></i> Dashboard
                    </a>
                @elseif(Auth::user()->role == 'siswa')
                    <a href="{{ route('siswa.dashboard') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2">
                        <i class="fa-regular fa-user"></i> Dashboard
                    </a>
                @elseif(Auth::user()->role == 'kepala')
                    <a href="{{ route('kepala.dashboard') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2">
                        <i class="fa-regular fa-user"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2">
                        <i class="fa-regular fa-user"></i> Login
                    </a>
                @endif
            @else
                <!-- Jika belum login -->
                <a href="{{ route('login') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2">
                    <i class="fa-regular fa-user"></i> Login
                </a>
            @endauth
        </div>
        
        <!-- Mobile Menu Toggle -->
        <button class="md:hidden text-primary text-2xl focus:outline-none" id="menu-toggle" aria-label="Menu">
            <i class="fa-solid fa-bars-staggered"></i>
        </button>
    </div>
    
    <!-- Mobile Menu Drawer -->
    <div class="md:hidden hidden bg-white border-t border-gray-100 shadow-inner" id="mobile-menu">
        <div class="container mx-auto px-4 py-4 flex flex-col gap-2">
            <a href="{{ url('/') }}" class="py-3 px-3 font-semibold text-gray-700 hover:bg-gray-50 rounded-xl">Beranda</a>
            <a href="{{ url('/profil') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl">Profil</a>
            <a href="{{ url('/akademik') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl">Akademik</a>
            <a href="{{ url('/kesiswaan') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl">Kesiswaan</a>
            <a href="{{ url('/ppdb') }}" class="py-3 px-3 text-accent font-bold bg-amber-50 rounded-xl">PPDB 2026</a>
            <a href="{{ url('/berita') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl">Berita</a>
            <a href="{{ url('/kontak') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl">Kontak</a>
            <a href="{{ url('/galeri') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl">Galeri</a>
            
            @auth
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2">
                        <i class="fa-regular fa-user"></i> Dashboard Admin
                    </a>
                @elseif(Auth::user()->role == 'siswa')
                    <a href="{{ route('siswa.dashboard') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2">
                        <i class="fa-regular fa-user"></i> Dashboard Siswa
                    </a>
                @elseif(Auth::user()->role == 'kepala')
                    <a href="{{ route('kepala.dashboard') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2">
                        <i class="fa-regular fa-user"></i> Dashboard Kepala
                    </a>
                @else
                    <a href="{{ route('login') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2">
                        <i class="fa-regular fa-user"></i> Login
                    </a>
                @endif
                
                <!-- Tombol Logout untuk mobile -->
                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full py-3 px-3 text-white bg-red-500 text-center rounded-xl flex items-center justify-center gap-2 hover:bg-red-600 transition">
                        <i class="fa-solid fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2">
                    <i class="fa-regular fa-user"></i> Login PPDB
                </a>
                <a href="{{ route('register') }}" class="py-3 px-3 text-primary bg-amber-50 text-center rounded-xl mt-2 flex items-center justify-center gap-2 border border-accent">
                    <i class="fa-regular fa-user-plus"></i> Daftar
                </a>
            @endauth
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle functionality
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            // Toggle icon between bars and times
            const icon = this.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars-staggered');
            } else {
                icon.classList.remove('fa-bars-staggered');
                icon.classList.add('fa-times');
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars-staggered');
                }
            }
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!' && href !== '#0') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
</script>

    <!-- HERO SECTION -->
    <section class="relative overflow-hidden">
        <div class="relative w-full bg-gradient-to-br from-primary/95 via-gray-700 to-secondary/95 md:min-h-[560px] min-h-[500px] flex items-center">
            <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 20% 40%, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 24px 24px;"></div>
            <div class="relative container mx-auto px-4 py-12 md:py-16 flex flex-col-reverse md:flex-row items-center justify-between gap-10">
                <div class="text-white text-center md:text-left max-w-xl animate-fade-in">
                    <span class="inline-flex items-center gap-2 bg-accent/20 backdrop-blur-sm text-accent text-xs font-bold px-3 py-1.5 rounded-full mb-4"><i class="fa-regular fa-calendar-check"></i> Gelombang 1 - 2026</span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight mb-4">Penerimaan Peserta Didik Baru <span class="text-accent">2026/2027</span></h2>
                    <p class="text-base md:text-lg text-white/90 mb-6">Raih masa depan gemilang bersama sekolah unggulan dengan kurikulum merdeka, beasiswa prestasi, dan fasilitas terbaik di Padang Pariaman.</p>
                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <a href="/login" class="bg-accent text-gray-900 font-bold px-6 py-3 rounded-xl shadow-lg hover:bg-amber-400 transition-all duration-300 flex items-center gap-2"><i class="fa-regular fa-pen-to-square"></i> Daftar Sekarang</a>
                        <a href="#" class="bg-white/10 backdrop-blur-sm border border-white/30 px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 flex items-center gap-2"><i class="fa-regular fa-circle-question"></i> Info Jalur</a>
                    </div>
                    <div class="mt-7 flex flex-wrap gap-5 justify-center md:justify-start text-sm">
                        <div class="flex items-center gap-1"><i class="fa-solid fa-check-circle text-accent"></i> 3 Jalur Pendaftaran</div>
                        <div class="flex items-center gap-1"><i class="fa-solid fa-trophy text-accent"></i> Beasiswa Unggulan</div>
                        <div class="flex items-center gap-1"><i class="fa-regular fa-clock text-accent"></i> Kuota Terbatas</div>
                    </div>
                </div>
                <!-- Poster PPDB -->
                <div class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-md animate-scale-in">
                    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transform transition hover:scale-[1.02] duration-300">
                        <div class="bg-gradient-to-r from-primary to-secondary px-5 py-3 text-white flex justify-between items-center">
                            <span class="font-bold tracking-wide flex items-center gap-2"><i class="fa-regular fa-calendar"></i> PPDB 2026</span>
                            <span class="text-xs bg-white/20 px-2 py-0.5 rounded-full">Resmi</span>
                        </div>
                        <div class="p-5 text-center">
                            <div class="flex justify-center mb-3">
                                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center shadow-inner">
                                    <i class="fa-solid fa-school text-primary text-3xl"></i>
                                </div>
                            </div>
                            <h3 class="text-primary font-extrabold text-xl">SMAN 1 Batang Gasan</h3>
                            <p class="text-xs text-gray-500 mb-4">Membuka pendaftaran siswa baru T.A 2026/2027</p>
                            <div class="grid grid-cols-2 gap-4 text-left border-t border-gray-100 pt-4">
                                <div><span class="font-bold text-primary text-sm flex items-center gap-1 mb-1"><i class="fa-regular fa-calendar"></i> Pendaftaran:</span><span class="text-xs">10 Jan - 28 Feb 2026</span></div>
                                <div><span class="font-bold text-primary text-sm flex items-center gap-1 mb-1"><i class="fa-regular fa-clock"></i> Tes Online:</span><span class="text-xs">5-7 Maret 2026</span></div>
                                <div><span class="font-bold text-primary text-sm flex items-center gap-1 mb-1"><i class="fa-regular fa-bell"></i> Pengumuman:</span><span class="text-xs">20 Maret 2026</span></div>
                                <div><span class="font-bold text-primary text-sm flex items-center gap-1 mb-1"><i class="fa-solid fa-users"></i> Kuota:</span><span class="text-xs">198 Siswa</span></div>
                            </div>
                            <div class="mt-5 p-2.5 bg-amber-50 rounded-xl flex items-center justify-center gap-2 text-primary text-xs font-semibold">
                                <i class="fa-solid fa-qrcode text-lg"></i> Scan QR Code untuk registrasi
                            </div>
                        </div>
                        <div class="bg-gray-50 text-center py-2 text-[11px] text-gray-500 border-t">ppdb.sman1batanggasan.sch.id/2026</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Info Cards - jarak icon rapi -->
        <div class="container mx-auto px-4 -mt-12 md:-mt-16 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                <div class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 hover-lift transition-all duration-300 border border-gray-100">
                    <div class="bg-primary/10 rounded-2xl p-3 text-primary min-w-[52px] text-center"><i class="fa-solid fa-chalkboard-user text-2xl"></i></div>
                    <div><h3 class="font-bold text-primary text-base">Kurikulum Merdeka</h3><p class="text-gray-500 text-xs">Pembelajaran berbasis projek & digital</p></div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 hover-lift transition-all duration-300 border border-gray-100">
                    <div class="bg-primary/10 rounded-2xl p-3 text-primary min-w-[52px] text-center"><i class="fa-solid fa-medal text-2xl"></i></div>
                    <div><h3 class="font-bold text-primary text-base">60+ Prestasi</h3><p class="text-gray-500 text-xs">Akademik & non-akademik 2024-2026</p></div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 hover-lift transition-all duration-300 border border-gray-100">
                    <div class="bg-primary/10 rounded-2xl p-3 text-primary min-w-[52px] text-center"><i class="fa-solid fa-leaf text-2xl"></i></div>
                    <div><h3 class="font-bold text-primary text-base">Sekolah Adiwiyata</h3><p class="text-gray-500 text-xs">Berwawasan lingkungan hijau</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 animate-slide-up">
                    <span class="section-badge flex items-center gap-1 w-fit"><i class="fa-regular fa-message"></i> Kata Sambutan</span>
                    <h2 class="section-title text-3xl md:text-4xl font-bold text-primary mb-6">Kepala Sekolah</h2>
                    <p class="text-gray-600 leading-relaxed mb-3">Assalamu'alaikum Wr. Wb.</p>
                    <p class="text-gray-600 leading-relaxed mb-3">Alhamdulillah, SMAN 1 Batang Gasan terus bertransformasi menyongsong tahun ajaran 2026/2027. Dengan sistem PPDB online yang terintegrasi, kami hadirkan kemudahan bagi calon siswa baru. Kami berkomitmen mencetak generasi unggul berkarakter dan berdaya saing global.</p>
                    <p class="text-gray-600 leading-relaxed mb-3">Fasilitas modern, guru profesional, serta lingkungan belajar yang nyaman menjadi prioritas kami. Mari bergabung dan raih prestasi bersama sekolah kebanggaan masyarakat Batang Gasan.</p>
                    <p class="text-gray-600 mb-2">Wassalamu'alaikum Wr. Wb.</p>
                    <div class="mt-6 pt-3 border-t border-gray-100">
                        <p class="font-bold text-primary text-lg">Drs. Ahmad Fauzi, M.Pd.</p>
                        <p class="text-gray-500 text-sm">Kepala SMAN 1 Batang Gasan</p>
                    </div>
                </div>
                <div class="order-1 md:order-2 flex justify-center">
                    <div class="relative w-64 md:w-72">
                        <div class="absolute -inset-3 bg-accent/20 rounded-3xl rotate-3"></div>
                        <div class="relative bg-gray-100 rounded-3xl overflow-hidden shadow-xl">
                            <img src="https://placehold.co/500x600/eef2f6/374151?text=Kepala+Sekolah" alt="Kepala Sekolah" class="w-full h-auto object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru - icon dengan jarak rapi -->
    <section class="py-16 bg-neutral">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-3">
                <div>
                    <span class="section-badge flex items-center gap-1 w-fit"><i class="fa-regular fa-newspaper"></i> Update</span>
                    <h2 class="section-title text-3xl font-bold text-primary">Berita & Prestasi</h2>
                    <p class="text-gray-500 mt-2">Informasi terkini seputar kegiatan sekolah</p>
                </div>
                <a href="#" class="text-primary font-medium hover:underline inline-flex items-center gap-2 transition">Semua Berita <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="grid md:grid-cols-3 gap-7">
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=500&auto=format');"></div>
                    <div class="p-5"><div class="flex items-center text-gray-400 text-xs mb-3 gap-2"><i class="fa-regular fa-calendar-alt"></i> <span>12 Maret 2026</span></div><h3 class="font-bold text-xl text-primary mb-2">Juara Umum Olimpiade Sains</h3><p class="text-gray-600 text-sm mb-4">Siswa SMAN 1 Batang Gasan raih 5 medali emas di ajang OSN tingkat Provinsi Sumatera Barat.</p><a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a></div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?w=500&auto=format');"></div>
                    <div class="p-5"><div class="flex items-center text-gray-400 text-xs mb-3 gap-2"><i class="fa-regular fa-calendar-alt"></i> <span>5 Maret 2026</span></div><h3 class="font-bold text-xl text-primary mb-2">Peringatan Hardiknas 2026</h3><p class="text-gray-600 text-sm mb-4">Upacara bendera dan gelar karya P5 menjadi puncak peringatan Hari Pendidikan Nasional.</p><a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a></div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=500&auto=format');"></div>
                    <div class="p-5"><div class="flex items-center text-gray-400 text-xs mb-3 gap-2"><i class="fa-regular fa-calendar-alt"></i> <span>20 Februari 2026</span></div><h3 class="font-bold text-xl text-primary mb-2">Kunjungan Dinas Pendidikan</h3><p class="text-gray-600 text-sm mb-4">Monitoring PPDB 2026 dan implementasi digitalisasi sekolah berjalan sukses.</p><a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Agenda Kegiatan - icon dengan jarak rapi -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center flex-wrap gap-4 mb-10">
                <div><span class="section-badge flex items-center gap-1 w-fit"><i class="fa-regular fa-calendar"></i> Event</span><h2 class="section-title text-3xl font-bold text-primary">Agenda Sekolah</h2></div>
                <a href="#" class="text-primary border border-primary/30 px-5 py-2 rounded-full text-sm hover:bg-primary hover:text-white transition-all duration-300 inline-flex items-center gap-2">Lihat Semua <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="flex items-start gap-4 bg-neutral p-4 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300">
                    <div class="bg-primary text-white rounded-xl text-center min-w-[65px] py-2"><span class="block text-2xl font-bold">20</span><span class="text-xs">Apr</span></div>
                    <div><h4 class="font-bold text-primary">Ujian Sekolah XII</h4><p class="text-gray-500 text-xs flex items-center gap-1 mt-1"><i class="fa-regular fa-clock"></i> 08:00 - 12:00</p><p class="text-gray-500 text-xs flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Ruang Kelas</p></div>
                </div>
                <div class="flex items-start gap-4 bg-neutral p-4 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300">
                    <div class="bg-primary text-white rounded-xl text-center min-w-[65px] py-2"><span class="block text-2xl font-bold">25</span><span class="text-xs">Apr</span></div>
                    <div><h4 class="font-bold text-primary">Rapat Orang Tua</h4><p class="text-gray-500 text-xs flex items-center gap-1 mt-1"><i class="fa-regular fa-clock"></i> 09:00 - 11:00</p><p class="text-gray-500 text-xs flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Aula</p></div>
                </div>
                <div class="flex items-start gap-4 bg-neutral p-4 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300">
                    <div class="bg-primary text-white rounded-xl text-center min-w-[65px] py-2"><span class="block text-2xl font-bold">1</span><span class="text-xs">Mei</span></div>
                    <div><h4 class="font-bold text-primary">Hari Buruh</h4><p class="text-gray-500 text-xs flex items-center gap-1 mt-1"><i class="fa-regular fa-clock"></i> 08:00 - 10:00</p><p class="text-gray-500 text-xs flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Lapangan</p></div>
                </div>
                <div class="flex items-start gap-4 bg-neutral p-4 rounded-xl border border-gray-100 hover:shadow-md transition-all duration-300">
                    <div class="bg-primary text-white rounded-xl text-center min-w-[65px] py-2"><span class="block text-2xl font-bold">10</span><span class="text-xs">Mei</span></div>
                    <div><h4 class="font-bold text-primary">Lomba Kebersihan</h4><p class="text-gray-500 text-xs flex items-center gap-1 mt-1"><i class="fa-regular fa-clock"></i> 08:00 - 14:00</p><p class="text-gray-500 text-xs flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Semua Kelas</p></div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Fasilitas Sekolah - Modern dengan jarak icon rapi -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <span class="section-badge inline-flex items-center gap-2 mx-auto"><i class="fa-solid fa-building"></i> Sarana & Prasarana</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-primary text-center after:left-1/2 after:-translate-x-1/2 after:w-24">Fasilitas Sekolah</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Didukung dengan fasilitas modern dan nyaman untuk mendukung proses belajar mengajar yang optimal</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Perpustakaan -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-book text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Perpustakaan Digital</h3>
                <p class="text-gray-500 text-sm">Koleksi buku fisik & e-book lengkap dengan area baca nyaman</p>
            </div>
            <!-- Laboratorium IPA -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-flask text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Lab IPA Terpadu</h3>
                <p class="text-gray-500 text-sm">Praktikum Fisika, Kimia, Biologi dengan alat modern</p>
            </div>
            <!-- Lab Komputer -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-laptop-code text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Lab Komputer</h3>
                <p class="text-gray-500 text-sm">80+ PC modern dengan internet fiber optic</p>
            </div>
            <!-- Lapangan Olahraga -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-futbol text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Sport Center</h3>
                <p class="text-gray-500 text-sm">Lapangan basket, voli, futsal & jogging track</p>
            </div>
            <!-- Musholla -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-mosque text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Musholla Al-Furqan</h3>
                <p class="text-gray-500 text-sm">Tempat ibadah nyaman dengan fasilitas wudhu</p>
            </div>
            <!-- UKS -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-truck-medical text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">UKS & Kesehatan</h3>
                <p class="text-gray-500 text-sm">Layanan kesehatan dan konsultasi dokter rutin</p>
            </div>
            <!-- Kantin Sehat -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-utensils text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">Kantin Sehat</h3>
                <p class="text-gray-500 text-sm">Makanan bergizi dengan harga terjangkau</p>
            </div>
            <!-- Wifi Zone -->
            <div class="bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1">
                <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-wifi text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-primary mb-2">WiFi Gratis</h3>
                <p class="text-gray-500 text-sm">Akses internet cepat di seluruh area sekolah</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Sekolah - Modern dengan animasi counter -->
<section class="py-16 bg-gradient-to-br from-primary to-secondary text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 40%, rgba(255,255,255,0.2) 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-semibold"><i class="fa-solid fa-chart-line"></i> Profil Sekolah</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-4 mb-2">SMAN 1 Batang Gasan dalam Angka</h2>
            <p class="text-white/80 max-w-2xl mx-auto">Prestasi dan pencapaian membanggakan yang telah diraih</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-users text-3xl"></i>
                </div>
                <div class="text-4xl md:text-5xl font-extrabold mb-2">750+</div>
                <div class="text-lg font-semibold">Siswa Aktif</div>
                <p class="text-white/70 text-sm mt-2">25 rombongan belajar</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-chalkboard-user text-3xl"></i>
                </div>
                <div class="text-4xl md:text-5xl font-extrabold mb-2">45+</div>
                <div class="text-lg font-semibold">Guru & Staf</div>
                <p class="text-white/70 text-sm mt-2">Guru profesional & tersertifikasi</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-door-open text-3xl"></i>
                </div>
                <div class="text-4xl md:text-5xl font-extrabold mb-2">24</div>
                <div class="text-lg font-semibold">Ruang Kelas</div>
                <p class="text-white/70 text-sm mt-2">Dilengkapi AC & proyektor</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-medal text-3xl"></i>
                </div>
                <div class="text-4xl md:text-5xl font-extrabold mb-2">15+</div>
                <div class="text-lg font-semibold">Ekstrakurikuler</div>
                <p class="text-white/70 text-sm mt-2">Prestasi tingkat provinsi & nasional</p>
            </div>
        </div>
    </div>
</section>

<!-- PPDB 2026 - Modern dengan jarak icon rapi -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-br from-primary/5 to-secondary/5 rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="md:flex">
                <div class="md:w-1/2 p-8 md:p-12 bg-gradient-to-br from-primary to-secondary text-white">
                    <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm mb-4">
                        <i class="fa-regular fa-calendar-check"></i> Gelombang 1 - 2026
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Penerimaan Peserta Didik Baru 2026/2027</h2>
                    <p class="text-white/90 mb-6 leading-relaxed">SMAN 1 Batang Gasan membuka pendaftaran untuk siswa baru tahun ajaran 2026/2027. Segera daftarkan diri Anda untuk mendapatkan pendidikan berkualitas!</p>
                    <ul class="mb-8 space-y-3">
                        <li class="flex items-center gap-3"><i class="fa-solid fa-check-circle text-accent w-5"></i> <span>Fasilitas lengkap & modern</span></li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-check-circle text-accent w-5"></i> <span>Guru profesional & berpengalaman</span></li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-check-circle text-accent w-5"></i> <span>Lingkungan belajar kondusif & nyaman</span></li>
                        <li class="flex items-center gap-3"><i class="fa-solid fa-check-circle text-accent w-5"></i> <span>Beragam ekstrakurikuler unggulan</span></li>
                    </ul>
                    <a href="/login" class="inline-flex items-center gap-2 bg-accent text-gray-900 font-bold px-6 py-3 rounded-xl shadow-lg hover:bg-amber-400 transition-all duration-300"><i class="fa-regular fa-pen-to-square"></i> Daftar Sekarang</a>
                </div>
                <div class="md:w-1/2 bg-white p-8 md:p-12">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-regular fa-calendar text-accent text-xl"></i>
                        <h3 class="text-2xl font-bold text-primary">Jadwal Pendaftaran</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary flex-shrink-0"><i class="fa-regular fa-calendar-alt text-xl"></i></div>
                            <div><h4 class="font-bold text-primary">Pendaftaran Online</h4><p class="text-gray-500 text-sm">10 Januari - 28 Februari 2026</p></div>
                        </div>
                        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary flex-shrink-0"><i class="fa-regular fa-file-lines text-xl"></i></div>
                            <div><h4 class="font-bold text-primary">Verifikasi Berkas</h4><p class="text-gray-500 text-sm">1 - 5 Maret 2026</p></div>
                        </div>
                        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary flex-shrink-0"><i class="fa-solid fa-pen-to-square text-xl"></i></div>
                            <div><h4 class="font-bold text-primary">Tes Seleksi</h4><p class="text-gray-500 text-sm">10 - 12 Maret 2026</p></div>
                        </div>
                        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary flex-shrink-0"><i class="fa-solid fa-chart-simple text-xl"></i></div>
                            <div><h4 class="font-bold text-primary">Pengumuman Hasil</h4><p class="text-gray-500 text-sm">20 Maret 2026</p></div>
                        </div>
                        <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary flex-shrink-0"><i class="fa-solid fa-user-plus text-xl"></i></div>
                            <div><h4 class="font-bold text-primary">Daftar Ulang</h4><p class="text-gray-500 text-sm">21 - 25 Maret 2026</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontak & Lokasi - Modern, Responsif, Mudah Diedit -->
<section class="py-16 bg-neutral">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="section-badge inline-flex items-center gap-2 mx-auto"><i class="fa-regular fa-message"></i> Hubungi Kami</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-primary text-center after:left-1/2 after:-translate-x-1/2 after:w-24 mt-2">Kontak & Lokasi</h2>
            <p class="text-gray-500 mt-5 max-w-2xl mx-auto">Sampaikan saran, kritik, atau pertanyaan melalui form berikut. Tim kami akan merespon dalam waktu 1x24 jam.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Bagian Kiri: Informasi Kontak -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500">
                <!-- Header dengan gradasi -->
                <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fa-regular fa-address-card text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl">Informasi Kontak</h3>
                            <p class="text-white/80 text-sm">Hubungi kami melalui berbagai saluran berikut</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 space-y-5">
                    <!-- Alamat -->
                    <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                        <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i class="fa-solid fa-location-dot text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-primary text-base">Alamat</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">Jl. Raya Batang Gasan No. 45, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562</p>
                            <button onclick="copyToClipboard('Jl. Raya Batang Gasan No. 45, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562')" 
                                class="text-xs text-accent hover:text-primary mt-1 inline-flex items-center gap-1 transition">
                                <i class="fa-regular fa-copy"></i> Salin Alamat
                            </button>
                        </div>
                    </div>
                    
                    <!-- Telepon -->
                    <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                        <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i class="fa-solid fa-phone text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-primary text-base">Telepon</h4>
                            <p class="text-gray-600 text-sm">(0752) 12345</p>
                            <p class="text-gray-500 text-xs mt-1">Jam Kerja: Senin - Jumat, 08.00 - 15.00 WIB</p>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                        <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i class="fa-regular fa-envelope text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-primary text-base">Email</h4>
                            <p class="text-gray-600 text-sm">info@sman1batanggasan.sch.id</p>
                            <p class="text-gray-600 text-sm">ppdb@sman1batanggasan.sch.id</p>
                            <button onclick="copyToClipboard('info@sman1batanggasan.sch.id')" 
                                class="text-xs text-accent hover:text-primary mt-1 inline-flex items-center gap-1 transition">
                                <i class="fa-regular fa-copy"></i> Salin Email
                            </button>
                        </div>
                    </div>
                    
                    <!-- Jam Operasional -->
                    <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                        <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i class="fa-regular fa-clock text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-primary text-base">Jam Operasional</h4>
                            <div class="grid grid-cols-2 gap-2 text-sm mt-1">
                                <div><span class="text-gray-500">Senin - Kamis:</span></div>
                                <div><span class="text-gray-600">07.30 - 15.30 WIB</span></div>
                                <div><span class="text-gray-500">Jumat:</span></div>
                                <div><span class="text-gray-600">07.30 - 16.00 WIB</span></div>
                                <div><span class="text-gray-500">Sabtu - Minggu:</span></div>
                                <div><span class="text-gray-600">Libur</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sosial Media dengan efek modern -->
                <div class="bg-gray-50 px-6 py-5 border-t border-gray-100">
                    <h4 class="font-bold text-primary mb-4 flex items-center gap-2"><i class="fa-brands fa-socid text-accent"></i> Ikuti Kami di Sosial Media</h4>
                    <div class="flex flex-wrap gap-3">
                        <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-primary hover:text-white hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-brands fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-gradient-to-tr hover:from-purple-600 hover:to-pink-500 hover:text-white transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-brands fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-red-600 hover:text-white transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-brands fa-youtube text-xl"></i>
                        </a>
                        <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-black hover:text-white transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-brands fa-tiktok text-xl"></i>
                        </a>
                        <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-green-500 hover:text-white transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan: Form Kirim Pesan - Modern dengan validasi -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500">
                <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fa-regular fa-paper-plane text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl">Kirim Pesan</h3>
                            <p class="text-white/80 text-sm">Isi form di bawah untuk menghubungi kami</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <form id="contactForm" class="space-y-5">
                        <!-- Nama Lengkap -->
                        <div class="group">
                            <label class="block text-gray-700 mb-2 text-sm font-medium">
                                <i class="fa-regular fa-user text-accent mr-1"></i> Nama Lengkap <span class="text-accent">*</span>
                            </label>
                            <input type="text" id="fullname" placeholder="Masukkan nama lengkap Anda" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white">
                            <div class="text-red-500 text-xs mt-1 hidden" id="fullname-error">Nama lengkap harus diisi</div>
                        </div>
                        
                        <!-- Email -->
                        <div class="group">
                            <label class="block text-gray-700 mb-2 text-sm font-medium">
                                <i class="fa-regular fa-envelope text-accent mr-1"></i> Email <span class="text-accent">*</span>
                            </label>
                            <input type="email" id="email" placeholder="contoh@email.com" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white">
                            <div class="text-red-500 text-xs mt-1 hidden" id="email-error">Email tidak valid</div>
                        </div>
                        
                        <!-- Subjek -->
                        <div class="group">
                            <label class="block text-gray-700 mb-2 text-sm font-medium">
                                <i class="fa-regular fa-tag text-accent mr-1"></i> Subjek
                            </label>
                            <select id="subject" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white">
                                <option value="info">Informasi Sekolah</option>
                                <option value="ppdb">Pendaftaran PPDB</option>
                                <option value="saran">Saran & Masukan</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <!-- Pesan -->
                        <div class="group">
                            <label class="block text-gray-700 mb-2 text-sm font-medium">
                                <i class="fa-regular fa-message text-accent mr-1"></i> Pesan <span class="text-accent">*</span>
                            </label>
                            <textarea id="message" rows="4" placeholder="Tulis pesan Anda di sini..." 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white resize-none"></textarea>
                            <div class="text-red-500 text-xs mt-1 hidden" id="message-error">Pesan harus diisi</div>
                        </div>
                        
                        <!-- Notifikasi Toast (akan muncul setelah submit) -->
                        <div id="toast-notification" class="fixed bottom-5 right-5 bg-green-500 text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 z-50 hidden transition-all duration-300">
                            <i class="fa-regular fa-circle-check"></i> Pesan berhasil dikirim!
                        </div>
                        
                        <button type="submit" id="submitBtn" 
                            class="w-full bg-gradient-to-r from-primary to-secondary text-white font-bold py-3.5 rounded-xl hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 flex items-center justify-center gap-2 group">
                            <i class="fa-regular fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-300"></i> 
                            Kirim Pesan
                        </button>
                        
                        <p class="text-center text-xs text-gray-400 mt-3">
                            <i class="fa-regular fa-lock"></i> Data Anda aman dan tidak akan dibagikan kepada pihak ketiga
                        </p>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Informasi Tambahan - Quick Links -->
        <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-300 group">
                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-colors">
                    <i class="fa-regular fa-file-lines"></i>
                </div>
                <p class="text-xs text-gray-500">Profil Sekolah</p>
            </div>
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-300 group">
                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-colors">
                    <i class="fa-regular fa-calendar"></i>
                </div>
                <p class="text-xs text-gray-500">Kalender Akademik</p>
            </div>
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-300 group">
                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-colors">
                    <i class="fa-regular fa-circle-question"></i>
                </div>
                <p class="text-xs text-gray-500">FAQ PPDB</p>
            </div>
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-md transition-all duration-300 group">
                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-colors">
                    <i class="fa-regular fa-map"></i>
                </div>
                <p class="text-xs text-gray-500">Panduan Lokasi</p>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript untuk Validasi Form, Copy Text, Toast Notification -->
<script>
    // Fungsi untuk menyalin teks ke clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Berhasil disalin!', 'success');
        }).catch(() => {
            showToast('Gagal menyalin', 'error');
        });
    }
    
    // Fungsi untuk menampilkan notifikasi toast
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast-notification');
        if (toast) {
            toast.textContent = message;
            toast.className = `fixed bottom-5 right-5 px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 z-50 transition-all duration-300 ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            } text-white`;
            toast.innerHTML = `<i class="fa-regular fa-${type === 'success' ? 'circle-check' : 'circle-xmark'}"></i> ${message}`;
            toast.classList.remove('hidden');
            
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
    }
    
    // Validasi form kontak
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            
            // Validasi Nama
            const fullname = document.getElementById('fullname');
            const fullnameError = document.getElementById('fullname-error');
            if (!fullname.value.trim()) {
                fullnameError.classList.remove('hidden');
                fullname.classList.add('border-red-500', 'ring-red-100');
                isValid = false;
            } else {
                fullnameError.classList.add('hidden');
                fullname.classList.remove('border-red-500', 'ring-red-100');
                fullname.classList.add('border-green-400');
            }
            
            // Validasi Email
            const email = document.getElementById('email');
            const emailError = document.getElementById('email-error');
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email.value.trim() || !emailPattern.test(email.value)) {
                emailError.classList.remove('hidden');
                email.classList.add('border-red-500', 'ring-red-100');
                isValid = false;
            } else {
                emailError.classList.add('hidden');
                email.classList.remove('border-red-500', 'ring-red-100');
                email.classList.add('border-green-400');
            }
            
            // Validasi Pesan
            const message = document.getElementById('message');
            const messageError = document.getElementById('message-error');
            if (!message.value.trim()) {
                messageError.classList.remove('hidden');
                message.classList.add('border-red-500', 'ring-red-100');
                isValid = false;
            } else {
                messageError.classList.add('hidden');
                message.classList.remove('border-red-500', 'ring-red-100');
                message.classList.add('border-green-400');
            }
            
            if (isValid) {
                // Simulasi pengiriman data (bisa dihubungkan ke backend nanti)
                const subjectSelect = document.getElementById('subject');
                const subjectText = subjectSelect.options[subjectSelect.selectedIndex].text;
                
                const formData = {
                    name: fullname.value,
                    email: email.value,
                    subject: subjectText,
                    message: message.value,
                    date: new Date().toISOString()
                };
                
                console.log('Form Data:', formData);
                
                // Tampilkan loading pada tombol
                const submitBtn = document.getElementById('submitBtn');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim...';
                submitBtn.disabled = true;
                
                // Simulasi pengiriman (delay 1 detik)
                setTimeout(() => {
                    showToast('Pesan berhasil dikirim! Kami akan segera merespon.', 'success');
                    contactForm.reset();
                    
                    // Reset border warna
                    document.querySelectorAll('input, textarea').forEach(el => {
                        el.classList.remove('border-green-400', 'border-red-500');
                    });
                    
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                }, 1000);
            }
        });
        
        // Hapus error styling saat user mengetik
        const inputs = ['fullname', 'email', 'message'];
        inputs.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', function() {
                    this.classList.remove('border-red-500', 'border-green-400', 'ring-red-100');
                    const errorId = id + '-error';
                    const errorEl = document.getElementById(errorId);
                    if (errorEl) errorEl.classList.add('hidden');
                });
            }
        });
    }
</script>

    <!-- Peta Lokasi & Rute - Modern dengan Leaflet & Perhitungan Jarak -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <span class="section-badge inline-flex items-center gap-2 mx-auto"><i class="fa-solid fa-map-location-dot"></i> Lokasi & Rute</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-primary text-center after:left-1/2 after:-translate-x-1/2 after:w-24">Lokasi Sekolah</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Cari tahu lokasi SMAN 1 Batang Gasan dan hitung jarak tempuh dari lokasi Anda</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Informasi Alamat & Rute -->
            <div class="bg-neutral rounded-2xl p-6 shadow-md">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                        <i class="fa-solid fa-location-dot text-lg"></i>
                    </div>
                    <h3 class="font-bold text-primary text-lg">SMAN 1 Batang Gasan</h3>
                </div>
                
                <div class="space-y-4 mb-6">
                    <div class="flex gap-3">
                        <i class="fa-solid fa-map-pin text-accent mt-1"></i>
                        <p class="text-gray-600 text-sm">Jl. Pariaman - Tiku KM. 26, Sungai Sarik Malai V Suku, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562</p>
                    </div>
                    <div class="flex gap-3">
                        <i class="fa-solid fa-globe text-accent mt-1"></i>
                        <p class="text-gray-600 text-sm">Koordinat: 0°27'9.8"S 99°59'24.2"E</p>
                    </div>
                    <div class="flex gap-3">
                        <i class="fa-solid fa-phone text-accent mt-1"></i>
                        <p class="text-gray-600 text-sm">(0752) 12345</p>
                    </div>
                </div>

                <!-- Form Perhitungan Rute -->
                <div class="border-t border-gray-200 pt-5">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-route text-primary"></i>
                        <h4 class="font-semibold text-primary">Hitung Jarak & Rute</h4>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Asal</label>
                            <div class="flex gap-2">
                                <input type="text" id="origin-input" placeholder="Masukkan alamat atau kota Anda" 
                                    class="flex-1 px-3 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50">
                                <button id="use-current-location" class="bg-primary/10 hover:bg-primary/20 text-primary px-3 rounded-xl transition" title="Gunakan lokasi saya">
                                    <i class="fa-solid fa-location-crosshairs"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Transportasi</label>
                            <div class="grid grid-cols-4 gap-2">
                                <button data-mode="DRIVING" class="transport-mode-btn active bg-primary text-white p-2 rounded-xl text-xs flex flex-col items-center gap-1 transition">
                                    <i class="fa-solid fa-car"></i> <span>Mobil</span>
                                </button>
                                <button data-mode="WALKING" class="transport-mode-btn bg-gray-100 text-gray-600 p-2 rounded-xl text-xs flex flex-col items-center gap-1 transition">
                                    <i class="fa-solid fa-person-walking"></i> <span>Jalan Kaki</span>
                                </button>
                                <button data-mode="BICYCLING" class="transport-mode-btn bg-gray-100 text-gray-600 p-2 rounded-xl text-xs flex flex-col items-center gap-1 transition">
                                    <i class="fa-solid fa-bicycle"></i> <span>Sepeda</span>
                                </button>
                                <button data-mode="TRANSIT" class="transport-mode-btn bg-gray-100 text-gray-600 p-2 rounded-xl text-xs flex flex-col items-center gap-1 transition">
                                    <i class="fa-solid fa-bus"></i> <span>Angkutan</span>
                                </button>
                            </div>
                        </div>
                        <button id="calculate-route" class="w-full bg-gradient-to-r from-primary to-secondary text-white font-semibold py-2.5 rounded-xl hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 mt-2">
                            <i class="fa-regular fa-compass"></i> Hitung Rute
                        </button>
                    </div>
                </div>

                <!-- Hasil Jarak & Waktu -->
                <div id="route-result" class="mt-5 p-4 bg-white rounded-xl border border-gray-100 hidden">
                    <div class="flex items-center gap-2 text-primary font-semibold mb-2">
                        <i class="fa-solid fa-chart-line"></i> Perkiraan Perjalanan
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-center flex-1">
                            <div class="text-2xl font-bold text-primary" id="distance-value">0 km</div>
                            <div class="text-xs text-gray-500">Jarak</div>
                        </div>
                        <div class="w-px h-8 bg-gray-200"></div>
                        <div class="text-center flex-1">
                            <div class="text-2xl font-bold text-primary" id="duration-value">0 menit</div>
                            <div class="text-xs text-gray-500">Estimasi Waktu</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peta Interaktif -->
            <div class="lg:col-span-2">
                <div class="bg-neutral rounded-2xl overflow-hidden shadow-md">
                    <div id="map" class="w-full h-[500px] z-0" style="height: 500px;"></div>
                    <div class="p-3 bg-white border-t border-gray-100 text-xs text-gray-500 flex justify-between items-center flex-wrap gap-2">
                        <span class="flex items-center gap-2"><i class="fa-regular fa-circle-check text-green-500"></i> Lokasi sekolah dikonfirmasi</span>
                        <span class="flex items-center gap-2"><i class="fa-solid fa-arrow-right-arrow-left text-accent"></i> Klik peta untuk mulai/destination</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leaflet CSS & JS - OpenStreetMap Gratis & Modern -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.css" />

<script>
// Koordinat SMAN 1 Batang Gasan berdasarkan hasil pencarian [citation:5]
// Latitude: -0.452728, Longitude: 99.990054
const SCHOOL_LAT = -0.452728;
const SCHOOL_LNG = 99.990054;
const SCHOOL_NAME = "SMAN 1 Batang Gasan";

// Inisialisasi Peta dengan Leaflet
const map = L.map('map').setView([SCHOOL_LAT, SCHOOL_LNG], 15);

// Tile Layer - OpenStreetMap (Gratis & Modern)
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions">CARTO</a>',
    subdomains: 'abcd',
    maxZoom: 19,
    minZoom: 10
}).addTo(map);

// Marker Sekolah dengan custom icon
const schoolIcon = L.divIcon({
    html: '<div class="flex items-center justify-center w-10 h-10 bg-primary rounded-full shadow-lg border-2 border-white"><i class="fa-solid fa-school text-white text-lg"></i></div>',
    className: 'custom-marker',
    iconSize: [40, 40],
    popupAnchor: [0, -20]
});

const schoolMarker = L.marker([SCHOOL_LAT, SCHOOL_LNG], { icon: schoolIcon }).addTo(map);
schoolMarker.bindPopup(`
    <div class="text-center p-1">
        <strong class="text-primary">${SCHOOL_NAME}</strong><br>
        <span class="text-xs text-gray-500">Jl. Pariaman - Tiku KM. 26</span>
    </div>
`).openPopup();

// Variabel untuk routing control
let routingControl = null;
let currentRouteMode = 'DRIVING';

// Fungsi untuk mengubah mode transportasi
function updateRouteMode(mode) {
    currentRouteMode = mode;
    // Update tampilan tombol
    document.querySelectorAll('.transport-mode-btn').forEach(btn => {
        if (btn.dataset.mode === mode) {
            btn.classList.add('bg-primary', 'text-white');
            btn.classList.remove('bg-gray-100', 'text-gray-600');
        } else {
            btn.classList.remove('bg-primary', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-600');
        }
    });
}

// Fungsi untuk menghitung dan menampilkan rute
function calculateRoute(originLat, originLng, originAddress) {
    // Hapus routing control yang ada
    if (routingControl) {
        map.removeControl(routingControl);
    }
    
    // Tampilkan loading
    const routeResult = document.getElementById('route-result');
    routeResult.classList.remove('hidden');
    document.getElementById('distance-value').innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
    document.getElementById('duration-value').innerHTML = 'Menghitung...';
    
    // Konversi mode transportasi ke format leaflet-routing-machine
    let routingMode = 'driving';
    if (currentRouteMode === 'WALKING') routingMode = 'walking';
    else if (currentRouteMode === 'BICYCLING') routingMode = 'cycling';
    else if (currentRouteMode === 'DRIVING') routingMode = 'driving';
    
    // Buat routing control baru
    routingControl = L.Routing.control({
        waypoints: [
            L.latLng(originLat, originLng),
            L.latLng(SCHOOL_LAT, SCHOOL_LNG)
        ],
        routeWhileDragging: false,
        showAlternatives: false,
        fitSelectedRoutes: true,
        lineOptions: {
            styles: [{ color: '#F59E0B', weight: 5, opacity: 0.8 }],
            extendToWaypoints: true,
            missingRouteTolerance: 0
        },
        router: L.Routing.osrmv1({
            serviceUrl: 'https://router.project-osrm.org/route/v1',
            profile: routingMode
        }),
        show: false, // Menyembunyikan panel instruksi default agar lebih rapi
        addWaypoints: false,
        draggableWaypoints: false
    }).addTo(map);
    
    // Event ketika rute berhasil dihitung
    routingControl.on('routesfound', function(e) {
        const routes = e.routes;
        if (routes && routes.length > 0) {
            const summary = routes[0].summary;
            const totalDistance = summary.totalDistance;
            const totalTime = summary.totalTime;
            
            // Format jarak
            let distanceText = '';
            if (totalDistance >= 1000) {
                distanceText = (totalDistance / 1000).toFixed(1) + ' km';
            } else {
                distanceText = totalDistance + ' m';
            }
            
            // Format waktu
            let timeText = '';
            if (totalTime >= 3600) {
                const hours = Math.floor(totalTime / 3600);
                const minutes = Math.floor((totalTime % 3600) / 60);
                timeText = hours + ' jam ' + minutes + ' menit';
            } else {
                const minutes = Math.floor(totalTime / 60);
                timeText = minutes + ' menit';
            }
            
            document.getElementById('distance-value').innerHTML = distanceText;
            document.getElementById('duration-value').innerHTML = timeText;
        }
    });
    
    // Event jika rute gagal
    routingControl.on('routingerror', function(e) {
        document.getElementById('distance-value').innerHTML = 'Tidak ditemukan';
        document.getElementById('duration-value').innerHTML = 'Rute tidak tersedia';
    });
}

// Event Listener untuk tombol hitung rute
document.getElementById('calculate-route').addEventListener('click', async () => {
    const originInput = document.getElementById('origin-input').value.trim();
    
    if (!originInput) {
        alert('Silakan masukkan lokasi asal Anda');
        return;
    }
    
    // Geocoding menggunakan Nominatim (OpenStreetMap) untuk mendapatkan koordinat
    try {
        document.getElementById('distance-value').innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
        document.getElementById('duration-value').innerHTML = 'Mencari...';
        document.getElementById('route-result').classList.remove('hidden');
        
        const response = await fetch(`https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(originInput)}&format=json&limit=1`);
        const data = await response.json();
        
        if (data && data.length > 0) {
            const lat = parseFloat(data[0].lat);
            const lon = parseFloat(data[0].lon);
            calculateRoute(lat, lon, data[0].display_name);
        } else {
            alert('Lokasi tidak ditemukan. Silakan coba dengan alamat yang lebih spesifik.');
            document.getElementById('route-result').classList.add('hidden');
        }
    } catch (error) {
        console.error('Geocoding error:', error);
        alert('Terjadi kesalahan saat mencari lokasi. Silakan coba lagi.');
        document.getElementById('route-result').classList.add('hidden');
    }
});

// Event Listener untuk menggunakan lokasi saat ini
document.getElementById('use-current-location').addEventListener('click', () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                // Reverse geocoding untuk mendapatkan nama lokasi
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        const address = data.display_name || 'Lokasi Anda saat ini';
                        document.getElementById('origin-input').value = address.split(',')[0] || 'Lokasi Anda';
                        calculateRoute(lat, lng, address);
                    })
                    .catch(() => {
                        document.getElementById('origin-input').value = 'Lokasi Anda';
                        calculateRoute(lat, lng, 'Lokasi Anda');
                    });
            },
            (error) => {
                let errorMessage = 'Tidak dapat mengambil lokasi. ';
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMessage += 'Izin lokasi ditolak.';
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMessage += 'Informasi lokasi tidak tersedia.';
                        break;
                    case error.TIMEOUT:
                        errorMessage += 'Waktu permintaan habis.';
                        break;
                }
                alert(errorMessage);
            }
        );
    } else {
        alert('Browser Anda tidak mendukung geolokasi. Silakan masukkan alamat secara manual.');
    }
});

// Event Listener untuk tombol mode transportasi
document.querySelectorAll('.transport-mode-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        updateRouteMode(btn.dataset.mode);
        // Jika sudah ada rute yang dihitung, hitung ulang
        const originInput = document.getElementById('origin-input').value.trim();
        if (originInput && document.getElementById('route-result').classList.contains('hidden') === false) {
            document.getElementById('calculate-route').click();
        }
    });
});

// Tambahkan kontrol geocoder untuk memudahkan pencarian lokasi di peta
L.Control.geocoder({
    defaultMarkGeocode: true,
    position: 'topleft',
    placeholder: 'Cari lokasi...',
    errorMessage: 'Lokasi tidak ditemukan'
}).addTo(map);

// Event untuk klik pada peta - set sebagai lokasi asal
map.on('click', async (e) => {
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;
    
    // Reverse geocoding untuk mendapatkan nama lokasi
    try {
        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`);
        const data = await response.json();
        const address = data.display_name || `${lat.toFixed(4)}, ${lng.toFixed(4)}`;
        document.getElementById('origin-input').value = address.split(',')[0] || 'Lokasi yang dipilih';
        calculateRoute(lat, lng, address);
    } catch (error) {
        document.getElementById('origin-input').value = `${lat.toFixed(4)}, ${lng.toFixed(4)}`;
        calculateRoute(lat, lng, 'Lokasi yang dipilih');
    }
});
</script>

<style>
/* Custom styling untuk marker dan routing panel */
.custom-marker {
    background: transparent;
    border: none;
}
.leaflet-routing-container {
    display: none !important;
}
.leaflet-popup-content-wrapper {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.leaflet-control-geocoder {
    border-radius: 12px !important;
    border: none !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
}
.leaflet-control-geocoder input {
    border-radius: 12px !important;
    padding: 8px 12px !important;
    font-size: 13px !important;
}
</style>

   <!-- Footer Modern dengan warna abu-abu elegan -->
    <footer class="bg-primary text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <div><div class="flex items-center gap-2 mb-4"><div class="bg-white/20 p-2 rounded-xl"><i class="fa-solid fa-graduation-cap text-xl"></i></div><span class="font-extrabold text-lg">SMAN 1 Batang Gasan</span></div><p class="text-sm text-white/80 leading-relaxed">Jl. Raya Batang Gasan No. 45, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat.</p><div class="flex gap-3 mt-4"><a href="#" class="bg-white/20 p-2 rounded-full hover:bg-accent hover:text-primary transition-all duration-300"><i class="fa-brands fa-instagram"></i></a><a href="#" class="bg-white/20 p-2 rounded-full hover:bg-accent hover:text-primary transition-all duration-300"><i class="fa-brands fa-youtube"></i></a><a href="#" class="bg-white/20 p-2 rounded-full hover:bg-accent hover:text-primary transition-all duration-300"><i class="fa-brands fa-tiktok"></i></a></div></div>
                <div><h4 class="font-bold text-lg mb-4 border-l-4 border-accent pl-3">Tautan PPDB</h4><ul class="space-y-2 text-sm"><li><a href="#" class="hover:text-accent transition">Jadwal Pendaftaran</a></li><li><a href="#" class="hover:text-accent transition">Persyaratan</a></li><li><a href="#" class="hover:text-accent transition">Biaya & Beasiswa</a></li><li><a href="#" class="hover:text-accent transition">FAQ PPDB</a></li></ul></div>
                <div><h4 class="font-bold text-lg mb-4 border-l-4 border-accent pl-3">Layanan Digital</h4><ul class="space-y-2 text-sm"><li><a href="#" class="hover:text-accent transition">e-Learning</a></li><li><a href="#" class="hover:text-accent transition">Perpustakaan Digital</a></li><li><a href="#" class="hover:text-accent transition">Raport Online</a></li><li><a href="#" class="hover:text-accent transition">Helpdesk PPDB</a></li></ul></div>
                <div><h4 class="font-bold text-lg mb-4 border-l-4 border-accent pl-3">Kontak Kami</h4><ul class="space-y-2 text-sm"><li><i class="fa-solid fa-phone w-5"></i> (0752) 12345</li><li><i class="fa-regular fa-envelope w-5"></i> info@sman1batanggasan.sch.id</li><li><i class="fa-brands fa-whatsapp w-5"></i> +62 812 3456 7890</li><li><i class="fa-regular fa-clock w-5"></i> Jam layanan: 07.30-16.00</li></ul></div>
            </div>
            <div class="border-t border-white/20 mt-8 pt-5 text-center text-xs text-white/60">© 2026 SMAN 1 Batang Gasan | All Rights Reserved | PPDB Online Modern 2026</div>
        </div>
    </footer>

    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
