<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->integer('umur');  // umur anak 5–6 tahun
            $table->string('nama_ortu');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appras');
    }
};
