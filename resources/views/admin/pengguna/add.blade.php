@extends('layouts.admin')

@section('title', 'Tambah Pengguna - PPDB SMAN 1 Batang Gasan')
@section('header', 'Tambah Pengguna')

@section('content')
<style>
    /* Custom styles untuk form tambah pengguna */
    .form-container {
        animation: fadeInUp 0.4s ease-out;
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
    
    /* Card style */
    .form-card {
        border-radius: 28px;
        transition: all 0.3s ease;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.1);
    }
    .form-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
    }
    
    /* Input field modern */
    .input-group {
        position: relative;
        margin-bottom: 1.25rem;
    }
    .input-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        transition: all 0.2s ease;
        pointer-events: none;
    }
    .input-field {
        width: 100%;
        padding: 12px 16px 12px 44px;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #f9fafb;
    }
    .input-field:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        background: white;
    }
    .input-field:hover:not(:focus) {
        border-color: #d1d5db;
        background: #fefefe;
    }
    
    /* Select field modern */
    .select-field {
        width: 100%;
        padding: 12px 16px 12px 44px;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #f9fafb;
        appearance: none;
        cursor: pointer;
    }
    .select-field:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        background: white;
    }
    .select-wrapper {
        position: relative;
    }
    .select-arrow {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        pointer-events: none;
    }
    
    /* Button modern */
    .btn-submit {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        box-shadow: 0 4px 0 #1f2937;
        transform: translateY(-2px);
        border-radius: 16px;
        font-weight: 700;
    }
    .btn-submit:active {
        transform: translateY(2px);
        box-shadow: 0 1px 0 #1f2937;
    }
    
    /* Label style */
    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    .form-label i {
        color: #F59E0B;
        margin-right: 6px;
    }
    
    /* Password toggle */
    .password-toggle {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #9ca3af;
        transition: all 0.2s ease;
        z-index: 10;
    }
    .password-toggle:hover {
        color: #F59E0B;
    }
    
    /* Error message */
    .error-message {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #EF4444;
        font-size: 0.75rem;
        margin-top: 0.5rem;
        padding-left: 12px;
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .form-card {
            border-radius: 20px;
        }
        .input-field, .select-field {
            padding: 10px 14px 10px 40px;
            font-size: 13px;
        }
        .btn-submit {
            padding: 12px;
            font-size: 14px;
        }
        .form-label {
            font-size: 0.8rem;
        }
    }
</style>

<div class="container mx-auto px-4 py-6">
    
    {{-- Header Card --}}
    <div class="mb-6">
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden">
            <div class="px-5 py-6 md:px-7 md:py-7">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-user-plus text-lg"></i>
                            </div>
                            <span class="text-xs font-medium bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Formulir Pendaftaran</span>
                        </div>
                        <h1 class="text-xl md:text-2xl font-bold mb-1">Tambah Pengguna Baru</h1>
                        <p class="text-white/85 text-sm max-w-lg leading-relaxed">
                            Isi formulir di bawah untuk menambahkan pengguna baru ke sistem PPDB SMAN 1 Batang Gasan.
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center">
                            <i class="fa-solid fa-users text-2xl text-white/80"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Alert Component --}}
    @include('components.alert')
    
    {{-- Form Card --}}
    <div class="form-container">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden form-card">
            {{-- Card Header --}}
            <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <i class="fa-regular fa-clipboard text-primary text-sm"></i>
                    </div>
                    <h2 class="text-lg font-bold text-primary">Formulir Tambah Pengguna</h2>
                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full ml-2">Wajib diisi *</span>
                </div>
                <p class="text-xs text-gray-500 mt-2 ml-10">Lengkapi data pengguna dengan benar untuk menghindari kesalahan akses</p>
            </div>
            
            {{-- Form Body --}}
            <form action="{{ route('admin.pengguna.store') }}" method="POST" class="p-6 md:p-8">
                @csrf
                
                {{-- Nama Lengkap --}}
                <div class="input-group">
                    <label for="name" class="form-label">
                        <i class="fa-regular fa-user"></i> Nama Lengkap <span class="text-accent">*</span>
                    </label>
                    <div class="relative">
                        <div class="input-icon">
                            <i class="fa-regular fa-user text-gray-400"></i>
                        </div>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required
                            placeholder="Masukkan nama lengkap pengguna"
                            class="input-field">
                    </div>
                    @error('name')
                        <p class="error-message"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Email --}}
                <div class="input-group">
                    <label for="email" class="form-label">
                        <i class="fa-regular fa-envelope"></i> Alamat Email <span class="text-accent">*</span>
                    </label>
                    <div class="relative">
                        <div class="input-icon">
                            <i class="fa-regular fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            placeholder="contoh@email.com"
                            class="input-field">
                    </div>
                    @error('email')
                        <p class="error-message"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1 ml-11">
                        <i class="fa-regular fa-info-circle"></i> Email akan digunakan untuk login ke sistem
                    </p>
                </div>
                
                {{-- Role --}}
                <div class="input-group">
                    <label for="role" class="form-label">
                        <i class="fa-solid fa-shield-haltered"></i> Role / Hak Akses <span class="text-accent">*</span>
                    </label>
                    <div class="select-wrapper relative">
                        <div class="input-icon">
                            <i class="fa-solid fa-user-tag text-gray-400"></i>
                        </div>
                        <select id="role" name="role" required class="select-field">
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>👑 Admin - Akses penuh ke sistem</option>
                            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>🎓 Siswa - Akses pendaftaran PPDB</option>
                            <option value="kepala" {{ old('role') == 'kepala' ? 'selected' : '' }}>🏛️ Kepala Sekolah - Akses laporan & pengumuman</option>
                        </select>
                        <div class="select-arrow">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-1 ml-11">
                        <i class="fa-regular fa-lightbulb text-accent"></i> Role menentukan hak akses pengguna dalam sistem
                    </p>
                </div>
                
                {{-- Password --}}
                <div class="input-group">
                    <label for="password" class="form-label">
                        <i class="fa-solid fa-lock"></i> Kata Sandi <span class="text-accent">*</span>
                    </label>
                    <div class="relative">
                        <div class="input-icon">
                            <i class="fa-solid fa-key text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            placeholder="Minimal 8 karakter"
                            class="input-field pr-12">
                        <button type="button" id="togglePassword" class="password-toggle">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="error-message"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1 ml-11">
                        <i class="fa-regular fa-shield-check text-accent"></i> Kata sandi minimal 8 karakter untuk keamanan
                    </p>
                </div>
                
                {{-- Konfirmasi Password --}}
                <div class="input-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fa-solid fa-lock"></i> Konfirmasi Kata Sandi <span class="text-accent">*</span>
                    </label>
                    <div class="relative">
                        <div class="input-icon">
                            <i class="fa-solid fa-check-circle text-gray-400"></i>
                        </div>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            placeholder="Ulangi kata sandi Anda"
                            class="input-field pr-12">
                        <button type="button" id="toggleConfirmPassword" class="password-toggle">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <div id="passwordMatchStatus" class="text-xs mt-1 ml-11 hidden"></div>
                </div>
                
                {{-- Informasi Tambahan --}}
                <div class="bg-primary/5 rounded-xl p-4 mt-4 mb-6">
                    <div class="flex items-start gap-3">
                        <i class="fa-regular fa-circle-info text-accent text-lg mt-0.5"></i>
                        <div>
                            <p class="text-sm font-semibold text-primary">Informasi Penting</p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Setelah pengguna berhasil ditambahkan, mereka akan dapat login menggunakan email dan kata sandi yang telah ditentukan. 
                                Pastikan data yang dimasukkan akurat.
                            </p>
                        </div>
                    </div>
                </div>
                
                {{-- Tombol Submit --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <button type="submit" class="btn-submit w-full py-3 text-white font-bold flex items-center justify-center gap-2 transition-all duration-300">
                        <i class="fa-solid fa-save"></i> SIMPAN PENGGUNA
                    </button>
                    <a href="{{ route('admin.pengguna.index') }}" 
                       class="w-full py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-all duration-300 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-arrow-left"></i> BATAL
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

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
    
    // Toggle confirm password visibility
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const passwordMatchStatus = document.getElementById('passwordMatchStatus');
    
    if (toggleConfirmPassword && confirmPasswordInput) {
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    }
    
    // Real-time password match validation
    if (passwordInput && confirmPasswordInput && passwordMatchStatus) {
        function validatePasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (confirmPassword.length === 0) {
                passwordMatchStatus.classList.add('hidden');
                passwordMatchStatus.classList.remove('text-green-500', 'text-red-500');
                return;
            }
            
            if (password === confirmPassword) {
                passwordMatchStatus.innerHTML = '<i class="fa-regular fa-check-circle"></i> Kata sandi cocok';
                passwordMatchStatus.classList.remove('hidden', 'text-red-500');
                passwordMatchStatus.classList.add('text-green-500');
                confirmPasswordInput.style.borderColor = '#10b981';
            } else {
                passwordMatchStatus.innerHTML = '<i class="fa-regular fa-circle-xmark"></i> Kata sandi tidak cocok';
                passwordMatchStatus.classList.remove('hidden', 'text-green-500');
                passwordMatchStatus.classList.add('text-red-500');
                confirmPasswordInput.style.borderColor = '#ef4444';
            }
        }
        
        passwordInput.addEventListener('keyup', validatePasswordMatch);
        confirmPasswordInput.addEventListener('keyup', validatePasswordMatch);
        
        // Reset border color on focus
        confirmPasswordInput.addEventListener('focus', function() {
            this.style.borderColor = '#e5e7eb';
        });
    }
    
    // Password strength indicator (optional)
    if (passwordInput) {
        passwordInput.addEventListener('keyup', function() {
            const password = this.value;
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;
            
            // Optional: bisa ditambahkan indikator kekuatan password
        });
    }
    
    // Auto focus pada input pertama
    document.getElementById('name')?.focus();
</script>
@endsection