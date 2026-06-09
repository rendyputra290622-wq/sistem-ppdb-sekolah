@extends('layouts.admin')

@section('title', 'Siswa Cadangan')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Daftar Siswa Cadangan</h2>

    {{-- Form Pencarian --}}
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.cadangan.index') }}" class="flex gap-2">
            <input type="text" name="search" placeholder="Cari nama siswa..."
                class="border px-3 py-2 rounded-lg w-1/3" value="{{ request('search') }}">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Cari
            </button>
        </form>
    </div>

    {{-- Tabel Data --}}
    @if($pendaftars->count())
    <table class="w-full border-collapse border border-gray-300 text-sm">
        <thead>
            <tr class="bg-yellow-500 text-white text-center">
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Lengkap</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Jalur</th>
                <th class="border border-gray-300 px-4 py-2">Tanggal Pendaftaran</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftars as $index => $ppdb)
                <tr class="hover:bg-yellow-100 text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $pendaftars->firstItem() + $index }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-left">{{ $ppdb->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ppdb->user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst($ppdb->jalur ?? '-') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ppdb->created_at->format('d-m-Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('admin.ppdb.show', $ppdb->id) }}"
                            class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $pendaftars->links() }}
    </div>
    @else
        <p class="text-gray-500 text-center py-6">Belum ada siswa cadangan.</p>
    @endif
</div>
@endsection
