<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJabatanIdToAnggotaTable extends Migration
{
    /**
     * Jalankan migration untuk menambah kolom jabatan_id ke tabel anggota.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            // Menghapus kolom jabatan
            $table->dropColumn('jabatan');

            // Menambahkan kolom jabatan_id sebagai foreign key
            $table->unsignedBigInteger('jabatan_id')->nullable(); // Kolom jabatan_id

            // Membuat hubungan foreign key dengan tabel jabatan
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('set null');
        });
    }

    /**
     * Balikkan migration untuk menghapus perubahan.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggota', function (Blueprint $table) {
            // Menambahkan kolom jabatan kembali
            $table->string('jabatan')->nullable();

            // Menghapus foreign key dan kolom jabatan_id
            $table->dropForeign(['jabatan_id']);
            $table->dropColumn('jabatan_id');
        });
    }
}
