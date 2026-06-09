<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPDBPendaftaran;

class AdminLaporanController extends Controller
{
public function index(Request $request)
{
    $query = PPDBPendaftaran::with('user');

    // Filter berdasarkan nama siswa
    if ($request->filled('search')) { // Gunakan filled() agar tidak error
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        });
    }

    // Filter berdasarkan status pendaftaran
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter berdasarkan tanggal pendaftaran
    if ($request->filled('tanggal')) {
        $query->whereDate('created_at', $request->tanggal);
    }

    $pendaftars = $query->paginate(10);

    // Hitung jumlah siswa berdasarkan status
    $totalPendaftar = PPDBPendaftaran::count();
    $totalDiterima = PPDBPendaftaran::where('status', 'Diterima')->count();
    $totalCadangan = PPDBPendaftaran::where('status', 'Cadangan')->count();
    $totalDitolak = PPDBPendaftaran::where('status', 'Ditolak')->count();

    return view('admin.laporan.index', compact('pendaftars', 'totalPendaftar', 'totalDiterima', 'totalCadangan', 'totalDitolak'));
}


}
