<!DOCTYPE html>
<html lang="id">
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>SMAN 1 Batang Gasan - PPDB 2026 | Sekolah Unggul Prestasi</title>
    
    <!-- Favicon - Logo SMAN 1 Batang Gasan -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/logo.png">
    <link rel="apple-touch-icon" href="/logo.png">
    <link rel="shortcut icon" href="/logo.png">
    
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
                        'gentle-pulse': 'gentlePulse 2s ease-in-out infinite',
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
                        gentlePulse: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.02)' },
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
        
        /* Efek hover lift */
        .hover-lift {
            transition: transform 0.25s cubic-bezier(0.2, 0.9, 0.4, 1.1), box-shadow 0.25s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.12);
        }
        
        /* Efek klik timbul/scale */
        .click-effect {
            transition: transform 0.08s linear;
        }
        .click-effect:active {
            transform: scale(0.96);
        }
        
        /* Section badge */
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
        
        /* Section title dengan garis bawah */
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
        
        /* Efek untuk tombol dan link */
        a, button {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Navbar link styling */
        .nav-link-custom {
            transition: all 0.2s ease;
            position: relative;
        }
        .nav-link-custom:hover {
            color: #F59E0B;
        }
        .nav-link-custom.active {
            color: #F59E0B;
            border-bottom-color: #F59E0B;
        }
        
        /* Button dengan efek 3D */
        .btn-3d {
            transition: all 0.15s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn-3d:active {
            transform: translateY(2px);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        /* Scrollbar halus */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #9CA3AF;
            border-radius: 10px;
        }
        
        /* Responsive container */
        @media (max-width: 640px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
</head>
<body class="bg-neutral font-sans antialiased">

    <!-- Top Bar -->
    <div class="bg-primary text-white text-xs md:text-sm py-3 px-4 border-b border-white/10 shadow-sm">
        <div class="container mx-auto flex flex-wrap justify-between items-center gap-3">
            <div class="flex flex-wrap items-center gap-4 md:gap-6">
                <a href="tel:+6281234567890" class="flex items-center gap-2 hover:text-accent transition-all duration-300 click-effect">
                    <i class="fa-solid fa-phone-flip w-4 text-accent"></i>
                    <span>+62 812 3456 7890</span>
                </a>
                <a href="mailto:ppdb@sman1batanggasan.sch.id" class="flex items-center gap-2 hover:text-accent transition-all duration-300 click-effect">
                    <i class="fa-regular fa-envelope w-4 text-accent"></i>
                    <span>ppdb@sman1batanggasan.sch.id</span>
                </a>
                <span class="flex items-center gap-2 hidden sm:flex">
                    <i class="fa-regular fa-clock w-4 text-accent"></i>
                    <span>Senin - Jumat, 07.30 - 16.00</span>
                </span>
            </div>
            <div class="flex gap-4 text-sm">
                <a href="https://www.instagram.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110 click-effect" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110 click-effect" aria-label="TikTok">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
                <a href="https://www.youtube.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110 click-effect" aria-label="YouTube">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="https://www.facebook.com/" target="_blank" class="hover:text-accent transition-all hover:scale-110 click-effect" aria-label="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-accent transition-all hover:scale-110 click-effect" aria-label="WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-sm sticky top-0 z-30 shadow-md border-b border-gray-100">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between flex-wrap">
            <!-- Logo dan Nama Sekolah -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-90 transition-opacity click-effect">
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
                <a href="{{ url('/') }}" class="px-3 py-2 text-dark font-semibold text-sm hover:text-primary transition border-b-2 border-transparent hover:border-accent nav-link-custom">Beranda</a>
                <a href="{{ url('/profil') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition nav-link-custom">Profil</a>
                <a href="{{ url('/akademik') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition nav-link-custom">Akademik</a>
                <a href="{{ url('/kesiswaan') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition nav-link-custom">Kesiswaan</a>
                <a href="{{ url('/ppdb') }}" class="px-3 py-2 text-accent font-bold text-sm border-b-2 border-accent bg-amber-50/30 rounded-t-lg nav-link-custom">PPDB 2026</a>
                <a href="{{ url('/berita') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition nav-link-custom">Berita</a>
                <a href="{{ url('/kontak') }}" class="px-3 py-2 text-gray-600 text-sm hover:text-primary transition nav-link-custom">Kontak</a>
                
                @auth
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2 btn-3d">
                            <i class="fa-regular fa-user"></i> Dashboard
                        </a>
                    @elseif(Auth::user()->role == 'siswa')
                        <a href="{{ route('siswa.dashboard') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2 btn-3d">
                            <i class="fa-regular fa-user"></i> Dashboard
                        </a>
                    @elseif(Auth::user()->role == 'kepala')
                        <a href="{{ route('kepala.dashboard') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2 btn-3d">
                            <i class="fa-regular fa-user"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2 btn-3d">
                            <i class="fa-regular fa-user"></i> Login
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="ml-3 px-4 py-1.5 bg-primary text-white text-sm rounded-full shadow-md hover:bg-secondary transition-all flex items-center gap-2 btn-3d">
                        <i class="fa-regular fa-user"></i> Login
                    </a>
                @endauth
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="md:hidden text-primary text-2xl focus:outline-none click-effect" id="menu-toggle" aria-label="Menu">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
        </div>
        
        <!-- Mobile Menu Drawer -->
        <div class="md:hidden hidden bg-white border-t border-gray-100 shadow-inner" id="mobile-menu">
            <div class="container mx-auto px-4 py-4 flex flex-col gap-2">
                <a href="{{ url('/') }}" class="py-3 px-3 font-semibold text-gray-700 hover:bg-gray-50 rounded-xl click-effect">Beranda</a>
                <a href="{{ url('/profil') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl click-effect">Profil</a>
                <a href="{{ url('/akademik') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl click-effect">Akademik</a>
                <a href="{{ url('/kesiswaan') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl click-effect">Kesiswaan</a>
                <a href="{{ url('/ppdb') }}" class="py-3 px-3 text-accent font-bold bg-amber-50 rounded-xl click-effect">PPDB 2026</a>
                <a href="{{ url('/berita') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl click-effect">Berita</a>
                <a href="{{ url('/kontak') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl click-effect">Kontak</a>
                <a href="{{ url('/galeri') }}" class="py-3 px-3 text-gray-600 hover:bg-gray-50 rounded-xl click-effect">Galeri</a>
                
                @auth
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2 click-effect">
                            <i class="fa-regular fa-user"></i> Dashboard Admin
                        </a>
                    @elseif(Auth::user()->role == 'siswa')
                        <a href="{{ route('siswa.dashboard') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2 click-effect">
                            <i class="fa-regular fa-user"></i> Dashboard Siswa
                        </a>
                    @elseif(Auth::user()->role == 'kepala')
                        <a href="{{ route('kepala.dashboard') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2 click-effect">
                            <i class="fa-regular fa-user"></i> Dashboard Kepala
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2 click-effect">
                            <i class="fa-regular fa-user"></i> Login
                        </a>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full py-3 px-3 text-white bg-red-500 text-center rounded-xl flex items-center justify-center gap-2 hover:bg-red-600 transition click-effect">
                            <i class="fa-solid fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="py-3 px-3 text-white bg-primary text-center rounded-full mt-2 flex items-center justify-center gap-2 click-effect">
                        <i class="fa-regular fa-user"></i> Login PPDB
                    </a>
                    <a href="{{ route('register') }}" class="py-3 px-3 text-primary bg-amber-50 text-center rounded-xl mt-2 flex items-center justify-center gap-2 border border-accent click-effect">
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
            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
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
                if (href && href !== '#' && href !== '#!' && href !== '#0') {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });
        
        // Efek klik untuk semua tombol dan link
        document.querySelectorAll('a, button').forEach(el => {
            el.classList.add('click-effect');
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
                        <a href="/login" class="bg-accent text-gray-900 font-bold px-6 py-3 rounded-xl shadow-lg hover:bg-amber-400 transition-all duration-300 flex items-center gap-2 btn-3d"><i class="fa-regular fa-pen-to-square"></i> Daftar Sekarang</a>
                        <a href="#" class="bg-white/10 backdrop-blur-sm border border-white/30 px-6 py-3 rounded-xl hover:bg-white/20 transition-all duration-300 flex items-center gap-2 btn-3d"><i class="fa-regular fa-circle-question"></i> Info Jalur</a>
                    </div>
                    <div class="mt-7 flex flex-wrap gap-5 justify-center md:justify-start text-sm">
                        <div class="flex items-center gap-1"><i class="fa-solid fa-check-circle text-accent"></i> 4 Jalur Pendaftaran</div>
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

        <!-- Quick Info Cards -->
        <div class="container mx-auto px-4 -mt-12 md:-mt-16 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                <div class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 hover-lift transition-all duration-300 border border-gray-100 click-effect">
                    <div class="bg-primary/10 rounded-2xl p-3 text-primary min-w-[52px] text-center"><i class="fa-solid fa-chalkboard-user text-2xl"></i></div>
                    <div><h3 class="font-bold text-primary text-base">Kurikulum Merdeka</h3><p class="text-gray-500 text-xs">Pembelajaran berbasis projek & digital</p></div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 hover-lift transition-all duration-300 border border-gray-100 click-effect">
                    <div class="bg-primary/10 rounded-2xl p-3 text-primary min-w-[52px] text-center"><i class="fa-solid fa-medal text-2xl"></i></div>
                    <div><h3 class="font-bold text-primary text-base">60+ Prestasi</h3><p class="text-gray-500 text-xs">Akademik & non-akademik 2024-2026</p></div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-5 flex items-center gap-4 hover-lift transition-all duration-300 border border-gray-100 click-effect">
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

</body>
</html>

    <!-- Berita & Prestasi - Carousel Slider Modern -->
<section class="py-16 bg-neutral">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-3">
            <div>
                <span class="section-badge flex items-center gap-1 w-fit"><i class="fa-regular fa-newspaper"></i> Update</span>
                <h2 class="section-title text-3xl font-bold text-primary">Berita & Prestasi</h2>
                <p class="text-gray-500 mt-2">Informasi terkini seputar kegiatan sekolah</p>
            </div>
            <div class="flex items-center gap-2">
                <button id="prevBerita" class="w-8 h-8 rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>
                <button id="nextBerita" class="w-8 h-8 rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>
                <a href="#" class="text-primary font-medium hover:underline inline-flex items-center gap-2 transition ml-2">Semua Berita <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        
        <!-- Slider Container -->
        <div class="relative overflow-hidden">
            <div id="beritaSlider" class="flex transition-transform duration-500 ease-out gap-6">
                <!-- Berita 1 -->
                <div class="berita-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100 cursor-pointer" onclick="openBeritaModal(1)">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600&auto=format" alt="Olimpiade Sains" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <div class="absolute top-3 left-3 bg-accent/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <i class="fa-regular fa-star mr-1"></i> Prestasi
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center text-gray-400 text-xs mb-3 gap-2">
                            <i class="fa-regular fa-calendar-alt"></i> <span>12 Maret 2026</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span><i class="fa-regular fa-eye"></i> 2.5k views</span>
                        </div>
                        <h3 class="font-bold text-xl text-primary mb-2 line-clamp-2">Juara Umum Olimpiade Sains Tingkat Provinsi</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">Siswa SMAN 1 Batang Gasan raih 5 medali emas di ajang OSN tingkat Provinsi Sumatera Barat.</p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all" onclick="event.stopPropagation(); openBeritaModal(1)">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-heart"></i> 128</span>
                        </div>
                    </div>
                </div>
                
                <!-- Berita 2 -->
                <div class="berita-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100 cursor-pointer" onclick="openBeritaModal(2)">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=600&auto=format" alt="Hardiknas" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <div class="absolute top-3 left-3 bg-blue-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <i class="fa-regular fa-flag mr-1"></i> Nasional
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center text-gray-400 text-xs mb-3 gap-2">
                            <i class="fa-regular fa-calendar-alt"></i> <span>5 Maret 2026</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span><i class="fa-regular fa-eye"></i> 1.8k views</span>
                        </div>
                        <h3 class="font-bold text-xl text-primary mb-2 line-clamp-2">Peringatan Hardiknas 2026 di SMAN 1 Batang Gasan</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">Upacara bendera dan gelar karya P5 menjadi puncak peringatan Hari Pendidikan Nasional.</p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all" onclick="event.stopPropagation(); openBeritaModal(2)">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-heart"></i> 95</span>
                        </div>
                    </div>
                </div>
                
                <!-- Berita 3 -->
                <div class="berita-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100 cursor-pointer" onclick="openBeritaModal(3)">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&auto=format" alt="Kunjungan Dinas" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <div class="absolute top-3 left-3 bg-green-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <i class="fa-regular fa-building mr-1"></i> Kunjungan
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center text-gray-400 text-xs mb-3 gap-2">
                            <i class="fa-regular fa-calendar-alt"></i> <span>20 Februari 2026</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span><i class="fa-regular fa-eye"></i> 1.2k views</span>
                        </div>
                        <h3 class="font-bold text-xl text-primary mb-2 line-clamp-2">Kunjungan Dinas Pendidikan Provinsi</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">Monitoring PPDB 2026 dan implementasi digitalisasi sekolah berjalan sukses.</p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all" onclick="event.stopPropagation(); openBeritaModal(3)">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-heart"></i> 67</span>
                        </div>
                    </div>
                </div>
                
                <!-- Berita 4 - Ekstra -->
                <div class="berita-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100 cursor-pointer" onclick="openBeritaModal(4)">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?w=600&auto=format" alt="Pramuka" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <div class="absolute top-3 left-3 bg-purple-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <i class="fa-regular fa-flag mr-1"></i> Ekstrakurikuler
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center text-gray-400 text-xs mb-3 gap-2">
                            <i class="fa-regular fa-calendar-alt"></i> <span>15 Februari 2026</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span><i class="fa-regular fa-eye"></i> 980 views</span>
                        </div>
                        <h3 class="font-bold text-xl text-primary mb-2 line-clamp-2">Pramuka SMAN 1 Batang Gasan Raih Juara Umum</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">Kontingen pramuka berhasil meraih 3 piala dalam lomba tingkat kabupaten.</p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all" onclick="event.stopPropagation(); openBeritaModal(4)">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-heart"></i> 52</span>
                        </div>
                    </div>
                </div>
                
                <!-- Berita 5 - Ekstra -->
                <div class="berita-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100 cursor-pointer" onclick="openBeritaModal(5)">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&auto=format" alt="Festival Seni" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <div class="absolute top-3 left-3 bg-pink-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <i class="fa-regular fa-music mr-1"></i> Seni & Budaya
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center text-gray-400 text-xs mb-3 gap-2">
                            <i class="fa-regular fa-calendar-alt"></i> <span>8 Februari 2026</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span><i class="fa-regular fa-eye"></i> 1.5k views</span>
                        </div>
                        <h3 class="font-bold text-xl text-primary mb-2 line-clamp-2">Festival Seni & Budaya 2026 Sukses Digelar</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">Berbagai pertunjukan seni ditampilkan oleh siswa dalam ajang tahunan sekolah.</p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all" onclick="event.stopPropagation(); openBeritaModal(5)">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-heart"></i> 203</span>
                        </div>
                    </div>
                </div>
                
                <!-- Berita 6 - Ekstra -->
                <div class="berita-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-2xl overflow-hidden shadow-md hover-lift transition-all duration-300 border border-gray-100 cursor-pointer" onclick="openBeritaModal(6)">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=600&auto=format" alt="Workshop" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <div class="absolute top-3 left-3 bg-indigo-500/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            <i class="fa-regular fa-laptop mr-1"></i> Workshop
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center text-gray-400 text-xs mb-3 gap-2">
                            <i class="fa-regular fa-calendar-alt"></i> <span>1 Februari 2026</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span><i class="fa-regular fa-eye"></i> 780 views</span>
                        </div>
                        <h3 class="font-bold text-xl text-primary mb-2 line-clamp-2">Workshop Digital Marketing untuk Siswa</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">Siswa diberikan pelatihan tentang pemasaran digital dan kewirausahaan.</p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="text-accent font-semibold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all" onclick="event.stopPropagation(); openBeritaModal(6)">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-heart"></i> 44</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Indicator Dots -->
        <div class="flex justify-center gap-2 mt-8" id="beritaIndicators"></div>
    </div>
</section>

<!-- Modal Popup untuk Detail Berita -->
<div id="beritaModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm transition-all duration-300" onclick="closeBeritaModal()">
    <div class="bg-white rounded-2xl max-w-2xl w-[90%] max-h-[85vh] overflow-y-auto animate-scale-in shadow-2xl" onclick="event.stopPropagation()">
        <div class="sticky top-0 bg-gradient-to-r from-primary to-secondary px-6 py-4 flex justify-between items-center rounded-t-2xl">
            <h3 id="modalTitle" class="text-white font-bold text-lg">Detail Berita</h3>
            <button onclick="closeBeritaModal()" class="text-white/80 hover:text-white transition text-2xl click-effect">&times;</button>
        </div>
        <div id="modalContent" class="p-6">
            <!-- Konten dinamis akan diisi oleh JavaScript -->
        </div>
    </div>
</div>

<style>
    /* Line clamp untuk truncate text */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Animasi untuk modal */
    .animate-scale-in {
        animation: scaleInModal 0.3s ease-out;
    }
    
    @keyframes scaleInModal {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Efek klik untuk modal close */
    .click-effect {
        transition: transform 0.08s linear;
        cursor: pointer;
    }
    .click-effect:active {
        transform: scale(0.96);
    }
    
    /* Responsif slider */
    @media (max-width: 640px) {
        .berita-card {
            width: 100%;
        }
    }
    @media (min-width: 641px) and (max-width: 1024px) {
        .berita-card {
            width: calc(50% - 12px);
        }
    }
    @media (min-width: 1025px) {
        .berita-card {
            width: calc(33.333% - 16px);
        }
    }
</style>

<script>
    // Data Berita lengkap
    const beritaData = {
        1: {
            title: "Juara Umum Olimpiade Sains Tingkat Provinsi",
            date: "12 Maret 2026",
            category: "Prestasi",
            categoryClass: "bg-accent",
            image: "https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&auto=format",
            content: "<p>SMAN 1 Batang Gasan kembali menorehkan prestasi membanggakan di ajang Olimpiade Sains Nasional (OSN) tingkat Provinsi Sumatera Barat yang diselenggarakan di Padang pada tanggal 10-12 Maret 2026. Tim delegasi sekolah berhasil memboyong 5 medali emas, 3 perak, dan 2 perunggu.</p><br><p>Para pemenang terdiri dari:</p><ul class='list-disc pl-5 mt-2'><li>Muhammad Rizki - Emas (Fisika)</li><li>Anisa Putri - Emas (Biologi)</li><li>Fajar Ramadhan - Emas (Matematika)</li><li>Citra Lestari - Emas (Kimia)</li><li>Budi Santoso - Emas (Astronomi)</li></ul><br><p>Kepala SMAN 1 Batang Gasan, Drs. Ahmad Fauzi, M.Pd., menyampaikan apresiasi yang tinggi kepada para siswa dan pembimbing. 'Prestasi ini adalah bukti bahwa SMAN 1 Batang Gasan memiliki kualitas pendidikan yang mampu bersaing di tingkat provinsi,' ujarnya.</p><br><p>Selamat kepada para pemenang! Semoga prestasi ini dapat memotivasi siswa lainnya untuk terus berprestasi.</p>",
            views: 2500,
            likes: 128
        },
        2: {
            title: "Peringatan Hardiknas 2026 di SMAN 1 Batang Gasan",
            date: "5 Maret 2026",
            category: "Nasional",
            categoryClass: "bg-blue-500",
            image: "https://images.unsplash.com/photo-1562774053-701939374585?w=800&auto=format",
            content: "<p>Dalam rangka memperingati Hari Pendidikan Nasional (Hardiknas) tahun 2026, SMAN 1 Batang Gasan menggelar upacara bendera yang diikuti oleh seluruh siswa, guru, dan staf. Upacara berlangsung khidmat di lapangan utama sekolah.</p><br><p>Setelah upacara, digelar berbagai kegiatan menarik seperti gelar karya Projek Penguatan Profil Pelajar Pancasila (P5) yang menampilkan hasil karya siswa selama satu semester. Berbagai inovasi dan kreasi dipamerkan, mulai dari produk daur ulang, karya seni, hingga teknologi sederhana.</p><br><p>Kepala sekolah dalam sambutannya menekankan pentingnya transformasi pendidikan di era digital. 'Pendidikan harus terus beradaptasi dengan perkembangan zaman tanpa meninggalkan nilai-nilai luhur bangsa,' tegasnya.</p><br><p>Kegiatan ditutup dengan pentas seni budaya yang menampilkan bakat-bakat siswa di bidang musik, tari, dan teater.</p>",
            views: 1800,
            likes: 95
        },
        3: {
            title: "Kunjungan Dinas Pendidikan Provinsi ke SMAN 1 Batang Gasan",
            date: "20 Februari 2026",
            category: "Kunjungan",
            categoryClass: "bg-green-500",
            image: "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&auto=format",
            content: "<p>Dinas Pendidikan Provinsi Sumatera Barat melakukan kunjungan kerja ke SMAN 1 Batang Gasan pada tanggal 20 Februari 2026. Kunjungan ini bertujuan untuk memantau kesiapan pelaksanaan PPDB 2026 serta implementasi digitalisasi di lingkungan sekolah.</p><br><p>Rombongan yang dipimpin oleh Kepala Dinas Pendidikan Provinsi disambut hangat oleh jajaran pimpinan sekolah. Dalam pertemuan tersebut, dibahas berbagai aspek persiapan PPDB, termasuk sistem pendaftaran online, verifikasi dokumen, hingga proses seleksi.</p><br><p>Tim dinas juga meninjau langsung fasilitas laboratorium komputer, perpustakaan digital, dan infrastruktur pendukung lainnya. 'SMAN 1 Batang Gasan patut menjadi contoh sekolah dalam penerapan teknologi informasi,' ujar Kepala Dinas.</p><br><p>Kunjungan ditutup dengan penandatanganan komitmen bersama untuk menyukseskan PPDB 2026 yang transparan dan akuntabel.</p>",
            views: 1200,
            likes: 67
        },
        4: {
            title: "Pramuka SMAN 1 Batang Gasan Raih Juara Umum",
            date: "15 Februari 2026",
            category: "Ekstrakurikuler",
            categoryClass: "bg-purple-500",
            image: "https://images.unsplash.com/photo-1546519638-68e109498ffc?w=800&auto=format",
            content: "<p>Prestasi membanggakan kembali diraih oleh kontingen Pramuka SMAN 1 Batang Gasan dalam Lomba Tingkat (LT) III yang diselenggarakan di Bumi Perkemahan Cempaka. Tim berhasil meraih 3 piala sekaligus dinobatkan sebagai juara umum.</p><br><p>Kategori yang dimenangkan antara lain: yel-yel terbaik, pionering, dan lomba ketangkasan baris-berbaris. Prestasi ini merupakan hasil dari latihan intensif yang dilakukan selama dua bulan sebelum perlombaan.</p><br><p>'Kami bangga dengan perjuangan adik-adik. Ini membuktikan bahwa siswa SMAN 1 Batang Gasan tidak hanya unggul di bidang akademik tetapi juga non-akademik,' ungkap Pembina Pramuka.</p><br><p>Para pemenang akan mewakili Kabupaten Padang Pariaman di tingkat provinsi yang akan digelar pada bulan Mei mendatang.</p>",
            views: 980,
            likes: 52
        },
        5: {
            title: "Festival Seni & Budaya 2026 Sukses Digelar",
            date: "8 Februari 2026",
            category: "Seni & Budaya",
            categoryClass: "bg-pink-500",
            image: "https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=800&auto=format",
            content: "<p>Ribuan pengunjung memadati halaman SMAN 1 Batang Gasan saat pelaksanaan Festival Seni & Budaya tahun 2026. Acara tahunan ini menampilkan berbagai pertunjukan seni dari siswa, seperti tari tradisional, musik modern, teater, hingga pameran lukisan.</p><br><p>Festival dibuka dengan pawai budaya yang diikuti oleh seluruh perwakilan kelas dengan kostum daerah masing-masing. Suasana semakin meriah dengan digelarnya bazaar kuliner dan kerajinan tangan yang dikelola oleh siswa.</p><br><p>'Acara ini menjadi wadah bagi siswa untuk mengekspresikan kreativitas dan bakat seni mereka. Selain itu, juga sebagai upaya pelestarian budaya lokal,' ujar Ketua Panitia Festival.</p><br><p>Festival berlangsung selama dua hari dan ditutup dengan konser musik yang menampilkan band-band siswa.</p>",
            views: 1500,
            likes: 203
        },
        6: {
            title: "Workshop Digital Marketing untuk Siswa",
            date: "1 Februari 2026",
            category: "Workshop",
            categoryClass: "bg-indigo-500",
            image: "https://images.unsplash.com/photo-1577896851231-70ef18881754?w=800&auto=format",
            content: "<p>SMAN 1 Batang Gasan bekerja sama dengan Komunitas Digital Padang menggelar workshop digital marketing bagi siswa kelas XI dan XII. Kegiatan ini bertujuan membekali siswa dengan keterampilan di bidang pemasaran digital yang sangat dibutuhkan di era modern.</p><br><p>Materi yang disampaikan meliputi: optimasi media sosial, pembuatan konten kreatif, dasar-dasar SEO, hingga strategi e-commerce. Para peserta juga diajak praktik langsung membuat konten promosi.</p><br><p>'Keterampilan digital sangat penting untuk bekal masa depan, baik untuk melanjutkan studi maupun berwirausaha,' jelas pemateri dari Komunitas Digital Padang.</p><br><p>Workshop ini diikuti oleh 100 siswa yang dipilih berdasarkan minat dan bakat di bidang teknologi informasi.</p>",
            views: 780,
            likes: 44
        }
    };
    
    // Slider variables
    let currentIndex = 0;
    const slider = document.getElementById('beritaSlider');
    const prevBtn = document.getElementById('prevBerita');
    const nextBtn = document.getElementById('nextBerita');
    const indicatorsContainer = document.getElementById('beritaIndicators');
    const totalCards = document.querySelectorAll('.berita-card').length;
    let cardsPerView = 3;
    let autoSlideInterval;
    
    // Update cards per view based on screen width
    function updateCardsPerView() {
        const width = window.innerWidth;
        if (width >= 1025) {
            cardsPerView = 3;
        } else if (width >= 641) {
            cardsPerView = 2;
        } else {
            cardsPerView = 1;
        }
        updateSlider();
        createIndicators();
    }
    
    // Update slider position
    function updateSlider() {
        const cardWidth = document.querySelector('.berita-card')?.offsetWidth || 0;
        const gap = 24; // gap-6 = 24px
        const slideDistance = (cardWidth + gap) * cardsPerView;
        slider.style.transform = `translateX(-${currentIndex * slideDistance}px)`;
    }
    
    // Create indicator dots
    function createIndicators() {
        const totalSlides = Math.ceil(totalCards / cardsPerView);
        indicatorsContainer.innerHTML = '';
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = `w-2 h-2 rounded-full transition-all duration-300 ${i === currentIndex ? 'bg-accent w-6' : 'bg-gray-300 hover:bg-gray-400'}`;
            dot.onclick = () => goToSlide(i);
            indicatorsContainer.appendChild(dot);
        }
    }
    
    // Go to specific slide
    function goToSlide(index) {
        const totalSlides = Math.ceil(totalCards / cardsPerView);
        if (index < 0) index = 0;
        if (index >= totalSlides) index = totalSlides - 1;
        currentIndex = index;
        updateSlider();
        updateIndicators();
        resetAutoSlide();
    }
    
    // Update indicator dots
    function updateIndicators() {
        const dots = indicatorsContainer.querySelectorAll('button');
        dots.forEach((dot, i) => {
            if (i === currentIndex) {
                dot.className = 'w-6 h-2 rounded-full bg-accent transition-all duration-300';
            } else {
                dot.className = 'w-2 h-2 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300';
            }
        });
    }
    
    // Next slide
    function nextSlide() {
        const totalSlides = Math.ceil(totalCards / cardsPerView);
        if (currentIndex + 1 < totalSlides) {
            goToSlide(currentIndex + 1);
        } else {
            goToSlide(0);
        }
    }
    
    // Previous slide
    function prevSlide() {
        if (currentIndex - 1 >= 0) {
            goToSlide(currentIndex - 1);
        } else {
            const totalSlides = Math.ceil(totalCards / cardsPerView);
            goToSlide(totalSlides - 1);
        }
    }
    
    // Auto slide
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 5000);
    }
    
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }
    
    // Event listeners
    if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetAutoSlide(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetAutoSlide(); });
    
    // Handle window resize
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            updateCardsPerView();
        }, 200);
    });
    
    // Initialize slider
    setTimeout(() => {
        updateCardsPerView();
        startAutoSlide();
    }, 100);
    
    // Modal functions
    function openBeritaModal(id) {
        const berita = beritaData[id];
        if (!berita) return;
        
        document.getElementById('modalTitle').innerHTML = berita.title;
        document.getElementById('modalContent').innerHTML = `
            <div class="mb-4">
                <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                    <span class="flex items-center gap-1"><i class="fa-regular fa-calendar-alt"></i> ${berita.date}</span>
                    <span class="flex items-center gap-1"><i class="fa-regular fa-eye"></i> ${berita.views.toLocaleString()} views</span>
                    <span class="flex items-center gap-1"><i class="fa-regular fa-heart"></i> ${berita.likes}</span>
                </div>
                <img src="${berita.image}" alt="${berita.title}" class="w-full h-64 object-cover rounded-xl mb-4">
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    ${berita.content}
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between items-center">
                <div class="flex gap-3">
                    <button onclick="shareBerita(${id})" class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition"><i class="fa-regular fa-share-from-square"></i> Bagikan</button>
                    <button onclick="likeBerita(${id})" class="flex items-center gap-2 px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition"><i class="fa-regular fa-heart"></i> Suka</button>
                </div>
                <a href="#" class="text-accent hover:underline">Baca berita lainnya →</a>
            </div>
        `;
        
        document.getElementById('beritaModal').classList.remove('hidden');
        document.getElementById('beritaModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeBeritaModal() {
        document.getElementById('beritaModal').classList.add('hidden');
        document.getElementById('beritaModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    
    function shareBerita(id) {
        const berita = beritaData[id];
        if (navigator.share) {
            navigator.share({
                title: berita.title,
                text: 'Baca berita menarik dari SMAN 1 Batang Gasan',
                url: window.location.href
            }).catch(() => {});
        } else {
            alert('Bagikan berita: ' + berita.title);
        }
    }
    
    function likeBerita(id) {
        alert('Terima kasih telah menyukai berita ini!');
    }
    
    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeBeritaModal();
        }
    });
</script>

    <!-- Agenda Kegiatan - Carousel Slider Modern -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center flex-wrap gap-4 mb-10">
            <div>
                <span class="section-badge flex items-center gap-1 w-fit"><i class="fa-regular fa-calendar"></i> Event</span>
                <h2 class="section-title text-3xl font-bold text-primary">Agenda Sekolah</h2>
                <p class="text-gray-500 mt-1">Kegiatan dan acara mendatang di SMAN 1 Batang Gasan</p>
            </div>
            <div class="flex items-center gap-2">
                <button id="prevAgenda" class="w-8 h-8 rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>
                <button id="nextAgenda" class="w-8 h-8 rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>
                <a href="#" class="text-primary border border-primary/30 px-5 py-2 rounded-full text-sm hover:bg-primary hover:text-white transition-all duration-300 inline-flex items-center gap-2 ml-2">Lihat Semua <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        
        <!-- Slider Container -->
        <div class="relative overflow-hidden">
            <div id="agendaSlider" class="flex transition-transform duration-500 ease-out gap-5">
                <!-- Agenda 1 - Ujian Sekolah -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(1)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-accent text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-clock mr-1"></i> Penting
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">20</span>
                                <span class="text-sm ml-1">April 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">Ujian Sekolah Kelas XII</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>08:00 - 12:00 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot w-4 text-accent"></i> <span>Ruang Kelas</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Peserta: 180 Siswa</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-bell"></i> 5 hari lagi</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
                
                <!-- Agenda 2 - Rapat Orang Tua -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(2)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-handshake mr-1"></i> Pertemuan
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">25</span>
                                <span class="text-sm ml-1">April 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">Rapat Orang Tua Siswa</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>09:00 - 11:00 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot w-4 text-accent"></i> <span>Aula Sekolah</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Peserta: 200 Orang Tua</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-bell"></i> 10 hari lagi</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
                
                <!-- Agenda 3 - Hari Buruh -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(3)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-flag mr-1"></i> Nasional
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">1</span>
                                <span class="text-sm ml-1">Mei 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">Peringatan Hari Buruh</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>08:00 - 10:00 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot w-4 text-accent"></i> <span>Lapangan Sekolah</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Peserta: Seluruh Siswa</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-bell"></i> 16 hari lagi</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
                
                <!-- Agenda 4 - Lomba Kebersihan -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(4)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-purple-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-trophy mr-1"></i> Lomba
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">10</span>
                                <span class="text-sm ml-1">Mei 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">Lomba Kebersihan Kelas</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>08:00 - 14:00 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot w-4 text-accent"></i> <span>Semua Ruang Kelas</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Peserta: Seluruh Kelas</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-bell"></i> 25 hari lagi</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
                
                <!-- Agenda 5 - PPDB Online -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(5)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-accent text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-calendar-check mr-1"></i> Pendaftaran
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">10</span>
                                <span class="text-sm ml-1">Jan 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">PPDB Online Gelombang 1</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>00:01 - 23:59 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-globe w-4 text-accent"></i> <span>Online</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Kuota: 198 Siswa</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-calendar"></i> Sudah berlangsung</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
                
                <!-- Agenda 6 - Pengumuman Hasil PPDB -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(6)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-bell mr-1"></i> Pengumuman
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">20</span>
                                <span class="text-sm ml-1">Maret 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">Pengumuman Hasil PPDB</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>10:00 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-globe w-4 text-accent"></i> <span>Online & Website</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Peserta: Seluruh Pendaftar</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-calendar"></i> 20 Maret 2026</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
                
                <!-- Agenda 7 - Daftar Ulang -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(7)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-hand-peace mr-1"></i> Pendaftaran
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">21-25</span>
                                <span class="text-sm ml-1">Maret 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">Daftar Ulang Siswa Diterima</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>08:00 - 15:00 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot w-4 text-accent"></i> <span>Kantor TU</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Siswa Diterima</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-calendar"></i> 21-25 Maret 2026</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
                
                <!-- Agenda 8 - Class Meeting -->
                <div class="agenda-card flex-shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(25%-15px)] bg-neutral rounded-xl border border-gray-100 hover:shadow-lg transition-all duration-300 cursor-pointer group" onclick="openAgendaModal(8)">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <div class="absolute top-3 left-3 z-10 bg-purple-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            <i class="fa-regular fa-futbol mr-1"></i> Olahraga
                        </div>
                        <div class="bg-gradient-to-r from-primary to-secondary p-4 text-white">
                            <div class="text-center">
                                <span class="text-4xl font-bold">15-20</span>
                                <span class="text-sm ml-1">Juni 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-primary text-lg mb-2 group-hover:text-accent transition">Class Meeting & Pentas Seni</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2"><i class="fa-regular fa-clock w-4 text-accent"></i> <span>07:30 - 14:00 WIB</span></div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot w-4 text-accent"></i> <span>Lapangan & Aula</span></div>
                            <div class="flex items-center gap-2"><i class="fa-regular fa-user w-4 text-accent"></i> <span>Seluruh Siswa</span></div>
                        </div>
                        <div class="mt-3 pt-2 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-xs text-gray-400"><i class="fa-regular fa-bell"></i> 15-20 Juni 2026</span>
                            <span class="text-accent text-sm font-semibold group-hover:translate-x-1 transition">Detail →</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Indicator Dots -->
        <div class="flex justify-center gap-2 mt-8" id="agendaIndicators"></div>
    </div>
</section>

<!-- Modal Popup untuk Detail Agenda -->
<div id="agendaModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm transition-all duration-300" onclick="closeAgendaModal()">
    <div class="bg-white rounded-2xl max-w-2xl w-[90%] max-h-[85vh] overflow-y-auto animate-scale-in shadow-2xl" onclick="event.stopPropagation()">
        <div class="sticky top-0 bg-gradient-to-r from-primary to-secondary px-6 py-4 flex justify-between items-center rounded-t-2xl">
            <h3 id="agendaModalTitle" class="text-white font-bold text-lg">Detail Agenda</h3>
            <button onclick="closeAgendaModal()" class="text-white/80 hover:text-white transition text-2xl click-effect">&times;</button>
        </div>
        <div id="agendaModalContent" class="p-6">
            <!-- Konten dinamis akan diisi oleh JavaScript -->
        </div>
    </div>
</div>

<style>
    /* Animasi untuk modal */
    .animate-scale-in {
        animation: scaleInModal 0.3s ease-out;
    }
    
    @keyframes scaleInModal {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Efek klik */
    .click-effect {
        transition: transform 0.08s linear;
        cursor: pointer;
    }
    .click-effect:active {
        transform: scale(0.96);
    }
    
    /* Line clamp */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Responsif slider */
    @media (max-width: 640px) {
        .agenda-card {
            width: 100%;
        }
    }
    @media (min-width: 641px) and (max-width: 1024px) {
        .agenda-card {
            width: calc(50% - 10px);
        }
    }
    @media (min-width: 1025px) {
        .agenda-card {
            width: calc(25% - 15px);
        }
    }
</style>

<script>
    // Data Agenda lengkap
    const agendaData = {
        1: {
            title: "Ujian Sekolah Kelas XII",
            date: "20 April 2026",
            time: "08:00 - 12:00 WIB",
            location: "Ruang Kelas",
            category: "Penting",
            categoryClass: "bg-accent",
            icon: "fa-regular fa-file-lines",
            description: "Ujian sekolah untuk siswa kelas XII merupakan salah satu syarat kelulusan. Seluruh siswa diwajibkan mengikuti ujian sesuai jadwal yang telah ditentukan.",
            schedule: [
                "08:00 - 09:30: Mata Pelajaran Matematika",
                "09:30 - 10:00: Istirahat",
                "10:00 - 11:30: Mata Pelajaran Bahasa Indonesia",
                "11:30 - 12:00: Penutupan"
            ],
            notes: "Siswa wajib membawa kartu ujian dan alat tulis lengkap. Dilarang membawa HP atau alat komunikasi lainnya."
        },
        2: {
            title: "Rapat Orang Tua Siswa",
            date: "25 April 2026",
            time: "09:00 - 11:00 WIB",
            location: "Aula Sekolah",
            category: "Pertemuan",
            categoryClass: "bg-green-500",
            icon: "fa-regular fa-handshake",
            description: "Rapat orang tua siswa dalam rangka membahas perkembangan belajar siswa dan persiapan ujian akhir semester.",
            schedule: [
                "09:00 - 09:30: Sambutan Kepala Sekolah",
                "09:30 - 10:30: Pembahasan Akademik",
                "10:30 - 11:00: Diskusi dan Tanya Jawab"
            ],
            notes: "Setiap orang tua/wali diharapkan hadir tepat waktu. Konsumsi disediakan."
        },
        3: {
            title: "Peringatan Hari Buruh",
            date: "1 Mei 2026",
            time: "08:00 - 10:00 WIB",
            location: "Lapangan Sekolah",
            category: "Nasional",
            categoryClass: "bg-blue-500",
            icon: "fa-regular fa-flag",
            description: "Peringatan Hari Buruh Internasional yang diisi dengan upacara bendera dan apel bersama seluruh siswa dan guru.",
            schedule: [
                "08:00 - 08:30: Upacara Bendera",
                "08:30 - 09:00: Sambutan Kepala Sekolah",
                "09:00 - 10:00: Apel dan Pembubaran"
            ],
            notes: "Seluruh siswa diwajibkan mengenakan seragam putih lengkap."
        },
        4: {
            title: "Lomba Kebersihan Kelas",
            date: "10 Mei 2026",
            time: "08:00 - 14:00 WIB",
            location: "Semua Ruang Kelas",
            category: "Lomba",
            categoryClass: "bg-purple-500",
            icon: "fa-regular fa-trophy",
            description: "Lomba kebersihan antar kelas dalam rangka menyambut bulan suci Ramadhan. Penilaian meliputi kebersihan, kerapian, dan dekorasi kelas.",
            schedule: [
                "08:00 - 12:00: Pembersihan dan Dekorasi",
                "12:00 - 13:00: Istirahat",
                "13:00 - 14:00: Penilaian Dewan Juri"
            ],
            notes: "Pemenang akan mendapatkan hadiah menarik dan piagam penghargaan."
        },
        5: {
            title: "PPDB Online Gelombang 1",
            date: "10 Januari - 28 Februari 2026",
            time: "00:01 - 23:59 WIB",
            location: "Online",
            category: "Pendaftaran",
            categoryClass: "bg-accent",
            icon: "fa-regular fa-calendar-check",
            description: "Penerimaan Peserta Didik Baru (PPDB) gelombang 1 untuk tahun ajaran 2026/2027 dilaksanakan secara online.",
            schedule: [
                "10 Jan - 28 Feb: Pendaftaran Online",
                "1 - 5 Maret: Verifikasi Berkas",
                "20 Maret: Pengumuman Hasil"
            ],
            notes: "Pendaftaran dilakukan melalui website resmi ppdb.sman1batanggasan.sch.id"
        },
        6: {
            title: "Pengumuman Hasil PPDB",
            date: "20 Maret 2026",
            time: "10:00 WIB",
            location: "Online & Website",
            category: "Pengumuman",
            categoryClass: "bg-green-500",
            icon: "fa-regular fa-bell",
            description: "Pengumuman hasil seleksi PPDB gelombang 1. Siswa dapat mengecek hasil melalui website resmi sekolah.",
            schedule: [
                "10:00: Pengumuman via Website",
                "10:30: Pengumuman via WhatsApp Group",
                "13:00: Pengumuman via Papan Pengumuman"
            ],
            notes: "Siswa yang diterima wajib melakukan daftar ulang pada tanggal 21-25 Maret 2026."
        },
        7: {
            title: "Daftar Ulang Siswa Diterima",
            date: "21 - 25 Maret 2026",
            time: "08:00 - 15:00 WIB",
            location: "Kantor TU",
            category: "Pendaftaran",
            categoryClass: "bg-blue-500",
            icon: "fa-regular fa-hand-peace",
            description: "Daftar ulang bagi siswa yang dinyatakan diterima dalam seleksi PPDB gelombang 1.",
            schedule: [
                "08:00 - 12:00: Verifikasi Berkas",
                "12:00 - 13:00: Istirahat",
                "13:00 - 15:00: Pengambilan Seragam"
            ],
            notes: "Bawa berkas asli untuk verifikasi. Biaya daftar ulang Rp 500.000"
        },
        8: {
            title: "Class Meeting & Pentas Seni",
            date: "15 - 20 Juni 2026",
            time: "07:30 - 14:00 WIB",
            location: "Lapangan & Aula",
            category: "Olahraga",
            categoryClass: "bg-purple-500",
            icon: "fa-regular fa-futbol",
            description: "Class meeting antar kelas yang diisi dengan berbagai lomba olahraga dan pentas seni.",
            schedule: [
                "07:30 - 09:00: Lomba Futsal",
                "09:00 - 10:30: Lomba Voli",
                "10:30 - 12:00: Pentas Seni",
                "13:00 - 14:00: Penutupan"
            ],
            notes: "Setiap kelas wajib mengirimkan minimal 1 perwakilan di setiap lomba."
        }
    };
    
    // Slider variables
    let currentAgendaIndex = 0;
    const agendaSlider = document.getElementById('agendaSlider');
    const prevAgendaBtn = document.getElementById('prevAgenda');
    const nextAgendaBtn = document.getElementById('nextAgenda');
    const agendaIndicatorsContainer = document.getElementById('agendaIndicators');
    const totalAgendaCards = document.querySelectorAll('.agenda-card').length;
    let agendaCardsPerView = 4;
    let autoAgendaSlideInterval;
    
    // Update cards per view based on screen width
    function updateAgendaCardsPerView() {
        const width = window.innerWidth;
        if (width >= 1025) {
            agendaCardsPerView = 4;
        } else if (width >= 641) {
            agendaCardsPerView = 2;
        } else {
            agendaCardsPerView = 1;
        }
        updateAgendaSlider();
        createAgendaIndicators();
    }
    
    // Update slider position
    function updateAgendaSlider() {
        const cardWidth = document.querySelector('.agenda-card')?.offsetWidth || 0;
        const gap = 20; // gap-5 = 20px
        const slideDistance = (cardWidth + gap) * agendaCardsPerView;
        agendaSlider.style.transform = `translateX(-${currentAgendaIndex * slideDistance}px)`;
    }
    
    // Create indicator dots
    function createAgendaIndicators() {
        const totalSlides = Math.ceil(totalAgendaCards / agendaCardsPerView);
        agendaIndicatorsContainer.innerHTML = '';
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = `w-2 h-2 rounded-full transition-all duration-300 ${i === currentAgendaIndex ? 'bg-accent w-6' : 'bg-gray-300 hover:bg-gray-400'}`;
            dot.onclick = () => goToAgendaSlide(i);
            agendaIndicatorsContainer.appendChild(dot);
        }
    }
    
    // Go to specific slide
    function goToAgendaSlide(index) {
        const totalSlides = Math.ceil(totalAgendaCards / agendaCardsPerView);
        if (index < 0) index = 0;
        if (index >= totalSlides) index = totalSlides - 1;
        currentAgendaIndex = index;
        updateAgendaSlider();
        updateAgendaIndicators();
        resetAgendaAutoSlide();
    }
    
    // Update indicator dots
    function updateAgendaIndicators() {
        const dots = agendaIndicatorsContainer.querySelectorAll('button');
        dots.forEach((dot, i) => {
            if (i === currentAgendaIndex) {
                dot.className = 'w-6 h-2 rounded-full bg-accent transition-all duration-300';
            } else {
                dot.className = 'w-2 h-2 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300';
            }
        });
    }
    
    // Next slide
    function nextAgendaSlide() {
        const totalSlides = Math.ceil(totalAgendaCards / agendaCardsPerView);
        if (currentAgendaIndex + 1 < totalSlides) {
            goToAgendaSlide(currentAgendaIndex + 1);
        } else {
            goToAgendaSlide(0);
        }
    }
    
    // Previous slide
    function prevAgendaSlide() {
        if (currentAgendaIndex - 1 >= 0) {
            goToAgendaSlide(currentAgendaIndex - 1);
        } else {
            const totalSlides = Math.ceil(totalAgendaCards / agendaCardsPerView);
            goToAgendaSlide(totalSlides - 1);
        }
    }
    
    // Auto slide
    function startAgendaAutoSlide() {
        autoAgendaSlideInterval = setInterval(() => {
            nextAgendaSlide();
        }, 5000);
    }
    
    function resetAgendaAutoSlide() {
        clearInterval(autoAgendaSlideInterval);
        startAgendaAutoSlide();
    }
    
    // Event listeners
    if (prevAgendaBtn) prevAgendaBtn.addEventListener('click', () => { prevAgendaSlide(); resetAgendaAutoSlide(); });
    if (nextAgendaBtn) nextAgendaBtn.addEventListener('click', () => { nextAgendaSlide(); resetAgendaAutoSlide(); });
    
    // Handle window resize
    let agendaResizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(agendaResizeTimeout);
        agendaResizeTimeout = setTimeout(() => {
            updateAgendaCardsPerView();
        }, 200);
    });
    
    // Initialize slider
    setTimeout(() => {
        updateAgendaCardsPerView();
        startAgendaAutoSlide();
    }, 100);
    
    // Modal functions
    function openAgendaModal(id) {
        const agenda = agendaData[id];
        if (!agenda) return;
        
        document.getElementById('agendaModalTitle').innerHTML = agenda.title;
        
        let scheduleHtml = '';
        if (agenda.schedule) {
            scheduleHtml = `
                <div class="mt-4">
                    <h5 class="font-bold text-primary mb-2 flex items-center gap-2"><i class="fa-regular fa-clock"></i> Jadwal Kegiatan</h5>
                    <ul class="space-y-1 text-sm text-gray-600">
                        ${agenda.schedule.map(item => `<li class="flex items-center gap-2"><i class="fa-regular fa-circle-check text-accent text-xs"></i> ${item}</li>`).join('')}
                    </ul>
                </div>
            `;
        }
        
        document.getElementById('agendaModalContent').innerHTML = `
            <div class="mb-4">
                <div class="flex items-center gap-3 text-sm text-gray-500 mb-3 flex-wrap">
                    <span class="flex items-center gap-1"><i class="fa-regular fa-calendar-alt"></i> ${agenda.date}</span>
                    <span class="flex items-center gap-1"><i class="fa-regular fa-clock"></i> ${agenda.time}</span>
                    <span class="flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> ${agenda.location}</span>
                    <span class="px-2 py-0.5 rounded-full text-white text-xs ${agenda.categoryClass}">${agenda.category}</span>
                </div>
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    <p>${agenda.description}</p>
                    ${scheduleHtml}
                    <div class="mt-4 p-3 bg-yellow-50 rounded-xl border-l-4 border-accent">
                        <p class="text-sm text-gray-700"><i class="fa-regular fa-lightbulb text-accent mr-1"></i> <strong>Catatan:</strong> ${agenda.notes}</p>
                    </div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between items-center">
                <div class="flex gap-3">
                    <button onclick="shareAgenda(${id})" class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition"><i class="fa-regular fa-share-from-square"></i> Bagikan</button>
                    <button onclick="remindMe(${id})" class="flex items-center gap-2 px-4 py-2 bg-accent text-white rounded-lg hover:bg-orange-600 transition"><i class="fa-regular fa-bell"></i> Ingatkan Saya</button>
                </div>
                <a href="#" class="text-accent hover:underline">Lihat agenda lainnya →</a>
            </div>
        `;
        
        document.getElementById('agendaModal').classList.remove('hidden');
        document.getElementById('agendaModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeAgendaModal() {
        document.getElementById('agendaModal').classList.add('hidden');
        document.getElementById('agendaModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    
    function shareAgenda(id) {
        const agenda = agendaData[id];
        if (navigator.share) {
            navigator.share({
                title: agenda.title,
                text: `Jadwal kegiatan di SMAN 1 Batang Gasan: ${agenda.title}`,
                url: window.location.href
            }).catch(() => {});
        } else {
            alert(`Bagikan agenda: ${agenda.title}\nTanggal: ${agenda.date}\nLokasi: ${agenda.location}`);
        }
    }
    
    function remindMe(id) {
        const agenda = agendaData[id];
        alert(`✅ Pengingat disimpan!\n\nAgenda: ${agenda.title}\nTanggal: ${agenda.date}\nWaktu: ${agenda.time}\n\nAnda akan diingatkan 1 hari sebelum acara.`);
    }
    
    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAgendaModal();
        }
    });
</script>
    
    <!-- Fasilitas Sekolah - Modern dengan Animasi & Modal Detail -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <span class="section-badge inline-flex items-center gap-2 mx-auto"><i class="fa-solid fa-building"></i> Sarana & Prasarana</span>
            <h2 class="section-title text-3xl md:text-4xl font-bold text-primary text-center after:left-1/2 after:-translate-x-1/2 after:w-24">Fasilitas Sekolah</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Didukung dengan fasilitas modern dan nyaman untuk mendukung proses belajar mengajar yang optimal</p>
        </div>
        
        <!-- Slider Container untuk Fasilitas -->
        <div class="relative overflow-hidden">
            <div id="fasilitasSlider" class="flex transition-transform duration-500 ease-out gap-6">
                <!-- Perpustakaan Digital -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(1)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-book text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">Perpustakaan Digital</h3>
                    <p class="text-gray-500 text-sm">Koleksi buku fisik & e-book lengkap dengan area baca nyaman</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                
                <!-- Laboratorium IPA -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(2)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-flask text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">Lab IPA Terpadu</h3>
                    <p class="text-gray-500 text-sm">Praktikum Fisika, Kimia, Biologi dengan alat modern</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                
                <!-- Lab Komputer -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(3)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-laptop-code text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">Lab Komputer</h3>
                    <p class="text-gray-500 text-sm">80+ PC modern dengan internet fiber optic</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                
                <!-- Lapangan Olahraga -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(4)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-futbol text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">Sport Center</h3>
                    <p class="text-gray-500 text-sm">Lapangan basket, voli, futsal & jogging track</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                
                <!-- Musholla -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(5)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-mosque text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">Musholla Al-Furqan</h3>
                    <p class="text-gray-500 text-sm">Tempat ibadah nyaman dengan fasilitas wudhu</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                
                <!-- UKS -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(6)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-truck-medical text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">UKS & Kesehatan</h3>
                    <p class="text-gray-500 text-sm">Layanan kesehatan dan konsultasi dokter rutin</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                
                <!-- Kantin Sehat -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(7)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-utensils text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">Kantin Sehat</h3>
                    <p class="text-gray-500 text-sm">Makanan bergizi dengan harga terjangkau</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                
                <!-- Wifi Zone -->
                <div class="fasilitas-card flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] bg-white rounded-2xl p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-accent/30 group hover:-translate-y-1 cursor-pointer" onclick="openFasilitasModal(8)">
                    <div class="bg-gradient-to-br from-primary to-secondary w-16 h-16 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-md group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-wifi text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-2">WiFi Gratis</h3>
                    <p class="text-gray-500 text-sm">Akses internet cepat di seluruh area sekolah</p>
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-accent text-sm font-semibold inline-flex items-center gap-1">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Buttons untuk Fasilitas -->
        <div class="flex justify-center gap-3 mt-8">
            <button id="prevFasilitas" class="w-10 h-10 rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button id="nextFasilitas" class="w-10 h-10 rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        
        <!-- Indicator Dots -->
        <div class="flex justify-center gap-2 mt-4" id="fasilitasIndicators"></div>
    </div>
</section>

<!-- Statistik Sekolah - Modern dengan Animasi Counter & Efek Halus -->
<section class="py-20 bg-gradient-to-br from-primary to-secondary text-white relative overflow-hidden">
    <!-- Background pattern yang lebih halus -->
    <div class="absolute inset-0 opacity-5">
        <svg class="absolute top-0 left-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="dots" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse">
                    <circle fill="white" cx="2" cy="2" r="1.5"></circle>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#dots)"></rect>
        </svg>
    </div>
    
    <!-- Elemen dekorasi floating -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-80 h-80 bg-white/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-5 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fa-solid fa-chart-line text-accent"></i>
                <span>Profil Sekolah</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mt-2 mb-3 tracking-tight">
                SMAN 1 Batang Gasan dalam <span class="text-accent">Angka</span>
            </h2>
            <div class="w-24 h-1 bg-accent/50 mx-auto rounded-full mb-4"></div>
            <p class="text-white/80 max-w-2xl mx-auto text-base">Prestasi dan pencapaian membanggakan yang telah diraih oleh keluarga besar SMAN 1 Batang Gasan</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Statistik 1 - Siswa -->
            <div class="stat-card group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-500 cursor-pointer hover:scale-105 hover:shadow-2xl" onclick="openStatistikDetail(1)">
                <div class="relative">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300 group-hover:bg-accent/30">
                        <i class="fa-solid fa-users text-3xl group-hover:text-accent transition-colors"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-accent rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <i class="fa-solid fa-plus text-white text-xs"></i>
                    </div>
                </div>
                <div class="counter text-4xl md:text-5xl lg:text-6xl font-extrabold mb-2 tracking-tighter" data-target="750" data-suffix="+">0</div>
                <div class="text-lg md:text-xl font-bold mb-1">Siswa Aktif</div>
                <p class="text-white/60 text-sm">25 rombongan belajar</p>
                <div class="mt-4 h-1 w-0 bg-accent rounded-full mx-auto group-hover:w-16 transition-all duration-500"></div>
            </div>
            
            <!-- Statistik 2 - Guru -->
            <div class="stat-card group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-500 cursor-pointer hover:scale-105 hover:shadow-2xl" onclick="openStatistikDetail(2)">
                <div class="relative">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300 group-hover:bg-accent/30">
                        <i class="fa-solid fa-chalkboard-user text-3xl group-hover:text-accent transition-colors"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-accent rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <i class="fa-solid fa-plus text-white text-xs"></i>
                    </div>
                </div>
                <div class="counter text-4xl md:text-5xl lg:text-6xl font-extrabold mb-2 tracking-tighter" data-target="45" data-suffix="+">0</div>
                <div class="text-lg md:text-xl font-bold mb-1">Guru & Staf</div>
                <p class="text-white/60 text-sm">Guru profesional & tersertifikasi</p>
                <div class="mt-4 h-1 w-0 bg-accent rounded-full mx-auto group-hover:w-16 transition-all duration-500"></div>
            </div>
            
            <!-- Statistik 3 - Ruang Kelas -->
            <div class="stat-card group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-500 cursor-pointer hover:scale-105 hover:shadow-2xl" onclick="openStatistikDetail(3)">
                <div class="relative">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300 group-hover:bg-accent/30">
                        <i class="fa-solid fa-door-open text-3xl group-hover:text-accent transition-colors"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-accent rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <i class="fa-solid fa-plus text-white text-xs"></i>
                    </div>
                </div>
                <div class="counter text-4xl md:text-5xl lg:text-6xl font-extrabold mb-2 tracking-tighter" data-target="24" data-suffix="">0</div>
                <div class="text-lg md:text-xl font-bold mb-1">Ruang Kelas</div>
                <p class="text-white/60 text-sm">Dilengkapi AC & proyektor</p>
                <div class="mt-4 h-1 w-0 bg-accent rounded-full mx-auto group-hover:w-16 transition-all duration-500"></div>
            </div>
            
            <!-- Statistik 4 - Ekstrakurikuler -->
            <div class="stat-card group bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-500 cursor-pointer hover:scale-105 hover:shadow-2xl" onclick="openStatistikDetail(4)">
                <div class="relative">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300 group-hover:bg-accent/30">
                        <i class="fa-solid fa-medal text-3xl group-hover:text-accent transition-colors"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-accent rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <i class="fa-solid fa-plus text-white text-xs"></i>
                    </div>
                </div>
                <div class="counter text-4xl md:text-5xl lg:text-6xl font-extrabold mb-2 tracking-tighter" data-target="15" data-suffix="+">0</div>
                <div class="text-lg md:text-xl font-bold mb-1">Ekstrakurikuler</div>
                <p class="text-white/60 text-sm">Prestasi tingkat provinsi & nasional</p>
                <div class="mt-4 h-1 w-0 bg-accent rounded-full mx-auto group-hover:w-16 transition-all duration-500"></div>
            </div>
        </div>
        
        <!-- Tombol Lihat Selengkapnya -->
        <div class="text-center mt-12">
            <button onclick="showAllStatistics()" class="group inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 font-semibold">
                <span>Lihat Statistik Lengkap</span>
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>
    </div>
</section>

<!-- Modal Popup untuk Detail Statistik -->
<div id="statistikModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm transition-all duration-300" onclick="closeStatistikModal()">
    <div class="bg-white rounded-2xl max-w-2xl w-[90%] max-h-[85vh] overflow-y-auto animate-scale-in shadow-2xl" onclick="event.stopPropagation()">
        <div class="sticky top-0 bg-gradient-to-r from-primary to-secondary px-6 py-4 flex justify-between items-center rounded-t-2xl">
            <h3 id="statistikModalTitle" class="text-white font-bold text-lg">Detail Statistik</h3>
            <button onclick="closeStatistikModal()" class="text-white/80 hover:text-white transition text-2xl click-effect">&times;</button>
        </div>
        <div id="statistikModalContent" class="p-6">
            <!-- Konten dinamis akan diisi oleh JavaScript -->
        </div>
    </div>
</div>

<style>
    /* Animasi untuk modal */
    .animate-scale-in {
        animation: scaleInModal 0.3s ease-out;
    }
    
    @keyframes scaleInModal {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Efek klik */
    .click-effect {
        transition: transform 0.08s linear;
        cursor: pointer;
    }
    .click-effect:active {
        transform: scale(0.96);
    }
    
    /* Counter animation */
    .counter {
        display: inline-block;
        font-variant-numeric: tabular-nums;
    }
    
    /* Stat card hover effect */
    .stat-card {
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        will-change: transform;
    }
    
    /* Pulse animation untuk background */
    @keyframes gentlePulse {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.05); }
    }
    
    .animate-pulse {
        animation: gentlePulse 6s ease-in-out infinite;
    }
</style>

<script>
    // Data Statistik lengkap untuk modal
    const statistikDetailData = {
        1: {
            title: "Data Siswa SMAN 1 Batang Gasan",
            icon: "fa-solid fa-users",
            color: "blue",
            description: "SMAN 1 Batang Gasan memiliki populasi siswa yang terus berkembang dengan kualitas pendidikan yang unggul.",
            details: [
                { label: "Total Siswa", value: "750 orang", icon: "fa-solid fa-users" },
                { label: "Siswa Laki-laki", value: "380 orang", icon: "fa-solid fa-mars" },
                { label: "Siswa Perempuan", value: "370 orang", icon: "fa-solid fa-venus" },
                { label: "Rombongan Belajar", value: "25 kelas", icon: "fa-solid fa-door-open" },
                { label: "Rasio Guru-Siswa", value: "1 : 17", icon: "fa-solid fa-chalkboard-user" }
            ],
            achievements: [
                "Akreditasi A (Unggul)",
                "Sekolah Adiwiyata Nasional",
                "Sekolah Ramah Anak"
            ],
            image: "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&auto=format"
        },
        2: {
            title: "Data Guru dan Tenaga Kependidikan",
            icon: "fa-solid fa-chalkboard-user",
            color: "green",
            description: "Didukung oleh tenaga pendidik profesional dan tersertifikasi yang berkomitmen memberikan pendidikan terbaik.",
            details: [
                { label: "Total Guru", value: "45 orang", icon: "fa-solid fa-chalkboard-user" },
                { label: "Guru PNS", value: "35 orang", icon: "fa-solid fa-id-card" },
                { label: "Guru Honorer", value: "10 orang", icon: "fa-solid fa-user" },
                { label: "Guru Tersertifikasi", value: "40 orang", icon: "fa-regular fa-certificate" },
                { label: "Tenaga Administrasi", value: "12 orang", icon: "fa-solid fa-building" }
            ],
            achievements: [
                "Guru Berprestasi Tingkat Provinsi",
                "Sertifikasi Pendidik 100%",
                "Pengembangan Profesi Berkelanjutan"
            ],
            image: "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&auto=format"
        },
        3: {
            title: "Fasilitas Ruang Kelas",
            icon: "fa-solid fa-door-open",
            color: "purple",
            description: "Semua ruang kelas dilengkapi dengan fasilitas modern untuk menunjang proses belajar mengajar.",
            details: [
                { label: "Total Ruang Kelas", value: "24 ruang", icon: "fa-solid fa-door-open" },
                { label: "Dilengkapi AC", value: "20 ruang", icon: "fa-regular fa-snowflake" },
                { label: "Proyektor Interaktif", value: "24 unit", icon: "fa-solid fa-video" },
                { label: "Papan Tulis Digital", value: "10 unit", icon: "fa-solid fa-chalkboard" },
                { label: "Ruang Kelas Inklusi", value: "2 ruang", icon: "fa-regular fa-heart" }
            ],
            achievements: [
                "Ruang Kelas Digital",
                "Akses WiFi di Setiap Kelas",
                "Sirkulasi Udara Baik"
            ],
            image: "https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&auto=format"
        },
        4: {
            title: "Ekstrakurikuler Unggulan",
            icon: "fa-solid fa-medal",
            color: "orange",
            description: "Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.",
            details: [
                { label: "Total Ekskul", value: "15+ program", icon: "fa-solid fa-list" },
                { label: "Prestasi Nasional", value: "12 medali", icon: "fa-solid fa-trophy" },
                { label: "Prestasi Provinsi", value: "45 medali", icon: "fa-solid fa-medal" },
                { label: "Ekskul Terbanyak", value: "Pramuka (120 anggota)", icon: "fa-solid fa-campground" },
                { label: "Kerjasama Instansi", value: "10+ mitra", icon: "fa-solid fa-handshake" }
            ],
            achievements: [
                "Juara Umum LT V 2025",
                "Finalis OSN Nasional",
                "Juara FLS2N Provinsi"
            ],
            image: "https://images.unsplash.com/photo-1546519638-68e109498ffc?w=600&auto=format"
        }
    };
    
    // Counter animation with requestAnimationFrame for smoothness
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const suffix = counter.getAttribute('data-suffix') || '';
            let current = 0;
            const duration = 2000; // 2 seconds
            const stepTime = 20; // update every 20ms
            const steps = duration / stepTime;
            const increment = target / steps;
            
            let step = 0;
            const updateCounter = () => {
                step++;
                current += increment;
                if (step < steps) {
                    counter.innerText = Math.floor(current) + suffix;
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = target + suffix;
                }
            };
            
            // Start animation
            updateCounter();
        });
    }
    
    // Intersection Observer untuk trigger counter
    const statSection = document.querySelector('.stat-card');
    let counterTriggered = false;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !counterTriggered) {
                counterTriggered = true;
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });
    
    if (statSection) {
        observer.observe(statSection.parentElement.parentElement);
    }
    
    // Fallback: if observer doesn't trigger, animate after 1 second
    setTimeout(() => {
        if (!counterTriggered) {
            const counters = document.querySelectorAll('.counter');
            if (counters.length > 0 && counters[0].innerText === '0') {
                animateCounters();
                counterTriggered = true;
            }
        }
    }, 1000);
    
    // Modal functions
    function openStatistikDetail(id) {
        const data = statistikDetailData[id];
        if (!data) return;
        
        // Color mapping for badges
        const colorClasses = {
            blue: 'bg-blue-500',
            green: 'bg-green-500',
            purple: 'bg-purple-500',
            orange: 'bg-orange-500'
        };
        
        document.getElementById('statistikModalTitle').innerHTML = data.title;
        
        // Build details HTML
        const detailsHtml = data.details.map(detail => `
            <div class="flex justify-between items-center py-3 border-b border-gray-100 last:border-0">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <i class="${detail.icon} text-primary text-sm"></i>
                    </div>
                    <span class="text-gray-600">${detail.label}</span>
                </div>
                <span class="font-bold text-primary">${detail.value}</span>
            </div>
        `).join('');
        
        const achievementsHtml = data.achievements.map(achievement => `
            <li class="flex items-center gap-2"><i class="fa-regular fa-circle-check text-accent text-xs"></i> ${achievement}</li>
        `).join('');
        
        document.getElementById('statistikModalContent').innerHTML = `
            <div class="mb-4">
                <img src="${data.image}" alt="${data.title}" class="w-full h-48 object-cover rounded-xl mb-4">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-10 h-10 ${colorClasses[data.color]}/10 rounded-xl flex items-center justify-center">
                        <i class="${data.icon} ${colorClasses[data.color]} text-lg"></i>
                    </div>
                    <span class="text-sm text-gray-500">Data Terbaru 2026</span>
                </div>
                <p class="text-gray-700 leading-relaxed mb-4">${data.description}</p>
                
                <div class="bg-gray-50 rounded-xl p-4 mb-4">
                    <h5 class="font-bold text-primary mb-3 flex items-center gap-2"><i class="fa-solid fa-chart-simple"></i> Detail Data:</h5>
                    <div class="space-y-1">
                        ${detailsHtml}
                    </div>
                </div>
                
                <div class="bg-accent/10 rounded-xl p-4">
                    <h5 class="font-bold text-primary mb-3 flex items-center gap-2"><i class="fa-solid fa-trophy"></i> Prestasi & Penghargaan:</h5>
                    <ul class="space-y-2">
                        ${achievementsHtml}
                    </ul>
                </div>
            </div>
        `;
        
        document.getElementById('statistikModal').classList.remove('hidden');
        document.getElementById('statistikModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function showAllStatistics() {
        // Bisa diarahkan ke halaman statistik lengkap atau membuka modal dengan semua statistik
        openStatistikDetail(1);
    }
    
    function closeStatistikModal() {
        document.getElementById('statistikModal').classList.add('hidden');
        document.getElementById('statistikModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    
    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeStatistikModal();
        }
    });
    
    // Efek hover tambahan untuk stat card
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
</script>

<!-- Modal Popup untuk Detail Fasilitas -->
<div id="fasilitasModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm transition-all duration-300" onclick="closeFasilitasModal()">
    <div class="bg-white rounded-2xl max-w-2xl w-[90%] max-h-[85vh] overflow-y-auto animate-scale-in shadow-2xl" onclick="event.stopPropagation()">
        <div class="sticky top-0 bg-gradient-to-r from-primary to-secondary px-6 py-4 flex justify-between items-center rounded-t-2xl">
            <h3 id="fasilitasModalTitle" class="text-white font-bold text-lg">Detail Fasilitas</h3>
            <button onclick="closeFasilitasModal()" class="text-white/80 hover:text-white transition text-2xl click-effect">&times;</button>
        </div>
        <div id="fasilitasModalContent" class="p-6">
            <!-- Konten dinamis akan diisi oleh JavaScript -->
        </div>
    </div>
</div>

<style>
    /* Animasi untuk modal */
    .animate-scale-in {
        animation: scaleInModal 0.3s ease-out;
    }
    
    @keyframes scaleInModal {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Efek klik */
    .click-effect {
        transition: transform 0.08s linear;
        cursor: pointer;
    }
    .click-effect:active {
        transform: scale(0.96);
    }
    
    /* Counter animation */
    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Responsif slider */
    @media (max-width: 640px) {
        .fasilitas-card {
            width: 100%;
        }
    }
    @media (min-width: 641px) and (max-width: 1024px) {
        .fasilitas-card {
            width: calc(50% - 12px);
        }
    }
    @media (min-width: 1025px) {
        .fasilitas-card {
            width: calc(25% - 18px);
        }
    }
</style>

<script>
    // Data Fasilitas lengkap
    const fasilitasData = {
        1: {
            title: "Perpustakaan Digital",
            icon: "fa-solid fa-book",
            description: "Perpustakaan digital SMAN 1 Batang Gasan menyediakan ribuan koleksi buku fisik dan e-book yang dapat diakses oleh seluruh siswa dan guru.",
            facilities: [
                "Koleksi lebih dari 5.000 buku fisik",
                "Akses e-book gratis melalui aplikasi",
                "Area baca nyaman ber-AC",
                "Ruangan diskusi kelompok",
                "Layanan peminjaman online"
            ],
            image: "https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=600&auto=format"
        },
        2: {
            title: "Laboratorium IPA Terpadu",
            icon: "fa-solid fa-flask",
            description: "Laboratorium IPA Terpadu dilengkapi dengan peralatan modern untuk praktikum Fisika, Kimia, dan Biologi.",
            facilities: [
                "Alat praktikum Fisika lengkap",
                "Mikroskop digital",
                "Lemari asam",
                "Alat peraga Biologi",
                "Ruang persiapan praktikum"
            ],
            image: "https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=600&auto=format"
        },
        3: {
            title: "Laboratorium Komputer",
            icon: "fa-solid fa-laptop-code",
            description: "Lab komputer dengan 80+ PC modern yang dilengkapi dengan akses internet fiber optic berkecepatan tinggi.",
            facilities: [
                "80+ unit PC spesifikasi tinggi",
                "Internet fiber optic 100 Mbps",
                "Software pembelajaran lengkap",
                "Proyektor interaktif",
                "AC dan sirkulasi udara baik"
            ],
            image: "https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=600&auto=format"
        },
        4: {
            title: "Sport Center",
            icon: "fa-solid fa-futbol",
            description: "Sport center multifungsi untuk berbagai kegiatan olahraga siswa, baik intra maupun ekstrakurikuler.",
            facilities: [
                "Lapangan basket outdoor",
                "Lapangan voli",
                "Lapangan futsal",
                "Jogging track 200m",
                "Ruang ganti dan loker"
            ],
            image: "https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=600&auto=format"
        },
        5: {
            title: "Musholla Al-Furqan",
            icon: "fa-solid fa-mosque",
            description: "Musholla Al-Furqan merupakan pusat kegiatan keagamaan dan tempat ibadah yang nyaman bagi seluruh warga sekolah.",
            facilities: [
                "Kapasitas 200 jamaah",
                "Fasilitas wudhu lengkap",
                "AC dan kipas angin",
                "Perpustakaan Islami",
                "Ruang kegiatan keagamaan"
            ],
            image: "https://images.unsplash.com/photo-1584551246679-258d75b120e9?w=600&auto=format"
        },
        6: {
            title: "UKS & Kesehatan",
            icon: "fa-solid fa-truck-medical",
            description: "Unit Kesehatan Sekolah (UKS) memberikan layanan kesehatan dasar dan konsultasi medis bagi siswa.",
            facilities: [
                "Ruang perawatan",
                "Tenaga medis terlatih",
                "Konsultasi dokter rutin",
                "Ketersediaan obat-obatan",
                "Program kesehatan berkala"
            ],
            image: "https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=600&auto=format"
        },
        7: {
            title: "Kantin Sehat",
            icon: "fa-solid fa-utensils",
            description: "Kantin sehat menyediakan makanan bergizi dengan harga terjangkau yang diawasi oleh tim gizi sekolah.",
            facilities: [
                "Menu makanan bergizi",
                "Harga terjangkau",
                "Area makan bersih",
                "Pengawasan kebersihan ketat",
                "Varian makanan beragam"
            ],
            image: "https://images.unsplash.com/photo-1556912173-3b4069f2d1cd?w=600&auto=format"
        },
        8: {
            title: "WiFi Gratis",
            icon: "fa-solid fa-wifi",
            description: "Akses internet gratis berkecepatan tinggi yang tersedia di seluruh area sekolah untuk menunjang pembelajaran digital.",
            facilities: [
                "Hotspot di seluruh area",
                "Kecepatan hingga 100 Mbps",
                "Filter konten edukasi",
                "Akses 24/7",
                "Jaringan fiber optic"
            ],
            image: "https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&auto=format"
        }
    };
    
    // Data Statistik lengkap
    const statistikData = {
        1: {
            title: "Data Siswa SMAN 1 Batang Gasan",
            description: "SMAN 1 Batang Gasan memiliki populasi siswa yang terus berkembang dengan kualitas pendidikan yang unggul.",
            details: [
                "Total siswa: 750 orang",
                "Laki-laki: 380 orang",
                "Perempuan: 370 orang",
                "Rombongan belajar: 25 kelas",
                "Rasio guru-siswa: 1:17"
            ],
            image: "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&auto=format"
        },
        2: {
            title: "Data Guru dan Tenaga Kependidikan",
            description: "Didukung oleh tenaga pendidik profesional dan tersertifikasi yang berkomitmen memberikan pendidikan terbaik.",
            details: [
                "Total guru: 45 orang",
                "Guru PNS: 35 orang",
                "Guru honorer: 10 orang",
                "Guru tersertifikasi: 40 orang",
                "Tenaga administrasi: 12 orang"
            ],
            image: "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&auto=format"
        },
        3: {
            title: "Fasilitas Ruang Kelas",
            description: "Semua ruang kelas dilengkapi dengan fasilitas modern untuk menunjang proses belajar mengajar.",
            details: [
                "Total ruang kelas: 24 ruang",
                "Dilengkapi AC: 20 ruang",
                "Proyektor interaktif: 24 unit",
                "Papan tulis digital: 10 unit",
                "Ruang kelas inklusi: 2 ruang"
            ],
            image: "https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&auto=format"
        },
        4: {
            title: "Ekstrakurikuler Unggulan",
            description: "Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.",
            details: [
                "Total ekskul: 15+ program",
                "Prestasi nasional: 12 medali",
                "Prestasi provinsi: 45 medali",
                "Ekskul terbanyak: Pramuka (120 anggota)",
                "Kerjasama dengan berbagai instansi"
            ],
            image: "https://images.unsplash.com/photo-1546519638-68e109498ffc?w=600&auto=format"
        }
    };
    
    // Slider variables untuk Fasilitas
    let currentFasilitasIndex = 0;
    const fasilitasSlider = document.getElementById('fasilitasSlider');
    const prevFasilitasBtn = document.getElementById('prevFasilitas');
    const nextFasilitasBtn = document.getElementById('nextFasilitas');
    const fasilitasIndicatorsContainer = document.getElementById('fasilitasIndicators');
    const totalFasilitasCards = document.querySelectorAll('.fasilitas-card').length;
    let fasilitasCardsPerView = 4;
    let autoFasilitasSlideInterval;
    
    // Update cards per view based on screen width
    function updateFasilitasCardsPerView() {
        const width = window.innerWidth;
        if (width >= 1025) {
            fasilitasCardsPerView = 4;
        } else if (width >= 641) {
            fasilitasCardsPerView = 2;
        } else {
            fasilitasCardsPerView = 1;
        }
        updateFasilitasSlider();
        createFasilitasIndicators();
    }
    
    // Update slider position
    function updateFasilitasSlider() {
        const cardWidth = document.querySelector('.fasilitas-card')?.offsetWidth || 0;
        const gap = 24; // gap-6 = 24px
        const slideDistance = (cardWidth + gap) * fasilitasCardsPerView;
        fasilitasSlider.style.transform = `translateX(-${currentFasilitasIndex * slideDistance}px)`;
    }
    
    // Create indicator dots
    function createFasilitasIndicators() {
        const totalSlides = Math.ceil(totalFasilitasCards / fasilitasCardsPerView);
        fasilitasIndicatorsContainer.innerHTML = '';
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = `w-2 h-2 rounded-full transition-all duration-300 ${i === currentFasilitasIndex ? 'bg-accent w-6' : 'bg-gray-300 hover:bg-gray-400'}`;
            dot.onclick = () => goToFasilitasSlide(i);
            fasilitasIndicatorsContainer.appendChild(dot);
        }
    }
    
    // Go to specific slide
    function goToFasilitasSlide(index) {
        const totalSlides = Math.ceil(totalFasilitasCards / fasilitasCardsPerView);
        if (index < 0) index = 0;
        if (index >= totalSlides) index = totalSlides - 1;
        currentFasilitasIndex = index;
        updateFasilitasSlider();
        updateFasilitasIndicators();
        resetFasilitasAutoSlide();
    }
    
    // Update indicator dots
    function updateFasilitasIndicators() {
        const dots = fasilitasIndicatorsContainer.querySelectorAll('button');
        dots.forEach((dot, i) => {
            if (i === currentFasilitasIndex) {
                dot.className = 'w-6 h-2 rounded-full bg-accent transition-all duration-300';
            } else {
                dot.className = 'w-2 h-2 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300';
            }
        });
    }
    
    // Next slide
    function nextFasilitasSlide() {
        const totalSlides = Math.ceil(totalFasilitasCards / fasilitasCardsPerView);
        if (currentFasilitasIndex + 1 < totalSlides) {
            goToFasilitasSlide(currentFasilitasIndex + 1);
        } else {
            goToFasilitasSlide(0);
        }
    }
    
    // Previous slide
    function prevFasilitasSlide() {
        if (currentFasilitasIndex - 1 >= 0) {
            goToFasilitasSlide(currentFasilitasIndex - 1);
        } else {
            const totalSlides = Math.ceil(totalFasilitasCards / fasilitasCardsPerView);
            goToFasilitasSlide(totalSlides - 1);
        }
    }
    
    // Auto slide
    function startFasilitasAutoSlide() {
        autoFasilitasSlideInterval = setInterval(() => {
            nextFasilitasSlide();
        }, 6000);
    }
    
    function resetFasilitasAutoSlide() {
        clearInterval(autoFasilitasSlideInterval);
        startFasilitasAutoSlide();
    }
    
    // Event listeners
    if (prevFasilitasBtn) prevFasilitasBtn.addEventListener('click', () => { prevFasilitasSlide(); resetFasilitasAutoSlide(); });
    if (nextFasilitasBtn) nextFasilitasBtn.addEventListener('click', () => { nextFasilitasSlide(); resetFasilitasAutoSlide(); });
    
    // Handle window resize
    let fasilitasResizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(fasilitasResizeTimeout);
        fasilitasResizeTimeout = setTimeout(() => {
            updateFasilitasCardsPerView();
        }, 200);
    });
    
    // Initialize slider
    setTimeout(() => {
        updateFasilitasCardsPerView();
        startFasilitasAutoSlide();
    }, 100);
    
    // Counter animation for statistics
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            let current = 0;
            const increment = target / 50;
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.innerText = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = target;
                }
            };
            updateCounter();
        });
    }
    
    // Trigger counter animation when section is visible
    const statSection = document.querySelector('.bg-gradient-to-br.from-primary');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });
    
    if (statSection) observer.observe(statSection);
    
    // Modal functions
    function openFasilitasModal(id) {
        const fasilitas = fasilitasData[id];
        if (!fasilitas) return;
        
        document.getElementById('fasilitasModalTitle').innerHTML = fasilitas.title;
        
        document.getElementById('fasilitasModalContent').innerHTML = `
            <div class="mb-4">
                <img src="${fasilitas.image}" alt="${fasilitas.title}" class="w-full h-56 object-cover rounded-xl mb-4">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <i class="${fasilitas.icon} text-primary text-lg"></i>
                    </div>
                    <span class="text-sm text-gray-500">Fasilitas Unggulan</span>
                </div>
                <p class="text-gray-700 leading-relaxed mb-4">${fasilitas.description}</p>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h5 class="font-bold text-primary mb-3 flex items-center gap-2"><i class="fa-solid fa-list-check"></i> Fasilitas Lengkap:</h5>
                    <ul class="space-y-2">
                        ${fasilitas.facilities.map(item => `<li class="flex items-center gap-2 text-sm text-gray-600"><i class="fa-regular fa-circle-check text-accent text-xs"></i> ${item}</li>`).join('')}
                    </ul>
                </div>
            </div>
        `;
        
        document.getElementById('fasilitasModal').classList.remove('hidden');
        document.getElementById('fasilitasModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function openStatistikModal(id) {
        const statistik = statistikData[id];
        if (!statistik) return;
        
        document.getElementById('fasilitasModalTitle').innerHTML = statistik.title;
        
        document.getElementById('fasilitasModalContent').innerHTML = `
            <div class="mb-4">
                <img src="${statistik.image}" alt="${statistik.title}" class="w-full h-56 object-cover rounded-xl mb-4">
                <p class="text-gray-700 leading-relaxed mb-4">${statistik.description}</p>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h5 class="font-bold text-primary mb-3 flex items-center gap-2"><i class="fa-solid fa-chart-simple"></i> Data Lengkap:</h5>
                    <ul class="space-y-2">
                        ${statistik.details.map(item => `<li class="flex items-center gap-2 text-sm text-gray-600"><i class="fa-regular fa-circle-check text-accent text-xs"></i> ${item}</li>`).join('')}
                    </ul>
                </div>
            </div>
        `;
        
        document.getElementById('fasilitasModal').classList.remove('hidden');
        document.getElementById('fasilitasModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeFasilitasModal() {
        document.getElementById('fasilitasModal').classList.add('hidden');
        document.getElementById('fasilitasModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    
    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeFasilitasModal();
        }
    });
</script>

<!-- PPDB 2026 - Modern dengan Animasi & Efek Halus -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="ppdb-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle fill="#F59E0B" cx="2" cy="2" r="1"></circle>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#ppdb-pattern)"></rect>
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 transform transition-all duration-500 hover:shadow-3xl">
            <div class="md:flex">
                <!-- Bagian Kiri - Informasi PPDB -->
                <div class="md:w-1/2 p-8 md:p-10 lg:p-12 bg-gradient-to-br from-primary to-secondary text-white relative overflow-hidden group">
                    <!-- Decorative elements -->
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
                    <div class="absolute top-10 right-10 w-32 h-32 bg-white/5 rounded-full blur-xl animate-pulse-slow"></div>
                    
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-semibold mb-5 animate-fade-in">
                            <i class="fa-regular fa-calendar-check text-accent"></i>
                            <span>Gelombang 1 - Tahun Ajaran 2026/2027</span>
                        </div>
                        
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-4 leading-tight">
                            Penerimaan Peserta Didik <span class="text-accent">Baru 2026/2027</span>
                        </h2>
                        
                        <p class="text-white/90 mb-6 leading-relaxed text-sm md:text-base">
                            SMAN 1 Batang Gasan membuka pendaftaran untuk siswa baru tahun ajaran 2026/2027. 
                            Segera daftarkan diri Anda untuk mendapatkan pendidikan berkualitas dengan fasilitas modern dan tenaga pendidik profesional.
                        </p>
                        
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center gap-3 group/item">
                                <div class="w-7 h-7 bg-white/20 rounded-full flex items-center justify-center group-hover/item:bg-accent transition-colors duration-300">
                                    <i class="fa-solid fa-check-circle text-accent text-sm group-hover/item:text-white transition-colors"></i>
                                </div>
                                <span class="text-white/95 text-sm md:text-base">Fasilitas lengkap & modern berstandar nasional</span>
                            </div>
                            <div class="flex items-center gap-3 group/item">
                                <div class="w-7 h-7 bg-white/20 rounded-full flex items-center justify-center group-hover/item:bg-accent transition-colors duration-300">
                                    <i class="fa-solid fa-check-circle text-accent text-sm group-hover/item:text-white transition-colors"></i>
                                </div>
                                <span class="text-white/95 text-sm md:text-base">Guru profesional, berpengalaman, dan tersertifikasi</span>
                            </div>
                            <div class="flex items-center gap-3 group/item">
                                <div class="w-7 h-7 bg-white/20 rounded-full flex items-center justify-center group-hover/item:bg-accent transition-colors duration-300">
                                    <i class="fa-solid fa-check-circle text-accent text-sm group-hover/item:text-white transition-colors"></i>
                                </div>
                                <span class="text-white/95 text-sm md:text-base">Lingkungan belajar kondusif, nyaman, dan berbudaya</span>
                            </div>
                            <div class="flex items-center gap-3 group/item">
                                <div class="w-7 h-7 bg-white/20 rounded-full flex items-center justify-center group-hover/item:bg-accent transition-colors duration-300">
                                    <i class="fa-solid fa-check-circle text-accent text-sm group-hover/item:text-white transition-colors"></i>
                                </div>
                                <span class="text-white/95 text-sm md:text-base">Beragam ekstrakurikuler unggulan berprestasi</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-4">
                            <a href="/login" class="group inline-flex items-center gap-2 bg-accent text-gray-900 font-bold px-6 py-3 rounded-xl shadow-lg hover:bg-amber-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                                <i class="fa-regular fa-pen-to-square group-hover:rotate-12 transition-transform"></i>
                                <span>Daftar Sekarang</span>
                                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                            </a>
                            <a href="#" class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm text-white font-semibold px-5 py-3 rounded-xl hover:bg-white/30 transition-all duration-300">
                                <i class="fa-regular fa-circle-question"></i>
                                <span>Info Lebih Lanjut</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Bagian Kanan - Jadwal Pendaftaran -->
                <div class="md:w-1/2 bg-white p-8 md:p-10 lg:p-12">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-accent/20 to-accent/10 rounded-2xl flex items-center justify-center">
                            <i class="fa-regular fa-calendar text-accent text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-extrabold text-primary">Jadwal Pendaftaran</h3>
                            <p class="text-xs text-gray-400">Tahapan PPDB 2026/2027</p>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Pendaftaran Online -->
                        <div class="flex items-center gap-4 p-4 rounded-xl bg-gray-50/50 hover:bg-gradient-to-r hover:from-accent/5 hover:to-transparent transition-all duration-300 group cursor-pointer" onclick="showScheduleDetail('online')">
                            <div class="relative">
                                <div class="w-14 h-14 bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl flex items-center justify-center text-primary flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-regular fa-calendar-alt text-2xl"></i>
                                </div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-base">Pendaftaran Online</h4>
                                <p class="text-gray-500 text-sm">10 Januari - 28 Februari 2026</p>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                        
                        <!-- Verifikasi Berkas -->
                        <div class="flex items-center gap-4 p-4 rounded-xl bg-gray-50/50 hover:bg-gradient-to-r hover:from-accent/5 hover:to-transparent transition-all duration-300 group cursor-pointer" onclick="showScheduleDetail('verifikasi')">
                            <div class="w-14 h-14 bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl flex items-center justify-center text-primary flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="fa-regular fa-file-lines text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-base">Verifikasi Berkas</h4>
                                <p class="text-gray-500 text-sm">1 - 5 Maret 2026</p>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                        
                        <!-- Tes Seleksi -->
                        <div class="flex items-center gap-4 p-4 rounded-xl bg-gray-50/50 hover:bg-gradient-to-r hover:from-accent/5 hover:to-transparent transition-all duration-300 group cursor-pointer" onclick="showScheduleDetail('tes')">
                            <div class="w-14 h-14 bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl flex items-center justify-center text-primary flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="fa-solid fa-pen-to-square text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-base">Tes Seleksi</h4>
                                <p class="text-gray-500 text-sm">10 - 12 Maret 2026</p>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                        
                        <!-- Pengumuman Hasil -->
                        <div class="flex items-center gap-4 p-4 rounded-xl bg-gray-50/50 hover:bg-gradient-to-r hover:from-accent/5 hover:to-transparent transition-all duration-300 group cursor-pointer" onclick="showScheduleDetail('pengumuman')">
                            <div class="w-14 h-14 bg-gradient-to-br from-primary/10 to-primary/5 rounded-xl flex items-center justify-center text-primary flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="fa-solid fa-chart-simple text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-base">Pengumuman Hasil</h4>
                                <p class="text-gray-500 text-sm">20 Maret 2026</p>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                        
                        <!-- Daftar Ulang -->
                        <div class="flex items-center gap-4 p-4 rounded-xl bg-gradient-to-r from-accent/10 to-transparent border-l-4 border-accent transition-all duration-300 group cursor-pointer" onclick="showScheduleDetail('daftarulang')">
                            <div class="w-14 h-14 bg-gradient-to-br from-accent/20 to-accent/10 rounded-xl flex items-center justify-center text-accent flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="fa-solid fa-user-plus text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-accent text-base">Daftar Ulang</h4>
                                <p class="text-gray-600 text-sm font-medium">21 - 25 Maret 2026</p>
                                <span class="text-xs text-accent">Segera lakukan pendaftaran ulang!</span>
                            </div>
                            <i class="fa-solid fa-chevron-right text-accent group-hover:translate-x-1 transition-all"></i>
                        </div>
                    </div>
                    
                    <!-- Info Tambahan -->
                    <div class="mt-8 p-4 bg-primary/5 rounded-xl border border-primary/10">
                        <div class="flex items-start gap-3">
                            <i class="fa-regular fa-circle-info text-accent text-lg mt-0.5"></i>
                            <div>
                                <p class="text-sm font-semibold text-primary">Informasi Penting</p>
                                <p class="text-xs text-gray-500 mt-1">Kuota peserta didik baru terbatas. Segera daftarkan diri Anda sebelum batas waktu pendaftaran berakhir.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Popup untuk Detail Jadwal -->
<div id="scheduleModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm transition-all duration-300" onclick="closeScheduleModal()">
    <div class="bg-white rounded-2xl max-w-md w-[90%] animate-scale-in shadow-2xl" onclick="event.stopPropagation()">
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-4 flex justify-between items-center rounded-t-2xl">
            <h3 id="scheduleModalTitle" class="text-white font-bold text-lg">Detail Jadwal</h3>
            <button onclick="closeScheduleModal()" class="text-white/80 hover:text-white transition text-2xl">&times;</button>
        </div>
        <div id="scheduleModalContent" class="p-6">
            <!-- Konten dinamis akan diisi oleh JavaScript -->
        </div>
    </div>
</div>

<style>
    /* Animasi tambahan */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    
    @keyframes pulse-slow {
        0%, 100% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.1); opacity: 0.5; }
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 4s ease-in-out infinite;
    }
    
    .animate-scale-in {
        animation: scaleInModal 0.3s ease-out;
    }
    
    @keyframes scaleInModal {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* Hover effect untuk card */
    .group:hover .group-hover\:translate-x-1 {
        transform: translateX(4px);
    }
    
    .group:hover .group-hover\:rotate-12 {
        transform: rotate(12deg);
    }
</style>

<script>
    // Data detail jadwal
    const scheduleDetails = {
        online: {
            title: "Pendaftaran Online",
            icon: "fa-regular fa-calendar-alt",
            description: "Pendaftaran dilakukan secara online melalui website resmi PPDB SMAN 1 Batang Gasan.",
            steps: [
                "Buka website ppdb.sman1batanggasan.sch.id",
                "Klik tombol 'Daftar Sekarang'",
                "Isi formulir pendaftaran dengan lengkap",
                "Unggah dokumen yang diperlukan",
                "Submit formulir dan cetak bukti pendaftaran"
            ],
            notes: "Pastikan data yang diisi sesuai dengan dokumen asli. Kesalahan data dapat menyebabkan penolakan pendaftaran."
        },
        verifikasi: {
            title: "Verifikasi Berkas",
            icon: "fa-regular fa-file-lines",
            description: "Panitia akan melakukan verifikasi terhadap berkas yang telah diunggah oleh calon peserta didik.",
            steps: [
                "Pengecekan kelengkapan dokumen",
                "Validasi keabsahan dokumen",
                "Konfirmasi kesesuaian data",
                "Pengumuman status kelulusan administrasi"
            ],
            notes: "Pastikan dokumen yang diunggah jelas dan terbaca. Dokumen tidak jelas akan dikembalikan untuk perbaikan."
        },
        tes: {
            title: "Tes Seleksi",
            icon: "fa-solid fa-pen-to-square",
            description: "Tes seleksi dilakukan untuk mengukur kemampuan akademik calon peserta didik.",
            steps: [
                "Tes Potensi Akademik (TPA)",
                "Tes Bahasa Inggris",
                "Tes Matematika Dasar",
                "Wawancara (untuk jalur tertentu)"
            ],
            notes: "Jadwal tes akan diinformasikan melalui email dan website resmi. Peserta wajib hadir tepat waktu."
        },
        pengumuman: {
            title: "Pengumuman Hasil",
            icon: "fa-solid fa-chart-simple",
            description: "Hasil seleksi PPDB akan diumumkan secara resmi melalui website dan papan pengumuman sekolah.",
            steps: [
                "Cek hasil melalui website ppdb.sman1batanggasan.sch.id",
                "Lihat pengumuman di papan informasi sekolah",
                "Cek email pendaftaran untuk notifikasi hasil",
                "Hubungi panitia jika ada pertanyaan"
            ],
            notes: "Keputusan panitia bersifat mutlak dan tidak dapat diganggu gugat."
        },
        daftarulang: {
            title: "Daftar Ulang",
            icon: "fa-solid fa-user-plus",
            description: "Calon peserta didik yang dinyatakan diterima wajib melakukan daftar ulang.",
            steps: [
                "Datang ke sekolah sesuai jadwal yang ditentukan",
                "Membawa berkas asli untuk verifikasi",
                "Mengisi formulir daftar ulang",
                "Membayar biaya awal (jika ada)",
                "Mengambil seragam dan perlengkapan sekolah"
            ],
            notes: "Peserta yang tidak melakukan daftar ulang sesuai jadwal dianggap mengundurkan diri."
        }
    };
    
    // Fungsi untuk menampilkan modal detail
    function showScheduleDetail(type) {
        const data = scheduleDetails[type];
        if (!data) return;
        
        document.getElementById('scheduleModalTitle').innerHTML = data.title;
        
        const stepsHtml = data.steps.map((step, index) => `
            <li class="flex items-start gap-3 py-2 border-b border-gray-100 last:border-0">
                <div class="w-6 h-6 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span class="text-accent text-xs font-bold">${index + 1}</span>
                </div>
                <span class="text-sm text-gray-600">${step}</span>
            </li>
        `).join('');
        
        document.getElementById('scheduleModalContent').innerHTML = `
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                    <i class="${data.icon} text-primary text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Informasi Lengkap</p>
                    <p class="text-xs text-gray-400">${data.description}</p>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-4 mb-4">
                <h4 class="font-bold text-primary mb-3 flex items-center gap-2">
                    <i class="fa-solid fa-list-check text-accent"></i> Tahapan Pelaksanaan:
                </h4>
                <ul class="space-y-1">
                    ${stepsHtml}
                </ul>
            </div>
            
            <div class="bg-yellow-50 rounded-xl p-3 border-l-4 border-accent">
                <div class="flex items-start gap-2">
                    <i class="fa-regular fa-lightbulb text-accent text-sm mt-0.5"></i>
                    <div>
                        <p class="text-xs font-semibold text-primary">Catatan Penting:</p>
                        <p class="text-xs text-gray-600">${data.notes}</p>
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('scheduleModal').classList.remove('hidden');
        document.getElementById('scheduleModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeScheduleModal() {
        document.getElementById('scheduleModal').classList.add('hidden');
        document.getElementById('scheduleModal').style.display = 'none';
        document.body.style.overflow = '';
    }
    
    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeScheduleModal();
        }
    });
    
    // Efek hover pada card jadwal
    document.querySelectorAll('.group.cursor-pointer').forEach(card => {
        card.addEventListener('click', function() {
            // Sudah ada onclick handler
        });
    });
</script>

<!-- Kontak & Lokasi - Modern, Responsif, Interaktif -->
<section class="py-20 bg-gradient-to-br from-neutral to-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="contact-pattern" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                    <circle fill="#F59E0B" cx="2" cy="2" r="1" opacity="0.3"></circle>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#contact-pattern)"></rect>
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 bg-accent/10 backdrop-blur-sm px-5 py-2 rounded-full text-sm font-semibold text-accent mb-4">
                <i class="fa-regular fa-message"></i>
                <span>Hubungi Kami</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-primary mb-4">
                Kontak & <span class="text-accent">Lokasi</span>
            </h2>
            <div class="w-24 h-1 bg-accent/50 mx-auto rounded-full mb-5"></div>
            <p class="text-gray-500 max-w-2xl mx-auto text-base">Sampaikan saran, kritik, atau pertanyaan melalui form berikut. Tim kami akan merespon dalam waktu 1x24 jam.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Bagian Kiri: Informasi Kontak -->
            <div class="group">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">
                    <!-- Header dengan gradasi -->
                    <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5 relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center animate-pulse">
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
                        <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 group/item cursor-pointer" onclick="copyToClipboard('Jl. Raya Batang Gasan No. 45, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562')">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary group-hover/item:bg-primary group-hover/item:text-white transition-all duration-300 flex-shrink-0">
                                <i class="fa-solid fa-location-dot text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-base flex items-center gap-2">
                                    Alamat
                                    <span class="text-xs bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full group-hover/item:hidden">Klik untuk salin</span>
                                </h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Jl. Raya Batang Gasan No. 45, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562</p>
                                <div class="text-xs text-accent mt-1 opacity-0 group-hover/item:opacity-100 transition-opacity flex items-center gap-1">
                                    <i class="fa-regular fa-copy"></i> Klik untuk menyalin alamat
                                </div>
                            </div>
                        </div>
                        
                        <!-- Telepon -->
                        <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 group/item">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary group-hover/item:bg-primary group-hover/item:text-white transition-all duration-300 flex-shrink-0">
                                <i class="fa-solid fa-phone text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-base">Telepon</h4>
                                <a href="tel:075212345" class="text-gray-600 text-sm hover:text-accent transition flex items-center gap-2">
                                    <span>(0752) 12345</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square text-xs opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                </a>
                                <p class="text-gray-500 text-xs mt-1">Jam Kerja: Senin - Jumat, 08.00 - 15.00 WIB</p>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300 group/item">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary group-hover/item:bg-primary group-hover/item:text-white transition-all duration-300 flex-shrink-0">
                                <i class="fa-regular fa-envelope text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-primary text-base">Email</h4>
                                <div class="space-y-1">
                                    <a href="mailto:info@sman1batanggasan.sch.id" class="text-gray-600 text-sm hover:text-accent transition flex items-center gap-2">
                                        info@sman1batanggasan.sch.id
                                        <i class="fa-solid fa-arrow-up-right-from-square text-xs opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                    </a>
                                    <a href="mailto:ppdb@sman1batanggasan.sch.id" class="text-gray-600 text-sm hover:text-accent transition flex items-center gap-2">
                                        ppdb@sman1batanggasan.sch.id
                                        <i class="fa-solid fa-arrow-up-right-from-square text-xs opacity-0 group-hover/item:opacity-100 transition-opacity"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Jam Operasional -->
                        <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="bg-primary/10 w-12 h-12 rounded-xl flex items-center justify-center text-primary flex-shrink-0">
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
                    <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-5 border-t border-gray-100">
                        <h4 class="font-bold text-primary mb-4 flex items-center gap-2">
                            <i class="fa-regular fa-share-from-square text-accent"></i> 
                            Ikuti Kami di Sosial Media
                        </h4>
                        <div class="flex flex-wrap gap-3">
                            <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-[#1877F2] hover:text-white hover:shadow-lg transition-all duration-300 hover:-translate-y-1 hover:rotate-6">
                                <i class="fa-brands fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-gradient-to-tr hover:from-[#E4405F] hover:to-[#F56040] hover:text-white transition-all duration-300 hover:-translate-y-1 hover:rotate-6">
                                <i class="fa-brands fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-[#FF0000] hover:text-white transition-all duration-300 hover:-translate-y-1 hover:rotate-6">
                                <i class="fa-brands fa-youtube text-xl"></i>
                            </a>
                            <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-[#000000] hover:text-white transition-all duration-300 hover:-translate-y-1 hover:rotate-6">
                                <i class="fa-brands fa-tiktok text-xl"></i>
                            </a>
                            <a href="#" class="bg-white w-12 h-12 rounded-2xl flex items-center justify-center text-primary shadow-sm hover:bg-[#25D366] hover:text-white transition-all duration-300 hover:-translate-y-1 hover:rotate-6">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan: Form Kirim Pesan - Modern dengan validasi -->
            <div class="group">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">
                    <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5 relative overflow-hidden">
                        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
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
                            <div class="relative group/input">
                                <label class="block text-gray-700 mb-2 text-sm font-medium">
                                    <i class="fa-regular fa-user text-accent mr-1"></i> Nama Lengkap <span class="text-accent">*</span>
                                </label>
                                <input type="text" id="fullname" placeholder="Masukkan nama lengkap Anda" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white hover:border-accent/30">
                                <div class="text-red-500 text-xs mt-1 hidden" id="fullname-error">
                                    <i class="fa-regular fa-circle-exclamation mr-1"></i> Nama lengkap harus diisi
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="relative group/input">
                                <label class="block text-gray-700 mb-2 text-sm font-medium">
                                    <i class="fa-regular fa-envelope text-accent mr-1"></i> Email <span class="text-accent">*</span>
                                </label>
                                <input type="email" id="email" placeholder="contoh@email.com" 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white hover:border-accent/30">
                                <div class="text-red-500 text-xs mt-1 hidden" id="email-error">
                                    <i class="fa-regular fa-circle-exclamation mr-1"></i> Email tidak valid
                                </div>
                            </div>
                            
                            <!-- Subjek -->
                            <div class="relative group/input">
                                <label class="block text-gray-700 mb-2 text-sm font-medium">
                                    <i class="fa-regular fa-tag text-accent mr-1"></i> Subjek
                                </label>
                                <select id="subject" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white hover:border-accent/30 cursor-pointer">
                                    <option value="info">📋 Informasi Sekolah</option>
                                    <option value="ppdb">📝 Pendaftaran PPDB</option>
                                    <option value="saran">💡 Saran & Masukan</option>
                                    <option value="pengaduan">⚠️ Pengaduan</option>
                                    <option value="lainnya">📌 Lainnya</option>
                                </select>
                            </div>
                            
                            <!-- Pesan -->
                            <div class="relative group/input">
                                <label class="block text-gray-700 mb-2 text-sm font-medium">
                                    <i class="fa-regular fa-message text-accent mr-1"></i> Pesan <span class="text-accent">*</span>
                                </label>
                                <textarea id="message" rows="4" placeholder="Tulis pesan Anda di sini..." 
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white hover:border-accent/30 resize-none"></textarea>
                                <div class="text-red-500 text-xs mt-1 hidden" id="message-error">
                                    <i class="fa-regular fa-circle-exclamation mr-1"></i> Pesan harus diisi
                                </div>
                            </div>
                            
                            <!-- Notifikasi Toast -->
                            <div id="toast-notification" class="fixed bottom-5 right-5 bg-green-500 text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 z-50 hidden transition-all duration-300">
                                <i class="fa-regular fa-circle-check"></i> Pesan berhasil dikirim!
                            </div>
                            
                            <button type="submit" id="submitBtn" 
                                class="w-full bg-gradient-to-r from-primary to-secondary text-white font-bold py-3.5 rounded-xl hover:shadow-xl hover:shadow-primary/20 transition-all duration-300 flex items-center justify-center gap-2 group/btn">
                                <i class="fa-regular fa-paper-plane group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1 transition-transform duration-300"></i> 
                                <span>Kirim Pesan</span>
                                <i class="fa-solid fa-arrow-right opacity-0 group-hover/btn:opacity-100 group-hover/btn:translate-x-1 transition-all duration-300"></i>
                            </button>
                            
                            <p class="text-center text-xs text-gray-400 mt-3 flex items-center justify-center gap-2">
                                <i class="fa-regular fa-shield-check text-accent"></i> 
                                Data Anda aman dan tidak akan dibagikan kepada pihak ketiga
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informasi Tambahan - Quick Links -->
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="fa-regular fa-file-lines text-lg"></i>
                </div>
                <p class="text-sm font-medium text-gray-700 group-hover:text-primary transition">Profil Sekolah</p>
            </a>
            <a href="#" class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="fa-regular fa-calendar text-lg"></i>
                </div>
                <p class="text-sm font-medium text-gray-700 group-hover:text-primary transition">Kalender Akademik</p>
            </a>
            <a href="#" class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="fa-regular fa-circle-question text-lg"></i>
                </div>
                <p class="text-sm font-medium text-gray-700 group-hover:text-primary transition">FAQ PPDB</p>
            </a>
            <a href="#" class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto mb-2 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <i class="fa-regular fa-map text-lg"></i>
                </div>
                <p class="text-sm font-medium text-gray-700 group-hover:text-primary transition">Panduan Lokasi</p>
            </a>
        </div>
    </div>
</section>

<!-- JavaScript untuk Validasi Form, Copy Text, Toast Notification -->
<script>
    // Fungsi untuk menyalin teks ke clipboard dengan efek visual
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('✅ Berhasil disalin!', 'success');
        }).catch(() => {
            showToast('❌ Gagal menyalin', 'error');
        });
    }
    
    // Fungsi untuk menampilkan notifikasi toast
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast-notification');
        if (toast) {
            toast.textContent = message;
            toast.className = `fixed bottom-5 right-5 px-5 py-3 rounded-xl shadow-lg flex items-center gap-2 z-50 transition-all duration-300 transform translate-y-0 opacity-100 ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            } text-white`;
            toast.innerHTML = `<i class="fa-regular fa-${type === 'success' ? 'circle-check' : 'circle-xmark'} mr-2"></i> ${message}`;
            toast.classList.remove('hidden');
            
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
    }
    
    // Validasi form kontak dengan real-time feedback
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        // Real-time validation
        const validateField = (field, errorId, validator) => {
            const value = field.value.trim();
            const isValid = validator(value);
            const errorEl = document.getElementById(errorId);
            
            if (!isValid) {
                errorEl.classList.remove('hidden');
                field.classList.add('border-red-500', 'ring-red-100');
                field.classList.remove('border-green-400');
                return false;
            } else {
                errorEl.classList.add('hidden');
                field.classList.remove('border-red-500', 'ring-red-100');
                field.classList.add('border-green-400');
                return true;
            }
        };
        
        const fullname = document.getElementById('fullname');
        const email = document.getElementById('email');
        const message = document.getElementById('message');
        
        if (fullname) {
            fullname.addEventListener('input', () => {
                validateField(fullname, 'fullname-error', v => v.length > 0);
            });
        }
        
        if (email) {
            email.addEventListener('input', () => {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                validateField(email, 'email-error', v => emailPattern.test(v));
            });
        }
        
        if (message) {
            message.addEventListener('input', () => {
                validateField(message, 'message-error', v => v.length > 0);
            });
        }
        
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            
            // Validasi Nama
            const isNameValid = validateField(fullname, 'fullname-error', v => v.length > 0);
            if (!isNameValid) isValid = false;
            
            // Validasi Email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const isEmailValid = validateField(email, 'email-error', v => emailPattern.test(v));
            if (!isEmailValid) isValid = false;
            
            // Validasi Pesan
            const isMessageValid = validateField(message, 'message-error', v => v.length > 0);
            if (!isMessageValid) isValid = false;
            
            if (isValid) {
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
                
                const submitBtn = document.getElementById('submitBtn');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim...';
                submitBtn.disabled = true;
                
                setTimeout(() => {
                    showToast('✅ Pesan berhasil dikirim! Kami akan segera merespon.', 'success');
                    contactForm.reset();
                    
                    document.querySelectorAll('input, textarea').forEach(el => {
                        el.classList.remove('border-green-400', 'border-red-500');
                    });
                    
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                }, 1000);
            }
        });
    }
</script>

    <!-- Peta Lokasi & Rute - Modern dengan Leaflet & Perhitungan Jarak -->
<section class="py-20 bg-gradient-to-br from-white to-gray-50 relative overflow-hidden">
    <!-- Background decorative -->
    <div class="absolute inset-0 opacity-5">
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="map-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle fill="#F59E0B" cx="2" cy="2" r="1"></circle>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#map-pattern)"></rect>
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-accent/10 backdrop-blur-sm px-5 py-2 rounded-full text-sm font-semibold text-accent mb-4">
                <i class="fa-solid fa-map-location-dot"></i>
                <span>Lokasi & Rute</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-primary mb-4">
                Lokasi <span class="text-accent">Sekolah</span>
            </h2>
            <div class="w-24 h-1 bg-accent/50 mx-auto rounded-full mb-5"></div>
            <p class="text-gray-500 max-w-2xl mx-auto text-base">Cari tahu lokasi SMAN 1 Batang Gasan dan hitung jarak tempuh dari lokasi Anda dengan mudah</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Informasi Alamat & Rute - Sidebar -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 sticky top-24">
                    <div class="bg-gradient-to-r from-primary to-secondary px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-location-dot text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-white text-lg">SMAN 1 Batang Gasan</h3>
                                <p class="text-white/70 text-xs">Lokasi Resmi Sekolah</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-5 space-y-4">
                        <!-- Alamat -->
                        <div class="flex gap-3 p-2 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <i class="fa-solid fa-map-pin text-accent mt-1 flex-shrink-0"></i>
                            <p class="text-gray-600 text-sm leading-relaxed">Jl. Pariaman - Tiku KM. 26, Sungai Sarik Malai V Suku, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat 25562</p>
                        </div>
                        
                        <!-- Koordinat -->
                        <div class="flex gap-3 p-2 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <i class="fa-solid fa-globe text-accent mt-1 flex-shrink-0"></i>
                            <p class="text-gray-600 text-sm">Koordinat: <span class="font-mono">0°27'9.8"S 99°59'24.2"E</span></p>
                        </div>
                        
                        <!-- Telepon -->
                        <div class="flex gap-3 p-2 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <i class="fa-solid fa-phone text-accent mt-1 flex-shrink-0"></i>
                            <p class="text-gray-600 text-sm">(0752) 12345</p>
                        </div>

                        <!-- Form Perhitungan Rute -->
                        <div class="border-t border-gray-100 pt-4 mt-2">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <i class="fa-solid fa-route text-primary text-sm"></i>
                                </div>
                                <h4 class="font-semibold text-primary">Hitung Jarak & Rute</h4>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- Lokasi Asal -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                        <i class="fa-regular fa-location-dot text-accent mr-1"></i> Lokasi Asal
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="text" id="origin-input" placeholder="Masukkan alamat atau kota Anda" 
                                            class="flex-1 px-3 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 bg-gray-50/50 focus:bg-white">
                                        <button id="use-current-location" class="bg-primary/10 hover:bg-primary/20 text-primary px-3 rounded-xl transition-all duration-300 hover:scale-105" title="Gunakan lokasi saya">
                                            <i class="fa-solid fa-location-crosshairs text-lg"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Mode Transportasi -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                        <i class="fa-solid fa-car text-accent mr-1"></i> Transportasi
                                    </label>
                                    <div class="grid grid-cols-4 gap-2">
                                        <button data-mode="DRIVING" class="transport-mode-btn active bg-primary text-white p-2.5 rounded-xl text-xs flex flex-col items-center gap-1 transition-all duration-300 hover:scale-105">
                                            <i class="fa-solid fa-car text-base"></i>
                                            <span class="text-[10px]">Mobil</span>
                                        </button>
                                        <button data-mode="WALKING" class="transport-mode-btn bg-gray-100 text-gray-600 p-2.5 rounded-xl text-xs flex flex-col items-center gap-1 transition-all duration-300 hover:scale-105 hover:bg-primary/10">
                                            <i class="fa-solid fa-person-walking text-base"></i>
                                            <span class="text-[10px]">Jalan</span>
                                        </button>
                                        <button data-mode="BICYCLING" class="transport-mode-btn bg-gray-100 text-gray-600 p-2.5 rounded-xl text-xs flex flex-col items-center gap-1 transition-all duration-300 hover:scale-105 hover:bg-primary/10">
                                            <i class="fa-solid fa-bicycle text-base"></i>
                                            <span class="text-[10px]">Sepeda</span>
                                        </button>
                                        <button data-mode="TRANSIT" class="transport-mode-btn bg-gray-100 text-gray-600 p-2.5 rounded-xl text-xs flex flex-col items-center gap-1 transition-all duration-300 hover:scale-105 hover:bg-primary/10">
                                            <i class="fa-solid fa-bus text-base"></i>
                                            <span class="text-[10px]">Angkot</span>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Tombol Hitung Rute -->
                                <button id="calculate-route" class="w-full bg-gradient-to-r from-primary to-secondary text-white font-semibold py-3 rounded-xl hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 flex items-center justify-center gap-2 group">
                                    <i class="fa-regular fa-compass group-hover:rotate-12 transition-transform duration-300"></i>
                                    <span>Hitung Rute</span>
                                    <i class="fa-solid fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Hasil Jarak & Waktu -->
                        <div id="route-result" class="mt-4 p-4 bg-gradient-to-r from-primary/5 to-secondary/5 rounded-xl border border-primary/10 hidden">
                            <div class="flex items-center gap-2 text-primary font-semibold mb-3">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="text-sm">Perkiraan Perjalanan</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="text-center flex-1">
                                    <div class="text-2xl font-bold text-primary" id="distance-value">0 km</div>
                                    <div class="text-xs text-gray-500 mt-1">Jarak Tempuh</div>
                                </div>
                                <div class="w-px h-10 bg-gray-300"></div>
                                <div class="text-center flex-1">
                                    <div class="text-2xl font-bold text-primary" id="duration-value">0 menit</div>
                                    <div class="text-xs text-gray-500 mt-1">Estimasi Waktu</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peta Interaktif -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="bg-gradient-to-r from-gray-50 to-white px-5 py-3 border-b border-gray-100">
                        <div class="flex items-center justify-between flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <i class="fa-solid fa-map text-primary text-sm"></i>
                                </div>
                                <span class="text-sm font-semibold text-primary">Peta Interaktif</span>
                            </div>
                            <div class="flex gap-3 text-xs text-gray-500">
                                <span class="flex items-center gap-1"><i class="fa-regular fa-circle-check text-green-500"></i> Lokasi terverifikasi</span>
                                <span class="flex items-center gap-1"><i class="fa-solid fa-hand-pointer text-accent"></i> Klik peta untuk rute</span>
                            </div>
                        </div>
                    </div>
                    <div id="map" class="w-full h-[450px] md:h-[500px] z-0" style="height: 450px;"></div>
                    <div class="p-3 bg-gray-50 border-t border-gray-100 text-xs text-gray-500 flex justify-between items-center flex-wrap gap-2">
                        <span class="flex items-center gap-2"><i class="fa-regular fa-circle-check text-green-500"></i> Lokasi sekolah dikonfirmasi</span>
                        <span class="flex items-center gap-2"><i class="fa-solid fa-arrow-right-arrow-left text-accent"></i> Klik peta untuk menentukan titik awal</span>
                        <span class="flex items-center gap-2"><i class="fa-regular fa-lightbulb text-accent"></i> Geser peta untuk zoom</span>
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
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    border: 1px solid rgba(245,158,11,0.2);
}
.leaflet-popup-tip {
    border-top-color: rgba(245,158,11,0.2);
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
.leaflet-control-geocoder .leaflet-control-geocoder-icon {
    border-radius: 12px !important;
}
.leaflet-control-attribution {
    font-size: 9px !important;
}

/* Loading spinner */
.fa-spinner {
    animation: spin 1s linear infinite;
}
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Responsive map */
@media (max-width: 640px) {
    .leaflet-control-geocoder input {
        width: 150px !important;
        font-size: 11px !important;
    }
    .leaflet-popup-content-wrapper {
        max-width: 200px;
    }
}
</style>

<script>
// Koordinat SMAN 1 Batang Gasan
const SCHOOL_LAT = -0.452728;
const SCHOOL_LNG = 99.990054;
const SCHOOL_NAME = "SMAN 1 Batang Gasan";

// Inisialisasi Peta dengan Leaflet
const map = L.map('map').setView([SCHOOL_LAT, SCHOOL_LNG], 15);

// Tile Layer - OpenStreetMap dengan gaya modern
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions">CARTO</a>',
    subdomains: 'abcd',
    maxZoom: 19,
    minZoom: 10
}).addTo(map);

// Marker Sekolah dengan custom icon modern
const schoolIcon = L.divIcon({
    html: '<div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-primary to-secondary rounded-full shadow-lg border-2 border-white animate-bounce"><i class="fa-solid fa-school text-white text-xl"></i></div>',
    className: 'custom-marker',
    iconSize: [48, 48],
    popupAnchor: [0, -24]
});

const schoolMarker = L.marker([SCHOOL_LAT, SCHOOL_LNG], { icon: schoolIcon }).addTo(map);
schoolMarker.bindPopup(`
    <div class="text-center p-2">
        <strong class="text-primary text-sm">${SCHOOL_NAME}</strong><br>
        <span class="text-xs text-gray-500">Jl. Pariaman - Tiku KM. 26</span>
        <div class="mt-1 text-accent text-xs">⭐ Sekolah Unggulan</div>
    </div>
`).openPopup();

// Variabel untuk routing control
let routingControl = null;
let currentRouteMode = 'DRIVING';

// Fungsi untuk mengubah mode transportasi
function updateRouteMode(mode) {
    currentRouteMode = mode;
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
    if (routingControl) {
        map.removeControl(routingControl);
    }
    
    const routeResult = document.getElementById('route-result');
    routeResult.classList.remove('hidden');
    document.getElementById('distance-value').innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
    document.getElementById('duration-value').innerHTML = 'Menghitung...';
    
    let routingMode = 'driving';
    if (currentRouteMode === 'WALKING') routingMode = 'walking';
    else if (currentRouteMode === 'BICYCLING') routingMode = 'cycling';
    else if (currentRouteMode === 'DRIVING') routingMode = 'driving';
    
    routingControl = L.Routing.control({
        waypoints: [L.latLng(originLat, originLng), L.latLng(SCHOOL_LAT, SCHOOL_LNG)],
        routeWhileDragging: false,
        showAlternatives: false,
        fitSelectedRoutes: true,
        lineOptions: {
            styles: [{ color: '#F59E0B', weight: 5, opacity: 0.9, lineCap: 'round', lineJoin: 'round' }],
            extendToWaypoints: true,
            missingRouteTolerance: 0
        },
        router: L.Routing.osrmv1({
            serviceUrl: 'https://router.project-osrm.org/route/v1',
            profile: routingMode
        }),
        show: false,
        addWaypoints: false,
        draggableWaypoints: false
    }).addTo(map);
    
    routingControl.on('routesfound', function(e) {
        const routes = e.routes;
        if (routes && routes.length > 0) {
            const summary = routes[0].summary;
            const totalDistance = summary.totalDistance;
            const totalTime = summary.totalTime;
            
            let distanceText = totalDistance >= 1000 ? (totalDistance / 1000).toFixed(1) + ' km' : totalDistance + ' m';
            let timeText = '';
            if (totalTime >= 3600) {
                const hours = Math.floor(totalTime / 3600);
                const minutes = Math.floor((totalTime % 3600) / 60);
                timeText = hours + ' jam ' + minutes + ' menit';
            } else {
                timeText = Math.floor(totalTime / 60) + ' menit';
            }
            
            document.getElementById('distance-value').innerHTML = distanceText;
            document.getElementById('duration-value').innerHTML = timeText;
        }
    });
    
    routingControl.on('routingerror', function(e) {
        document.getElementById('distance-value').innerHTML = 'Tidak ditemukan';
        document.getElementById('duration-value').innerHTML = 'Rute tidak tersedia';
    });
}

// Event Listener untuk tombol hitung rute
document.getElementById('calculate-route').addEventListener('click', async () => {
    const originInput = document.getElementById('origin-input').value.trim();
    if (!originInput) {
        alert('⚠️ Silakan masukkan lokasi asal Anda');
        return;
    }
    
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
            alert('❌ Lokasi tidak ditemukan. Silakan coba dengan alamat yang lebih spesifik.');
            document.getElementById('route-result').classList.add('hidden');
        }
    } catch (error) {
        console.error('Geocoding error:', error);
        alert('❌ Terjadi kesalahan saat mencari lokasi. Silakan coba lagi.');
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
                let errorMessage = '❌ Tidak dapat mengambil lokasi. ';
                switch(error.code) {
                    case error.PERMISSION_DENIED: errorMessage += 'Izin lokasi ditolak.'; break;
                    case error.POSITION_UNAVAILABLE: errorMessage += 'Informasi lokasi tidak tersedia.'; break;
                    case error.TIMEOUT: errorMessage += 'Waktu permintaan habis.'; break;
                }
                alert(errorMessage);
            }
        );
    } else {
        alert('❌ Browser Anda tidak mendukung geolokasi. Silakan masukkan alamat secara manual.');
    }
});

// Event Listener untuk tombol mode transportasi
document.querySelectorAll('.transport-mode-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        updateRouteMode(btn.dataset.mode);
        const originInput = document.getElementById('origin-input').value.trim();
        if (originInput && !document.getElementById('route-result').classList.contains('hidden')) {
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

<!-- Footer Modern dengan warna abu-abu elegan -->
<footer class="bg-primary text-white pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div><div class="flex items-center gap-2 mb-4"><div class="bg-white/20 p-2 rounded-xl"><i class="fa-solid fa-graduation-cap text-xl"></i></div><span class="font-extrabold text-lg">SMAN 1 Batang Gasan</span></div><p class="text-sm text-white/80 leading-relaxed">Jl. Raya Batang Gasan No. 45, Kec. Batang Gasan, Kab. Padang Pariaman, Sumatera Barat.</p><div class="flex gap-3 mt-4"><a href="#" class="bg-white/20 p-2 rounded-full hover:bg-accent hover:text-primary transition-all duration-300 hover:scale-110"><i class="fa-brands fa-instagram"></i></a><a href="#" class="bg-white/20 p-2 rounded-full hover:bg-accent hover:text-primary transition-all duration-300 hover:scale-110"><i class="fa-brands fa-youtube"></i></a><a href="#" class="bg-white/20 p-2 rounded-full hover:bg-accent hover:text-primary transition-all duration-300 hover:scale-110"><i class="fa-brands fa-tiktok"></i></a></div></div>
            <div><h4 class="font-bold text-lg mb-4 border-l-4 border-accent pl-3">Tautan PPDB</h4><ul class="space-y-2 text-sm"><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> Jadwal Pendaftaran</a></li><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> Persyaratan</a></li><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> Biaya & Beasiswa</a></li><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> FAQ PPDB</a></li></ul></div>
            <div><h4 class="font-bold text-lg mb-4 border-l-4 border-accent pl-3">Layanan Digital</h4><ul class="space-y-2 text-sm"><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> e-Learning</a></li><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> Perpustakaan Digital</a></li><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> Raport Online</a></li><li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-accent text-xs"></i> Helpdesk PPDB</a></li></ul></div>
            <div><h4 class="font-bold text-lg mb-4 border-l-4 border-accent pl-3">Kontak Kami</h4><ul class="space-y-2 text-sm"><li class="flex items-center gap-2"><i class="fa-solid fa-phone w-5 text-accent"></i> (0752) 12345</li><li class="flex items-center gap-2"><i class="fa-regular fa-envelope w-5 text-accent"></i> info@sman1batanggasan.sch.id</li><li class="flex items-center gap-2"><i class="fa-brands fa-whatsapp w-5 text-accent"></i> +62 812 3456 7890</li><li class="flex items-center gap-2"><i class="fa-regular fa-clock w-5 text-accent"></i> Jam: 07.30-16.00</li></ul></div>
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
