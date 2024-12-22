<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->id(); // Kolom id auto-increment
            $table->string('nama_departemen'); // Kolom nama_departemen
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('departemen');
    }
};
