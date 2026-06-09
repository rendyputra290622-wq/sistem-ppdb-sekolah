<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPDBPendaftaran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
    }
public function kepala_dashboard()
{
    $totalPendaftar = PPDBPendaftaran::count();
    $totalDiterima = PPDBPendaftaran::where('status', 'accepted')->count();
    $totalCadangan = PPDBPendaftaran::where('status', 'cadangan')->count();
    $totalDitolak = PPDBPendaftaran::where('status', 'rejected')->count();

    $rekapJalur = PPDBPendaftaran::select('jalur')
        ->selectRaw('count(*) as total')
        ->groupBy('jalur')
        ->pluck('total', 'jalur');

    return view('kepala.dashboard', compact(
        'totalPendaftar',
        'totalDiterima',
        'totalCadangan',
        'totalDitolak',
        'rekapJalur'
    ));
}


    public function siswa_dashboard()
    {
        return view('siswa.dashboard');
    }


}
