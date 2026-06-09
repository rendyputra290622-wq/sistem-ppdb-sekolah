@extends('layouts.kepala')

@section('title', 'Laporan PPDB')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Laporan PPDB</h2>

    <!-- Rekapitulasi Pendaftaran -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="p-4 bg-blue-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Total Pendaftar</p>
            <p class="text-2xl">{{ $totalPendaftar }}</p>
        </div>
        <div class="p-4 bg-green-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Diterima</p>
            <p class="text-2xl">{{ $totalDiterima }}</p>
        </div>
        <div class="p-4 bg-yellow-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Cadangan</p>
            <p class="text-2xl">{{ $totalCadangan }}</p>
        </div>
        <div class="p-4 bg-red-500 text-white rounded-lg shadow">
            <p class="text-lg font-bold">Ditolak</p>
            <p class="text-2xl">{{ $totalDitolak }}</p>
        </div>
    </div>

    <!-- Filter -->
    <form method="GET" action="{{ route('kepala.laporan.index') }}" class="mb-4 flex gap-4 flex-wrap">
        <input type="text" name="search" placeholder="Cari Nama Siswa..." value="{{ request('search') }}" class="p-2 border rounded w-full md:w-auto">
        <select name="status" class="p-2 border rounded">
            <option value="">Semua Status</option>
            <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
            <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
        </select>
        <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="p-2 border rounded">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
    </form>

    <!-- Tabel Data -->
    <table class="w-full border-collapse border border-gray-300 mb-6">
        <thead>
            <tr class="bg-gray-800 text-white text-center">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">NISN</th>
                <th class="border px-4 py-2">Jalur</th>
                <th class="border px-4 py-2">JK</th>
                <th class="border px-4 py-2">Asal Sekolah</th>
                <th class="border px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftars as $i => $p)
                @php
                    $statusText = [
                        'accepted' => 'Diterima',
                        'cadangan' => 'Cadangan',
                        'rejected' => 'Ditolak',
                        'pending' => 'Menunggu'
                    ][$p->status];

                    $badgeColor = [
                        'accepted' => 'bg-green-600',
                        'cadangan' => 'bg-yellow-500',
                        'rejected' => 'bg-red-500',
                        'pending' => 'bg-gray-500'
                    ][$p->status];
                @endphp
                <tr class="text-center hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $i + 1 }}</td>
                    <td class="border px-4 py-2">{{ $p->user->name }}</td>
                    <td class="border px-4 py-2">{{ $p->siswa->nisn ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($p->jalur) }}</td>
                    <td class="border px-4 py-2">{{ $p->siswa->jenis_kelamin ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $p->siswa->asal_sekolah ?? '-' }}</td>
                    <td class="border px-4 py-2">
                        <span class="px-2 py-1 text-white rounded {{ $badgeColor }}">{{ $statusText }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $pendaftars->links() }}
    </div>
</div>
@endsection
