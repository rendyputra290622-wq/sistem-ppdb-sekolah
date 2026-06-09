<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanKepalaController extends Controller
{
    /**
     * Tampilkan daftar pengumuman.
     */
    public function index()
    {
        $pengumumans = Pengumuman::latest()->paginate(10);
        return view('kepala.pengumuman.index', compact('pengumumans'));
    }

    /**
     * Tampilkan form tambah.
     */
    public function create()
    {
        return view('kepala.pengumuman.create');
    }

    /**
     * Simpan pengumuman baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'isi'           => 'required|string',
            'lampiran'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'only_accepted' => 'nullable|boolean',
        ]);

        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $pengumuman->only_accepted = $request->has('only_accepted');

        if ($request->hasFile('lampiran')) {
            $pengumuman->lampiran = $request->file('lampiran')->store('pengumuman/lampiran', 'public');
        }

        $pengumuman->save();

        return redirect()->route('kepala.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('kepala.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update pengumuman.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul'         => 'required|string|max:255',
            'isi'           => 'required|string',
            'lampiran'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'only_accepted' => 'nullable|boolean',
        ]);

        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $pengumuman->only_accepted = $request->has('only_accepted');

        if ($request->hasFile('lampiran')) {
            // Hapus lampiran lama jika ada
            if ($pengumuman->lampiran && Storage::disk('public')->exists($pengumuman->lampiran)) {
                Storage::disk('public')->delete($pengumuman->lampiran);
            }
            $pengumuman->lampiran = $request->file('lampiran')->store('pengumuman/lampiran', 'public');
        }

        $pengumuman->save();

        return redirect()->route('kepala.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Hapus pengumuman.
     */
   public function destroy(Pengumuman $pengumuman)
{
    try {
        // Hapus lampiran jika ada dan file-nya masih ada di storage
        if ($pengumuman->lampiran && Storage::disk('public')->exists($pengumuman->lampiran)) {
            Storage::disk('public')->delete($pengumuman->lampiran);
        }

        // Hapus data pengumuman
        $pengumuman->delete();

        return redirect()->route('kepala.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->route('kepala.pengumuman.index')
            ->with('error', 'Gagal menghapus pengumuman: ' . $e->getMessage());
    }
}
}
