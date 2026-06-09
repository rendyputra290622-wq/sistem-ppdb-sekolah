<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PPDBPendaftaran;
use App\Models\PPDBDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Ambil data pendaftaran PPDB
        $ppdbPendaftaran = PPDBPendaftaran::where('user_id', $userId)->first();

        // Jika belum mendaftar, redirect ke halaman pendaftaran
        if (!$ppdbPendaftaran) {
            return redirect()->route('siswa.ppdb.index')
                ->with('error', 'Anda belum melakukan pendaftaran PPDB.');
        }

        // Ambil data dokumen
        $dokumen = PPDBDokumen::where('user_id', $userId)->first();

        // Jika belum diverifikasi (accepted), belum boleh isi biodata
        if ($ppdbPendaftaran->status !== 'accepted') {
            return view('siswa.profil.pending', compact('ppdbPendaftaran'));
        }

        // Ambil data siswa (biodata)
        $siswa = Siswa::where('user_id', $userId)->first();

        return view('siswa.profil.index', compact('ppdbPendaftaran', 'dokumen', 'siswa'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'nama_lengkap'    => 'required|string|max:100',
        'nik'             => 'required|numeric|digits:16',
        'tanggal_lahir'   => 'required|date',
        'tempat_lahir'    => 'required|string|max:100',
        'jenis_kelamin'   => 'required|in:Laki-laki,Perempuan',
        'agama'           => 'required',
        'alamat'          => 'required|string|max:255',
        'no_hp'           => 'required|string|max:16',
        'asal_sekolah'    => 'required|string|max:255',
        'nama_ayah'       => 'required|string|max:100',
        'pekerjaan_ayah'  => 'required|string|max:100',
        'nama_ibu'        => 'required|string|max:100',
        'pekerjaan_ibu'   => 'required|string|max:100',
        'no_hp_ortu'      => 'required|string|max:16',
    ]);

    $userId = Auth::id();

    $siswa = Siswa::where('user_id', $userId)->first();

    if ($siswa) {
        // update
        $siswa->update($request->all());
    } else {
        // insert baru
        $request->merge(['user_id' => $userId]);
        Siswa::create($request->all());
    }

    return redirect()->route('siswa.profil.index')->with('success', 'Biodata berhasil disimpan.');
}

}
