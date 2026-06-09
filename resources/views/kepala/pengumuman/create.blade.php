@extends('layouts.kepala')

@section('title', 'Buat Pengumuman')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-700 mb-4">Buat Pengumuman Baru</h2>

    <form action="{{ route('kepala.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Judul -->
        <div class="mb-4">
            <label class="block font-medium text-sm mb-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}"
                class="w-full p-3 border rounded @error('judul') border-red-500 @enderror" required>
            @error('judul')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Isi -->
        <div class="mb-4">
            <label class="block font-medium text-sm mb-1">Isi Pengumuman</label>
            <textarea name="isi" rows="6"
                class="w-full p-3 border rounded @error('isi') border-red-500 @enderror"
                required>{{ old('isi') }}</textarea>
            @error('isi')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Lampiran (opsional) -->
        <div class="mb-4">
            <label class="block font-medium text-sm mb-1">Lampiran (Opsional)</label>
            <input type="file" name="lampiran"
                class="w-full p-2 border rounded @error('lampiran') border-red-500 @enderror" accept=".pdf,.jpg,.png,.jpeg">
            @error('lampiran')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tampilkan hanya untuk siswa diterima -->
        <div class="mb-4 flex items-center gap-2">
            <input type="checkbox" name="only_accepted" id="only_accepted" value="1" {{ old('only_accepted') ? 'checked' : '' }}>
            <label for="only_accepted" class="text-sm">Tampilkan hanya kepada siswa yang <strong>diterima</strong></label>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('kepala.pengumuman.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 mr-2">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
