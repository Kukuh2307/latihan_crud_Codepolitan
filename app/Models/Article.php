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

    // mengisi data slug secara otomatis berdasarkan tittle yang sudah di masukkan
    public $fillable = [
        'title',
        'content',
    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            // mengisi slug dengan format huruf kecil dan mengganti tanda spasi dengan tanda -
            $article->slug = strtolower(str_replace(' ', '-', $article->title));
        });
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
