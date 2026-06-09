@extends('layouts.admin')

@section('title', 'Detail Pendaftar PPDB')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">Detail Pendaftar PPDB</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Informasi Siswa --}}
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Informasi Lengkap Siswa</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div><span class="font-semibold">Nama Lengkap:</span> {{ $ppdb->siswa->nama_lengkap ?? $ppdb->user->name ?? '-' }}</div>
            <div><span class="font-semibold">Email:</span> {{ $ppdb->user->email ?? '-' }}</div>

            @if($ppdb->jalur === 'prestasi')
                <div><span class="font-semibold bg-green-500 text-white p-1 rounded">Nilai Rapor:</span> {{ $ppdb->nilai_rapor ?? '-' }}</div>
            @endif

            <div><span class="font-semibold">NIK:</span> {{ $ppdb->siswa->nik ?? '-' }}</div>
            <div><span class="font-semibold">NISN:</span> {{ $ppdb->siswa->nisn ?? '-' }}</div>

            <div><span class="font-semibold">Tempat Lahir:</span> {{ $ppdb->siswa->tempat_lahir ?? '-' }}</div>
            <div><span class="font-semibold">Tanggal Lahir:</span> {{ $ppdb->siswa->tanggal_lahir ?? '-' }}</div>

            <div><span class="font-semibold">Jenis Kelamin:</span> {{ $ppdb->siswa->jenis_kelamin ?? '-' }}</div>
            <div><span class="font-semibold">Agama:</span> {{ $ppdb->siswa->agama ?? '-' }}</div>

            <div><span class="font-semibold">No HP:</span> {{ $ppdb->siswa->no_hp ?? $ppdb->no_hp ?? '-' }}</div>
            <div><span class="font-semibold">Alamat:</span> {{ $ppdb->siswa->alamat ?? $ppdb->alamat ?? '-' }}</div>

            <div><span class="font-semibold">Asal Sekolah:</span> {{ $ppdb->siswa->asal_sekolah ?? '-' }}</div>
            <div><span class="font-semibold">Jalur Pendaftaran:</span> {{ ucfirst($ppdb->jalur ?? '-') }}</div>

            <div><span class="font-semibold">Tanggal Pendaftaran:</span> {{ $ppdb->created_at->format('d-m-Y') }}</div>

            <div class="flex items-center gap-2">
                <span class="font-semibold">Status:</span>
                <form action="{{ route('admin.ppdb.updateStatus', $ppdb->id) }}" method="POST" class="flex items-center gap-2">
                    @csrf
                    <select name="status" class="px-3 py-1 border rounded">
                        <option value="accepted" {{ $ppdb->status === 'accepted' ? 'selected' : '' }}>Diterima</option>
                        <option value="cadangan" {{ $ppdb->status === 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                        <option value="rejected" {{ $ppdb->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        <option value="pending" {{ $ppdb->status === 'pending' ? 'selected' : '' }}>Menunggu</option>
                    </select>
                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update
                    </button>
                </form>
            </div>

            {{-- Informasi Orang Tua --}}
            <div class="col-span-2 border-t pt-4 mt-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Orang Tua</h3>
            </div>
            <div><span class="font-semibold">Nama Ayah:</span> {{ $ppdb->siswa->nama_ayah ?? '-' }}</div>
            <div><span class="font-semibold">Pekerjaan Ayah:</span> {{ $ppdb->siswa->pekerjaan_ayah ?? '-' }}</div>

            <div><span class="font-semibold">Nama Ibu:</span> {{ $ppdb->siswa->nama_ibu ?? '-' }}</div>
            <div><span class="font-semibold">Pekerjaan Ibu:</span> {{ $ppdb->siswa->pekerjaan_ibu ?? '-' }}</div>

            <div><span class="font-semibold">No HP Orang Tua:</span> {{ $ppdb->siswa->no_hp_ortu ?? '-' }}</div>
        </div>
    </div>

    {{-- Dokumen Pendaftaran --}}
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h2 class="text-xl font-semibold mb-3">Dokumen Pendaftaran</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
                $dokumen = $ppdb->dokumen;
                $listDokumen = [
                    'kartu_keluarga'    => 'Kartu Keluarga',
                    'akta_kelahiran'    => 'Akta Kelahiran',
                    'rapor'             => 'Rapor',
                    'sertifikat'        => 'Sertifikat',
                    'bukti_kip_pkh'     => 'Bukti KIP/PKH',
                    'surat_disabilitas' => 'Surat Disabilitas',
                    'surat_penugasan'   => 'Surat Penugasan',
                    'surat_pindah'      => 'Surat Pindah',
                ];
            @endphp

            @foreach($listDokumen as $key => $label)
                <div class="border p-4 rounded-lg">
                    <p class="font-semibold">{{ $label }}</p>
                    @if($dokumen && $dokumen->$key)
                        <a href="{{ route('admin.ppdb.show', ['id' => $ppdb->user_id, 'tipe' => $key]) }}"
                           target="_blank"
                           class="inline-block mt-2 px-3 py-1 bg-purple-600 text-white rounded hover:bg-purple-700">
                            📄 Lihat Dokumen
                        </a>
                    @else
                        <p class="text-gray-500 mt-2">❌ Belum diunggah</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-6">
        <a href="{{ route('admin.ppdb.index') }}"
           class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
            ← Kembali ke Daftar Pendaftar
        </a>
    </div>
</div>
@endsection
