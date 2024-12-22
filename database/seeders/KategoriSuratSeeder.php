<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriSurat;

class KategoriSuratSeeder extends Seeder
{
    public function run()
    {
        KategoriSurat::create(['nama' => 'Surat Masuk']);
        KategoriSurat::create(['nama' => 'Surat Keluar']);
        KategoriSurat::create(['nama' => 'Pengumuman']);
    }
}
