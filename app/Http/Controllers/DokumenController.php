<?php

namespace App\Http\Controllers;

use App\Models\PPDBDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
     * Tampilkan halaman edit dokumen.
     */
    public function edit($user_id)
    {
        // Pastikan user yang login adalah pemilik data
        if (Auth::id() != $user_id) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        $dokumen = PPDBDokumen::where('user_id', $user_id)->first();
        return view('siswa.dokumen.edit', compact('dokumen'));
    }

    /**
     * Update atau upload dokumen.
     */
    public function update(Request $request, $user_id)
    {
        // Validasi user
        if (Auth::id() != $user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses untuk mengubah data ini.'
            ], 403);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'dokumen_key' => 'required|string|in:kartu_keluarga,akta_kelahiran,rapor,sertifikat,bukti_kip_pkh,surat_disabilitas,surat_penugasan,surat_pindah',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048' // maksimal 2MB
        ], [
            'dokumen_key.required' => 'Jenis dokumen tidak valid.',
            'dokumen_key.in' => 'Jenis dokumen tidak dikenali.',
            'file.required' => 'File dokumen wajib diunggah.',
            'file.mimes' => 'Format file harus PDF, JPG, JPEG, atau PNG.',
            'file.max' => 'Ukuran file maksimal 2 Megabyte (MB).'
        ]);

        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'errors' => $validator->errors()
                ], 422);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $dokumenKey = $request->dokumen_key;
            $file = $request->file('file');
            
            // Cari atau buat record dokumen
            $dokumen = PPDBDokumen::where('user_id', $user_id)->first();
            
            if (!$dokumen) {
                $dokumen = new PPDBDokumen();
                $dokumen->user_id = $user_id;
            }
            
            // Hapus file lama jika ada
            $oldFilePath = $dokumen->{$dokumenKey};
            if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                Storage::disk('public')->delete($oldFilePath);
            }
            
            // Simpan file baru
            $fileName = 'dokumen_' . $user_id . '_' . $dokumenKey . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('dokumen', $fileName, 'public');
            
            if (!$filePath) {
                throw new \Exception('Gagal menyimpan file.');
            }
            
            // Update kolom dokumen
            $dokumen->{$dokumenKey} = $filePath;
            $dokumen->save();
            
            // Log aktivitas
            Log::info('Dokumen berhasil diunggah', [
                'user_id' => $user_id,
                'dokumen_key' => $dokumenKey,
                'file_path' => $filePath
            ]);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Dokumen berhasil diunggah.',
                    'data' => [
                        'url' => asset('storage/' . $filePath),
                        'filename' => $fileName
                    ]
                ]);
            }
            
            return redirect()->route('siswa.dokumen.index')
                ->with('success', 'Dokumen ' . $this->getDokumenLabel($dokumenKey) . ' berhasil diunggah.');
                
        } catch (\Exception $e) {
            Log::error('Gagal mengunggah dokumen: ' . $e->getMessage(), [
                'user_id' => $user_id,
                'dokumen_key' => $dokumenKey ?? null
            ]);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat mengunggah dokumen. Silakan coba lagi.'
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengunggah dokumen. Silakan coba lagi.');
        }
    }

    /**
     * Tampilkan file dari disk public.
     */
    public function show($user_id, $tipe)
    {
        // Verifikasi akses (hanya pemilik atau admin yang bisa melihat)
        if (Auth::id() != $user_id && Auth::user()->role != 'admin') {
            abort(403, 'Anda tidak memiliki akses ke file ini.');
        }
        
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
        if (!$relativePath || !Storage::disk('public')->exists($relativePath)) {
            abort(404, 'File tidak ditemukan di penyimpanan.');
        }

        // Redirect ke URL public
        return redirect()->to(asset('storage/' . $relativePath));
    }

    /**
     * Hapus dokumen tertentu.
     */
    public function destroy(Request $request, $user_id)
    {
        // Validasi user
        if (Auth::id() != $user_id && Auth::user()->role != 'admin') {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses untuk menghapus data ini.'
            ], 403);
        }
        
        $validator = Validator::make($request->all(), [
            'dokumen_key' => 'required|string|in:kartu_keluarga,akta_kelahiran,rapor,sertifikat,bukti_kip_pkh,surat_disabilitas,surat_penugasan,surat_pindah'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis dokumen tidak valid.'
            ], 422);
        }
        
        try {
            $dokumenKey = $request->dokumen_key;
            $dokumen = PPDBDokumen::where('user_id', $user_id)->firstOrFail();
            
            $filePath = $dokumen->{$dokumenKey};
            
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            
            $dokumen->{$dokumenKey} = null;
            $dokumen->save();
            
            Log::info('Dokumen berhasil dihapus', [
                'user_id' => $user_id,
                'dokumen_key' => $dokumenKey
            ]);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Dokumen berhasil dihapus.'
                ]);
            }
            
            return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
            
        } catch (\Exception $e) {
            Log::error('Gagal menghapus dokumen: ' . $e->getMessage());
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus dokumen.'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus dokumen.');
        }
    }

    /**
     * Helper: Mendapatkan label dokumen dalam Bahasa Indonesia.
     */
    private function getDokumenLabel($key)
    {
        $labels = [
            'kartu_keluarga' => 'Kartu Keluarga',
            'akta_kelahiran' => 'Akta Kelahiran',
            'rapor' => 'Rapor',
            'sertifikat' => 'Sertifikat',
            'bukti_kip_pkh' => 'Bukti KIP/PKH',
            'surat_disabilitas' => 'Surat Disabilitas',
            'surat_penugasan' => 'Surat Penugasan',
            'surat_pindah' => 'Surat Pindah',
        ];
        
        return $labels[$key] ?? ucfirst(str_replace('_', ' ', $key));
    }
}