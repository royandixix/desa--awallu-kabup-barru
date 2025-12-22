<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            if (!Schema::hasColumn('galeris', 'lokasi')) {
                $table->string('lokasi')->nullable()->after('desc');
            }

            if (!Schema::hasColumn('galeris', 'kategori')) {
                $table->string('kategori')->nullable()->after('lokasi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn(['lokasi', 'kategori']);
        });
    }
};
