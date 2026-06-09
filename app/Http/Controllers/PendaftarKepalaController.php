<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPDBPendaftaran;

class PendaftarKepalaController extends Controller
{
    public function index(Request $request)
    {
        $query = PPDBPendaftaran::with('user');

        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $pendaftars = $query->paginate(10);

        return view('kepala.pendaftar.index', compact('pendaftars'));
    }

    public function show($id)
    {
        $ppdb = PPDBPendaftaran::with(['user', 'dokumen', 'siswa'])->findOrFail($id);
        return view('kepala.pendaftar.show', compact('ppdb'));
    }
}
