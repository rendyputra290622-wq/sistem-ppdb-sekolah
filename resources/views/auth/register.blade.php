<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>PPDB Register - SMAN 1 Batang Gasan | Buat Akun Baru 2026</title>

    <!-- Favicon - Logo SMAN 1 Batang Gasan untuk tab browser -->
    <link rel="icon" type="image/x-icon" href="/logo.png">
    <link rel="shortcut icon" type="image/png" href="/logo.png">
    <link rel="apple-touch-icon" href="/logo.png">
    
    <!-- Meta description untuk SEO -->
    <meta name="description" content="Registrasi Akun PPDB Online SMAN 1 Batang Gasan - Daftar sekarang untuk mengikuti Penerimaan Peserta Didik Baru Tahun Ajaran 2026/2027">
    <meta name="keywords" content="Registrasi PPDB, SMAN 1 Batang Gasan, Daftar PPDB, Pendaftaran SMA 2026">

    <!-- Tailwind CSS + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 untuk notifikasi yang menarik -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
                        'shake': 'shake 0.5s ease-in-out',
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
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '25%': { transform: 'translateX(-5px)' },
                            '75%': { transform: 'translateX(5px)' },
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
        .btn-register {
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: 0 4px 0 #B45309;
            transform: translateY(-2px);
        }
        .btn-register:active {
            transform: translateY(2px);
            box-shadow: 0 1px 0 #B45309;
        }
        
        /* Efek focus pada input */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
            border-color: #F59E0B;
        }
        
        /* Efek input error */
        .input-error {
            border-color: #EF4444 !important;
            animation: shake 0.3s ease-in-out;
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .register-card {
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
        
        /* Loading spinner */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Tooltip error */
        .error-tooltip {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            background: #EF4444;
            color: white;
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 20px;
            white-space: nowrap;
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
    
    {{-- Container Register --}}
    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-8">
        
        {{-- Card Register Modern --}}
        <div class="glass-card rounded-3xl shadow-2xl max-w-md w-full animate-slide-up overflow-hidden">
            
            {{-- Header dengan logo sekolah --}}
            <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5 text-center">
                <div class="flex justify-center mb-3">
                    <!-- Logo Sekolah Modern dengan efek animasi -->
                    <div class="relative group">
                        <div class="absolute -inset-3 bg-accent/30 rounded-full blur-md opacity-60 group-hover:opacity-100 transition-opacity animate-pulse"></div>
                        <div class="relative w-16 h-16 md:w-20 md:h-20 bg-white rounded-2xl flex items-center justify-center shadow-xl transform transition-transform group-hover:scale-105 duration-300">
                            <img src="/logo.webp" alt="Logo SMAN 1 Batang Gasan" class="w-11 h-11 md:w-14 md:h-14 object-contain">
                        </div>
                    </div>
                </div>
                <h1 class="text-xl md:text-2xl font-extrabold text-white mb-0.5 tracking-tight">SMAN 1 BATANG GASAN</h1>
                <p class="text-white/80 text-xs md:text-sm">Unggul, Berkarakter, Berwawasan Global</p>
            </div>
            
            {{-- Body Form --}}
            <div class="p-6 md:p-7">
                <div class="text-center mb-5">
                    <div class="inline-flex items-center gap-2 bg-accent/10 px-4 py-1.5 rounded-full mb-3">
                        <i class="fa-solid fa-user-plus text-accent text-xs"></i>
                        <span class="text-xs font-semibold text-accent">DAFTAR AKUN BARU</span>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-primary">Buat Akun Baru! ✨</h2>
                    <p class="text-gray-500 text-sm mt-1">Silakan daftar untuk mendapatkan akses PPDB Online</p>
                </div>
                
                <form action="{{ route('register.action') }}" method="POST" id="registerForm">
                    @csrf
                    
                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-regular fa-user text-accent mr-1"></i> Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-regular fa-user text-gray-400 text-sm"></i>
                            </div>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                placeholder="Masukkan nama lengkap Anda"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email dengan validasi real-time -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-regular fa-envelope text-accent mr-1"></i> Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                placeholder="contoh@email.com"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                            <div id="email-validation-status" class="absolute right-3 top-1/2 transform -translate-y-1/2 hidden">
                                <i class="fa-solid fa-spinner fa-spin text-gray-400"></i>
                            </div>
                        </div>
                        <div id="email-error-message" class="hidden"></div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-solid fa-lock text-accent mr-1"></i> Kata Sandi
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-key text-gray-400 text-sm"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                placeholder="Minimal 8 karakter"
                                class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fa-regular fa-eye text-gray-400 hover:text-accent transition"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                            <i class="fa-regular fa-info-circle"></i> Minimal 8 karakter, mengandung huruf dan angka
                        </p>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Konfirmasi Password -->
                    <div class="mb-5">
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-solid fa-lock text-accent mr-1"></i> Konfirmasi Kata Sandi
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-check-circle text-gray-400 text-sm"></i>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                placeholder="Ulangi kata sandi Anda"
                                class="w-full pl-10 pr-12 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                            <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fa-regular fa-eye text-gray-400 hover:text-accent transition"></i>
                            </button>
                        </div>
                        <div id="password-match-status" class="text-xs mt-1 hidden"></div>
                    </div>
                    
                    <!-- Informasi tambahan -->
                    <div class="mb-5 p-3 bg-primary/5 rounded-xl text-center">
                        <p class="text-xs text-gray-500">
                            <i class="fa-regular fa-shield-check text-accent mr-1"></i> 
                            Dengan mendaftar, Anda menyetujui syarat dan ketentuan PPDB SMAN 1 Batang Gasan
                        </p>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" id="submitBtn"
                        class="btn-register w-full py-3 bg-gradient-to-r from-accent to-orange-500 text-white font-extrabold rounded-xl hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 text-base">
                        <i class="fa-solid fa-user-plus"></i> DAFTAR
                    </button>
                </form>
                
                <!-- Tombol Kembali ke Login -->
                <div class="mt-5 text-center">
                    <p class="text-gray-500 text-sm">
                        Sudah memiliki akun? 
                        <a href="{{ route('login') }}" class="text-accent font-bold hover:text-primary transition inline-flex items-center gap-1">
                            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Login
                        </a>
                    </p>
                </div>
                
                {{-- Informasi PPDB --}}
                <div class="mt-5 pt-4 border-t border-gray-100">
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
    
    {{-- Script untuk validasi dan deteksi akun terdaftar --}}
    <script>
        // Variabel untuk timeout debounce
        let emailCheckTimeout = null;
        let isEmailValid = false;
        let isSubmitting = false;
        
        // Elemen DOM
        const emailInput = document.getElementById('email');
        const emailValidationStatus = document.getElementById('email-validation-status');
        const submitBtn = document.getElementById('submitBtn');
        const registerForm = document.getElementById('registerForm');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const passwordMatchStatus = document.getElementById('password-match-status');
        
        // Fungsi untuk mengecek email apakah sudah terdaftar
        async function checkEmailExists(email) {
            if (!email || email.length < 5) return false;
            
            // Tampilkan loading
            emailValidationStatus.classList.remove('hidden');
            emailValidationStatus.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-gray-400"></i>';
            
            try {
                const response = await fetch('/check-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ email: email })
                });
                
                const data = await response.json();
                
                if (data.exists) {
                    // Email sudah terdaftar - tampilkan peringatan menarik dengan SweetAlert
                    emailValidationStatus.innerHTML = '<i class="fa-regular fa-circle-xmark text-red-500"></i>';
                    emailInput.classList.add('input-error');
                    
                    // Tampilkan SweetAlert peringatan
                    Swal.fire({
                        title: '⚠️ Email Sudah Terdaftar!',
                        text: 'Email ' + email + ' sudah digunakan. Silakan gunakan email lain atau login jika Anda sudah memiliki akun.',
                        icon: 'error',
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: 'Mengerti',
                        backdrop: true,
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl',
                            title: 'text-lg font-bold',
                            confirmButton: 'btn-register bg-gradient-to-r from-accent to-orange-500 text-white font-bold px-6 py-2 rounded-xl'
                        }
                    }).then((result) => {
                        emailInput.focus();
                        emailInput.select();
                    });
                    
                    return true;
                } else {
                    // Email tersedia
                    emailValidationStatus.innerHTML = '<i class="fa-regular fa-circle-check text-green-500"></i>';
                    emailInput.classList.remove('input-error');
                    emailInput.classList.add('border-green-400');
                    return false;
                }
            } catch (error) {
                console.error('Error checking email:', error);
                emailValidationStatus.innerHTML = '<i class="fa-regular fa-circle-question text-gray-400"></i>';
                return false;
            } finally {
                setTimeout(() => {
                    if (emailValidationStatus.innerHTML !== '<i class="fa-regular fa-circle-check text-green-500"></i>' &&
                        emailValidationStatus.innerHTML !== '<i class="fa-regular fa-circle-xmark text-red-500"></i>') {
                        emailValidationStatus.classList.add('hidden');
                    }
                }, 1500);
            }
        }
        
        // Event listener untuk validasi email real-time
        if (emailInput) {
            emailInput.addEventListener('input', function(e) {
                const email = e.target.value.trim();
                
                // Reset styling
                emailInput.classList.remove('input-error', 'border-green-400');
                
                if (emailCheckTimeout) clearTimeout(emailCheckTimeout);
                
                if (email.length > 5 && email.includes('@') && email.includes('.')) {
                    emailCheckTimeout = setTimeout(() => {
                        checkEmailExists(email);
                    }, 500);
                } else {
                    emailValidationStatus.classList.add('hidden');
                }
            });
        }
        
        // Validasi password match real-time
        function validatePasswordMatch() {
            const password = passwordInput?.value || '';
            const confirmPassword = confirmPasswordInput?.value || '';
            
            if (confirmPassword.length === 0) {
                passwordMatchStatus.classList.add('hidden');
                return false;
            }
            
            if (password === confirmPassword && password.length > 0) {
                passwordMatchStatus.innerHTML = '<i class="fa-regular fa-check-circle text-green-500"></i> Kata sandi cocok';
                passwordMatchStatus.classList.remove('hidden', 'text-red-500');
                passwordMatchStatus.classList.add('text-green-500');
                confirmPasswordInput.classList.remove('input-error');
                confirmPasswordInput.classList.add('border-green-400');
                return true;
            } else if (confirmPassword.length > 0) {
                passwordMatchStatus.innerHTML = '<i class="fa-regular fa-circle-xmark text-red-500"></i> Kata sandi tidak cocok';
                passwordMatchStatus.classList.remove('hidden', 'text-green-500');
                passwordMatchStatus.classList.add('text-red-500');
                confirmPasswordInput.classList.add('input-error');
                confirmPasswordInput.classList.remove('border-green-400');
                return false;
            }
            return false;
        }
        
        if (passwordInput && confirmPasswordInput) {
            passwordInput.addEventListener('input', validatePasswordMatch);
            confirmPasswordInput.addEventListener('input', validatePasswordMatch);
        }
        
        // Validasi form sebelum submit
        registerForm?.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (isSubmitting) return;
            
            const email = emailInput?.value.trim();
            const password = passwordInput?.value;
            const confirmPassword = confirmPasswordInput?.value;
            
            // Cek apakah email sudah terdaftar
            if (email && email.length > 5) {
                const exists = await checkEmailExists(email);
                if (exists) {
                    return;
                }
            }
            
            // Validasi password match
            if (password !== confirmPassword) {
                Swal.fire({
                    title: '❌ Kesalahan Validasi',
                    text: 'Kata sandi dan konfirmasi kata sandi tidak cocok. Silakan periksa kembali.',
                    icon: 'warning',
                    confirmButtonColor: '#F59E0B',
                    confirmButtonText: 'Perbaiki',
                    timer: 3000,
                    timerProgressBar: true
                });
                confirmPasswordInput?.focus();
                return;
            }
            
            // Validasi panjang password
            if (password && password.length < 8) {
                Swal.fire({
                    title: '❌ Kata Sandi Terlalu Pendek',
                    text: 'Kata sandi minimal harus 8 karakter untuk keamanan akun Anda.',
                    icon: 'warning',
                    confirmButtonColor: '#F59E0B',
                    confirmButtonText: 'Mengerti'
                });
                passwordInput?.focus();
                return;
            }
            
            // Tampilkan loading
            isSubmitting = true;
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<div class="loading-spinner"></div> Memproses...';
            submitBtn.disabled = true;
            
            // Submit form
            try {
                const formData = new FormData(registerForm);
                const response = await fetch(registerForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const result = await response.json();
                
                if (response.ok && result.success) {
                    // Registrasi berhasil
                    Swal.fire({
                        title: '🎉 Pendaftaran Berhasil!',
                        text: 'Akun Anda telah berhasil dibuat. Silakan login untuk melanjutkan pendaftaran PPDB.',
                        icon: 'success',
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: 'Login Sekarang',
                        backdrop: true,
                        allowOutsideClick: false
                    }).then(() => {
                        window.location.href = result.redirect || '/login';
                    });
                } else if (result.errors && result.errors.email) {
                    // Email sudah terdaftar (dari server)
                    Swal.fire({
                        title: '⚠️ Email Sudah Terdaftar!',
                        text: 'Email ' + email + ' sudah terdaftar. Silakan gunakan email lain atau langsung login.',
                        icon: 'error',
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: 'Mengerti'
                    });
                    emailInput?.focus();
                    emailInput?.select();
                } else if (result.message) {
                    Swal.fire({
                        title: '❌ Pendaftaran Gagal',
                        text: result.message,
                        icon: 'error',
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: 'Coba Lagi'
                    });
                } else {
                    throw new Error('Registrasi gagal');
                }
            } catch (error) {
                console.error('Registration error:', error);
                Swal.fire({
                    title: '❌ Terjadi Kesalahan',
                    text: 'Gagal memproses pendaftaran. Silakan coba lagi nanti.',
                    icon: 'error',
                    confirmButtonColor: '#F59E0B',
                    confirmButtonText: 'Coba Lagi'
                });
            } finally {
                isSubmitting = false;
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
        
        // Toggle password visibility untuk field password
        const togglePassword = document.getElementById('togglePassword');
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        }
        
        // Toggle password visibility untuk field confirm password
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        if (toggleConfirmPassword && confirmPasswordInput) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        }
        
        // Animasi partikel dinamis
        const stars = document.querySelectorAll('.star');
        stars.forEach((star) => {
            star.style.animationDuration = `${Math.random() * 3 + 2}s`;
            star.style.animationDelay = `${Math.random() * 5}s`;
        });
        
        // Auto focus pada input nama saat halaman dimuat
        document.getElementById('name')?.focus();
    </script>
</body>

</html>