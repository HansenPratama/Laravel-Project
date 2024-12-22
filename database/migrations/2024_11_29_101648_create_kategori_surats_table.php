<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriSuratsTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama kategori
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_surats');
    }
}
