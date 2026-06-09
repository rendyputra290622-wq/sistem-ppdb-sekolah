@extends('layouts.siswa')

@section('title', 'Profil Pendaftar')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
    <h2 class="text-3xl font-semibold text-blue-700 mb-6">Profil Pendaftaran</h2>

    @if(session('success'))
        <div class="bg-green-100 p-4 rounded-lg mb-6">
            <p class="text-green-700 font-semibold">{{ session('success') }}</p>
        </div>
    @endif

    @if (!$ppdbPendaftaran)
        <div class="bg-red-100 p-4 rounded-lg mb-6">
            <p class="text-red-700 font-semibold">❌ Data pendaftaran tidak ditemukan. Silakan lakukan pendaftaran terlebih dahulu.</p>
        </div>
    @else
        <div class="mb-6">
            <h3 class="text-2xl font-semibold text-gray-800">Status Pendaftaran</h3>
            <p class="text-sm mb-2">Jalur: <strong>{{ ucfirst($ppdbPendaftaran->jalur) }}</strong></p>
            <p class="text-sm mb-2">Status:
                @if($ppdbPendaftaran->status === 'pending')
                    <span class="text-yellow-600 font-semibold">Menunggu Verifikasi</span>
                @elseif($ppdbPendaftaran->status === 'accepted')
                    <span class="text-green-600 font-semibold">Diterima</span>
                @elseif($ppdbPendaftaran->status === 'rejected')
                    <span class="text-red-600 font-semibold">Ditolak</span>
                @else
                    {{ ucfirst($ppdbPendaftaran->status) }}
                @endif
            </p>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg shadow mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Status Dokumen</h3>
            <table class="w-full text-sm">
                @foreach (['kartu_keluarga' => 'Kartu Keluarga', 'akta_kelahiran' => 'Akta Kelahiran', 'rapor' => 'Rapor', 'sertifikat' => 'Sertifikat'] as $key => $label)
                    <tr class="border-b">
                        <td class="py-2 font-medium">{{ $label }}</td>
                        <td class="py-2 text-right">
                            @if ($dokumen && $dokumen->{$key})
                                <a href="{{ route('siswa.dokumen.show', ['user_id' => auth()->id(), 'tipe' => $key]) }}" class="text-blue-600 hover:underline">📄 Lihat</a>
                            @else
                                <span class="text-red-500">❌ Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        @if($ppdbPendaftaran->status !== 'accepted')
            <div class="bg-yellow-100 p-4 rounded-lg shadow text-sm text-yellow-800 mb-6">
                ⚠️ Anda belum bisa mengisi atau mengedit biodata sebelum pendaftaran Anda diterima oleh admin.
            </div>
        @else
            <!-- Form Edit Biodata -->
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Lengkapi Biodata Diri</h3>
                <form action="{{ route('siswa.profil.update', auth()->id()) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ $siswa->nama_lengkap ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">NIK</label>
                            <input type="text" name="nik" value="{{ $siswa->nik ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">NISN</label>
                            <input type="text" name="nisn" value="{{ $siswa->nisn ?? '' }}" class="w-full p-3 border rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full p-3 border rounded-lg" required>
                                <option value="Laki-laki" {{ ($siswa->jenis_kelamin ?? '') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ ($siswa->jenis_kelamin ?? '') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Agama</label>
                            <select name="agama" class="w-full p-3 border rounded-lg" required>
                                @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'] as $agama)
                                    <option value="{{ $agama }}" {{ ($siswa->agama ?? '') === $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium">Alamat</label>
                            <textarea name="alamat" class="w-full p-3 border rounded-lg" required>{{ $siswa->alamat ?? '' }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">No HP</label>
                            <input type="text" name="no_hp" value="{{ $siswa->no_hp ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" value="{{ $siswa->asal_sekolah ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                    </div>

                    <h4 class="mt-6 text-lg font-semibold">Informasi Orang Tua</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div>
                            <label class="block text-sm font-medium">Nama Ayah</label>
                            <input type="text" name="nama_ayah" value="{{ $siswa->nama_ayah ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" value="{{ $siswa->pekerjaan_ayah ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Nama Ibu</label>
                            <input type="text" name="nama_ibu" value="{{ $siswa->nama_ibu ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" value="{{ $siswa->pekerjaan_ibu ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">No HP Orang Tua</label>
                            <input type="text" name="no_hp_ortu" value="{{ $siswa->no_hp_ortu ?? '' }}" class="w-full p-3 border rounded-lg" required>
                        </div>
                    </div>

                    <button type="submit" class="mt-6 bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700">Simpan Biodata</button>
                </form>
            </div>
        @endif
    @endif
</div>
@endsection
