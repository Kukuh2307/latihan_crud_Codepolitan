<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // menampilkan semua data artikel
    public function index()
    {
        $storage = Storage::get('articles.txt');
        $storage = explode("\n", $storage);
        $variable = [
            'articles' => $storage
        ];
        return view('article.index', $variable);
    }

    // membuat artikel baru
    public function create()
    {
        return view('article.create');
    }

    // menampilkan detail artikel
    public function show($id)
    {

        return view('article.show');
    }
}
