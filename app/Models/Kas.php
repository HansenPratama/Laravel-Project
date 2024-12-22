<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    protected $fillable = ['tahun', 'bulan_id', 'jumlah'];

    public function bulan()
    {
        return $this->belongsTo(Bulan::class, 'bulan_id'); // Menggunakan nama model Bulan
    }

}

