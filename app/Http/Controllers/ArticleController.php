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
        $storage = Storage::get('articles.txt');
        $storage = explode("\n", $storage);
        $selected = array();

        // melakukan looping semua data
        foreach ($storage as $st) {

            // memecahkan format koma
            $st = explode(",", $st);

            // pengkondisian untuk mencocokkan id
            if ($st[0] == $id) {

                // menampung data yang sudah terseleksi
                $selected = $st;
            }
        }
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
