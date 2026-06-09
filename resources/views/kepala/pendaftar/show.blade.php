@extends('layouts.kepala')
@section('title', 'Detail Pendaftar')

@section('content')
<a href="{{ route('kepala.pendaftar.index') }}" class="text-gray-600">&larr; Kembali</a>

<div class="bg-white p-6 rounded shadow mt-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div><span class="font-semibold">Nama:</span> {{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name }}</div>
    @if($ppdb->jalur=='prestasi')
      <div><span class="font-semibold">Nilai Rapor:</span> {{ $ppdb->nilai_rapor ?? '-' }}</div>
    @endif
    <div><span class="font-semibold">Email:</span> {{ $ppdb->user->email }}</div>
    <div><span class="font-semibold">Jalur:</span> {{ ucfirst($ppdb->jalur) }}</div>
    <div><span class="font-semibold">Status:</span> {{ ucfirst($ppdb->status) }}</div>
    <div><span class="font-semibold">Tanggal:</span> {{ $ppdb->created_at->format('d-m-Y') }}</div>
  </div>

  <hr class="my-4">

  <h3 class="font-semibold mb-2">Dokumen</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach(['kartu_keluarga','akta_kelahiran','rapor','sertifikat','bukti_kip_pkh','surat_disabilitas','surat_penugasan','surat_pindah'] as $key)
      <div class="border p-4 rounded">
        <div class="font-medium">{{ ucwords(str_replace('_',' ',$key)) }}</div>
        @if($ppdb->dokumen->{$key})
          <a href="{{ route('kepala.pendaftar.show', ['id'=>$ppdb->id, 'tipe'=>$key]) }}" class="text-blue-600" target="_blank">Lihat</a>
        @else
          <div class="text-gray-500">Belum unggah</div>
        @endif
      </div>
    @endforeach
  </div>
</div>
@endsection
