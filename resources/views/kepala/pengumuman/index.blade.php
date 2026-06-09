@extends('layouts.kepala')
@section('title', 'Kelola Pengumuman')

@section('content')
<a href="{{ route('kepala.pengumuman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Buat Pengumuman</a>

<table class="w-full mt-6 table-auto border-collapse">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="px-4 py-2 border">#</th>
            <th class="px-4 py-2 border">Judul</th>
            <th class="px-4 py-2 border">Tanggal</th>
            <th class="px-4 py-2 border">Ditampilkan Untuk</th>
            <th class="px-4 py-2 border">Lampiran</th>
            <th class="px-4 py-2 border text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pengumumans as $i => $p)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $pengumumans->firstItem() + $i }}</td>
            <td class="border px-4 py-2">{{ $p->judul }}</td>
            <td class="border px-4 py-2">{{ $p->tanggal ? \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') : '-' }}</td>
            <td class="border px-4 py-2 capitalize">{{ $p->ditampilkan_ke ?? 'semua' }}</td>
            <td class="border px-4 py-2">
                @if ($p->lampiran)
                    <a href="{{ asset('storage/' . $p->lampiran) }}" target="_blank" class="text-blue-600 hover:underline">📄 Lihat</a>
                    <form action="{{ route('kepala.pengumuman.destroy', $p->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        {{-- <button onclick="return confirm('Hapus lampiran ini?')" class="text-red-600 ml-2 hover:underline">🗑️ Hapus</button> --}}
                    </form>
                @else
                    <span class="text-gray-500">-</span>
                @endif
            </td>
            <td class="border px-4 py-2 text-center space-x-2">
                <form action="{{ route('kepala.pengumuman.destroy', $p) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapus pengumuman ini?')" class="text-red-600 hover:underline">🗑️ Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada pengumuman.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $pengumumans->links() }}
</div>
@endsection
