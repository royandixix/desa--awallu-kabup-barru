<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('umkms', function (Blueprint $table) {
            $table->string('foto_pengusaha')->nullable()->after('foto');
        });
    }

    public function down() {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn('foto_pengusaha');
        });
    }
};

