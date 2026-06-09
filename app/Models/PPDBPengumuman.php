<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPDBPengumuman extends Model
{
    use HasFactory;

    protected $table = 'ppdb_pengumuman';

    protected $fillable = [
        'ppdb_id',
        'status',
        'keterangan',
    ];

    /**
     * Relasi ke data pendaftaran.
     */
    public function pendaftaran()
    {
        return $this->belongsTo(PPDBPendaftaran::class, 'ppdb_id');
    }
}
