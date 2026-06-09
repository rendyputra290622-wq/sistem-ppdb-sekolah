@extends('layouts.admin')

@section('title', 'PPDB - Daftar Pendaftar')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Daftar Pendaftar PPDB</h1>

    @include('components.alert')

    <!-- Filter -->
    <div class="flex flex-wrap items-center justify-between bg-white p-4 rounded-lg shadow-md mb-4">
        <form method="GET" action="{{ route('admin.ppdb.index') }}" class="flex flex-wrap gap-2 items-center">
            <input type="text" name="search" placeholder="Cari nama..." value="{{ request('search') }}"
                class="px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">

            <select name="status" class="px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                <option value="">Semua Status</option>
                <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
                <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
            </select>

            <select name="jalur" class="px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                <option value="">Semua Jalur</option>
                <option value="zonasi" {{ request('jalur') == 'zonasi' ? 'selected' : '' }}>Zonasi</option>
                <option value="prestasi" {{ request('jalur') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                <option value="afirmasi" {{ request('jalur') == 'afirmasi' ? 'selected' : '' }}>Afirmasi</option>
                <option value="perpindahan" {{ request('jalur') == 'perpindahan' ? 'selected' : '' }}>Perpindahan</option>
            </select>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Filter
            </button>
        </form>
    </div>

    <!-- Tabel Pendaftar -->
    <div class="bg-white p-4 rounded-lg shadow-md overflow-x-auto">
        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Jalur</th>
                    @if(request('jalur') === 'prestasi')
                        <th class="p-3 border">Nilai Rapor</th>
                    @endif
                    <th class="p-3 border">Tanggal Daftar</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendaftars as $index => $ppdb)
                    @php
                        $status = $ppdb->status ?? 'pending';
                        $statusLabel = [
                            'accepted' => 'Diterima',
                            'cadangan' => 'Cadangan',
                            'rejected' => 'Ditolak',
                            'pending'  => 'Menunggu',
                        ];
                        $statusColor = [
                            'accepted' => 'bg-green-500',
                            'cadangan' => 'bg-yellow-500',
                            'rejected' => 'bg-red-500',
                            'pending'  => 'bg-gray-500',
                        ];
                    @endphp
                    <tr class="border hover:bg-gray-50">
                        <td class="p-3 border">{{ $pendaftars->firstItem() + $loop->index }}</td>
                        <td class="p-3 border">{{ $ppdb->user->name ?? '-' }}</td>
                        <td class="p-3 border">{{ $ppdb->user->email ?? '-' }}</td>
                        <td class="p-3 border capitalize">{{ $ppdb->jalur ?? '-' }}</td>

                        @if(request('jalur') === 'prestasi')
                            <td class="p-3 border font-semibold text-center">{{ $ppdb->nilai_rapor ?? '-' }}</td>
                        @endif

                        <td class="p-3 border">{{ $ppdb->created_at->format('d-m-Y') }}</td>
                        <td class="p-3 border">
                            <span class="px-2 py-1 rounded text-white text-xs {{ $statusColor[$status] ?? 'bg-gray-400' }}">
                                {{ $statusLabel[$status] ?? ucfirst($status) }}
                            </span>
                        </td>
                        <td class="p-3 border text-center">
                            <a href="{{ route('admin.ppdb.show', $ppdb->id) }}"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Lihat
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-4 text-gray-500">Tidak ada data pendaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $pendaftars->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
