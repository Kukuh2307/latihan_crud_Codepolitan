<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    // membuat fungsi select data untuk di kirim ke controler
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
