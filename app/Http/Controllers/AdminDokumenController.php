<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PPDBPendaftaran;

class AdminDokumenController extends Controller
{
 public function index(Request $request)
    {
        $query = PPDBPendaftaran::with('user');

        if ($request->has('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $pendaftars = $query->paginate(10);

        return view('admin.dokumen.index', compact('pendaftars'));
    }


}
