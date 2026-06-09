@extends('layouts.siswa')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">Status Pendaftaran PPDB</h2>
    <p class="text-gray-700 mb-6">Silakan lengkapi formulir pendaftaran dan unggah dokumen yang diperlukan untuk mengikuti proses seleksi PPDB.</p>

    @if(session('success'))
        <div class="p-4 mb-4 rounded bg-green-100 text-green-800 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if($ppdb)
        <div class="p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg">
            <p class="font-semibold mb-2">✅ Anda sudah mendaftar PPDB.</p>
            <ul class="text-sm space-y-1">
                <li><strong>Nama Lengkap:</strong> {{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name }}</li>
                <li><strong>Email:</strong> {{ $ppdb->user->email }}</li>
                <li><strong>Jalur:</strong> {{ ucfirst($ppdb->jalur) }}</li>
                <li><strong>Tanggal Daftar:</strong> {{ $ppdb->created_at->format('d-m-Y') }}</li>
                <li><strong>Status:</strong>
                    @if($ppdb->status === 'pending')
                        <span class="text-yellow-600 font-medium">Menunggu Verifikasi</span>
                    @elseif($ppdb->status === 'accepted')
                        <span class="text-green-600 font-medium">Diterima</span>
                    @elseif($ppdb->status === 'rejected')
                        <span class="text-red-600 font-medium">Ditolak</span>
                    @elseif($ppdb->status === 'cadangan')
                        <span class="text-orange-600 font-medium">Cadangan</span>
                    @else
                        <span class="text-gray-600">{{ ucfirst($ppdb->status) }}</span>
                    @endif
                </li>
            </ul>

            {{-- Tombol Cetak jika diterima --}}
            @if($ppdb->status === 'accepted')
                <div class="mt-4">
                    <a href="{{ route('siswa.ppdb.cetak') }}" target="_blank"
                        class="inline-block bg-purple-600 text-white px-4 py-2 rounded-lg shadow hover:bg-purple-700 transition">
                        🖨️ Cetak Bukti Pendaftaran
                    </a>
                </div>
            @endif
        </div>
    @else
        <div class="mt-6">
            <a href="{{ route('siswa.ppdb.form') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                <span>📋</span> <span>Isi Formulir Pendaftaran</span>
            </a>
        </div>
    @endif
</div>
@endsection
