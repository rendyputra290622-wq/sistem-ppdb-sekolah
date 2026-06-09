@extends('layouts.kepala')
@section('title', 'Data Pendaftar')

@section('content')
<form method="GET" action="{{ route('kepala.pendaftar.index') }}" class="flex gap-2 mb-4">
  <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama..." class="border px-3 py-2 rounded">
  <select name="jalur" class="border px-3 py-2 rounded">
    <option value="">Semua Jalur</option>
    @foreach(['zonasi','prestasi','afirmasi','perpindahan'] as $jalur)
      <option value="{{ $jalur }}" {{ request('jalur')==$jalur ? 'selected':'' }}>{{ ucfirst($jalur) }}</option>
    @endforeach
  </select>
  <select name="status" class="border px-3 py-2 rounded">
    <option value="">Semua Status</option>
    <option value="accepted" {{ request('status')=='accepted'?'selected':'' }}>Diterima</option>
    <option value="cadangan" {{ request('status')=='cadangan'?'selected':'' }}>Cadangan</option>
    <option value="rejected" {{ request('status')=='rejected'?'selected':'' }}>Ditolak</option>
    <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Menunggu</option>
  </select>
  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
</form>

<table class="w-full table-auto border">
  <thead class="bg-gray-200">
    <tr>
      <th class="px-4 py-2">No</th>
      <th class="px-4 py-2">Nama</th>
      <th class="px-4 py-2">Jalur</th>
      <th class="px-4 py-2">Status</th>
      <th class="px-4 py-2">Tanggal</th>
    </tr>
  </thead>
  <tbody>
    @forelse($pendaftars as $i => $ppdb)
      <tr>
        <td class="border px-2 py-1">{{ $pendaftars->firstItem() + $i }}</td>
        <td class="border px-2 py-1">{{ $ppdb->user->name }}</td>
        <td class="border px-2 py-1">{{ ucfirst($ppdb->jalur) }}</td>
        <td class="border px-2 py-1">{{ ucfirst($ppdb->status) }}</td>
        <td class="border px-2 py-1">{{ $ppdb->created_at->format('d-m-Y') }}</td>
       
      </tr>
    @empty
      <tr><td colspan="6" class="text-center py-4">Belum ada data</td></tr>
    @endforelse
  </tbody>
</table>

<div class="mt-4">{{ $pendaftars->links() }}</div>
@endsection
