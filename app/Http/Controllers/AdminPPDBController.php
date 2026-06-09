<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PPDBDokumen;
use App\Models\PPDBPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PPDBExport;

class AdminPPDBController extends Controller
{
public function index(Request $request)
{
    $query = PPDBPendaftaran::with(['user', 'dokumen','siswa'])
        ->whereHas('user', function ($q) {
            $q->where('role', 'siswa');
        });

    if ($request->filled('search')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('jalur')) {
        $query->where('jalur', $request->jalur);

        // Jika jalur prestasi, urutkan berdasarkan nilai rapor tertinggi
        if ($request->jalur === 'prestasi') {
            $query->orderByDesc('nilai_rapor');
        }
    }

    $pendaftars = $query->paginate(10);

    return view('admin.ppdb.index', compact('pendaftars'));
}


    public function show($id, $tipe = null)
    {
        // Hanya admin yang bisa lihat file dokumen
        if ($tipe) {
            return $this->adminShow($id, $tipe);
        }

        $ppdb = PPDBPendaftaran::with(['user', 'dokumen','siswa'])->findOrFail($id);
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function adminShow($user_id, $tipe)
    {
        // Validasi admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki izin untuk mengakses dokumen ini.');
        }

        // Ambil dokumen siswa
        $dokumen = PPDBDokumen::where('user_id', $user_id)->firstOrFail();

        // Mapping tipe dokumen ke path
        $fileMap = [
            'kartu_keluarga'    => $dokumen->kartu_keluarga,
            'akta_kelahiran'    => $dokumen->akta_kelahiran,
            'rapor'             => $dokumen->rapor,
            'sertifikat'        => $dokumen->sertifikat,
            'bukti_kip_pkh'     => $dokumen->bukti_kip_pkh,
            'surat_disabilitas' => $dokumen->surat_disabilitas,
            'surat_penugasan'   => $dokumen->surat_penugasan,
            'surat_pindah'      => $dokumen->surat_pindah,
        ];

        // Validasi tipe
        if (!isset($fileMap[$tipe]) || !$fileMap[$tipe]) {
            abort(400, 'Tipe dokumen tidak valid atau belum diunggah.');
        }

        $relativePath = $fileMap[$tipe];
        $fullPath = storage_path("app/public/" . $relativePath);

        if (!file_exists($fullPath)) {
            abort(404, 'File tidak ditemukan.');
        }

        return response()->file($fullPath);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
           'status' => 'required|in:pending,accepted,rejected,cadangan',

        ]);

        $ppdb = PPDBPendaftaran::findOrFail($id);
        $ppdb->status = $request->status;
        $ppdb->save();

        return redirect()->route('admin.ppdb.show', $id)
            ->with('success', 'Status berhasil diperbarui!');
    }


}
