<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemen'; // Nama tabel
    protected $fillable = ['nama_departemen']; // Kolom yang bisa diisi

    // Relasi ke tabel Anggota
    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'departemen_id');
    }
}
