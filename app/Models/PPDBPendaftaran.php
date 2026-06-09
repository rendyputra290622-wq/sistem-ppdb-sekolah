<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPDBPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'ppdb_pendaftaran';

protected $fillable = [
    'user_id',
    'tahun_ajaran',
    'jalur',
    'status',
    'validated_at',
    'petugas_sekolah',
    'nilai_rapor', // ✅ tambahkan ini
];


    protected $dates = ['validated_at'];

    /**
     * Relasi ke user yang mendaftar.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke dokumen pendaftaran (ppdb_dokumen).
     */
    public function dokumen()
    {
        return $this->hasOne(PpdbDokumen::class, 'ppdb_id');
    }
    // App\Models\PPDBPendaftaran.php
public function siswa()
{
    return $this->hasOne(\App\Models\Siswa::class, 'user_id', 'user_id');
}


    /**
     * Relasi ke admin/petugas sekolah yang memverifikasi.
     */
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_sekolah');
    }
    public function pengumuman()
{
    return $this->hasOne(PPDBPengumuman::class, 'ppdb_id');
}

}
