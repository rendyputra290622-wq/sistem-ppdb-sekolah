@extends('layouts.siswa')

@section('title', 'Dokumen PPDB')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
    <h2 class="text-2xl font-semibold text-blue-600 mb-4">Dokumen PPDB</h2>
    <p class="text-gray-700">Berikut adalah dokumen yang telah Anda unggah berdasarkan jalur pendaftaran Anda.</p>

    @if ($dokumen)
        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Dokumen</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $dokumenList = [
                        'kartu_keluarga' => 'Kartu Keluarga',
                        'akta_kelahiran' => 'Akta Kelahiran',
                        'rapor' => 'Rapor',
                        'sertifikat' => 'Sertifikat',
                        'bukti_kip_pkh' => 'Bukti KIP/PKH',
                        'surat_disabilitas' => 'Surat Disabilitas',
                        'surat_penugasan' => 'Surat Penugasan',
                        'surat_pindah' => 'Surat Pindah',
                    ];
                @endphp

@foreach ($dokumenList as $key => $label)
    <tr>
        <td class="border px-4 py-2">{{ $label }}</td>
        <td class="border px-4 py-2 text-center">
            @if (!empty($dokumen->{$key}))
                <a href="{{ asset('storage/' . $dokumen->{$key}) }}" target="_blank" class="text-blue-600 hover:underline">
                    📄 Lihat
                </a>
            @else
                <span class="text-red-500">❌ Tidak Ada</span>
            @endif
        </td>
    </tr>
@endforeach

            </tbody>
        </table>
    @else
        <div class="mt-4 p-4 bg-red-100 border border-red-400 rounded">
            <p class="text-red-700">❌ Anda belum mengunggah dokumen apapun.</p>
        </div>
    @endif
</div>
@endsection
