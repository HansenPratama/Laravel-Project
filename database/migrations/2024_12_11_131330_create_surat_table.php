<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('file_path');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('jenis_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori_surats');
            $table->foreign('jenis_id')->references('id')->on('jenis_surats');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
