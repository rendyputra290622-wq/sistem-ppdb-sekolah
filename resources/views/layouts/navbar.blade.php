<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>PPDB Dashboard - SMAN 1 Batang Gasan</title>
    
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
                        sidebar: '#1f2937',
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
        
        /* Scrollbar */
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
        
        /* Nav item efek */
        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 12px;
        }
        .nav-item:hover {
            background: #374151;
            padding-left: 1.25rem;
        }
        .nav-item:active {
            transform: scale(0.98);
        }
        
        /* Active menu */
        .nav-active {
            background: linear-gradient(90deg, #374151 0%, #1f2937 100%);
            border-left: 3px solid #F59E0B;
            color: white !important;
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
            z-index: 50;
        }
        .mobile-menu-toggle:active {
            transform: scale(0.95);
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
        
        /* Stat card */
        .stat-card {
            transition: all 0.3s ease;
            border-radius: 20px;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
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
            .header-title {
                margin-left: 48px;
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
    <button id="mobileMenuToggle" class="mobile-menu-toggle fixed top-4 left-4 md:hidden bg-primary text-white p-2.5 rounded-xl shadow-lg z-50">
        <i class="fa-solid fa-bars-staggered text-lg"></i>
    </button>
    
    <!-- Overlay untuk mobile -->
    <div id="sidebarOverlay" class="sidebar-overlay fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

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
                        <h1 class="text-lg font-extrabold tracking-tight">PPDB Online</h1>
                        <p class="text-[10px] text-white/50">SMAN 1 Batang Gasan</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <ul class="py-4 space-y-1">
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2 nav-active">
                        <i class="fa-solid fa-chart-line w-5 text-accent"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2">
                        <i class="fa-solid fa-folder-open w-5 text-accent"></i>
                        <span class="font-medium">Data Pendaftar</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2">
                        <i class="fa-regular fa-circle-check w-5 text-accent"></i>
                        <span class="font-medium">Verifikasi</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2">
                        <i class="fa-regular fa-bullhorn w-5 text-accent"></i>
                        <span class="font-medium">Pengumuman</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2">
                        <i class="fa-solid fa-gear w-5 text-accent"></i>
                        <span class="font-medium">Pengaturan</span>
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
        <main class="main-content flex-1 flex flex-col min-h-screen">
            <!-- Navbar -->
            <nav class="bg-white shadow-md sticky top-0 z-20">
                <div class="px-5 py-3 md:px-6 md:py-4">
                    <div class="flex justify-between items-center">
                        <h1 class="header-title text-lg md:text-xl font-extrabold text-primary">Dashboard PPDB</h1>
                        <div class="flex items-center gap-3">
                            <!-- Notifikasi -->
                            <button class="relative text-gray-600 hover:text-accent transition-colors" id="notifBtn">
                                <i class="fa-regular fa-bell text-lg"></i>
                                <span class="absolute -top-1 -right-2 w-4 h-4 bg-accent rounded-full text-[9px] flex items-center justify-center text-white">3</span>
                            </button>
                            
                            <!-- User Menu -->
                            <div class="flex items-center gap-2">
                                <div class="user-avatar">
                                    <i class="fa-regular fa-user text-accent text-sm"></i>
                                </div>
                                <div class="hidden sm:block">
                                    <p class="text-gray-700 text-sm font-semibold">Admin</p>
                                    <p class="text-gray-400 text-[10px]">Administrator</p>
                                </div>
                            </div>
                            
                            <!-- Logout Button -->
                            <button onclick="confirmLogout()" class="logout-btn flex items-center gap-2 px-3 py-1.5 bg-red-500/20 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all duration-200 text-sm font-medium ml-2">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content -->
            <div class="flex-1 p-5 md:p-6 overflow-y-auto">
                <!-- Dashboard Stats -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                    <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 text-white p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-white/80">Total Pendaftar</p>
                                <p class="text-3xl font-bold mt-1">127</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-users text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card bg-gradient-to-br from-green-500 to-green-600 text-white p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-white/80">Diterima</p>
                                <p class="text-3xl font-bold mt-1">45</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-regular fa-circle-check text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card bg-gradient-to-br from-yellow-500 to-orange-500 text-white p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-white/80">Cadangan</p>
                                <p class="text-3xl font-bold mt-1">32</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-clock text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card bg-gradient-to-br from-red-500 to-red-600 text-white p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-white/80">Ditolak</p>
                                <p class="text-3xl font-bold mt-1">50</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fa-regular fa-circle-xmark text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Welcome Card -->
                <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-xl overflow-hidden mb-6">
                    <div class="px-6 py-7">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <div class="text-white">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center">
                                        <i class="fa-regular fa-hand-peace text-lg"></i>
                                    </div>
                                    <span class="text-xs font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">✨ Selamat Datang ✨</span>
                                </div>
                                <h1 class="text-xl md:text-2xl font-bold mb-1">Halo, <span class="text-accent">Admin</span>! 👋</h1>
                                <p class="text-white/85 text-sm max-w-lg leading-relaxed">Selamat datang di dashboard PPDB SMAN 1 Batang Gasan. Kelola data pendaftaran dengan mudah.</p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-16 h-16 bg-white/15 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fa-solid fa-graduation-cap text-3xl text-white/90"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Sistem -->
                <div class="bg-white rounded-2xl shadow-md p-5 border border-gray-100">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-circle-info text-primary text-sm"></i>
                        </div>
                        <h2 class="text-base font-bold text-primary">Informasi Sistem</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fa-regular fa-calendar-check text-accent text-lg"></i>
                            <div><p class="text-xs text-gray-500">Periode PPDB</p><p class="text-sm font-semibold text-primary">2026/2027</p></div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fa-regular fa-clock text-accent text-lg"></i>
                            <div><p class="text-xs text-gray-500">Batas Pendaftaran</p><p class="text-sm font-semibold text-primary">28 Februari 2026</p></div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <i class="fa-regular fa-bell text-accent text-lg"></i>
                            <div><p class="text-xs text-gray-500">Pengumuman</p><p class="text-sm font-semibold text-primary">20 Maret 2026</p></div>
                        </div>
                    </div>
                </div>
                
                <!-- Section untuk konten dinamis -->
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
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
        
        // Notifikasi
        const notifBtn = document.getElementById('notifBtn');
        if (notifBtn) {
            notifBtn.addEventListener('click', function() {
                alert('📢 Informasi PPDB\n\n📅 Pendaftaran ditutup: 28 Februari 2026\n📢 Pengumuman hasil: 20 Maret 2026\n📝 Daftar ulang: 21-25 Maret 2026');
            });
        }
        
        // Konfirmasi logout
        function confirmLogout() {
            if (confirm('⚠️ Apakah Anda yakin ingin logout?')) {
                window.location.href = '/logout';
            }
        }
        
        // Resize handler
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
        
        // Set active menu berdasarkan URL
        const currentUrl = window.location.pathname;
        document.querySelectorAll('#sidebar .nav-item').forEach(link => {
            const href = link.getAttribute('href');
            if (href && href !== '#' && currentUrl.includes(href)) {
                link.classList.add('nav-active');
            }
        });
    </script>
</body>
</html>