@extends('layouts.siswa')

@section('title', 'Status Pendaftaran PPDB')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg space-y-8 max-w-4xl mx-auto">
    <h2 class="text-3xl font-semibold text-blue-600 mb-6">Status Pendaftaran PPDB</h2>

    {{-- Belum daftar --}}
    @if(isset($error))
        <div class="bg-red-100 p-4 rounded-md shadow-sm">
            <p class="text-red-700">{{ $error }}</p>
        </div>

    {{-- Sudah daftar tapi belum diverifikasi --}}
    @elseif(isset($pending) && $pending === true)
        <div class="bg-yellow-100 p-4 rounded-md shadow-sm text-yellow-700">
            <p class="font-semibold">✅ Anda sudah mengirim formulir pendaftaran.</p>
            <p>Status saat ini: <strong>Menunggu Verifikasi Admin</strong>.</p>
            <p>Silakan cek kembali nanti atau hubungi pihak sekolah untuk info lebih lanjut.</p>
        </div>

    {{-- Sudah diverifikasi --}}
    @else
        {{-- Biodata --}}
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Biodata Pendaftar</h3>
            <table class="w-full text-sm text-gray-700 border-separate border-spacing-2">
                <tr><td class="font-semibold">Nama Lengkap</td><td class="text-right">{{ $siswa->nama_lengkap ?? '-' }}</td></tr>
                <tr><td class="font-semibold">NIK</td><td class="text-right">{{ $siswa->nik ?? '-' }}</td></tr>
                <tr><td class="font-semibold">Tanggal Lahir</td><td class="text-right">{{ $siswa->tanggal_lahir ?? '-' }}</td></tr>
                <tr><td class="font-semibold">Alamat</td><td class="text-right">{{ $siswa->alamat ?? '-' }}</td></tr>
                <tr><td class="font-semibold">Jenis Kelamin</td><td class="text-right">{{ $siswa->jenis_kelamin ?? '-' }}</td></tr>
            </table>
        </div>

        {{-- Status Pendaftaran --}}
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Status Pendaftaran</h3>
            <table class="w-full text-sm text-gray-700 border-separate border-spacing-2">
                <tr>
                    <td class="font-semibold">Status Pendaftaran</td>
                    <td class="text-right">
                        @switch($pendaftaran->status)
                            @case('accepted')
                                <span class="text-green-600 font-semibold">Diterima</span>
                                @break
                            @case('cadangan')
                                <span class="text-yellow-600 font-semibold">Cadangan</span>
                                @break
                            @case('rejected')
                                <span class="text-red-600 font-semibold">Ditolak</span>
                                @break
                            @default
                                <span class="text-blue-600 font-semibold">Dalam Proses</span>
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Tanggal Pendaftaran</td>
                    <td class="text-right">{{ $pendaftaran->created_at->format('d-m-Y') }}</td>
                </tr>
            </table>
        </div>

{{-- Status Dokumen --}}
<div class="bg-gray-50 p-6 rounded-lg shadow-md">
    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Status Dokumen</h3>
    <table class="w-full text-sm text-gray-700 border-separate border-spacing-2">
        @foreach ([
            'kartu_keluarga' => 'Kartu Keluarga',
            'akta_kelahiran' => 'Akta Kelahiran',
            'rapor' => 'Rapor',
            'sertifikat' => 'Sertifikat',
            'bukti_kip_pkh' => 'Bukti KIP/PKH',
            'surat_disabilitas' => 'Surat Disabilitas',
            'surat_penugasan' => 'Surat Penugasan',
            'surat_pindah' => 'Surat Pindah',
        ] as $key => $label)
            <tr>
                <td class="font-semibold">{{ $label }}</td>
                <td class="text-right">
                    @if ($dokumen && $dokumen->{$key})
                        <span class="text-green-600 font-semibold">✅ Ada</span>
                    @else
                        <span class="text-red-500 font-semibold">❌ Tidak Ada</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>


        {{-- Riwayat --}}
        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Riwayat Pendaftaran</h3>
            <table class="w-full text-sm text-gray-700 border-separate border-spacing-2">
                <tr>
                    <td class="font-semibold">Terakhir Diperbarui</td>
                    <td class="text-right">{{ $pendaftaran->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Status Terakhir</td>
                    <td class="text-right">
                        @switch($pendaftaran->status)
                            @case('accepted')
                                <span class="text-green-600 font-semibold">Diterima</span>
                                @break
                            @case('cadangan')
                                <span class="text-yellow-600 font-semibold">Cadangan</span>
                                @break
                            @case('rejected')
                                <span class="text-red-600 font-semibold">Ditolak</span>
                                @break
                            @default
                                <span class="text-blue-600 font-semibold">Dalam Proses</span>
                        @endswitch
                    </td>
                </tr>
            </table>
        </div>
    @endif
</div>
@endsection
