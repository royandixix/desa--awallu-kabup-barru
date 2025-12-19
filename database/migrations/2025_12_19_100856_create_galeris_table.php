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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul');           // Judul gambar
            $table->text('desc')->nullable();  // Deskripsi
            $table->string('lokasi')->nullable();
            $table->string('kategori')->nullable();
            $table->string('file');            // Nama file gambar
            $table->dateTime('tanggal')->nullable();
            $table->timestamps();              // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
