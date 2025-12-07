<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('laporan_kegiatan', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('lokasi')->nullable();
        $table->date('tanggal')->nullable();
        $table->bigInteger('anggaran')->nullable();
        $table->string('foto')->nullable();        // gambar cover
        $table->string('file_path')->nullable();   // file laporan PDF/dokumen
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kegiatan');
    }
};
