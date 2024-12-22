<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'angkatan',
        'jabatan_id', // Kolom jabatan_id
        'departemen_id',
    ];

    // Relasi dengan tabel Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    // Relasi dengan tabel Departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
