<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // membuat fungsi select data untuk di kirim ke controler
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
