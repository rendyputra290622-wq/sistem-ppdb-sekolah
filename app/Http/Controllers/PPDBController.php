<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\PPDBPendaftaran;
use App\Models\PPDBDokumen;

class PPDBController extends Controller
{
    public function index()
    {
        $ppdb = PPDBPendaftaran::where('user_id', auth()->id())->first();
        return view('siswa.ppdb.index', compact('ppdb'));
    }

    public function create()
    {
        return view('siswa.ppdb.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'jalur' => 'required|in:zonasi,afirmasi,perpindahan,prestasi',

            // Dokumen umum
            'kartu_keluarga'    => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta_kelahiran'    => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'sertifikat'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            // pretasu
'nilai_rapor' => 'nullable|numeric|between:0,100',
            'rapor'             => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            // Jalur afirmasi
            'bukti_kip_pkh'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'surat_disabilitas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

            // Jalur perpindahan
            'surat_penugasan'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'surat_pindah'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user_id = Auth::id();

        // Simpan pendaftaran
        $ppdb = PPDBPendaftaran::create([
            'user_id'       => $user_id,
            'tahun_ajaran'  => $request->tahun_ajaran,
            'jalur'         => $request->jalur,
             'nilai_rapor'   => $request->jalur === 'prestasi' ? $request->nilai_rapor : null,
            'status'        => 'pending',
        ]);

        // Simpan dokumen
        $dokumen = new PPDBDokumen();
        $dokumen->user_id = $user_id;
        $dokumen->ppdb_id = $ppdb->id;

        // Dokumen umum
        $dokumen->kartu_keluarga = $request->file('kartu_keluarga')->store('dokumen/kk', 'public');
        $dokumen->akta_kelahiran = $request->file('akta_kelahiran')->store('dokumen/akta', 'public');

        if ($request->hasFile('rapor')) {
            $dokumen->rapor = $request->file('rapor')->store('dokumen/rapor', 'public');
        }

        if ($request->hasFile('sertifikat')) {
            $dokumen->sertifikat = $request->file('sertifikat')->store('dokumen/sertifikat', 'public');
        }

        // Dokumen jalur afirmasi
        if ($request->jalur === 'afirmasi') {
            if ($request->hasFile('bukti_kip_pkh')) {
                $dokumen->bukti_kip_pkh = $request->file('bukti_kip_pkh')->store('dokumen/kip', 'public');
            }
            if ($request->hasFile('surat_disabilitas')) {
                $dokumen->surat_disabilitas = $request->file('surat_disabilitas')->store('dokumen/disabilitas', 'public');
            }
        }

        // Dokumen jalur perpindahan
        if ($request->jalur === 'perpindahan') {
            if ($request->hasFile('surat_penugasan')) {
                $dokumen->surat_penugasan = $request->file('surat_penugasan')->store('dokumen/penugasan', 'public');
            }
            if ($request->hasFile('surat_pindah')) {
                $dokumen->surat_pindah = $request->file('surat_pindah')->store('dokumen/pindah', 'public');
            }
        }

        $dokumen->save();

        return redirect()->route('siswa.ppdb.index')
            ->with('success', 'Pendaftaran berhasil dikirim. Silakan tunggu proses verifikasi.');
    }
public function status()
{
    $user = auth()->user();

    $pendaftaran = $user->ppdbPendaftaran; // relasi ppdb_pendaftaran
    $dokumen = $user->dokumen;             // relasi ppdb_dokumen
    $siswa = $user->siswa;                 // relasi siswa

    if (!$pendaftaran) {
        return view('siswa.ppdb.status', [
            'error' => 'Anda belum melakukan pendaftaran PPDB.'
        ]);
    }

    if ($pendaftaran->status === 'pending') {
        return view('siswa.ppdb.status', [
            'pending' => true
        ]);
    }

    return view('siswa.ppdb.status', compact('pendaftaran', 'dokumen', 'siswa'));
}
public function cetak()
{
    $userId = Auth::id();
    $ppdb = PPDBPendaftaran::with(['user', 'siswa'])->where('user_id', $userId)->firstOrFail();

    if ($ppdb->status !== 'accepted') {
        abort(403, 'Hanya siswa yang diterima yang bisa mencetak bukti.');
    }

    return view('siswa.ppdb.cetak', compact('ppdb'));
}



}
