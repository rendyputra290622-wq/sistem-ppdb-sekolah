<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Bisa 'admin' atau 'siswa'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
// User.php
public function pendaftaran()
{
    return $this->hasOne(\App\Models\PPDBPendaftaran::class, 'user_id');
}

public function dokumen()
{
    return $this->hasOne(\App\Models\PPDBDokumen::class, 'user_id');
}

public function siswa()
{
    return $this->hasOne(\App\Models\Siswa::class, 'user_id');
}


}
