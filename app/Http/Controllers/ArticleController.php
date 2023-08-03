<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // menampilkan semua data artikel
    public function index()
    {
        $storage = DB::table('articles')->get();

        // data akan di tampung dalam variabel lalu di kirim ke view
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
        $selected = DB::table('articles')->select('id', 'title', 'content', 'created_at')->where('id', $id)->first();
        $variable = [
            'article' => $selected
        ];

        return view('article.show', $variable);
    }

    // fungsi input data
    public function store(Request $request)
    {

        // menangkanp input dari view create.blade.php
        $title = $request->input('tittle');
        $content = $request->input('content');
        // @dd($title, $content);

        // proses memasukkan data pada database
        DB::table('articles')->insert([
            'title' => $title,
            'content' => $content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // redirect ke halaman awal
        return redirect('article');
    }
}
