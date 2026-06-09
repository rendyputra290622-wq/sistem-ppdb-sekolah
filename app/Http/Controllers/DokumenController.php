<?php

namespace App\Http\Controllers;

use App\Models\PPDBDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    /**
     * Tampilkan daftar dokumen siswa.
     */
    public function index()
    {
        $dokumen = PPDBDokumen::where('user_id', Auth::id())->first();
        return view('siswa.dokumen.index', compact('dokumen'));
    }

    /**
     * Tampilkan file dari disk public (akses langsung dari penyimpanan publik).
     */
    public function show($user_id, $tipe)
    {
        $dokumen = PPDBDokumen::where('user_id', $user_id)->firstOrFail();

        $pathMap = [
            'kartu_keluarga'    => $dokumen->kartu_keluarga,
            'akta_kelahiran'    => $dokumen->akta_kelahiran,
            'rapor'             => $dokumen->rapor,
            'sertifikat'        => $dokumen->sertifikat,
            'bukti_kip_pkh'     => $dokumen->bukti_kip_pkh,
            'surat_disabilitas' => $dokumen->surat_disabilitas,
            'surat_penugasan'   => $dokumen->surat_penugasan,
            'surat_pindah'      => $dokumen->surat_pindah,
        ];

        if (!array_key_exists($tipe, $pathMap)) {
            abort(400, 'Tipe dokumen tidak valid.');
        }

        $relativePath = $pathMap[$tipe];

        // Pastikan file ada di storage/public
        if (!$relativePath || !Storage::disk('public')->exists(str_replace('dokumen/', '', $relativePath))) {
            abort(404, 'File tidak ditemukan di penyimpanan.');
        }

        // Arahkan langsung ke URL public jika diperlukan
        return redirect()->to(asset('storage/' . $relativePath));
    }
}
