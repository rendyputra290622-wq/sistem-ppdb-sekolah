@extends('layouts.admin')

@section('title', 'Manajemen Pengguna - PPDB SMAN 1 Batang Gasan')
@section('header', 'Manajemen Pengguna')

@section('content')
<style>
    /* Custom styles untuk manajemen pengguna */
    .table-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 16px;
    }
    
    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 16px;
        overflow: hidden;
    }
    
    .modern-table thead tr {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
    }
    
    .modern-table th {
        padding: 14px 16px;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 0.5px;
        color: white;
        border-bottom: 2px solid #F59E0B;
    }
    
    .modern-table td {
        padding: 12px 16px;
        font-size: 14px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .modern-table tbody tr {
        transition: all 0.2s ease;
    }
    
    .modern-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(245, 158, 11, 0.05) 0%, rgba(245, 158, 11, 0.02) 100%);
    }
    
    /* Role badge */
    .role-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.3px;
        white-space: nowrap;
    }
    .role-admin {
        background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
        color: white;
        box-shadow: 0 2px 6px rgba(239, 68, 68, 0.3);
    }
    .role-siswa {
        background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        color: white;
        box-shadow: 0 2px 6px rgba(16, 185, 129, 0.3);
    }
    .role-kepala {
        background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 100%);
        color: white;
        box-shadow: 0 2px 6px rgba(139, 92, 246, 0.3);
    }
    
    /* Button styles dengan efek 3D */
    .btn-action {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 12px;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transform: translateY(0);
        min-width: 70px;
    }
    .btn-action:active {
        transform: translateY(2px);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }
    .btn-edit {
        background: linear-gradient(135deg, #EAB308 0%, #CA8A04 100%);
        color: white;
    }
    .btn-edit:hover {
        background: linear-gradient(135deg, #CA8A04 0%, #B45309 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(234, 179, 8, 0.3);
    }
    .btn-delete {
        background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
        color: white;
    }
    .btn-delete:hover {
        background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
    }
    .btn-add {
        background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
        color: white;
        box-shadow: 0 3px 0 #B45309;
        transform: translateY(-1px);
    }
    .btn-add:active {
        transform: translateY(2px);
        box-shadow: 0 1px 0 #B45309;
    }
    .btn-add:hover {
        background: linear-gradient(135deg, #D97706 0%, #B45309 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(245, 158, 11, 0.4);
    }
    
    /* Pagination */
    .pagination-modern {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination-modern .page-item {
        list-style: none;
    }
    .pagination-modern .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 12px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        color: #374151;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    .pagination-modern .page-link:hover {
        background: #F59E0B;
        border-color: #F59E0B;
        color: white;
        transform: translateY(-1px);
    }
    .pagination-modern .active .page-link {
        background: linear-gradient(135deg, #374151 0%, #4B5563 100%);
        border-color: #374151;
        color: white;
    }
    
    /* Modal */
    .modal-overlay {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        transition: all 0.3s ease;
    }
    .modal-container {
        animation: modalSlideIn 0.3s ease-out;
        max-width: 500px;
        width: 90%;
        margin: 20px;
    }
    @keyframes modalSlideIn {
        from { opacity: 0; transform: scale(0.95) translateY(-20px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    
    /* Search bar */
    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }
    .search-input {
        padding-left: 40px;
        padding-right: 40px;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
        border-radius: 40px;
        background: #f9fafb;
        width: 100%;
        height: 42px;
    }
    .search-input:focus {
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
        outline: none;
        background: white;
    }
    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }
    .clear-search {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        cursor: pointer;
        transition: all 0.2s ease;
        display: none;
    }
    .clear-search:hover {
        color: #F59E0B;
    }
    
    /* Filter chips */
    .filter-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }
    .filter-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #f3f4f6;
        color: #4B5563;
    }
    .filter-chip i {
        font-size: 12px;
    }
    .filter-chip:hover {
        background: #e5e7eb;
        transform: translateY(-1px);
    }
    .filter-chip.active {
        background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
        color: white;
        box-shadow: 0 2px 4px rgba(245, 158, 11, 0.3);
    }
    
    /* User info di tabel */
    .user-name {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .user-avatar {
        width: 32px;
        height: 32px;
        background: rgba(55, 65, 81, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .user-avatar i {
        font-size: 14px;
        color: #374151;
    }
    .user-details {
        overflow: hidden;
    }
    .user-details span {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    /* Email link */
    .email-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #F59E0B;
        text-decoration: none;
        font-size: 13px;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .email-link:hover {
        text-decoration: underline;
    }
    .email-link i {
        flex-shrink: 0;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .modern-table th,
        .modern-table td {
            padding: 10px 12px;
            font-size: 12px;
        }
        .btn-action {
            padding: 4px 8px;
            font-size: 11px;
            min-width: 60px;
        }
        .email-link {
            font-size: 11px;
            max-width: 150px;
        }
        .user-avatar {
            width: 28px;
            height: 28px;
        }
        .user-avatar i {
            font-size: 12px;
        }
    }
    
    @media (max-width: 640px) {
        .modern-table thead {
            display: none;
        }
        .modern-table tbody tr {
            display: block;
            margin-bottom: 16px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            background: white;
        }
        .modern-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 14px;
            border-bottom: 1px solid #f3f4f6;
            text-align: right;
        }
        .modern-table tbody td:before {
            content: attr(data-label);
            font-weight: 600;
            color: #374151;
            text-align: left;
            flex: 1;
            font-size: 12px;
        }
        .modern-table tbody td:last-child {
            border-bottom: none;
        }
        .user-name {
            justify-content: flex-end;
        }
        .email-link {
            justify-content: flex-end;
            max-width: none;
        }
        .filter-chips {
            justify-content: center;
        }
        .btn-action {
            padding: 5px 10px;
        }
    }
</style>

<div class="space-y-5">
    
    {{-- Header Card --}}
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden">
        <div class="px-5 py-6 md:px-7 md:py-7">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-users-gear text-lg"></i>
                        </div>
                        <span class="text-xs font-medium bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Manajemen Pengguna</span>
                    </div>
                    <h1 class="text-xl md:text-2xl font-bold mb-1">Kelola Pengguna Sistem</h1>
                    <p class="text-white/85 text-sm max-w-lg leading-relaxed">
                        Tambah, edit, atau hapus pengguna yang memiliki akses ke sistem PPDB SMAN 1 Batang Gasan.
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

    {{-- Tabel Card --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
        {{-- Header Tabel dengan Search & Tombol Tambah --}}
        <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-table-list text-primary text-sm"></i>
                    </div>
                    <h2 class="text-lg font-bold text-primary">Daftar Pengguna</h2>
                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">{{ $users->total() }} Pengguna</span>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    {{-- Search Form --}}
                    <form method="GET" action="{{ route('admin.pengguna.index') }}" id="searchForm" class="search-wrapper w-full sm:w-80">
                        <i class="fa-solid fa-magnifying-glass search-icon text-sm"></i>
                        <input type="text" name="search" id="searchInput" placeholder="Cari nama atau email..." 
                            class="search-input w-full text-sm"
                            value="{{ request('search') }}">
                        <i class="fa-solid fa-times-circle clear-search" id="clearSearch"></i>
                    </form>
                    
                    <a href="{{ route('admin.pengguna.add') }}" 
                       class="btn-add inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl transition-all duration-300 font-semibold text-sm">
                        <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
                    </a>
                </div>
            </div>
            
            {{-- Filter Chips untuk Role --}}
            <div class="filter-chips mt-4">
                <span class="filter-chip {{ empty(request('role')) ? 'active' : '' }}" data-role="">
                    <i class="fa-solid fa-users"></i> Semua Role
                </span>
                <span class="filter-chip {{ request('role') == 'admin' ? 'active' : '' }}" data-role="admin">
                    <i class="fa-solid fa-shield-haltered"></i> Admin
                </span>
                <span class="filter-chip {{ request('role') == 'siswa' ? 'active' : '' }}" data-role="siswa">
                    <i class="fa-solid fa-graduation-cap"></i> Siswa
                </span>
                <span class="filter-chip {{ request('role') == 'kepala' ? 'active' : '' }}" data-role="kepala">
                    <i class="fa-solid fa-building-user"></i> Kepala Sekolah
                </span>
            </div>
        </div>
        
        {{-- Tabel Responsif --}}
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th class="text-center w-16">No</th>
                        <th class="text-left">Nama</th>
                        <th class="text-left">Email</th>
                        <th class="text-center w-32">Role</th>
                        <th class="text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                    <tr>
                        <td class="text-center" data-label="No">{{ $users->firstItem() + $loop->index }}</td>
                        <td data-label="Nama">
                            <div class="user-name">
                                <div class="user-avatar">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <div class="user-details">
                                    <span class="font-medium">{{ $user->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Email">
                            <a href="mailto:{{ $user->email }}" class="email-link" title="{{ $user->email }}">
                                <i class="fa-regular fa-envelope"></i>
                                <span>{{ $user->email }}</span>
                            </a>
                        </td>
                        <td class="text-center" data-label="Role">
                            @php
                                $roleClass = match($user->role) {
                                    'admin' => 'role-admin',
                                    'siswa' => 'role-siswa',
                                    'kepala' => 'role-kepala',
                                    default => 'role-siswa'
                                };
                                $roleIcon = match($user->role) {
                                    'admin' => 'fa-solid fa-shield-haltered',
                                    'siswa' => 'fa-solid fa-graduation-cap',
                                    'kepala' => 'fa-solid fa-building-user',
                                    default => 'fa-solid fa-user'
                                };
                                $roleLabel = match($user->role) {
                                    'admin' => 'Admin',
                                    'siswa' => 'Siswa',
                                    'kepala' => 'Kepala Sekolah',
                                    default => ucfirst($user->role)
                                };
                            @endphp
                            <span class="role-badge {{ $roleClass }}">
                                <i class="{{ $roleIcon }}"></i>
                                {{ $roleLabel }}
                            </span>
                        </td>
                        <td class="text-center" data-label="Aksi">
                            <div class="flex items-center justify-center gap-2">
                                <button onclick="openEditModal({{ json_encode($user) }})" 
                                        class="btn-action btn-edit">
                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                </button>
                                <button onclick="confirmDelete({{ $user->id }})" 
                                        class="btn-action btn-delete">
                                    <i class="fa-regular fa-trash-can"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                        <i class="fa-regular fa-users-slash text-gray-300 text-2xl"></i>
                                    </div>
                                    <p class="text-gray-500 font-medium">Tidak ada data pengguna</p>
                                    <p class="text-gray-400 text-sm mt-1">
                                        @if(request('search') || request('role'))
                                            Tidak ditemukan hasil pencarian
                                        @else
                                            Silakan tambah pengguna baru
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        @if($users->hasPages())
        <div class="p-5 border-t border-gray-100 bg-gray-50/50">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="text-xs text-gray-500">
                    <i class="fa-regular fa-chart-line text-accent"></i>
                    Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }} data
                </div>
                <div>
                    {{ $users->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Modal Tambah/Edit Pengguna --}}
<div id="userModal" class="fixed inset-0 z-50 hidden items-center justify-center modal-overlay" style="display: none;">
    <div class="modal-container bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-primary to-secondary px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                        <i id="modalIcon" class="fa-solid fa-user-plus text-white text-sm"></i>
                    </div>
                    <h3 id="modalTitle" class="text-white font-bold text-lg">Tambah Pengguna</h3>
                </div>
                <button onclick="closeModal()" class="text-white/80 hover:text-white transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>
        </div>
        
        <form id="userForm" method="POST" class="p-6">
            @csrf
            <input type="hidden" id="userId" name="id">
            <input type="hidden" name="_method" id="methodInput">
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fa-regular fa-user text-accent mr-1"></i> Nama Lengkap
                    </label>
                    <input type="text" id="userName" name="name" required
                        placeholder="Masukkan nama lengkap"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fa-regular fa-envelope text-accent mr-1"></i> Alamat Email
                    </label>
                    <input type="email" id="userEmail" name="email" required
                        placeholder="contoh@email.com"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fa-solid fa-shield text-accent mr-1"></i> Role / Hak Akses
                    </label>
                    <select id="userRole" name="role" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white">
                        <option value="admin">👑 Admin - Akses penuh ke sistem</option>
                        <option value="siswa">🎓 Siswa - Akses pendaftaran PPDB</option>
                        <option value="kepala">🏛️ Kepala Sekolah - Akses laporan & pengumuman</option>
                    </select>
                    <p class="text-xs text-gray-400 mt-1">
                        <i class="fa-regular fa-info-circle"></i> Role menentukan hak akses pengguna dalam sistem
                    </p>
                </div>
                
                <div id="passwordFields" class="space-y-3">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-solid fa-lock text-accent mr-1"></i> Kata Sandi
                        </label>
                        <div class="relative">
                            <input type="password" id="userPassword" name="password"
                                placeholder="Minimal 8 karakter"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white pr-10">
                            <button type="button" id="toggleModalPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-accent">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa-solid fa-lock text-accent mr-1"></i> Konfirmasi Kata Sandi
                        </label>
                        <div class="relative">
                            <input type="password" id="userPasswordConfirmation" name="password_confirmation"
                                placeholder="Ulangi kata sandi"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-accent/50 focus:border-accent transition-all duration-300 bg-gray-50/50 focus:bg-white pr-10">
                            <button type="button" id="toggleModalConfirmPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-accent">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-100">
                <button type="button" onclick="closeModal()" 
                    class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 font-medium flex items-center gap-2">
                    <i class="fa-regular fa-times"></i> Batal
                </button>
                <button type="submit" 
                    class="btn-add inline-flex items-center gap-2 px-5 py-2.5 rounded-xl transition-all duration-300 font-semibold">
                    <i class="fa-regular fa-floppy-disk"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Form Delete --}}
@foreach ($users as $user)
<form id="deleteForm{{ $user->id }}" action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
@endforeach

<script>
    // Modal Elements
    const modal = document.getElementById('userModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalIcon = document.getElementById('modalIcon');
    const userForm = document.getElementById('userForm');
    const userIdInput = document.getElementById('userId');
    const methodInput = document.getElementById('methodInput');
    const userNameInput = document.getElementById('userName');
    const userEmailInput = document.getElementById('userEmail');
    const userRoleSelect = document.getElementById('userRole');
    const passwordFields = document.getElementById('passwordFields');
    const userPassword = document.getElementById('userPassword');
    const userPasswordConfirmation = document.getElementById('userPasswordConfirmation');
    
    // Open Add Modal
    window.openAddModal = function() {
        modalTitle.innerText = 'Tambah Pengguna';
        modalIcon.className = 'fa-solid fa-user-plus text-white text-sm';
        userForm.setAttribute('action', '{{ route("admin.pengguna.store") }}');
        methodInput.value = '';
        userIdInput.value = '';
        userForm.reset();
        if (passwordFields) passwordFields.style.display = 'block';
        if (userPassword) {
            userPassword.required = true;
            userPassword.placeholder = 'Minimal 8 karakter';
        }
        if (userPasswordConfirmation) {
            userPasswordConfirmation.required = true;
            userPasswordConfirmation.placeholder = 'Ulangi kata sandi';
        }
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
        userNameInput.focus();
    };
    
    // Open Edit Modal
    window.openEditModal = function(user) {
        modalTitle.innerText = 'Edit Pengguna';
        modalIcon.className = 'fa-solid fa-user-pen text-white text-sm';
        userForm.setAttribute('action', '{{ route("admin.pengguna.update", "") }}/' + user.id);
        methodInput.value = 'PUT';
        userIdInput.value = user.id;
        userNameInput.value = user.name;
        userEmailInput.value = user.email;
        userRoleSelect.value = user.role;
        
        if (passwordFields) passwordFields.style.display = 'block';
        if (userPassword) {
            userPassword.required = false;
            userPassword.placeholder = 'Kosongkan jika tidak ingin mengubah';
            userPassword.value = '';
        }
        if (userPasswordConfirmation) {
            userPasswordConfirmation.required = false;
            userPasswordConfirmation.placeholder = 'Ulangi kata sandi';
            userPasswordConfirmation.value = '';
        }
        
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
        userNameInput.focus();
    };
    
    // Close Modal
    window.closeModal = function() {
        modal.classList.add('hidden');
        modal.style.display = 'none';
        userForm.reset();
    };
    
    // Confirm Delete
    window.confirmDelete = function(userId) {
        if (confirm('⚠️ Apakah Anda yakin ingin menghapus pengguna ini?\n\nTindakan ini tidak dapat dibatalkan!')) {
            document.getElementById('deleteForm' + userId).submit();
        }
    };
    
    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Search with debounce
    const searchInput = document.getElementById('searchInput');
    const clearSearch = document.getElementById('clearSearch');
    const searchForm = document.getElementById('searchForm');
    
    if (searchInput) {
        if (searchInput.value.length > 0 && clearSearch) {
            clearSearch.style.display = 'block';
        }
        
        let searchTimeout;
        searchInput.addEventListener('keyup', function() {
            if (clearSearch) {
                clearSearch.style.display = this.value.length > 0 ? 'block' : 'none';
            }
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                searchForm.submit();
            }, 500);
        });
        
        if (clearSearch) {
            clearSearch.addEventListener('click', function() {
                searchInput.value = '';
                clearSearch.style.display = 'none';
                searchForm.submit();
            });
        }
    }
    
    // Filter chips functionality - PERBAIKAN UTAMA
    const filterChips = document.querySelectorAll('.filter-chip');
    
    filterChips.forEach(chip => {
        chip.addEventListener('click', function(e) {
            e.preventDefault();
            const role = this.getAttribute('data-role');
            const url = new URL(window.location.href);
            
            // Set atau hapus parameter role
            if (role && role !== '') {
                url.searchParams.set('role', role);
            } else {
                url.searchParams.delete('role');
            }
            
            // Reset ke halaman pertama
            url.searchParams.delete('page');
            
            // Redirect ke URL baru
            window.location.href = url.toString();
        });
    });
    
    // Toggle password visibility
    const toggleModalPassword = document.getElementById('toggleModalPassword');
    if (toggleModalPassword && userPassword) {
        toggleModalPassword.addEventListener('click', function() {
            const type = userPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            userPassword.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    }
    
    const toggleModalConfirmPassword = document.getElementById('toggleModalConfirmPassword');
    if (toggleModalConfirmPassword && userPasswordConfirmation) {
        toggleModalConfirmPassword.addEventListener('click', function() {
            const type = userPasswordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
            userPasswordConfirmation.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    }
    
    // Escape key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            closeModal();
        }
    });
</script>
@endsection