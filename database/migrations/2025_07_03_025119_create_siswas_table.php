<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('siswas', function (Blueprint $table) {
    $table->id();

    // Relasi ke user login
    $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');

    // Biodata siswa
    $table->string('nama_lengkap', 50);
    $table->string('nik', 20)->unique();
    $table->string('nisn', 20)->nullable();
    $table->string('tempat_lahir', 100);
    $table->date('tanggal_lahir');
    $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
    $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya']);
    $table->text('alamat');
    $table->string('no_hp', 16);
    $table->string('asal_sekolah');
    $table->string('nomor_ijazah')->nullable();

    // Orang tua
    $table->string('nama_ayah');
    $table->string('pekerjaan_ayah');
    $table->string('nama_ibu');
    $table->string('pekerjaan_ibu');
    $table->string('no_hp_ortu');

    // Status siswa
    $table->string('status_aktif')->default('aktif'); // aktif, lulus, keluar, pindah

    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
