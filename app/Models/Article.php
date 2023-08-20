<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    // membuat relasi tabel article ke  tabel comment
    public function comments()
    {
        // hasmany yang dimana pada tabel article memiliki 1 article dengan beberapa relasi ke tabel comment
        return $this->hasMany(Comment::class);
    }
    // membuat fungsi select data untuk di kirim ke controler
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    // membuat custom method untuk menjumlahkan semua komentar
    public function total_komentar()
    {
        return $this->comments()->count();
    }
}
