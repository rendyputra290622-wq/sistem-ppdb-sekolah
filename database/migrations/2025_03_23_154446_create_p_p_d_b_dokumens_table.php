<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
     Schema::create('ppdb_dokumen', function (Blueprint $table) {
    $table->id();

    // Relasi ke user & pendaftaran
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('ppdb_id')->constrained('ppdb_pendaftaran')->onDelete('cascade');

    // Dokumen umum
    $table->string('kartu_keluarga')->nullable();
    $table->string('akta_kelahiran')->nullable();
    $table->string('rapor')->nullable();
    $table->string('sertifikat')->nullable();

    // Dokumen jalur afirmasi / perpindahan
    $table->string('bukti_kip_pkh')->nullable();
    $table->string('surat_disabilitas')->nullable();
    $table->string('surat_penugasan')->nullable();
    $table->string('surat_pindah')->nullable();

    $table->timestamps();
});

    }

    public function down()
    {
        Schema::dropIfExists('ppdb_dokumen');
    }
};
