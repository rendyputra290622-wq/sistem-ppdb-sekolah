@extends('layouts.siswa')

@section('content')
<div class="max-w-5xl mx-auto mt-10 px-6 py-8 bg-white shadow-lg rounded-2xl border border-gray-200">
    <div class="flex items-center gap-3 mb-6">
        <i data-lucide="file-text" class="w-8 h-8 text-blue-600"></i>
        <h1 class="text-3xl font-bold text-gray-800">Persyaratan Pendaftaran PPDB</h1>
    </div>

    <div class="space-y-6 text-gray-700 text-lg leading-relaxed">
        <div>
            <h2 class="text-xl font-semibold text-blue-700 flex items-center gap-2">
                <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i> Persyaratan Umum
            </h2>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li>Usia maksimal <strong>21 tahun</strong> pada tanggal 1 Juli tahun berjalan.</li>
                <li>Telah menyelesaikan kelas 9 SMP atau sederajat.</li>
                <li>Akta kelahiran atau surat keterangan lahir yang dilegalisir.</li>
                <li>Kartu Keluarga (KK) minimal terbit 1 tahun sebelum pendaftaran.</li>
                <li>Jika ada perubahan KK, wajib menyertakan surat dari Dinas Dukcapil.</li>
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-blue-700 flex items-center gap-2">
                <i data-lucide="layers" class="w-5 h-5 text-yellow-500"></i> Persyaratan Khusus per Jalur
            </h2>

            <div class="mt-3 space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                        <i data-lucide="map-pin" class="w-5 h-5 text-blue-500"></i> Jalur Zonasi
                    </h3>
                    <ul class="list-disc pl-6 mt-1">
                        <li>Domisili sesuai alamat di KK.</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                        <i data-lucide="heart" class="w-5 h-5 text-pink-500"></i> Jalur Afirmasi
                    </h3>
                    <ul class="list-disc pl-6 mt-1">
                        <li>Kartu Indonesia Pintar (KIP), PKH, atau surat keterangan tidak mampu.</li>
                        <li>Surat dokter/psikolog untuk disabilitas.</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                        <i data-lucide="briefcase" class="w-5 h-5 text-indigo-500"></i> Jalur Perpindahan Tugas
                    </h3>
                    <ul class="list-disc pl-6 mt-1">
                        <li>Surat penugasan orang tua dari instansi/perusahaan.</li>
                        <li>Surat pindah domisili dari Dinas Dukcapil.</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                        <i data-lucide="award" class="w-5 h-5 text-orange-500"></i> Jalur Prestasi
                    </h3>
                    <ul class="list-disc pl-6 mt-1">
                        <li>Rapor nilai 5 semester terakhir yang terdata di Dapodik.</li>
                        <li>Sertifikat prestasi resmi (maks. 3 tahun, min. 6 bulan sebelum pendaftaran).</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 text-center">
        <a href="{{ route('siswa.ppdb.form') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 transition">
            <i data-lucide="arrow-right-circle" class="w-5 h-5"></i> Lanjutkan ke Formulir Pendaftaran
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@endpush
