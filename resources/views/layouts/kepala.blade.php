<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>@yield('title', 'Panel Kepala Sekolah - SMAN 1 Batang Gasan')</title>
    
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
        
        /* Navbar styling */
        .navbar {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
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
        
        /* Nav item efek */
        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .nav-item:hover {
            background: #374151;
            padding-left: 1.25rem;
        }
        .nav-item:active {
            transform: scale(0.98);
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
        
        /* Active menu */
        .nav-active {
            background: linear-gradient(90deg, #374151 0%, #1f2937 100%);
            border-left: 3px solid #F59E0B;
            color: white !important;
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
                top: 0;
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
        
        /* User avatar */
        .user-avatar {
            width: 40px;
            height: 40px;
            background: rgba(245, 158, 11, 0.15);
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Mobile Menu Toggle Button -->
    <button id="mobileMenuToggle" class="mobile-menu-toggle fixed top-4 left-4 z-50 md:hidden bg-primary text-white p-2.5 rounded-xl shadow-lg">
        <i class="fa-solid fa-bars-staggered text-lg"></i>
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
                        <i class="fa-solid fa-building-user text-accent text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-extrabold tracking-tight">Panel Kepsek</h1>
                        <p class="text-[10px] text-white/50">SMAN 1 Batang Gasan</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <ul class="py-4 space-y-1">
                <!-- Dashboard PPDB -->
                <li>
                    <a href="{{ route('kepala.dashboard') }}" 
                       class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl {{ request()->routeIs('kepala.dashboard') ? 'nav-active' : '' }}">
                        <i class="fa-solid fa-chart-line w-5 text-accent"></i>
                        <span class="font-medium">Dashboard PPDB</span>
                    </a>
                </li>

                <!-- Kelola Pengumuman -->
                <li>
                    <a href="{{ route('kepala.pengumuman.index') }}" 
                       class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl {{ request()->is('kepala/pengumuman*') ? 'nav-active' : '' }}">
                        <i class="fa-regular fa-bullhorn w-5 text-accent"></i>
                        <span class="font-medium">Kelola Pengumuman</span>
                    </a>
                </li>

                <!-- Data Pendaftar -->
                <li>
                    <a href="{{ route('kepala.pendaftar.index') }}" 
                       class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl {{ request()->is('kepala/pendaftar*') ? 'nav-active' : '' }}">
                        <i class="fa-solid fa-users w-5 text-accent"></i>
                        <span class="font-medium">Data Pendaftar</span>
                    </a>
                </li>

                <!-- Laporan & Cetak -->
                <li>
                    <a href="{{ route('kepala.laporan.index') }}" 
                       class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 rounded-r-xl {{ request()->is('kepala/laporan*') ? 'nav-active' : '' }}">
                        <i class="fa-solid fa-print w-5 text-accent"></i>
                        <span class="font-medium">Laporan & Cetak</span>
                    </a>
                </li>
            </ul>
            
            <!-- Footer Sidebar -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10 bg-[#1f2937]/90">
                <div class="mb-3 p-2 bg-white/5 rounded-xl">
                    <div class="flex items-center gap-2 text-xs text-white/50">
                        <i class="fa-solid fa-circle-info text-accent"></i>
                        <span>Sistem PPDB 2026</span>
                    </div>
                </div>
                <p class="text-[10px] text-white/30 text-center">© 2026 SMAN 1 Batang Gasan</p>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content flex-1 flex flex-col min-h-screen bg-gray-100">
            <!-- Navbar Header -->
            <nav class="navbar sticky top-0 z-20 shadow-lg">
                <div class="px-5 py-3 md:px-6 md:py-4">
                    <div class="flex justify-between items-center">
                        <div class="hidden md:block">
                            <h1 class="text-white text-lg font-semibold">@yield('header', 'Dashboard Kepala Sekolah')</h1>
                        </div>
                        <div class="flex items-center gap-3 ml-auto md:ml-0">
                            <!-- Notifikasi -->
                            <button class="relative text-white/80 hover:text-white transition-colors">
                                <i class="fa-regular fa-bell text-lg"></i>
                                <span class="absolute -top-1 -right-2 w-4 h-4 bg-accent rounded-full text-[9px] flex items-center justify-center text-white">3</span>
                            </button>
                            
                            <!-- User Menu -->
                            <div class="flex items-center gap-2">
                                <div class="user-avatar">
                                    <i class="fa-regular fa-user text-accent text-sm"></i>
                                </div>
                                <div class="hidden sm:block">
                                    <p class="text-white text-sm font-semibold">{{ auth()->user()->name ?? 'Kepala Sekolah' }}</p>
                                    <p class="text-white/50 text-[10px]">Kepala Sekolah</p>
                                </div>
                            </div>
                            
                            <!-- Logout Button -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                    class="logout-btn flex items-center gap-2 px-3 py-1.5 bg-red-500/20 text-red-400 rounded-lg hover:bg-red-500 hover:text-white transition-all duration-200 text-sm font-medium ml-2">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content Scrollable -->
            <div class="flex-1 p-5 md:p-6 overflow-y-auto">
                @yield('content')
            </div>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-100 py-3 px-6 text-center text-xs text-gray-400">
                <div class="flex flex-wrap justify-center gap-3">
                    <span><i class="fa-regular fa-copyright"></i> 2026 SMAN 1 Batang Gasan</span>
                    <span>•</span>
                    <span><i class="fa-regular fa-clock"></i> PPDB Online 2026/2027</span>
                    <span>•</span>
                    <span><i class="fa-solid fa-graduation-cap"></i> Unggul, Berkarakter, Berwawasan Global</span>
                </div>
            </footer>
        </main>
    </div>

    <script>
        // Mobile sidebar toggle
        const mobileToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        if (mobileToggle && sidebar && overlay) {
            mobileToggle.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('active');
                document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
                
                // Ubah icon
                const icon = this.querySelector('i');
                if (sidebar.classList.contains('open')) {
                    icon.classList.remove('fa-bars-staggered');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars-staggered');
                }
            });
            
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
                const icon = mobileToggle.querySelector('i');
                if (icon) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars-staggered');
                }
            });
            
            // Tutup sidebar saat klik link di mobile
            document.querySelectorAll('#sidebar a, #sidebar button').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('open');
                        overlay.classList.remove('active');
                        document.body.style.overflow = '';
                        const icon = mobileToggle.querySelector('i');
                        if (icon) {
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars-staggered');
                        }
                    }
                });
            });
        }
        
        // Efek klik pada nav item dan tombol
        document.querySelectorAll('.nav-item, .logout-btn, .mobile-menu-toggle').forEach(item => {
            item.addEventListener('click', function(e) {
                // Efek visual klik
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
        
        // Resize handler untuk memastikan sidebar tertutup di mobile saat resize ke desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                if (sidebar) sidebar.classList.remove('open');
                if (overlay) overlay.classList.remove('active');
                document.body.style.overflow = '';
                const icon = mobileToggle?.querySelector('i');
                if (icon) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars-staggered');
                }
            }
        });
        
        // Tooltip untuk notifikasi
        const notifBtn = document.querySelector('.navbar button');
        if (notifBtn) {
            notifBtn.addEventListener('click', function() {
                // Placeholder untuk notifikasi
                alert('Notifikasi akan segera hadir');
            });
        }
    </script>
</body>
</html>