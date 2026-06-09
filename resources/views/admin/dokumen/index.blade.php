@extends('layouts.admin')

@section('title', 'Dokumen Siswa')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Dokumen Siswa</h2>

    <!-- Form Pencarian & Filter Status -->
    <form method="GET" action="{{ route('admin.dokumen.index') }}" class="mb-4 flex space-x-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama siswa..."
            class="border px-4 py-2 rounded-lg w-1/3">

        <select name="status" class="border px-4 py-2 rounded-lg">
            <option value="">Semua Status</option>
            <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
            <option value="cadangan" {{ request('status') == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
        </select>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Cari
        </button>
    </form>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-red-500 text-white text-center">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Siswa</th>
                <th class="border border-gray-300 px-4 py-2">Dokumen</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftars as $pendaftar)
                <tr class="hover:bg-red-100 text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($pendaftars->firstItem() - 1) }}</td>

                    <td class="border border-gray-300 px-4 py-2 text-left font-semibold">
                        {{ $pendaftar->siswa->nama_lengkap ?? $pendaftar->user->name }}
                    </td>

                    <!-- Kolom Dokumen -->
                    <td class="border border-gray-300 px-4 py-2">
                        @php
                            $hasDokumen = $pendaftar->dokumen()->exists();
                        @endphp
                        @if ($hasDokumen)
                            <span class="text-green-600">✅ Ada</span>
                        @else
                            <span class="text-red-500">❌ Tidak Ada</span>
                        @endif
                    </td>

                    <!-- Kolom Status -->
                    <td class="border border-gray-300 px-4 py-2 font-semibold">
                        @switch($pendaftar->status)
                            @case('accepted')
                                <span class="text-green-600">✅ Diterima</span>
                                @break
                            @case('cadangan')
                                <span class="text-yellow-600">⏳ Cadangan</span>
                                @break
                            @case('rejected')
                                <span class="text-red-600">❌ Ditolak</span>
                                @break
                            @case('pending')
                            @default
                                <span class="text-blue-600">🔍 Sedang Diverifikasi</span>
                        @endswitch
                    </td>

                    <!-- Kolom Aksi -->
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.ppdb.show', $pendaftar->id) }}"
                            class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Lihat
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center border border-gray-300 px-4 py-2 text-gray-500">
                        Tidak ada data pendaftar
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $pendaftars->links() }}
    </div>
</div>
@endsection
