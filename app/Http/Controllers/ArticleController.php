<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(){
        $storage = Storage::get('articles.txt');
        $storage = explode("\n",$storage);
        $variable = [
            'articles' => $storage
        ];
        return view('article.index',$variable);
    }
}
