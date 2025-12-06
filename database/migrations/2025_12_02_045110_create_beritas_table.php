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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();                        // Primary key
            $table->string('judul');             // Judul berita
            $table->string('slug')->unique();    // Slug untuk URL
            $table->string('kategori')->nullable(); // Kategori berita
            $table->text('konten');              // Isi berita
            $table->string('image')->nullable(); // Path gambar
            $table->string('author')->nullable(); // Penulis
            $table->timestamps();                // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
