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
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->foreignId('bulan_id')->constrained('bulan')->onDelete('cascade');
            $table->float('jumlah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kas');
    }

};
