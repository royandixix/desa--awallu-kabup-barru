<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('title');               // Judul kegiatan
            $table->text('desc')->nullable();      // Deskripsi
            $table->string('lokasi')->nullable();  // Lokasi
            $table->string('kategori')->nullable(); // Kategori kegiatan
            $table->timestamp('tanggal')->nullable(); // Tanggal kegiatan
            $table->string('file');                 // Nama file gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }

};
