<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>@yield('title', 'Dashboard Siswa - SMAN 1 Batang Gasan')</title>

    <!-- Tailwind CSS + Font Awesome -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/logo.png">
    <link rel="shortcut icon" type="image/png" href="/logo.png">
    <link rel="apple-touch-icon" href="/logo.png">
    
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
        
        /* Nav item efek */
        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border-radius: 12px;
        }
        .nav-item:hover {
            background: #374151;
            padding-left: 1.5rem;
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
    <button id="mobileMenuToggle" class="mobile-menu-toggle fixed top-4 left-4 md:hidden bg-primary text-white p-2.5 rounded-xl shadow-lg">
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
                        <i class="fa-solid fa-graduation-cap text-accent text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-extrabold tracking-tight">Dashboard Siswa</h1>
                        <p class="text-[10px] text-white/50">SMAN 1 Batang Gasan</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="flex-1 py-4">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('siswa.dashboard') }}" 
                           class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2 {{ request()->routeIs('siswa.dashboard') ? 'nav-active' : '' }}">
                            <i class="fa-solid fa-chart-line w-5 text-accent"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.ppdb.persyaratan') }}" 
                           class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2 {{ request()->routeIs('siswa.ppdb.persyaratan') ? 'nav-active' : '' }}">
                            <i class="fa-regular fa-clipboard w-5 text-accent"></i>
                            <span class="font-medium">Persyaratan PPDB</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.ppdb.index') }}" 
                           class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2 {{ request()->routeIs('siswa.ppdb.index') ? 'nav-active' : '' }}">
                            <i class="fa-regular fa-pen-to-square w-5 text-accent"></i>
                            <span class="font-medium">Formulir PPDB</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.dokumen.index') }}" 
                           class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2 {{ request()->routeIs('siswa.dokumen.index') ? 'nav-active' : '' }}">
                            <i class="fa-regular fa-folder-open w-5 text-accent"></i>
                            <span class="font-medium">Dokumen</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.statusPendaftaran.index') }}" 
                           class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2 {{ request()->routeIs('siswa.statusPendaftaran.index') ? 'nav-active' : '' }}">
                            <i class="fa-regular fa-clock w-5 text-accent"></i>
                            <span class="font-medium">Status Pendaftaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.profil.index') }}" 
                           class="nav-item flex items-center gap-3 px-5 py-3 text-white/80 hover:text-white hover:bg-sidebar_hover transition-all duration-200 mx-2 {{ request()->routeIs('siswa.profil.index') ? 'nav-active' : '' }}">
                            <i class="fa-regular fa-user w-5 text-accent"></i>
                            <span class="font-medium">Profil</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Footer Sidebar - Logout -->
            <div class="p-4 border-t border-white/10 bg-[#1f2937]/90 mt-auto">
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
        <div class="main-content flex-1 flex flex-col min-h-screen">
            
            <!-- Navbar Header -->
            <header class="bg-white shadow-md sticky top-0 z-20">
                <div class="px-5 py-3 md:px-6 md:py-4">
                    <div class="flex justify-between items-center">
                        <h1 class="header-title text-lg md:text-xl font-extrabold text-primary">
                            @yield('header', 'Dashboard Siswa')
                        </h1>
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
                                    <p class="text-gray-700 text-sm font-semibold">{{ Auth::user()->name ?? 'Siswa' }}</p>
                                    <p class="text-gray-400 text-[10px]">Siswa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Scrollable -->
            <main class="flex-1 p-5 md:p-6 overflow-y-auto bg-gray-50">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-100 py-3 px-6 text-center text-xs text-gray-400">
                <div class="flex flex-wrap justify-center gap-3">
                    <span><i class="fa-regular fa-copyright"></i> {{ date('Y') }} SMAN 1 Batang Gasan</span>
                    <span>•</span>
                    <span><i class="fa-regular fa-clock"></i> PPDB Online 2026/2027</span>
                    <span>•</span>
                    <span><i class="fa-solid fa-graduation-cap"></i> Unggul, Berkarakter, Berwawasan Global</span>
                </div>
            </footer>
        </div>
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
        
        // Efek klik pada nav item dan tombol (feedback halus)
        document.querySelectorAll('.nav-item, .logout-btn, .mobile-menu-toggle').forEach(item => {
            item.addEventListener('click', function(e) {
                // Efek visual klik - timbul
                this.style.transform = 'scale(0.97)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
            // Efek hover tambahan untuk icon
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                if (icon && !icon.classList.contains('fa-sign-out-alt')) {
                    icon.style.transform = 'scale(1.05)';
                }
            });
            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = '';
                }
            });
        });
        
        // Notifikasi dengan informasi PPDB
        const notifBtn = document.getElementById('notifBtn');
        if (notifBtn) {
            notifBtn.addEventListener('click', function() {
                alert('📢 INFORMASI PPDB 2026/2027\n\n📅 Pendaftaran ditutup: 28 Februari 2026\n📢 Pengumuman hasil: 20 Maret 2026\n📝 Daftar ulang: 21-25 Maret 2026\n\n📋 Pastikan semua berkas sudah lengkap!\n📞 Bantuan: (0752) 12345');
            });
        }
        
        // Resize handler untuk transisi yang mulus
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
            if (href && href !== '#' && currentUrl === href) {
                link.classList.add('nav-active');
            } else if (href && href !== '#' && currentUrl.includes(href) && href !== '/siswa/dashboard') {
                link.classList.add('nav-active');
            }
        });
        
        // Efek ripple untuk tombol (opsional)
        function createRipple(event, element) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple-effect');
            const rect = element.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                background: rgba(255,255,255,0.3);
                border-radius: 50%;
                top: ${y}px;
                left: ${x}px;
                pointer-events: none;
                transform: scale(0);
                animation: rippleAnim 0.4s linear;
            `;
            element.style.position = 'relative';
            element.style.overflow = 'hidden';
            element.appendChild(ripple);
            setTimeout(() => ripple.remove(), 400);
        }
        
        // Tambahkan style untuk animasi ripple
        const style = document.createElement('style');
        style.textContent = `
            @keyframes rippleAnim {
                to { transform: scale(4); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>