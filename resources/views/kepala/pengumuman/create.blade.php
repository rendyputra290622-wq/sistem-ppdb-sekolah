@extends('layouts.kepala')

@section('title', 'Buat Pengumuman - SMAN 1 Batang Gasan')
@section('header', 'Buat Pengumuman Baru')

@section('content')
<style>
    /* Custom styles untuk form pengumuman */
    .form-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
    }
    .form-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
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
        width: 18px;
    }
    
    .input-field, .textarea-field {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #f9fafb;
    }
    .input-field:focus, .textarea-field:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        background: white;
    }
    .input-field.error, .textarea-field.error {
        border-color: #EF4444;
        background: #FEF2F2;
    }
    
    .file-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #f9fafb;
        cursor: pointer;
    }
    .file-input:hover {
        border-color: #F59E0B;
        background: #fffbeb;
    }
    
    .btn-primary {
        transition: all 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        background: linear-gradient(135deg, #374151, #4B5563);
        border-radius: 60px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        position: relative;
        overflow: hidden;
    }
    .btn-primary::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.4s, height 0.4s;
    }
    .btn-primary:active::after {
        width: 200px;
        height: 200px;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        filter: brightness(1.02);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.25);
    }
    .btn-primary:active {
        transform: translateY(1px);
    }
    .btn-primary:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }
    
    .btn-secondary {
        transition: all 0.2s ease;
        cursor: pointer;
        border-radius: 60px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: #f3f4f6;
        color: #4B5563;
    }
    .btn-secondary:hover {
        background: #e5e7eb;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .btn-secondary:active {
        transform: translateY(1px);
    }
    
    /* Checkbox custom modern */
    .checkbox-custom {
        position: relative;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        gap: 10px;
        padding: 8px 16px;
        background: #f9fafb;
        border-radius: 40px;
        transition: all 0.2s ease;
    }
    .checkbox-custom:hover {
        background: #f3f4f6;
    }
    .checkbox-custom input {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #F59E0B;
    }
    .checkbox-custom span {
        font-size: 14px;
        color: #374151;
    }
    
    /* Alert info */
    .info-box {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border-left: 4px solid #3b82f6;
        border-radius: 16px;
        padding: 14px 18px;
    }
    
    /* Loading spinner */
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .loading-spinner {
        display: inline-block;
        width: 18px;
        height: 18px;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 0.6s linear infinite;
        margin-right: 8px;
    }
    
    /* Tooltip untuk file info */
    .file-info {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 12px;
        padding: 8px 12px;
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #166534;
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .form-card {
            border-radius: 20px;
        }
        .input-field, .textarea-field, .file-input {
            padding: 10px 14px;
            font-size: 13px;
        }
        .btn-primary, .btn-secondary {
            padding: 10px 20px;
            font-size: 14px;
            width: 100%;
            justify-content: center;
        }
        .action-buttons {
            flex-direction: column;
            gap: 10px;
        }
        .form-label {
            font-size: 0.8rem;
        }
        .checkbox-custom {
            padding: 6px 12px;
            width: 100%;
        }
        .checkbox-custom span {
            font-size: 12px;
        }
    }
    
    /* Animasi fade in */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.3s ease-out;
    }
</style>

<div class="max-w-3xl mx-auto px-4 py-6">
    
    {{-- Header Card dengan Animasi --}}
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden mb-6 animate-fade-in">
        <div class="px-6 py-6 md:px-8 md:py-7">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center animate-pulse">
                            <i class="fa-regular fa-bullhorn text-lg"></i>
                        </div>
                        <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">📢 Pengumuman Resmi</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-extrabold mb-1 tracking-tight">Buat Pengumuman Baru</h1>
                    <p class="text-white/85 text-sm max-w-lg leading-relaxed">Buat dan publikasikan pengumuman untuk siswa, orang tua, dan seluruh warga sekolah</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-regular fa-newspaper text-2xl text-white/90"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden form-card border border-gray-100 animate-fade-in">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center gap-2 flex-wrap">
                <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center shadow-sm">
                    <i class="fa-regular fa-pen-to-square text-white text-sm"></i>
                </div>
                <h2 class="text-base md:text-lg font-bold text-primary">Formulir Pengumuman</h2>
                <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full ml-2">
                    <i class="fa-regular fa-clock"></i> Publikasi
                </span>
                <span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded-full">
                    <i class="fa-regular fa-circle-check"></i> Wajib diisi *
                </span>
            </div>
            <p class="text-xs text-gray-500 mt-2 ml-10">Isi data dengan lengkap dan benar untuk membuat pengumuman</p>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="{{ route('kepala.pengumuman.store') }}" method="POST" enctype="multipart/form-data" id="pengumumanForm">
                @csrf
                
                <!-- Judul Pengumuman -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-regular fa-heading"></i> Judul Pengumuman <span class="text-accent">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-regular fa-file-lines text-gray-400 text-sm"></i>
                        </div>
                        <input type="text" name="judul" value="{{ old('judul') }}" 
                            class="input-field pl-10 @error('judul') error @enderror"
                            placeholder="Contoh: Pengumuman Hasil Seleksi PPDB 2026"
                            required>
                    </div>
                    @error('judul')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">
                        <i class="fa-regular fa-info-circle"></i> Gunakan judul yang jelas dan informatif
                    </p>
                </div>
                
                <!-- Isi Pengumuman -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-regular fa-message"></i> Isi Pengumuman <span class="text-accent">*</span>
                    </label>
                    <textarea name="isi" rows="6" 
                        class="textarea-field @error('isi') error @enderror"
                        placeholder="Tulis isi pengumuman di sini...&#10;&#10;Contoh:&#10;Diumumkan kepada seluruh siswa bahwa...">{{ old('isi') }}</textarea>
                    @error('isi')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                    <div class="flex items-center gap-3 mt-1 text-xs text-gray-400">
                        <span><i class="fa-regular fa-keyboard"></i> Gunakan Enter untuk paragraf baru</span>
                        <span><i class="fa-regular fa-face-smile"></i> Gunakan bahasa yang sopan</span>
                    </div>
                </div>
                
                <!-- Lampiran (Opsional) -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-regular fa-paperclip"></i> Lampiran <span class="text-gray-400 text-xs">(Opsional)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-regular fa-folder-open text-gray-400 text-sm"></i>
                        </div>
                        <input type="file" name="lampiran" id="lampiran" 
                            class="file-input pl-10 @error('lampiran') error @enderror" 
                            accept=".pdf,.jpg,.png,.jpeg,.doc,.docx">
                    </div>
                    <div id="fileInfo" class="hidden file-info animate-fade-in">
                        <i class="fa-regular fa-file-pdf text-green-600"></i>
                        <span id="fileName"></span>
                        <button type="button" onclick="clearFile()" class="ml-auto text-red-500 hover:text-red-700">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </div>
                    <div class="flex flex-wrap gap-3 mt-2 text-xs text-gray-400">
                        <span><i class="fa-regular fa-circle-check text-accent"></i> Format: PDF, JPG, PNG, JPEG, DOC, DOCX</span>
                        <span><i class="fa-regular fa-hard-drive text-accent"></i> Maksimal 2 MB</span>
                    </div>
                    @error('lampiran')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Opsi Tampilan -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-solid fa-eye"></i> Opsi Tampilan
                    </label>
                    <div class="flex flex-wrap gap-2">
                        <label class="checkbox-custom">
                            <input type="checkbox" name="only_accepted" id="only_accepted" value="1" {{ old('only_accepted') ? 'checked' : '' }}>
                            <span><i class="fa-regular fa-circle-check"></i> Hanya untuk siswa yang <strong class="text-accent">Diterima</strong></span>
                        </label>
                    </div>
                    <div class="mt-2 p-2 bg-amber-50 rounded-lg text-xs text-amber-700 flex items-center gap-2">
                        <i class="fa-regular fa-lightbulb text-accent"></i>
                        <span>Centang opsi di atas jika pengumuman ini hanya untuk siswa yang sudah dinyatakan diterima</span>
                    </div>
                </div>
                
                <!-- Informasi Tambahan -->
                <div class="info-box mb-6">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fa-regular fa-circle-info text-blue-500 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-blue-800">📋 Informasi Penting</p>
                            <p class="text-xs text-blue-700 mt-1 leading-relaxed">
                                Pengumuman yang sudah dipublikasikan akan langsung terlihat oleh siswa di dashboard mereka.
                                Pastikan isi pengumuman sudah benar dan tidak mengandung kesalahan sebelum disimpan.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Tombol Aksi -->
                <div class="flex flex-wrap justify-end gap-3 pt-4 border-t border-gray-100 action-buttons">
                    <a href="{{ route('kepala.pengumuman.index') }}" class="btn-secondary" id="cancelBtn">
                        <i class="fa-regular fa-times"></i> Batal
                    </a>
                    <button type="submit" id="submitBtn" class="btn-primary">
                        <i class="fa-regular fa-paper-plane"></i> Publikasikan
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    {{-- Panduan Singkat --}}
    <div class="mt-6 bg-gradient-to-r from-gray-50 to-white rounded-2xl p-4 border border-gray-100 animate-fade-in">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-accent/15 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-circle-question text-accent text-lg"></i>
                </div>
                <div>
                    <p class="font-bold text-primary text-sm">💡 Panduan Singkat Membuat Pengumuman</p>
                    <p class="text-xs text-gray-500">Pengumuman akan langsung muncul di dashboard siswa</p>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 text-xs">
                <span class="flex items-center gap-1 text-gray-600"><i class="fa-regular fa-circle-check text-accent"></i> Judul jelas & spesifik</span>
                <span class="flex items-center gap-1 text-gray-600"><i class="fa-regular fa-circle-check text-accent"></i> Isi informatif & mudah dipahami</span>
                <span class="flex items-center gap-1 text-gray-600"><i class="fa-regular fa-circle-check text-accent"></i> Lampiran jika diperlukan</span>
            </div>
        </div>
    </div>
</div>

<script>
    // Tampilkan nama file yang dipilih
    const fileInput = document.getElementById('lampiran');
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    
    function clearFile() {
        fileInput.value = '';
        fileInfo.classList.add('hidden');
    }
    
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const maxSize = 2 * 1024 * 1024; // 2MB
                const allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                
                if (file.size > maxSize) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ukuran file terlalu besar! Maksimal 2MB.',
                        icon: 'error',
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: 'OK'
                    });
                    this.value = '';
                    fileInfo.classList.add('hidden');
                    return;
                }
                
                if (!allowedTypes.includes(file.type)) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Format file tidak didukung! Gunakan PDF, JPG, PNG, atau DOC/DOCX.',
                        icon: 'error',
                        confirmButtonColor: '#F59E0B',
                        confirmButtonText: 'OK'
                    });
                    this.value = '';
                    fileInfo.classList.add('hidden');
                    return;
                }
                
                fileName.textContent = file.name;
                fileInfo.classList.remove('hidden');
            } else {
                fileInfo.classList.add('hidden');
            }
        });
    }
    
    // Validasi form sebelum submit dengan SweetAlert
    const form = document.getElementById('pengumumanForm');
    const submitBtn = document.getElementById('submitBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            const judul = document.querySelector('input[name="judul"]');
            const isi = document.querySelector('textarea[name="isi"]');
            
            // Reset error styling
            document.querySelectorAll('.input-field, .textarea-field').forEach(el => {
                el.classList.remove('error');
            });
            
            if (!judul.value.trim()) {
                judul.classList.add('error');
                Swal.fire({
                    title: '⚠️ Data Belum Lengkap',
                    text: 'Judul pengumuman wajib diisi!',
                    icon: 'warning',
                    confirmButtonColor: '#F59E0B',
                    confirmButtonText: 'Perbaiki'
                });
                judul.focus();
                e.preventDefault();
                return;
            }
            
            if (!isi.value.trim()) {
                isi.classList.add('error');
                Swal.fire({
                    title: '⚠️ Data Belum Lengkap',
                    text: 'Isi pengumuman wajib diisi!',
                    icon: 'warning',
                    confirmButtonColor: '#F59E0B',
                    confirmButtonText: 'Perbaiki'
                });
                isi.focus();
                e.preventDefault();
                return;
            }
            
            // Konfirmasi sebelum submit
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mempublikasikan pengumuman ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10B981',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Ya, Publikasikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading state
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span class="loading-spinner"></span> Menyimpan...';
                    submitBtn.disabled = true;
                    
                    // Submit form
                    form.submit();
                }
            });
        });
    }
    
    // Efek klik pada tombol
    document.querySelectorAll('.btn-primary, .btn-secondary').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!this.disabled && this.id !== 'submitBtn') {
                this.style.transform = 'scale(0.97)';
                setTimeout(() => {
                    if (this) this.style.transform = '';
                }, 150);
            }
        });
    });
    
    // Auto focus pada input judul
    document.querySelector('input[name="judul"]')?.focus();
    
    // SweetAlert untuk error dari server (jika ada)
    @if($errors->any())
        Swal.fire({
            title: '❌ Terjadi Kesalahan',
            text: '{{ $errors->first() }}',
            icon: 'error',
            confirmButtonColor: '#F59E0B',
            confirmButtonText: 'OK'
        });
    @endif
</script>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection