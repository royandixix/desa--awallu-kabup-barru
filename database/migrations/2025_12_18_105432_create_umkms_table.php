<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengusaha');
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->text('deskripsi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->string('foto')->nullable(); // nullable supaya tidak error
            $table->string('foto_pengusaha')->nullable();
            $table->string('kode_umkm')->unique();
            $table->decimal('harga', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umkms');
    }
};
