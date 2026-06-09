@extends('layouts.siswa')

@section('title', 'Profil Pendaftar - SMAN 1 Batang Gasan')
@section('header', 'Profil Pendaftaran')

@section('content')
<style>
    /* Custom styles untuk profil */
    .profile-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 28px;
    }
    .profile-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
    }
    
    .info-section {
        background: #f9fafb;
        border-radius: 20px;
        padding: 20px;
    }
    
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 700;
    }
    .badge-pending {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
    }
    .badge-accepted {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
    }
    .badge-rejected {
        background: linear-gradient(135deg, #EF4444, #DC2626);
        color: white;
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
    .input-field.error {
        border-color: #EF4444;
        background: #FEF2F2;
    }
    .input-field.completed {
        border-color: #10B981;
        background: #F0FDF4;
    }
    
    .btn-save {
        transition: all 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        background: linear-gradient(135deg, #374151, #4B5563);
        border-radius: 60px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        transform: translateY(-2px);
        filter: brightness(1.02);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.25);
    }
    .btn-save:active {
        transform: translateY(1px);
    }
    .btn-save.disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
    
    .doc-table {
        width: 100%;
        border-collapse: collapse;
    }
    .doc-table tr {
        border-bottom: 1px solid #e5e7eb;
    }
    .doc-table tr:last-child {
        border-bottom: none;
    }
    .doc-table td {
        padding: 12px 0;
    }
    .doc-link {
        color: #F59E0B;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    .doc-link:hover {
        text-decoration: underline;
        color: #D97706;
    }
    
    /* Required field indicator */
    .required-star {
        color: #EF4444;
        margin-left: 4px;
    }
    
    /* Progress bar */
    .progress-bar {
        height: 6px;
        background: #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #10B981, #059669);
        border-radius: 10px;
        transition: width 0.3s ease;
    }
    
    /* Responsive */
    @media (max-width: 640px) {
        .info-section {
            padding: 16px;
        }
        .input-field {
            padding: 10px 14px;
            font-size: 13px;
        }
        .btn-save {
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

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="max-w-5xl mx-auto">
    
    {{-- Alert Session --}}
    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#F59E0B',
                confirmButtonText: 'OK',
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    @endif
    
    @if(session('error'))
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonColor: '#F59E0B',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    {{-- Main Card --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden profile-card border border-gray-100">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fa-regular fa-user text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-white text-xl font-extrabold">Profil Pendaftaran</h2>
                    <p class="text-white/80 text-sm">Informasi lengkap data pendaftaran Anda</p>
                </div>
            </div>
        </div>
        
        {{-- Body --}}
        <div class="p-6 md:p-8">
            
            @if (!$ppdbPendaftaran)
                {{-- Data Tidak Ditemukan --}}
                <div class="text-center py-10">
                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-regular fa-circle-xmark text-red-400 text-4xl"></i>
                    </div>
                    <p class="text-red-500 font-medium text-lg">❌ Data Pendaftaran Tidak Ditemukan</p>
                    <p class="text-gray-400 text-sm mt-2">Silakan lakukan pendaftaran terlebih dahulu melalui menu "Formulir PPDB".</p>
                    <div class="mt-6">
                        <a href="{{ route('siswa.ppdb.form') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-accent to-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition">
                            <i class="fa-regular fa-pen-to-square"></i> Isi Formulir Pendaftaran
                        </a>
                    </div>
                </div>
            @else
                {{-- Status Pendaftaran --}}
                <div class="info-section mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fa-solid fa-road text-accent"></i>
                                <span class="text-sm text-gray-500">Jalur Pendaftaran</span>
                            </div>
                            <p class="text-lg font-bold text-primary">{{ ucfirst($ppdbPendaftaran->jalur) }}</p>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fa-regular fa-clock text-accent"></i>
                                <span class="text-sm text-gray-500">Status Saat Ini</span>
                            </div>
                            @php
                                $statusBadge = match($ppdbPendaftaran->status) {
                                    'pending' => ['class' => 'badge-pending', 'icon' => 'fa-regular fa-hourglass-half', 'text' => 'Menunggu Verifikasi'],
                                    'accepted' => ['class' => 'badge-accepted', 'icon' => 'fa-regular fa-circle-check', 'text' => 'Diterima'],
                                    'rejected' => ['class' => 'badge-rejected', 'icon' => 'fa-regular fa-circle-xmark', 'text' => 'Ditolak'],
                                    'cadangan' => ['class' => 'badge-pending', 'icon' => 'fa-solid fa-clock', 'text' => 'Cadangan'],
                                    default => ['class' => 'badge-pending', 'icon' => 'fa-regular fa-hourglass-half', 'text' => ucfirst($ppdbPendaftaran->status)],
                                };
                            @endphp
                            <span class="badge-status {{ $statusBadge['class'] }}">
                                <i class="{{ $statusBadge['icon'] }}"></i> {{ $statusBadge['text'] }}
                            </span>
                        </div>
                    </div>
                </div>
                
                {{-- Status Dokumen --}}
                <div class="info-section mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-regular fa-folder-open text-accent"></i>
                        <h3 class="text-lg font-bold text-primary">Status Dokumen</h3>
                    </div>
                    <table class="doc-table">
                        @php
                            $dokumenList = [
                                'kartu_keluarga' => ['label' => 'Kartu Keluarga', 'icon' => 'fa-regular fa-id-card'],
                                'akta_kelahiran' => ['label' => 'Akta Kelahiran', 'icon' => 'fa-regular fa-file-pdf'],
                                'rapor' => ['label' => 'Rapor', 'icon' => 'fa-regular fa-file-lines'],
                                'sertifikat' => ['label' => 'Sertifikat', 'icon' => 'fa-regular fa-certificate'],
                            ];
                        @endphp
                        @foreach ($dokumenList as $key => $item)
                            <tr>
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <i class="{{ $item['icon'] }} text-accent w-5"></i>
                                        <span class="font-medium text-gray-700">{{ $item['label'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-right">
                                    @if ($dokumen && $dokumen->{$key})
                                        <a href="{{ route('siswa.dokumen.show', ['user_id' => auth()->id(), 'tipe' => $key]) }}" target="_blank" class="doc-link flex items-center justify-end gap-1">
                                            <i class="fa-regular fa-eye"></i> Lihat Dokumen
                                        </a>
                                    @else
                                        <span class="text-red-400 text-sm flex items-center justify-end gap-1">
                                            <i class="fa-regular fa-circle-xmark"></i> Belum Ada
                                        </span>
                                    @endif
                                </td>
                            </table>
                        @endforeach
                    </table>
                </div>
                
                {{-- Form Edit Biodata (hanya jika status diterima) --}}
                @if($ppdbPendaftaran->status !== 'accepted')
                    <div class="bg-yellow-50 rounded-xl p-4 border-l-4 border-yellow-500 flex items-start gap-3">
                        <i class="fa-regular fa-lock text-yellow-600 text-lg"></i>
                        <div>
                            <p class="text-sm font-semibold text-yellow-800">🔒 Formulir Biodata Terkunci</p>
                            <p class="text-xs text-yellow-700 mt-1">Anda belum dapat mengisi atau mengedit biodata sebelum pendaftaran diterima oleh panitia.</p>
                        </div>
                    </div>
                @else
                    @php
                        // Hitung kelengkapan data
                        $requiredFields = [
                            'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 
                            'jenis_kelamin', 'agama', 'alamat', 'no_hp', 'asal_sekolah',
                            'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'no_hp_ortu'
                        ];
                        $filledCount = 0;
                        foreach ($requiredFields as $field) {
                            if (!empty($siswa->$field)) {
                                $filledCount++;
                            }
                        }
                        $totalFields = count($requiredFields);
                        $progressPercent = ($filledCount / $totalFields) * 100;
                        $isDataComplete = ($filledCount == $totalFields);
                    @endphp
                    
                    {{-- Progress Kelengkapan Data --}}
                    <div class="mb-6 p-4 bg-gray-50 rounded-xl">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-semibold text-gray-700">📊 Kelengkapan Data Biodata</span>
                            <span class="text-sm font-bold {{ $isDataComplete ? 'text-green-600' : 'text-accent' }}">{{ $filledCount }}/{{ $totalFields }} Terisi</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $progressPercent }}%"></div>
                        </div>
                        @if($isDataComplete)
                            <p class="text-xs text-green-600 mt-2 flex items-center gap-1">
                                <i class="fa-regular fa-circle-check"></i> Semua data sudah lengkap! Anda dapat mengedit jika diperlukan.
                            </p>
                        @else
                            <p class="text-xs text-accent mt-2 flex items-center gap-1">
                                <i class="fa-regular fa-circle-exclamation"></i> 
                                Harap lengkapi {{ $totalFields - $filledCount }} data yang masih kosong.
                            </p>
                        @endif
                    </div>
                    
                    {{-- Form Biodata --}}
                    <div class="mt-6">
                        <div class="flex items-center gap-2 mb-5">
                            <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                                <i class="fa-regular fa-pen-to-square text-accent text-sm"></i>
                            </div>
                            <h3 class="text-lg font-bold text-primary">
                                {{ $isDataComplete ? 'Edit Biodata Diri' : 'Lengkapi Biodata Diri' }}
                            </h3>
                            @if($isDataComplete)
                                <span class="text-xs text-green-600 ml-2">✓ Data lengkap</span>
                            @else
                                <span class="text-xs text-red-500 ml-2">* Wajib diisi semua</span>
                            @endif
                        </div>
                        
                        <form id="biodataForm" action="{{ route('siswa.profil.update', auth()->id()) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <!-- Data Pribadi -->
                                <div class="md:col-span-2">
                                    <h4 class="text-base font-bold text-primary flex items-center gap-2 mb-3">
                                        <i class="fa-regular fa-user text-accent"></i> Data Pribadi
                                    </h4>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-user text-accent mr-1"></i> Nama Lengkap <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $siswa->nama_lengkap ?? old('nama_lengkap') }}" class="input-field {{ !empty($siswa->nama_lengkap) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Nama lengkap wajib diisi</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-id-card text-accent mr-1"></i> NIK <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="nik" id="nik" value="{{ $siswa->nik ?? old('nik') }}" class="input-field {{ !empty($siswa->nik) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">NIK wajib diisi (16 digit)</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-id-card text-accent mr-1"></i> NISN
                                    </label>
                                    <input type="text" name="nisn" id="nisn" value="{{ $siswa->nisn ?? old('nisn') }}" class="input-field {{ !empty($siswa->nisn) ? 'completed' : '' }}">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-location-dot text-accent mr-1"></i> Tempat Lahir <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $siswa->tempat_lahir ?? old('tempat_lahir') }}" class="input-field {{ !empty($siswa->tempat_lahir) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Tempat lahir wajib diisi</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-calendar text-accent mr-1"></i> Tanggal Lahir <span class="required-star">*</span>
                                    </label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $siswa->tanggal_lahir ?? old('tanggal_lahir') }}" class="input-field {{ !empty($siswa->tanggal_lahir) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Tanggal lahir wajib diisi</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-venus-mars text-accent mr-1"></i> Jenis Kelamin <span class="required-star">*</span>
                                    </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="input-field {{ !empty($siswa->jenis_kelamin) ? 'completed' : '' }}" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ ($siswa->jenis_kelamin ?? '') === 'Laki-laki' ? 'selected' : '' }}>👨 Laki-laki</option>
                                        <option value="Perempuan" {{ ($siswa->jenis_kelamin ?? '') === 'Perempuan' ? 'selected' : '' }}>👩 Perempuan</option>
                                    </select>
                                    <span class="error-message text-red-500 text-xs hidden">Jenis kelamin wajib dipilih</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-place-of-worship text-accent mr-1"></i> Agama <span class="required-star">*</span>
                                    </label>
                                    <select name="agama" id="agama" class="input-field {{ !empty($siswa->agama) ? 'completed' : '' }}" required>
                                        <option value="">Pilih Agama</option>
                                        @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'] as $agama)
                                            <option value="{{ $agama }}" {{ ($siswa->agama ?? '') === $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-message text-red-500 text-xs hidden">Agama wajib dipilih</span>
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-house text-accent mr-1"></i> Alamat <span class="required-star">*</span>
                                    </label>
                                    <textarea name="alamat" id="alamat" rows="3" class="input-field {{ !empty($siswa->alamat) ? 'completed' : '' }}" required>{{ $siswa->alamat ?? old('alamat') }}</textarea>
                                    <span class="error-message text-red-500 text-xs hidden">Alamat wajib diisi</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-phone text-accent mr-1"></i> No HP <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="no_hp" id="no_hp" value="{{ $siswa->no_hp ?? old('no_hp') }}" class="input-field {{ !empty($siswa->no_hp) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Nomor HP wajib diisi</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-school text-accent mr-1"></i> Asal Sekolah <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="asal_sekolah" id="asal_sekolah" value="{{ $siswa->asal_sekolah ?? old('asal_sekolah') }}" class="input-field {{ !empty($siswa->asal_sekolah) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Asal sekolah wajib diisi</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-file-lines text-accent mr-1"></i> Nomor Ijazah
                                    </label>
                                    <input type="text" name="nomor_ijazah" id="nomor_ijazah" value="{{ $siswa->nomor_ijazah ?? old('nomor_ijazah') }}" class="input-field {{ !empty($siswa->nomor_ijazah) ? 'completed' : '' }}">
                                </div>
                            </div>
                            
                            <h4 class="mt-6 text-base font-bold text-primary flex items-center gap-2">
                                <i class="fa-solid fa-people-arrows text-accent"></i> Informasi Orang Tua
                                <span class="text-xs text-red-500 ml-2">* Wajib diisi</span>
                            </h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-3">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-user text-accent mr-1"></i> Nama Ayah <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="nama_ayah" id="nama_ayah" value="{{ $siswa->nama_ayah ?? old('nama_ayah') }}" class="input-field {{ !empty($siswa->nama_ayah) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Nama ayah wajib diisi</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-briefcase text-accent mr-1"></i> Pekerjaan Ayah <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ $siswa->pekerjaan_ayah ?? old('pekerjaan_ayah') }}" class="input-field {{ !empty($siswa->pekerjaan_ayah) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Pekerjaan ayah wajib diisi</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-regular fa-user text-accent mr-1"></i> Nama Ibu <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="nama_ibu" id="nama_ibu" value="{{ $siswa->nama_ibu ?? old('nama_ibu') }}" class="input-field {{ !empty($siswa->nama_ibu) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Nama ibu wajib diisi</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-briefcase text-accent mr-1"></i> Pekerjaan Ibu <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ $siswa->pekerjaan_ibu ?? old('pekerjaan_ibu') }}" class="input-field {{ !empty($siswa->pekerjaan_ibu) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Pekerjaan ibu wajib diisi</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fa-solid fa-phone text-accent mr-1"></i> No HP Orang Tua <span class="required-star">*</span>
                                    </label>
                                    <input type="text" name="no_hp_ortu" id="no_hp_ortu" value="{{ $siswa->no_hp_ortu ?? old('no_hp_ortu') }}" class="input-field {{ !empty($siswa->no_hp_ortu) ? 'completed' : '' }}" required>
                                    <span class="error-message text-red-500 text-xs hidden">Nomor HP orang tua wajib diisi</span>
                                </div>
                            </div>
                            
                            <div class="mt-6 text-center">
                                <button type="submit" id="submitBtn" class="btn-save px-8 py-3 text-white font-bold">
                                    <i class="fa-regular fa-floppy-disk"></i> {{ $isDataComplete ? 'Update Biodata' : 'Simpan Biodata' }}
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
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
    // Cek apakah data sudah lengkap dari PHP
    const isDataComplete = {{ $isDataComplete ?? false }};
    
    // Fungsi validasi form sebelum submit
    document.getElementById('biodataForm')?.addEventListener('submit', function(e) {
        let isValid = true;
        let errorFields = [];
        
        // Daftar field yang wajib diisi
        const requiredFields = [
            { id: 'nama_lengkap', name: 'Nama Lengkap' },
            { id: 'nik', name: 'NIK', validator: (val) => val.length === 16 },
            { id: 'tempat_lahir', name: 'Tempat Lahir' },
            { id: 'tanggal_lahir', name: 'Tanggal Lahir' },
            { id: 'jenis_kelamin', name: 'Jenis Kelamin' },
            { id: 'agama', name: 'Agama' },
            { id: 'alamat', name: 'Alamat' },
            { id: 'no_hp', name: 'No HP' },
            { id: 'asal_sekolah', name: 'Asal Sekolah' },
            { id: 'nama_ayah', name: 'Nama Ayah' },
            { id: 'pekerjaan_ayah', name: 'Pekerjaan Ayah' },
            { id: 'nama_ibu', name: 'Nama Ibu' },
            { id: 'pekerjaan_ibu', name: 'Pekerjaan Ibu' },
            { id: 'no_hp_ortu', name: 'No HP Orang Tua' }
        ];
        
        // Reset error styling
        document.querySelectorAll('.input-field').forEach(field => {
            field.classList.remove('error');
        });
        document.querySelectorAll('.error-message').forEach(msg => {
            msg.classList.add('hidden');
        });
        
        // Validasi setiap field
        requiredFields.forEach(field => {
            const input = document.getElementById(field.id);
            if (input) {
                let value = input.value.trim();
                let isFieldValid = true;
                
                if (!value) {
                    isFieldValid = false;
                    errorFields.push(field.name);
                } else if (field.validator && !field.validator(value)) {
                    isFieldValid = false;
                    errorFields.push(field.name + ' (harus 16 digit)');
                }
                
                if (!isFieldValid) {
                    isValid = false;
                    input.classList.add('error');
                    const errorMsg = input.closest('div')?.querySelector('.error-message');
                    if (errorMsg) errorMsg.classList.remove('hidden');
                }
            }
        });
        
        // Validasi No HP minimal 10 digit
        const noHpInput = document.getElementById('no_hp');
        if (noHpInput && noHpInput.value.trim() && noHpInput.value.trim().length < 10) {
            isValid = false;
            noHpInput.classList.add('error');
            errorFields.push('No HP minimal 10 digit');
            const errorMsg = noHpInput.closest('div')?.querySelector('.error-message');
            if (errorMsg) {
                errorMsg.textContent = 'Nomor HP minimal 10 digit';
                errorMsg.classList.remove('hidden');
            }
        }
        
        const noHpOrtuInput = document.getElementById('no_hp_ortu');
        if (noHpOrtuInput && noHpOrtuInput.value.trim() && noHpOrtuInput.value.trim().length < 10) {
            isValid = false;
            noHpOrtuInput.classList.add('error');
            errorFields.push('No HP Orang Tua minimal 10 digit');
            const errorMsg = noHpOrtuInput.closest('div')?.querySelector('.error-message');
            if (errorMsg) {
                errorMsg.textContent = 'Nomor HP orang tua minimal 10 digit';
                errorMsg.classList.remove('hidden');
            }
        }
        
        if (!isValid) {
            e.preventDefault();
            Swal.fire({
                title: '⚠️ Data Belum Lengkap!',
                html: `Harap lengkapi data berikut dengan benar:<br><br><strong>${errorFields.join(', ')}</strong>`,
                icon: 'warning',
                confirmButtonColor: '#F59E0B',
                confirmButtonText: 'Perbaiki Sekarang',
                backdrop: true
            });
            
            // Scroll ke field error pertama
            const firstError = document.querySelector('.input-field.error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        } else {
            // Tampilkan loading dan konfirmasi
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Simpan Data',
                text: 'Apakah Anda yakin data yang diisi sudah benar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10B981',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const submitBtn = document.getElementById('submitBtn');
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';
                    submitBtn.classList.add('disabled');
                    
                    // Submit form
                    document.getElementById('biodataForm').submit();
                }
            });
        }
    });
    
    // Real-time validation untuk menghilangkan error saat user mengetik
    document.querySelectorAll('.input-field').forEach(field => {
        field.addEventListener('input', function() {
            this.classList.remove('error');
            const errorMsg = this.closest('div')?.querySelector('.error-message');
            if (errorMsg) errorMsg.classList.add('hidden');
            
            // Jika field sudah terisi, tambahkan class completed
            if (this.value.trim() !== '') {
                this.classList.add('completed');
            } else {
                this.classList.remove('completed');
            }
        });
    });
    
    // Efek klik pada tombol
    document.querySelectorAll('.btn-save, a.btn-save, .btn-primary').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!this.disabled) {
                this.style.transform = 'scale(0.97)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            }
        });
    });
    
    // Auto focus pada input pertama yang kosong atau error
    const firstEmptyInput = document.querySelector('.input-field:not(.completed):not([readonly])');
    if (firstEmptyInput && !isDataComplete) {
        firstEmptyInput.focus();
    } else if (!isDataComplete) {
        document.querySelector('input[name="nama_lengkap"]')?.focus();
    }
    
    // Format NIK otomatis (hanya angka, maksimal 16 digit)
    const nikField = document.getElementById('nik');
    if (nikField) {
        nikField.addEventListener('input', function() {
            let value = this.value.replace(/[^0-9]/g, '');
            if (value.length > 16) value = value.slice(0, 16);
            this.value = value;
            
            // Validasi real-time panjang NIK
            if (value.length === 16) {
                this.classList.add('completed');
                this.classList.remove('error');
            } else if (value.length > 0) {
                this.classList.remove('completed');
            }
        });
    }
    
    // Format No HP (hanya angka)
    const noHpField = document.getElementById('no_hp');
    if (noHpField) {
        noHpField.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length >= 10) {
                this.classList.add('completed');
            } else if (this.value.length > 0) {
                this.classList.remove('completed');
            }
        });
    }
    
    const noHpOrtuField = document.getElementById('no_hp_ortu');
    if (noHpOrtuField) {
        noHpOrtuField.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length >= 10) {
                this.classList.add('completed');
            } else if (this.value.length > 0) {
                this.classList.remove('completed');
            }
        });
    }
    
    // Untuk field tanggal lahir, tambahkan class completed jika sudah terisi
    const tanggalLahirField = document.getElementById('tanggal_lahir');
    if (tanggalLahirField && tanggalLahirField.value) {
        tanggalLahirField.classList.add('completed');
    }
</script>
@endsection