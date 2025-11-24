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
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();

            // Bagian header
            $table->string('judul')->nullable();
            $table->text('deskripsi_singkat')->nullable();
            $table->string('gambar_header')->nullable();

            // Isi bagian penjelasan
            $table->longText('sejarah')->nullable();
            $table->longText('wilayah_administratif')->nullable();

            // Sidebar
            $table->string('nama_desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();

            $table->string('batas_utara')->nullable();
            $table->string('batas_selatan')->nullable();
            $table->string('batas_timur')->nullable();
            $table->string('batas_barat')->nullable();

            $table->string('koordinat')->nullable();
            $table->string('jarak_kabupaten')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desa');
    }
};
