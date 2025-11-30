<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_desa', function (Blueprint $table) {
            $table->longText('koordinat')->change(); // Ubah dari string ke longText
        });
    }

    public function down(): void
    {
        Schema::table('profil_desa', function (Blueprint $table) {
            $table->string('koordinat', 255)->change(); // Kembalikan jika rollback
        });
    }
};
