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
        Schema::create('ppdb_pendaftaran', function (Blueprint $table) {
            $table->id();

            // Relasi ke user
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Tahun ajaran & jalur pendaftaran
            $table->year('tahun_ajaran');
            $table->enum('jalur', ['zonasi', 'afirmasi', 'perpindahan', 'prestasi'])->default('zonasi');

            // Nilai rapor untuk jalur prestasi (opsional)
            $table->decimal('nilai_rapor', 5, 2)->nullable();

            // Status seleksi
            $table->enum('status', ['pending', 'accepted', 'rejected', 'cadangan'])->default('pending');

            // Validasi oleh admin
            $table->foreignId('petugas_sekolah')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('validated_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_pendaftaran');
    }
};
