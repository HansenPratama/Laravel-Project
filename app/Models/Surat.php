<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_path',
        'kategori_id',
        'jenis_id',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class);
    }

    // Relasi ke jenis surat
    public function jenis()
    {
        return $this->belongsTo(JenisSurat::class);
    }
}

