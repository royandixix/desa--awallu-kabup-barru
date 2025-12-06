<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('karang_tarunas', function (Blueprint $table) {
            $table->id();
            $table->string('gambar'); // nama kolom harus sama dengan Model
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karang_tarunas');
    }
};
