<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#B91C1C',  /* Merah tua */
                        secondary: '#1F2937', /* Hitam keabuan */
                        hover: '#EF4444',     /* Hover merah terang */
                        bg_sidebar: '#F3F4F6', /* Latar belakang sidebar */
                        danger: '#DC2626'     /* Merah untuk tombol logout */
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-gray-100">

    <!-- Wrapper -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-bg_sidebar text-secondary shadow-lg h-screen overflow-y-auto">
            <div class="p-4 text-xl font-bold flex items-center gap-2 text-primary">
                🏠 Admin Panel
            </div>
            <ul class="mt-4 space-y-1">
                <li class="px-4 py-3 hover:bg-hover flex items-center gap-2">
                    🏠 <a href ="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <!-- Dropdown Manajemen Pengguna -->
                <li class="relative">
                    <button onclick="toggleDropdown('userDropdown')" class="w-full text-left px-4 py-3 hover:bg-hover flex justify-between items-center">
                        👤 Manajemen Pengguna
                        <span id="userArrow" class="transition-transform transform rotate-0">▼</span>
                    </button>
                    <ul id="userDropdown" class="hidden bg-primary text-white mt-1 rounded-md shadow-md">
                        <li><a href="{{ route('admin.pengguna.index') }}" class="block px-6 py-2 hover:bg-hover">📋 List Pengguna</a></li>
                        <li><a href="{{ route('admin.pengguna.add') }}" class="block px-6 py-2 hover:bg-hover">➕ Tambah Pengguna</a></li>
                    </ul>
                </li>

                <!-- Dropdown Data PPDB -->
                <li class="relative">
                    <button onclick="toggleDropdown('ppdbDropdown')" class="w-full text-left px-4 py-3 hover:bg-hover flex justify-between items-center">
                        📁 Data PPDB
                        <span id="ppdbArrow" class="transition-transform transform rotate-0">▼</span>
                    </button>
                    <ul id="ppdbDropdown" class="hidden bg-primary text-white mt-1 rounded-md shadow-md">
                        <li><a href="{{ route('admin.ppdb.index') }}" class="block px-6 py-2 hover:bg-hover">📜 Semua Data</a></li>
                        <li><a href="{{ route('admin.dokumen.index') }}" class="block px-6 py-2 hover:bg-hover">📑 Data Dokumen</a></li>
                        <li><a href="{{ route('admin.diterima.index') }}" class="block px-6 py-2 hover:bg-hover">✅ Data Diterima</a></li>
                        <li><a href="{{ route('admin.cadangan.index') }}" class="block px-6 py-2 hover:bg-hover">🟡 Data Cadangan</a></li>
                        <li><a href="{{ route('admin.ditolak.index') }}" class="block px-6 py-2 hover:bg-hover">❌ Data Ditolak</a></li>
                    </ul>
                </li>

                <li class="px-4 py-3 hover:bg-hover flex items-center gap-2">
                    🏷️ <a href="#">Profil</a>
                </li>

                <li class="px-4 py-3 hover:bg-hover flex items-center gap-2">
                    📊 <a href="{{ route('admin.laporan.index') }}">Laporan</a>
                </li>

               <li class="mb-2">
                        <a href="{{ route('logout') }}" class="block py-2 px-4 rounded hover:bg-red-500">🚪 Logout</a>
                    </li>

                <form id="logout-form" action="#" method="POST" class="hidden">
                    @csrf
                </form>
            </ul>
        </aside>

        <!-- Content -->
        <main class="flex-1 flex flex-col h-screen overflow-hidden">
            <!-- Header -->
            <div class="p-6 bg-white shadow-md">
                <h1 class="text-2xl font-semibold text-secondary">@yield('header')</h1>
            </div>

            <!-- Content Scrollable -->
            <div class="flex-1 p-6 overflow-y-auto">
                <div class="bg-white shadow-md p-4 rounded-lg">
                    @yield('content')
                </div>
            </div>
        </main>

    </div>

    <!-- Scripts -->
    <script>
        function toggleDropdown(menuId) {
            let menu = document.getElementById(menuId);
            let arrow = document.getElementById(menuId === 'userDropdown' ? 'userArrow' : 'ppdbArrow');

            menu.classList.toggle("hidden");
            arrow.classList.toggle("rotate-180");
        }
    </script>

</body>
</html>

{{-- </html> --}}
