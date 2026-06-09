<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pendaftaran = $user->pendaftaran; // relasi ke ppdb_pendaftaran
        $dokumen = $user->dokumen;         // relasi ke ppdb_dokumen
        $siswa = $user->siswa;             // relasi ke siswa

        if (!$pendaftaran) {
            return view('siswa.statusPendaftaran.index', [
                'error' => 'Anda belum melakukan pendaftaran PPDB.'
            ]);
        }

        return view('siswa.statusPendaftaran.index', compact('pendaftaran', 'dokumen', 'siswa'));
    }
}
