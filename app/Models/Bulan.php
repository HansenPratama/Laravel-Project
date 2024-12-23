<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;

    protected $table = 'bulan';
    protected $fillable = ['nama_bulan'];

    public function kas()
    {
        return $this->hasMany(Kas::class);
    }
}

