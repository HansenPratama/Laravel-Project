<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kembali kolom usertype_id
            $table->unsignedBigInteger('usertype_id')->nullable();

            // Tambahkan kembali foreign key
            $table->foreign('usertype_id')->references('id')->on('usertype')->onDelete('cascade');
        });
    }
};