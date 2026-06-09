<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>PPDB Login - SMAN 1 Batang Gasan | Penerimaan Peserta Didik Baru 2026</title>

    <!-- Favicon - Logo SMAN 1 Batang Gasan untuk tab browser -->
    <link rel="icon" type="image/x-icon" href="/logo.png">
    <link rel="shortcut icon" type="image/png" href="/logo.png">
    <link rel="apple-touch-icon" href="/logo.png">
    
    <!-- Meta description untuk SEO -->
    <meta name="description" content="Login PPDB Online SMAN 1 Batang Gasan - Penerimaan Peserta Didik Baru Tahun Ajaran 2026/2027">
    <meta name="keywords" content="PPDB, SMAN 1 Batang Gasan, Pendaftaran SMA, PPDB Online 2026">
    <meta name="author" content="SMAN 1 Batang Gasan">

    <!-- Tailwind CSS + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#374151',
                        secondary: '#4B5563',
                        accent: '#F59E0B',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'slide-up': 'slideUp 0.5s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    },
                }
            }
        }
    </script>
    
    <style>
        /* Custom styles */
        * {
            -webkit-tap-highlight-color: transparent;
        }
        
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }
        
        /* Animasi background bintang/partikel */
        @keyframes twinkle {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.2); }
        }
        
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s ease-in-out infinite;
        }
        
        /* Efek glass morphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        /* Efek hover pada tombol */
        .btn-login {
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: 0 4px 0 #B45309;
            transform: translateY(-2px);
        }
        .btn-login:active {
            transform: translateY(2px);
            box-shadow: 0 1px 0 #B45309;
        }
        
        .btn-back {
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .btn-back:active {
            transform: translateY(1px);
        }
        
        /* Efek focus pada input */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
            border-color: #F59E0B;
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .login-card {
                margin: 0 16px;
                max-width: calc(100% - 32px);
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #F59E0B;
            border-radius: 10px;
        }
    </style>
</head>

<body class="relative min-h-screen overflow-x-hidden font-sans antialiased">
    
    {{-- Background Animasi dengan Gambar Sekolah --}}
    <div class="fixed inset-0 z-0">
        <!-- Background gradient modern -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/90 via-secondary/80 to-primary/95"></div>
        
        <!-- Background pattern dots -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 40%, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 24px 24px;"></div>
        
        <!-- Gambar latar belakang sekolah dengan overlay -->
        <div class="absolute inset-0 bg-cover bg-center opacity-20 mix-blend-overlay" 
             style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');">
        </div>
        
        <!-- Elemen dekorasi floating -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-accent/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-primary/30 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white/10 rounded-full blur-2xl animate-float" style="animation-delay: 4s;"></div>
        
        <!-- Partikel bintang animasi -->
        <div class="star" style="width: 3px; height: 3px; top: 15%; left: 10%; animation-delay: 0s;"></div>
        <div class="star" style="width: 2px; height: 2px; top: 25%; left: 85%; animation-delay: 1s;"></div>
        <div class="star" style="width: 4px; height: 4px; top: 65%; left: 15%; animation-delay: 2s;"></div>
        <div class="star" style="width: 2px; height: 2px; top: 75%; left: 75%; animation-delay: 0.5s;"></div>
        <div class="star" style="width: 3px; height: 3px; top: 45%; left: 95%; animation-delay: 1.5s;"></div>
        <div class="star" style="width: 2px; height: 2px; top: 85%; left: 45%; animation-delay: 2.5s;"></div>
        <div class="star" style="width: 3px; height: 3px; top: 10%; left: 50%; animation-delay: 3s;"></div>
        <div class="star" style="width: 2px; height: 2px; top: 55%; left: 30%; animation-delay: 0.8s;"></div>
        
        <!-- Logo watermark di background -->
        <div class="absolute bottom-10 right-10 opacity-5 hidden md:block">
            <i class="fa-solid fa-graduation-cap text-8xl text-white"></i>
        </div>
        <div class="absolute top-10 left-10 opacity-5 hidden md:block">
            <i class="fa-solid fa-school text-8xl text-white"></i>
        </div>
    </div>
    
    {{-- Komponen Alert --}}
    @include('components.alert')
    
    {{-- Container Login --}}
    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-8">
        
        {{-- Card Login Modern --}}
        <div class="glass-card rounded-3xl shadow-2xl max-w-md w-full animate-slide-up overflow-hidden">
            
            {{-- Tombol Kembali ke Beranda --}}
            <div class="absolute top-4 left-4 z-20">
                <a href="{{ route('home') }}" class="btn-back flex items-center gap-2 px-3 py-2 bg-white/20 backdrop-blur-sm text-white text-sm rounded-xl hover:bg-white/30 transition-all duration-300 group">
                    <i class="fa-solid fa-arrow-left text-accent group-hover:-translate-x-1 transition-transform"></i>
                    <span class="hidden sm:inline">Kembali</span>
                    <span class="sm:hidden"><i class="fa-solid fa-house"></i></span>
                </a>
            </div>
            
            {{-- Header dengan logo sekolah --}}
            <div class="bg-gradient-to-r from-primary to-secondary px-6 py-6 text-center">
                <div class="flex justify-center mb-4">
                    <!-- Logo Sekolah Modern dengan efek animasi -->
                    <div class="relative group">
                        <div class="absolute -inset-3 bg-accent/30 rounded-full blur-md opacity-60 group-hover:opacity-100 transition-opacity animate-pulse"></div>
                        <div class="relative w-20 h-20 md:w-24 md:h-24 bg-white rounded-2xl flex items-center justify-center shadow-xl transform transition-transform group-hover:scale-105 duration-300">
                            <img src="/logo.webp" alt="Logo SMAN 1 Batang Gasan" class="w-14 h-14 md:w-16 md:h-16 object-contain">
                        </div>
                    </div>
                </div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-white mb-1 tracking-tight">SMAN 1 BATANG GASAN</h1>
                <p class="text-white/80 text-xs md:text-sm">Unggul, Berkarakter, Berwawasan Global</p>
                <div class="mt-3 flex justify-center gap-2">
                    <span class="inline-flex items-center gap-1 text-[10px] bg-white/20 px-2 py-0.5 rounded-full">
                        <i class="fa-solid fa-star-of-life text-accent text-[8px]"></i> TERAKREDITASI A
                    </span>
                    <span class="inline-flex items-center gap-1 text-[10px] bg-white/20 px-2 py-0.5 rounded-full">
                        <i class="fa-solid fa-medal text-accent text-[8px]"></i> UNGGUL
                    </span>
                </div>
            </div>
            
            {{-- Body Form --}}
            <div class="p-6 md:p-8">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center gap-2 bg-accent/10 px-4 py-1.5 rounded-full mb-3">
                        <i class="fa-solid fa-arrow-right-to-bracket text-accent text-xs"></i>
                        <span class="text-xs font-semibold text-accent">PPDB ONLINE 2026</span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-primary">Selamat Datang! 👋</h2>
                    <p class="text-gray-500 text-sm mt-1">Silakan masuk ke akun PPDB Anda</p>
                </div>
                
                <form action="{{ route('login.action') }}" method="POST">
                    @csrf
                    
                    {{-- Email Field --}}
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-regular fa-envelope text-accent mr-1"></i> Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input id="email" name="email" type="email" placeholder="contoh@email.com" value="{{ old('email') }}"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white"
                                required>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Password Field --}}
                    <div class="mb-5">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-solid fa-lock text-accent mr-1"></i> Kata Sandi
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-key text-gray-400 text-sm"></i>
                            </div>
                            <input id="password" name="password" type="password" placeholder="Masukkan kata sandi Anda"
                                class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white"
                                required>
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fa-regular fa-eye text-gray-400 hover:text-accent transition"></i>
                            </button>
                        </div>
                    </div>
                    
                    {{-- Remember & Forgot --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox" name="remember" id="remember_me" class="w-4 h-4 text-accent focus:ring-accent border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-600 group-hover:text-primary transition">Ingat saya</span>
                        </label>
                        <a href="#" class="text-sm text-accent hover:text-primary font-medium transition flex items-center gap-1">
                            <i class="fa-regular fa-circle-question"></i> Lupa Kata Sandi?
                        </a>
                    </div>
                    
                    {{-- Submit Button --}}
                    <button type="submit"
                        class="btn-login w-full py-3 bg-gradient-to-r from-accent to-orange-500 text-white font-extrabold rounded-xl hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 text-base">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> MASUK
                    </button>
                </form>
                
                {{-- Register Link --}}
                <div class="mt-6 text-center">
                    <p class="text-gray-500 text-sm">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-accent font-bold hover:text-primary transition inline-flex items-center gap-1">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </p>
                </div>
                
                {{-- Informasi PPDB --}}
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <div class="flex flex-wrap items-center justify-center gap-3 text-xs text-gray-400">
                        <span class="flex items-center gap-1"><i class="fa-regular fa-calendar text-accent"></i> 2026</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span class="flex items-center gap-1"><i class="fa-regular fa-clock text-accent"></i> PPDB Online</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span class="flex items-center gap-1"><i class="fa-solid fa-graduation-cap text-accent"></i> SMA Negeri</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span class="flex items-center gap-1"><i class="fa-solid fa-location-dot text-accent"></i> Batang Gasan</span>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Footer Info --}}
        <div class="absolute bottom-4 left-0 right-0 text-center z-10">
            <p class="text-white/60 text-xs">© 2026 SMAN 1 Batang Gasan | PPDB Online Modern</p>
        </div>
    </div>
    
    {{-- Script untuk toggle password --}}
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        }
        
        // Animasi partikel dinamis
        const stars = document.querySelectorAll('.star');
        stars.forEach((star, index) => {
            star.style.animationDuration = `${Math.random() * 3 + 2}s`;
            star.style.animationDelay = `${Math.random() * 5}s`;
        });
        
        // Efek floating pada logo
        const logo = document.querySelector('.relative.group .relative');
        if (logo) {
            setInterval(() => {
                logo.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    logo.style.transform = 'scale(1)';
                }, 500);
            }, 3000);
        }
        
        // Auto focus pada input email saat halaman dimuat
        document.getElementById('email')?.focus();
        
        // Smooth hover effect untuk tombol kembali
        const backBtn = document.querySelector('.btn-back');
        if (backBtn) {
            backBtn.addEventListener('mouseenter', () => {
                const icon = backBtn.querySelector('i');
                if (icon) icon.style.transform = 'translateX(-3px)';
            });
            backBtn.addEventListener('mouseleave', () => {
                const icon = backBtn.querySelector('i');
                if (icon) icon.style.transform = 'translateX(0)';
            });
        }
    </script>
</body>

</html>