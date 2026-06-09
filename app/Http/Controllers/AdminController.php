<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PPDBPendaftaran;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    // Tampilkan daftar pengguna
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(10); // Gunakan pagination
        return view('admin.pengguna.index', compact('users'));
    }

    // Form tambah pengguna
    public function create()
    {
        return view('admin.pengguna.add');
    }

    // Simpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:2',
            'role' => 'required|in:admin,siswa,kepala' // Tambahkan semua role yang digunakan
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    // Form edit pengguna
    public function edit(User $user)
    {
        return view('admin.pengguna.edit', compact('user'));
    }

    // Update pengguna
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,siswa',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.pengguna.index')->with('success', value: 'Pengguna berhasil diperbarui.');
    }

    // Hapus pengguna
    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.pengguna.index')->with('error', 'Admin tidak bisa dihapus!');
        }

        $user->delete();
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
// Di dalam AdminController.php
public function diterimaIndex(Request $request)
{
    $search = $request->search;
    
    // Query pendaftar dengan status Diterima
    $pendaftars = PPDBPendaftaran::where('status', 'Diterima')
        ->when($search, function ($query, $search) {
            return $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->with('user')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    
    // Untuk statistik
    $totalPendaftar = PPDBPendaftaran::count();
    $kuotaTersedia = max(0, 198 - PPDBPendaftaran::where('status', 'Diterima')->count());
    
    return view('admin.diterima', compact('pendaftars', 'totalPendaftar', 'kuotaTersedia'));
}

public function cadanganIndex(Request $request)
{
    $query = PPDBPendaftaran::with('user')
        ->where('status', 'cadangan'); // lowercase sesuai enum DB

    if ($request->has('search')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        });
    }

    $pendaftars = $query->paginate(10);

    return view('admin.cadangan.index', compact('pendaftars'));
}

public function ditolakIndex(Request $request)
{
    $query = PPDBPendaftaran::with('user')
        ->where('status', 'rejected'); // lowercase sesuai enum DB

    if ($request->has('search')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        });
    }

    $pendaftars = $query->paginate(10);

    return view('admin.ditolak.index', compact('pendaftars'));
}




}
