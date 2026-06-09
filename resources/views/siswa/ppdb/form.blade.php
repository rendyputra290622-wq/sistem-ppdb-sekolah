@extends('layouts.siswa')

@section('title', 'Formulir Pendaftaran PPDB - SMAN 1 Batang Gasan')
@section('header', 'Formulir Pendaftaran PPDB')

@section('content')
<style>
    /* Custom styles untuk form */
    .form-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
    }
    .form-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
    }
    
    .input-group {
        margin-bottom: 1.25rem;
    }
    
    .input-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    
    .input-label i {
        color: #F59E0B;
        margin-right: 6px;
    }
    
    .input-field {
        width: 100%;
        padding: 12px 16px;
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
    
    .input-field:disabled, .input-field[readonly] {
        background: #f3f4f6;
        cursor: not-allowed;
        color: #6b7280;
    }
    
    select.input-field {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 20px;
        padding-right: 40px;
    }
    
    .btn-submit {
        transition: all 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        background: linear-gradient(135deg, #374151, #4B5563);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 60px;
        font-weight: 700;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        filter: brightness(1.02);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.25);
    }
    .btn-submit:active {
        transform: translateY(1px);
    }
    
    .section-title {
        font-size: 1.125rem;
        font-weight: 800;
        margin: 1.5rem 0 1rem 0;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #F59E0B;
        display: inline-block;
        color: #374151;
    }
    
    /* Info box */
    .info-box {
        background: linear-gradient(135deg, #fef3c7, #fffbeb);
        border-left: 4px solid #F59E0B;
        border-radius: 16px;
        padding: 12px 16px;
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .input-field {
            padding: 10px 14px;
            font-size: 13px;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
        }
        .section-title {
            font-size: 1rem;
        }
    }
</style>

<div class="max-w-4xl mx-auto">
    
    {{-- Alert Component --}}
    @include('components.alert')

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden form-card border border-gray-100">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-pen-to-square text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-white text-xl font-extrabold">Formulir Pendaftaran PPDB</h2>
                    <p class="text-white/80 text-sm">Isi data dengan lengkap dan benar</p>
                </div>
            </div>
        </div>
        
        {{-- Form Body --}}
        <div class="p-6 md:p-8">
            
            {{-- Informasi User --}}
            <div class="info-box mb-6">
                <div class="flex items-center gap-2 text-sm">
                    <i class="fa-regular fa-user text-accent"></i>
                    <span class="text-gray-600">Nama Pengguna:</span>
                    <span class="font-semibold text-primary">{{ auth()->user()->name }}</span>
                </div>
            </div>
            
            <form action="{{ route('siswa.ppdb.store') }}" method="POST" enctype="multipart/form-data" id="ppdbForm">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    {{-- Tahun Ajaran --}}
                    <div class="input-group">
                        <label class="input-label">
                            <i class="fa-regular fa-calendar"></i> Tahun Ajaran
                        </label>
                        <input type="text" name="tahun_ajaran" class="input-field" value="2026/2027" readonly>
                    </div>
                    
                    {{-- Jalur Pendaftaran --}}
                    <div class="input-group">
                        <label class="input-label">
                            <i class="fa-solid fa-road"></i> Jalur Pendaftaran
                        </label>
                        <select name="jalur" id="jalur" required class="input-field" onchange="handleJalurChange(this.value)">
                            <option value="">-- Pilih Jalur --</option>
                            <option value="reguler">📚 Reguler</option>
                            <option value="prestasi">🏆 Prestasi</option>
                            <option value="afirmasi">🤝 Afirmasi</option>
                            <option value="pindahan">🔄 Perpindahan Orang Tua</option>
                        </select>
                        @error('jalur') 
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fa-regular fa-circle-exclamation"></i> {{ $message }}</p> 
                        @enderror
                    </div>
                </div>
                
                {{-- Dokumen Wajib --}}
                <div class="section-title">
                    <i class="fa-regular fa-folder-open mr-2 text-accent"></i> Dokumen Wajib
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-3">
                    <div class="input-group">
                        <label class="input-label">
                            <i class="fa-regular fa-id-card"></i> Kartu Keluarga
                        </label>
                        <input type="file" name="kartu_keluarga" class="input-field" accept=".pdf,.jpg,.jpeg,.png" required>
                        <p class="text-xs text-gray-400 mt-1">Format PDF/JPG/PNG (Max 2MB)</p>
                    </div>
                    <div class="input-group">
                        <label class="input-label">
                            <i class="fa-regular fa-file-pdf"></i> Akta Kelahiran
                        </label>
                        <input type="file" name="akta_kelahiran" class="input-field" accept=".pdf,.jpg,.jpeg,.png" required>
                        <p class="text-xs text-gray-400 mt-1">Format PDF/JPG/PNG (Max 2MB)</p>
                    </div>
                </div>
                
                {{-- Dokumen Khusus Prestasi --}}
                <div id="prestasiFields" class="hidden">
                    <div class="section-title">
                        <i class="fa-solid fa-trophy mr-2 text-accent"></i> Dokumen Jalur Prestasi
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-3">
                        <div class="input-group">
                            <label class="input-label">
                                <i class="fa-regular fa-file-lines"></i> Rapor Semester 1-5
                            </label>
                            <input type="file" name="rapor" id="raporInput" class="input-field" accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-400 mt-1">Format PDF/JPG/PNG (Max 2MB)</p>
                        </div>
                        <div class="input-group" id="nilaiRaporContainer">
                            <label class="input-label">
                                <i class="fa-solid fa-chart-line"></i> Nilai Rata-rata Rapor
                            </label>
                            <input type="number" name="nilai_rapor" step="0.01" min="0" max="100" class="input-field" placeholder="Contoh: 85.50">
                        </div>
                        <div class="input-group">
                            <label class="input-label">
                                <i class="fa-regular fa-certificate"></i> Sertifikat Prestasi
                            </label>
                            <input type="file" name="sertifikat" class="input-field" accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-400 mt-1">Opsional (Max 2MB)</p>
                        </div>
                    </div>
                </div>
                
                {{-- Dokumen Khusus Afirmasi --}}
                <div id="afirmasiFields" class="hidden">
                    <div class="section-title">
                        <i class="fa-solid fa-hand-holding-heart mr-2 text-accent"></i> Dokumen Jalur Afirmasi
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-3">
                        <div class="input-group">
                            <label class="input-label">
                                <i class="fa-regular fa-receipt"></i> Bukti KIP/PKH
                            </label>
                            <input type="file" name="bukti_kip_pkh" class="input-field" accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-400 mt-1">Format PDF/JPG/PNG (Max 2MB)</p>
                        </div>
                        <div class="input-group">
                            <label class="input-label">
                                <i class="fa-regular fa-handicap"></i> Surat Disabilitas (jika ada)
                            </label>
                            <input type="file" name="surat_disabilitas" class="input-field" accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-400 mt-1">Opsional</p>
                        </div>
                    </div>
                </div>
                
                {{-- Dokumen Khusus Perpindahan --}}
                <div id="pindahanFields" class="hidden">
                    <div class="section-title">
                        <i class="fa-solid fa-arrow-right-arrow-left mr-2 text-accent"></i> Dokumen Jalur Perpindahan
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-3">
                        <div class="input-group">
                            <label class="input-label">
                                <i class="fa-regular fa-envelope"></i> Surat Penugasan Orang Tua
                            </label>
                            <input type="file" name="surat_penugasan" class="input-field" accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-400 mt-1">Format PDF/JPG/PNG (Max 2MB)</p>
                        </div>
                        <div class="input-group">
                            <label class="input-label">
                                <i class="fa-regular fa-arrow-right-arrow-left"></i> Surat Pindah
                            </label>
                            <input type="file" name="surat_pindah" class="input-field" accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-400 mt-1">Format PDF/JPG/PNG (Max 2MB)</p>
                        </div>
                    </div>
                </div>
                
                {{-- Catatan Penting --}}
                <div class="info-box mt-6">
                    <div class="flex items-start gap-2">
                        <i class="fa-regular fa-circle-info text-accent text-lg mt-0.5"></i>
                        <div>
                            <p class="text-sm font-semibold text-primary">📋 Catatan Penting</p>
                            <p class="text-xs text-gray-600">Pastikan semua dokumen yang diunggah sudah benar dan sesuai dengan persyaratan. Dokumen yang tidak sesuai dapat menyebabkan penolakan pendaftaran.</p>
                        </div>
                    </div>
                </div>
                
                {{-- Tombol Submit --}}
                <div class="mt-6 text-center">
                    <button type="submit" class="btn-submit px-8 py-3 text-white font-bold flex items-center justify-center gap-2 mx-auto">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Elemen DOM
    const jalurSelect = document.getElementById('jalur');
    const prestasiFields = document.getElementById('prestasiFields');
    const afirmasiFields = document.getElementById('afirmasiFields');
    const pindahanFields = document.getElementById('pindahanFields');
    const nilaiRaporContainer = document.getElementById('nilaiRaporContainer');
    const raporInput = document.getElementById('raporInput');
    
    // Fungsi handle perubahan jalur
    function handleJalurChange(value) {
        // Sembunyikan semua field khusus
        if (prestasiFields) prestasiFields.classList.add('hidden');
        if (afirmasiFields) afirmasiFields.classList.add('hidden');
        if (pindahanFields) pindahanFields.classList.add('hidden');
        
        // Tampilkan field sesuai jalur yang dipilih
        if (value === 'prestasi') {
            if (prestasiFields) prestasiFields.classList.remove('hidden');
            if (raporInput) raporInput.required = true;
        } else if (value === 'afirmasi') {
            if (afirmasiFields) afirmasiFields.classList.remove('hidden');
            if (raporInput) raporInput.required = false;
        } else if (value === 'pindahan') {
            if (pindahanFields) pindahanFields.classList.remove('hidden');
            if (raporInput) raporInput.required = false;
        } else {
            if (raporInput) raporInput.required = false;
        }
    }
    
    // Validasi file sebelum submit
    function validateFile(file, fieldName) {
        const maxSize = 2 * 1024 * 1024; // 2MB
        const allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
        
        if (file && file.size > maxSize) {
            alert(`❌ Ukuran file ${fieldName} terlalu besar! Maksimal 2MB.`);
            return false;
        }
        
        if (file && !allowedTypes.includes(file.type)) {
            alert(`❌ Format file ${fieldName} tidak didukung! Gunakan PDF, JPG, JPEG, atau PNG.`);
            return false;
        }
        
        return true;
    }
    
    // Event listener untuk validasi file pada semua input file
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const label = this.previousElementSibling?.innerText || this.name;
            if (file) {
                if (!validateFile(file, label)) {
                    this.value = '';
                }
            }
        });
    });
    
    // Event listener untuk form submit
    document.getElementById('ppdbForm')?.addEventListener('submit', function(e) {
        // Validasi jalur harus dipilih
        if (!jalurSelect.value) {
            e.preventDefault();
            alert('❌ Silakan pilih jalur pendaftaran terlebih dahulu!');
            jalurSelect.focus();
            return;
        }
        
        // Validasi file wajib
        const kartuKeluarga = document.querySelector('input[name="kartu_keluarga"]');
        const aktaKelahiran = document.querySelector('input[name="akta_kelahiran"]');
        
        if (!kartuKeluarga.files.length) {
            e.preventDefault();
            alert('❌ Kartu Keluarga wajib diunggah!');
            kartuKeluarga.focus();
            return;
        }
        
        if (!aktaKelahiran.files.length) {
            e.preventDefault();
            alert('❌ Akta Kelahiran wajib diunggah!');
            aktaKelahiran.focus();
            return;
        }
        
        // Validasi khusus jalur prestasi
        if (jalurSelect.value === 'prestasi') {
            const rapor = document.querySelector('input[name="rapor"]');
            if (!rapor.files.length) {
                e.preventDefault();
                alert('❌ Rapor wajib diunggah untuk jalur Prestasi!');
                rapor.focus();
                return;
            }
        }
        
        // Konfirmasi pengiriman
        if (!confirm('⚠️ Pastikan semua data dan dokumen sudah benar.\n\nLanjutkan pengiriman pendaftaran?')) {
            e.preventDefault();
        }
    });
    
    // Jalankan saat halaman dimuat
    document.addEventListener("DOMContentLoaded", function () {
        const selected = jalurSelect?.value;
        if (selected) {
            handleJalurChange(selected);
        }
        
        // Set default tahun ajaran
        const tahunAjaran = document.querySelector('input[name="tahun_ajaran"]');
        if (tahunAjaran && !tahunAjaran.value) {
            tahunAjaran.value = '2026/2027';
        }
    });
    
    // Efek klik pada tombol submit
    document.querySelector('.btn-submit')?.addEventListener('click', function(e) {
        this.style.transform = 'scale(0.98)';
        setTimeout(() => {
            this.style.transform = '';
        }, 150);
    });
</script>
@endsection