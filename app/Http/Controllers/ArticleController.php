<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $variable = [
            'articles' => [
                ['mengenal laravel','ini adalah contoh array static'],
                ['mengenal Codepolitan', 'ini adalah platform belajar online']
            ]
        ];
        return view('article.index',$variable);
    }
}
