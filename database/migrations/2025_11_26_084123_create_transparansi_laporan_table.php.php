<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparansiLaporanTable extends Migration
{
    public function up()
    {
        Schema::create('transparansi_laporan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('file')->nullable(); // pdf or image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transparansi_laporan');
    }
}
