<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparansiDokumenTable extends Migration
{
    public function up()
    {
        Schema::create('transparansi_dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('jenis', ['POKOK','PERUBAHAN'])->default('POKOK');
            $table->year('tahun')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transparansi_dokumen');
    }
}
