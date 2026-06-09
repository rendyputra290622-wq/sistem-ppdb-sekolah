<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pengumumans', function (Blueprint $table) {
            $table->enum('ditampilkan_ke', ['siswa', 'semua'])->default('semua')->after('lampiran');
        });
    }

    public function down(): void
    {
        Schema::table('pengumumans', function (Blueprint $table) {
            $table->dropColumn('ditampilkan_ke');
        });
    }
};

