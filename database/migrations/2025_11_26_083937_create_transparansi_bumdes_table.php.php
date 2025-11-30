<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparansiBumdesTable extends Migration
{
    public function up()
    {
        Schema::create('transparansi_bumdes', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('kategori', ['BUMDES','KOPDES'])->default('BUMDES');
            $table->string('bulan')->nullable();
            $table->year('tahun')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transparansi_bumdes');
    }
}
