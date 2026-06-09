<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbDokumen extends Model
{
    use HasFactory;

    protected $table = 'ppdb_dokumen';

    protected $fillable = [
        'user_id',
        'ppdb_id',
        'kartu_keluarga',
        'akta_kelahiran',
        'rapor',
        'sertifikat',
        'bukti_kip_pkh',
        'surat_disabilitas',
        'surat_penugasan',
        'surat_pindah',
    ];

    /**
     * Relasi ke user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke pendaftaran.
     */
    public function pendaftaran()
    {
        return $this->belongsTo(PPDBPendaftaran::class, 'ppdb_id');
    }
}
