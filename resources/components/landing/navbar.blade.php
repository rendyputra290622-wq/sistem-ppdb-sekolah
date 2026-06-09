<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">PPDB Online</div>
        <div>
            <span class="mr-4">Admin</span>
            <button class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Logout</button>
        </div>
    </nav>

    <div class="flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md h-screen">
            <div class="p-6 text-lg font-semibold border-b">Menu</div>
            <ul class="p-4 space-y-4 text-gray-700">
                <li><a href="#" class="block hover:bg-blue-100 p-2 rounded">Dashboard</a></li>
                <li><a href="#" class="block hover:bg-blue-100 p-2 rounded">Data Pendaftar</a></li>
                <li><a href="#" class="block hover:bg-blue-100 p-2 rounded">Verifikasi</a></li>
                <li><a href="#" class="block hover:bg-blue-100 p-2 rounded">Pengumuman</a></li>
                <li><a href="#" class="block hover:bg-blue-100 p-2 rounded">Pengaturan</a></li>
            </ul>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Dashboard PPDB</h1>
            <p>Selamat datang di halaman admin PPDB. Silakan pilih menu di samping.</p>
        </main>

    </div>

</body>

</html>
