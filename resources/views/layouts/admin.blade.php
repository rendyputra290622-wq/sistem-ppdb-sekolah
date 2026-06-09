<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>@yield('title', 'Admin Panel - SMAN 1 Batang Gasan')</title>
    
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
                        primary: '#374151',      // Abu-abu gelap
                        secondary: '#4B5563',    // Abu-abu medium
                        accent: '#F59E0B',       // Kuning keemasan
                        sidebar: '#1f2937',      // Sidebar gelap
                        sidebar_hover: '#374151',
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-out',
                        'slide-down': 'slideDown 0.2s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideDown: {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
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
        
        /* Scrollbar custom */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #F59E0B;
            border-radius: 10px;
        }
        
        /* Sidebar scroll */
        .sidebar-scroll {
            scrollbar-width: thin;
            scrollbar-color: #F59E0B #374151;
        }
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: #374151;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #F59E0B;
            border-radius: 10px;
        }
        
        /* Animasi menu item */
        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .nav-item:hover {
            background: #374151;
            padding-left: 1.5rem;
        }
        .nav-item:active {
            transform: scale(0.98);
        }
        
        /* Dropdown menu */
        .dropdown-menu {
            animation: slideDown 0.2s ease-out;
        }
        
        /* Rotasi arrow */
        .arrow-rotate {
            transition: transform 0.2s ease;
        }
        .arrow-rotate.rotated {
            transform: rotate(180deg);
        }
        
        /* Tombol logout */
        .logout-btn {
            transition: all 0.2s ease;
        }
        .logout-btn:active {
            transform: scale(0.97);
        }
        
        /* Overlay untuk mobile sidebar */
        .sidebar-overlay {
            transition: opacity 0.3s ease;
        }
        
        /* Mobile menu toggle */
        .mobile-menu-toggle {
            transition: all 0.2s ease;
        }
        .mobile-menu-toggle:active {
            transform: scale(0.95);
        }
        
        /* Responsive sidebar */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -280px;
                transition: left 0.3s ease;
                z-index: 50;
                width: 280px;
                height: 100vh;
                overflow-y: auto;
            }
            .sidebar.open {
                left: 0;
            }
            .main-content {
                width: 100%;
            }
            .overlay.active {
                display: block;
            }
        }
        
        @media (min-width: 769px) {
            .sidebar {
                position: relative;
                left: 0 !important;
            }
            .overlay {
                display: none !important;
            }
            .mobile-menu-toggle {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Mobile Menu Toggle Button -->
    <button id="mobileMenuToggle" class="mobile-menu-toggle fixed top-4 left-4 z-50 md:hidden bg-primary text-white p-2 rounded-xl shadow-lg">
        <i class="fa-solid fa-bars-staggered text-xl"></i>
    </button>
    
    <!-- Overlay untuk mobile -->
    <div id="sidebarOverlay" class="sidebar-overlay fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- Wrapper -->
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar w-72 bg-gradient-to-b from-[#1f2937] to-[#111827] text-white shadow-2xl h-screen overflow-y-auto sidebar-scroll flex-shrink-0">
            <!-- Logo / Brand -->
            <div class="p-5 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-accent/20 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-graduation-cap text-accent text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-extrabold tracking-tight">Admin Panel</h1>
                        <p class="text-[10px] text-white/50">SMAN 1 Batang Gasan</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <ul class="py-4 space-y-1">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl">
                        <i class="fa-solid fa-chart-line w-5 text-accent"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                <!-- Dropdown Manajemen Pengguna -->
                <li class="relative">
                    <button onclick="toggleDropdown('userDropdown', this)" class="nav-item w-full flex items-center justify-between px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-users-gear w-5 text-accent"></i>
                            <span class="font-medium">Manajemen Pengguna</span>
                        </div>
                        <i id="userArrow" class="fa-solid fa-chevron-down text-xs transition-transform duration-200"></i>
                    </button>
                    <ul id="userDropdown" class="hidden ml-8 mt-1 space-y-1 border-l-2 border-accent/30">
                        <li><a href="{{ route('admin.pengguna.index') }}" class="flex items-center gap-3 px-5 py-2 text-sm text-white/70 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl"><i class="fa-regular fa-list w-4"></i> List Pengguna</a></li>
                        <li><a href="{{ route('admin.pengguna.add') }}" class="flex items-center gap-3 px-5 py-2 text-sm text-white/70 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl"><i class="fa-solid fa-user-plus w-4"></i> Tambah Pengguna</a></li>
                    </ul>
                </li>

                <!-- Dropdown Data PPDB -->
                <li class="relative">
                    <button onclick="toggleDropdown('ppdbDropdown', this)" class="nav-item w-full flex items-center justify-between px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-folder-open w-5 text-accent"></i>
                            <span class="font-medium">Data PPDB</span>
                        </div>
                        <i id="ppdbArrow" class="fa-solid fa-chevron-down text-xs transition-transform duration-200"></i>
                    </button>
                    <ul id="ppdbDropdown" class="hidden ml-8 mt-1 space-y-1 border-l-2 border-accent/30">
                        <li><a href="{{ route('admin.ppdb.index') }}" class="flex items-center gap-3 px-5 py-2 text-sm text-white/70 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl"><i class="fa-regular fa-file-lines w-4"></i> Semua Data</a></li>
                        <li><a href="{{ route('admin.dokumen.index') }}" class="flex items-center gap-3 px-5 py-2 text-sm text-white/70 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl"><i class="fa-regular fa-folder-open w-4"></i> Data Dokumen</a></li>
                        <li><a href="{{ route('admin.diterima.index') }}" class="flex items-center gap-3 px-5 py-2 text-sm text-white/70 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl"><i class="fa-regular fa-circle-check w-4 text-green-400"></i> Data Diterima</a></li>
                        <li><a href="{{ route('admin.cadangan.index') }}" class="flex items-center gap-3 px-5 py-2 text-sm text-white/70 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl"><i class="fa-solid fa-clock w-4 text-yellow-400"></i> Data Cadangan</a></li>
                        <li><a href="{{ route('admin.ditolak.index') }}" class="flex items-center gap-3 px-5 py-2 text-sm text-white/70 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl"><i class="fa-regular fa-circle-xmark w-4 text-red-400"></i> Data Ditolak</a></li>
                    </ul>
                </li>

                <!-- Profil -->
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl">
                        <i class="fa-regular fa-user w-5 text-accent"></i>
                        <span class="font-medium">Profil</span>
                    </a>
                </li>

                <!-- Laporan -->
                <li>
                    <a href="{{ route('admin.laporan.index') }}" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl">
                        <i class="fa-solid fa-chart-simple w-5 text-accent"></i>
                        <span class="font-medium">Laporan</span>
                    </a>
                </li>
            </ul>
            
            <!-- Footer Sidebar - Logout -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10 bg-[#1f2937]/90">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="logout-btn w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-red-500/20 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-200 font-semibold text-sm">
                    <i class="fa-solid fa-sign-out-alt"></i> Logout
                </button>
                <p class="text-[10px] text-white/30 text-center mt-3">© 2026 SMAN 1 Batang Gasan</p>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content flex-1 flex flex-col min-h-screen bg-gray-100">
            <!-- Header -->
            <div class="bg-white shadow-md sticky top-0 z-20">
                <div class="px-6 py-5 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl md:text-2xl font-extrabold text-primary">@yield('header', 'Dashboard Admin')</h1>
                        <div class="flex items-center gap-3">
                            <div class="hidden md:flex items-center gap-2 text-sm text-gray-500">
                                <i class="fa-regular fa-user text-accent"></i>
                                <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                            </div>
                            <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <i class="fa-regular fa-bell text-primary text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Scrollable -->
            <div class="flex-1 p-5 md:p-6 overflow-y-auto">
                @yield('content')
            </div>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-100 py-3 px-6 text-center text-xs text-gray-400">
                Sistem Informasi Penerimaan Peserta Didik Baru (PPDB) SMAN 1 Batang Gasan © 2026
            </footer>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle dropdown menu
        function toggleDropdown(menuId, button) {
            const menu = document.getElementById(menuId);
            const arrow = button.querySelector('.fa-chevron-down');
            
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                menu.classList.add('dropdown-menu');
                arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
            }
        }
        
        // Mobile sidebar toggle
        const mobileToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        if (mobileToggle && sidebar && overlay) {
            mobileToggle.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
            });
            
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            });
            
            // Tutup sidebar saat klik link di mobile
            document.querySelectorAll('#sidebar a, #sidebar button').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('open');
                        overlay.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            });
        }
        
        // Efek klik pada nav item
        document.querySelectorAll('.nav-item, .logout-btn').forEach(item => {
            item.addEventListener('click', function(e) {
                // Efek visual klik
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
        
        // Set active menu berdasarkan URL
        const currentUrl = window.location.pathname;
        document.querySelectorAll('#sidebar a').forEach(link => {
            const href = link.getAttribute('href');
            if (href && href !== '#' && currentUrl.includes(href)) {
                link.classList.add('bg-sidebar_hover', 'text-white');
                const parentLi = link.closest('li');
                if (parentLi) {
                    // Buka dropdown parent jika ada
                    const parentButton = parentLi.closest('li')?.querySelector('button');
                    if (parentButton) {
                        const menuId = parentButton.getAttribute('onclick')?.match(/'([^']+)'/)?.[1];
                        if (menuId) {
                            const menu = document.getElementById(menuId);
                            if (menu && menu.classList.contains('hidden')) {
                                menu.classList.remove('hidden');
                                const arrow = parentButton.querySelector('.fa-chevron-down');
                                if (arrow) arrow.style.transform = 'rotate(180deg)';
                            }
                        }
                    }
                }
            }
        });
        
        // Resize handler untuk memastikan sidebar tertutup di mobile saat resize ke desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>