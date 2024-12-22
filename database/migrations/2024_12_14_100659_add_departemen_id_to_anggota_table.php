<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            // Hapus kolom departemen lama
            $table->dropColumn('departemen');
            
            // Tambahkan kolom departemen_id sebagai foreign key
            $table->unsignedBigInteger('departemen_id')->nullable()->after('jabatan');
            $table->foreign('departemen_id') // Definisi FK
                  ->references('id')
                  ->on('departemen')
                  ->onDelete('set null'); // Jika departemen dihapus, kolom ini jadi null
        });
    }

    public function down()
    {
        Schema::table('anggota', function (Blueprint $table) {
            // Rollback perubahan: hapus foreign key dan kolom departemen_id
            $table->dropForeign(['departemen_id']);
            $table->dropColumn('departemen_id');

            // Tambahkan kembali kolom departemen lama
            $table->string('departemen')->nullable();
        });
    }
};
