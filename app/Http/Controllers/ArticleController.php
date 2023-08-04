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

    // menampilkan form edit data
    public function edit($id)
    {

        // menyeleksi data dari database untuk di tampilkan
        $selected = DB::table('articles')->select('id', 'title', 'content', 'updated_at')->where('id', $id)->first();

        // ditampung ke dalam variable
        $variable = [
            'articles' => $selected
        ];

        // mengirim ke bagian form edit
        return view('.article.edit', $variable);
    }

    // mengirim perubahan data ke database
    public function update(Request $request, $id)
    {

        // mengambil semua data yang diperlukan untuk di update
        $title = $request->input('tittle');
        $content = $request->input('content');
        dd($title, $content);

        // mengirim ke database
        DB::table('articles')->where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => now(),
        ]);
        dd($title, $content, $id);
        // melakukan readirect
        return redirect("article");
    }

    // menampilkan detail artikel
    public function show($id)
    {

        // menyeleksi data dari database untuk di tampilkan
        $selected = DB::table('articles')->select('id', 'title', 'content', 'created_at')->where('id', $id)->first();

        // menampung ke dalam variabel
        $variable = [
            'article' => $selected
        ];

        // mengirim ke bagian view
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

    // menghapus data
    public function destroy($id)
    {
        DB::table('articles')->where('id', $id)->delete();
        return redirect('article');
    }
}
