<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Panel Kepala Sekolah</title>
    @vite('resources/css/app.css') {{-- Jika pakai Vite --}}
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-blue-800 text-white px-6 py-4 shadow-md">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">📘 Panel Kepala Sekolah</h1>
            <div class="flex items-center">
                <span class="mr-4">👤 {{ auth()->user()->name }}</span>
                        <a href="{{ route('logout') }}" class="block py-2 px-4 rounded hover:bg-red-500">🚪 Logout</a>
            </div>
        </div>
    </nav>

    <!-- Sidebar + Content -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-5 hidden md:block">
            <h2 class="text-lg font-bold mb-4 text-gray-700">📂 Menu Utama</h2>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('kepala.dashboard') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('kepala.dashboard') ? 'bg-blue-200 font-bold' : '' }}">
                        🏠 Dashboard PPDB
                    </a>
                </li>
                <li>
                    <a href="{{ route('kepala.pengumuman.index') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->is('kepala/pengumuman*') ? 'bg-blue-200 font-bold' : '' }}">
                        📢 Kelola Pengumuman
                    </a>
                </li>
                <li>
                    <a href="{{ route('kepala.pendaftar.index') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->is('kepala/pendaftar*') ? 'bg-blue-200 font-bold' : '' }}">
                        👥 Data Pendaftar
                    </a>
                </li>
                <li>
                    <a href="{{ route('kepala.laporan.index') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->is('kepala/laporan*') ? 'bg-blue-200 font-bold' : '' }}">
                        📄 Laporan & Cetak
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
