<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPDBPendaftaran;

class LaporanKepalaController extends Controller
{
    public function index(Request $request)
    {
        $query = PPDBPendaftaran::with(['user', 'siswa']);

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        // Filter nama
        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Data pendaftar
        $pendaftars = $query->latest()->paginate(10);

        // Rekap
        $totalPendaftar = PPDBPendaftaran::count();
        $totalDiterima = PPDBPendaftaran::where('status', 'accepted')->count();
        $totalCadangan = PPDBPendaftaran::where('status', 'cadangan')->count();
        $totalDitolak  = PPDBPendaftaran::where('status', 'rejected')->count();

        return view('kepala.laporan.index', compact(
            'pendaftars', 'totalPendaftar', 'totalDiterima', 'totalCadangan', 'totalDitolak'
        ));
    }

}
