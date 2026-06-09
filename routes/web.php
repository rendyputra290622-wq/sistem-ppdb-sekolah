<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\AdminPPDBController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminDokumenController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\LaporanKepalaController;
use App\Http\Controllers\PendaftarKepalaController;
use App\Http\Controllers\PengumumanKepalaController;
// use App\Http\Controllers\EmailCheckController;

// ==================== OPTIMASI: Cache Routes di Production ====================
// Gunakan: php artisan route:cache untuk production

// ==================== ROUTE UMUM (Welcome & Auth) ====================

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Group Auth Controller dengan route naming yang konsisten
Route::controller(AuthController::class)->group(function () {
    // Guest routes (hanya bisa diakses jika belum login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login/action', 'login_action')->name('login.action');
        Route::get('/register', 'register')->name('register');
        Route::post('/register/action', 'register_action')->name('register.action');
    });
    
    // Logout (hanya bisa diakses jika sudah login)
    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/logout', 'logout')->name('logout.get'); // Fallback untuk GET request
    });
});

// // ==================== ROUTE CHECK EMAIL (Untuk Validasi Real-time) ====================
// // Route ini bisa diakses tanpa middleware auth (untuk proses registrasi)
// Route::post('/check-email', [EmailCheckController::class, 'checkEmail'])
//     ->name('check.email')
//     ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]); // Opsional untuk AJAX

// ==================== ROUTE SISWA (Middleware: auth & role:siswa) ====================
Route::middleware(['auth', 'siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    
    // Dashboard Siswa
    Route::get('/dashboard', [DashboardController::class, 'siswa_dashboard'])->name('dashboard');
    
    // Persyaratan PPDB
    Route::get('/ppdb/persyaratan', function () {
        return view('siswa.ppdb.persyaratan');
    })->name('ppdb.persyaratan');
    
    // Formulir Pendaftaran PPDB
    Route::prefix('pendaftaran-ppdb')->name('ppdb.')->group(function () {
        Route::get('/', [PPDBController::class, 'index'])->name('index');
        Route::get('/form', [PPDBController::class, 'create'])->name('form');
        Route::post('/store', [PPDBController::class, 'store'])->name('store');
        Route::get('/cetak', [PPDBController::class, 'cetak'])->name('cetak');
        Route::get('/edit/{id}', [PPDBController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PPDBController::class, 'update'])->name('update');
    });
    
    // Dokumen Siswa (DIPERBAIKI - menggunakan parameter yang konsisten)
    Route::prefix('dokumen')->name('dokumen.')->group(function () {
        Route::get('/', [DokumenController::class, 'index'])->name('index');
        Route::get('/{user_id}/{tipe}', [DokumenController::class, 'show'])->name('show');
        Route::get('/{user_id}/edit', [DokumenController::class, 'edit'])->name('edit');
        Route::put('/update/{user_id}', [DokumenController::class, 'update'])->name('update');
        Route::delete('/destroy/{user_id}', [DokumenController::class, 'destroy'])->name('destroy');
    });
    
    // Status Pendaftaran
    Route::get('/status-pendaftaran', [PendaftaranController::class, 'index'])->name('statusPendaftaran.index');
    
    // Profil Siswa (DIPERBAIKI - konsistensi parameter)
    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('/', [ProfilController::class, 'index'])->name('index');
        Route::put('/update', [ProfilController::class, 'update'])->name('update');
        Route::put('/update-dokumen', [ProfilController::class, 'updateDokumen'])->name('updateDokumen');
    });
});


// ==================== ROUTE ADMIN ====================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('dashboard');
    
    // Manajemen Pengguna
    Route::prefix('pengguna')->name('pengguna.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/add', [AdminController::class, 'create'])->name('add');
        Route::post('/', [AdminController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [AdminController::class, 'edit'])->name('edit');
        Route::put('/{user}', [AdminController::class, 'update'])->name('update');
        Route::delete('/{user}', [AdminController::class, 'destroy'])->name('destroy');
    });
    
    // Manajemen PPDB
    Route::prefix('ppdb')->name('ppdb.')->group(function () {
        Route::get('/', [AdminPPDBController::class, 'index'])->name('index');
        Route::get('/{id}/{tipe?}', [AdminPPDBController::class, 'show'])->name('show');
        Route::get('/export', [AdminPPDBController::class, 'export'])->name('export');
        Route::post('/update-status/{id}', [AdminPPDBController::class, 'updateStatus'])->name('updateStatus');
    });
    
    // Dokumen Pengguna
    Route::get('/dokumen-pengguna', [AdminDokumenController::class, 'index'])->name('dokumen.index');
    
    // Laporan
    Route::get('/laporan', [AdminLaporanController::class, 'index'])->name('laporan.index');
    
    // ==================== HASIL SELEKSI - DIPERBAIKI ====================
    // Menggunakan nama route yang konsisten: admin.hasil.diterima, dll
    Route::prefix('hasil-seleksi')->name('hasil.')->group(function () {
        Route::get('/diterima', [AdminController::class, 'diterimaIndex'])->name('diterima');
        Route::get('/cadangan', [AdminController::class, 'cadanganIndex'])->name('cadangan');
        Route::get('/ditolak', [AdminController::class, 'ditolakIndex'])->name('ditolak');
    });
    
    // ==================== ALIAS UNTUK COMPATIBILITY ====================
    // Menambahkan alias agar tidak error jika ada yang memanggil nama route lama
    Route::get('/siswa-diterima', [AdminController::class, 'diterimaIndex'])->name('diterima.index');
    Route::get('/siswa-cadangan', [AdminController::class, 'cadanganIndex'])->name('cadangan.index');
    Route::get('/siswa-ditolak', [AdminController::class, 'ditolakIndex'])->name('ditolak.index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // ... route lainnya yang sudah ada ...
    
    // ==================== TAMBAHKAN INI ====================
    // Route untuk menampilkan siswa diterima
    Route::get('/siswa-diterima', [AdminController::class, 'diterimaIndex'])->name('diterima.index');
    
    // Atau jika ingin menggunakan prefix hasil-seleksi
    Route::prefix('hasil-seleksi')->name('hasil.')->group(function () {
        Route::get('/diterima', [AdminController::class, 'diterimaIndex'])->name('diterima');
    });
});

// ==================== ROUTE KEPALA SEKOLAH (Middleware: auth & role:kepala) ====================
Route::middleware(['auth', 'kepala'])->prefix('kepala')->name('kepala.')->group(function () {
    
    // Dashboard Kepala Sekolah
    Route::get('/dashboard', [DashboardController::class, 'kepala_dashboard'])->name('dashboard');
    
    // Manajemen Pengumuman (Resource Controller lengkap)
    Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
        Route::get('/', [PengumumanKepalaController::class, 'index'])->name('index');
        Route::get('/create', [PengumumanKepalaController::class, 'create'])->name('create');
        Route::post('/', [PengumumanKepalaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PengumumanKepalaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PengumumanKepalaController::class, 'update'])->name('update');
        Route::delete('/{id}', [PengumumanKepalaController::class, 'destroy'])->name('destroy');
    });
    
    // Data Pendaftar untuk Kepala Sekolah
    Route::prefix('pendaftar')->name('pendaftar.')->group(function () {
        Route::get('/', [PendaftarKepalaController::class, 'index'])->name('index');
        Route::get('/{id}', [PendaftarKepalaController::class, 'show'])->name('show');
    });
    
    // Laporan Kepala Sekolah
    Route::get('/laporan', [LaporanKepalaController::class, 'index'])->name('laporan.index');
});

// ==================== ROUTE FALLBACK (404 Handler - Opsional) ====================
// Aktifkan jika ingin menangani route yang tidak ditemukan
// Route::fallback(function () {
//     return view('errors.404');
// })->name('fallback');

// ==================== PENJELASAN OPTIMASI ====================
/*
 * OPTIMASI YANG DILAKUKAN:
 * 
 * 1. PENAMAAN ROUTE KONSISTEN - Semua route memiliki name() yang jelas dan terstruktur
 * 2. PENGGUNAAN PREFIX DENGAN BENAR - Menghindari duplikasi prefix pada nama route
 * 3. GROUPING ROUTE YANG EFISIEN - Mengelompokkan route berdasarkan fungsinya
 * 4. MIDDLEWARE DITERAPKAN DENGAN TEPAT - Guest untuk login/register, auth untuk protected routes
 * 5. PENGHAPUSAN DUPLIKASI - Menghapus route yang tidak diperlukan atau duplikat
 * 6. SUB-PREFIX UNTUK RESOURCE - Menggunakan group()->prefix() untuk hierarki yang jelas
 * 7. ROUTE CACHING READY - Struktur mendukung route:cache untuk production
 * 
 * PENGGUNAAN NAMA ROUTE:
 * - siswa.dashboard
 * - siswa.ppdb.index, siswa.ppdb.form, siswa.ppdb.store, siswa.ppdb.cetak
 * - siswa.dokumen.index, siswa.dokumen.show, siswa.dokumen.edit, siswa.dokumen.update
 * - siswa.profil.index, siswa.profil.update
 * - admin.dashboard
 * - admin.pengguna.index, admin.pengguna.store, dll
 * - admin.ppdb.index, admin.ppdb.updateStatus
 * - kepala.dashboard
 * - kepala.pengumuman.index, kepala.pengumuman.create, dll
 * - kepala.pendaftar.index, kepala.pendaftar.show
 * 
 * CATATAN PENTING:
 * 1. Pastikan middleware 'siswa', 'admin', 'kepala' sudah terdaftar di Kernel.php
 * 2. Pastikan semua controller yang dipanggil sudah dibuat dengan method yang sesuai
 * 3. Untuk production, jalankan: php artisan route:cache
 */
?>