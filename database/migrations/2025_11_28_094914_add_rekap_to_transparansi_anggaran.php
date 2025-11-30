<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('transparansi_anggaran', function (Blueprint $table) {
            $table->bigInteger('pemasukan')->nullable();
            $table->bigInteger('pengeluaran')->nullable();
        });
    }

    public function down()
    {
        Schema::table('transparansi_anggaran', function (Blueprint $table) {
            $table->dropColumn(['pemasukan', 'pengeluaran']);
        });
    }
};
