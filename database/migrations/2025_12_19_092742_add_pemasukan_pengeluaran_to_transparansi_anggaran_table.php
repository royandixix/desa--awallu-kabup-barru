<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transparansi_anggaran', function (Blueprint $table) {
            $table->bigInteger('pemasukan')->nullable()->after('tahun');
            $table->bigInteger('pengeluaran')->nullable()->after('pemasukan');
        });
    }

    public function down(): void
    {
        Schema::table('transparansi_anggaran', function (Blueprint $table) {
            $table->dropColumn(['pemasukan', 'pengeluaran']);
        });
    }
};
