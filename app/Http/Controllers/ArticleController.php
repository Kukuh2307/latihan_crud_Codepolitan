<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(){
        $storage = Storage::get('articles.txt');
        echo $storage;
        exit;
        $variable = [
            'articles' => [
                ['mengenal laravel','ini adalah contoh array static'],
                ['mengenal Codepolitan', 'ini adalah platform belajar online']
            ]
        ];
        return view('article.index',$variable);
    }
}
