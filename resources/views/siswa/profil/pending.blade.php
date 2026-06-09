@extends('layouts.siswa')

@section('title', 'Verifikasi Pendaftaran')

@section('content')
<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-5 max-w-3xl mx-auto mt-6 rounded">
    <h2 class="text-xl font-bold mb-2">⏳ Menunggu Verifikasi</h2>
    <p>Pendaftaran Anda masih <strong>menunggu verifikasi admin</strong>.</p>
    <p>Silakan cek kembali nanti. Anda dapat melihat status pendaftaran pada halaman utama.</p>

    <div class="mt-4">
        <a href="{{ route('siswa.ppdb.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            🔙 Kembali ke Halaman Pendaftaran
        </a>
    </div>
</div>
@endsection
