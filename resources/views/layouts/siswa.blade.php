<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Siswa')</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/logo.png">
</head>
<body class="bg-gray-100">

    <!-- Wrapper -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-blue-600 text-white flex flex-col p-4 h-screen overflow-y-auto">
            <h2 class="text-xl font-bold text-center mb-6">Dashboard Siswa</h2>

            <nav class="flex-1">
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('siswa.dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-500">🏠 Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('siswa.ppdb.persyaratan') }}" class="block py-2 px-4 rounded hover:bg-blue-500">📄 Persyaratan PPDB </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('siswa.ppdb.index') }}" class="block py-2 px-4 rounded hover:bg-blue-500">📄 PPDB</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('siswa.dokumen.index') }}" class="block py-2 px-4 rounded hover:bg-blue-500">📂 Dokumen</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('siswa.statusPendaftaran.index') }}" class="block py-2 px-4 rounded hover:bg-blue-500">📊 Status Pendaftaran</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('siswa.profil.index') }}" class="block py-2 px-4 rounded hover:bg-blue-500">👤 Profil</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('logout') }}" class="block py-2 px-4 rounded hover:bg-red-500">🚪 Logout</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">

            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex justify-between px-12">
                <h1 class="text-xl font-semibold">@yield('title', 'Dashboard Siswa')</h1>
                <span class="text-gray-700">👋 Hai, {{ Auth::user()->name }}</span>
            </header>

            <!-- Content Scrollable -->
            <main class="p-6 flex-1 overflow-y-auto">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-gray-200 text-center p-3 text-sm text-gray-600">
                &copy; {{ date('Y') }} Sistem PPDB SMAN 1 Batang Gasan | Hak Cipta Dilindungi
            </footer>
        </div>

    </div>

</body>
</html>
