<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan_kegiatan', function (Blueprint $table) {
            $table->string('lokasi')->nullable()->after('judul');
            $table->bigInteger('anggaran')->nullable()->after('lokasi');
            $table->string('foto')->nullable()->after('anggaran');
            $table->string('file_path')->nullable()->after('foto');
        });
    }

    public function down(): void
    {
        Schema::table('laporan_kegiatan', function (Blueprint $table) {
            $table->dropColumn(['lokasi','anggaran','foto','file_path']);
        });
    }
};
