<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // menampilkan semua data artikel
    public function index()
    {
        // untuk menampikan data menggunakan model active dengan fungsi active yang hanya akan menampilkan data yang active
        // jika ingin menampilkan data yang sudah di hapus sebelumnya bisa menggunakan fungsi withTrased() setelah actice()
        $storage = Article::active()->get();

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

    // fungsi input data
    public function store(Request $request)
    {

        // menangkanp input dari view create.blade.php
        $title = $request->input('tittle');
        $content = $request->input('content');
        // @dd($title, $content);

        // proses memasukkan data pada database dengan coding sebelumnya
        // DB::table('articles')->insert
        // menjadi seperti di bawah untuk menerapkan model Article yang sudah di buat di bagian model
        Article::insert([
            'title' => $title,
            'content' => $content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // redirect ke halaman awal
        return redirect('article');
    }

    // menampilkan detail artikel
    public function show($id)
    {

        // menyeleksi data dari database untuk di tampilkan
        $selected = Article::where('id', $id)->first();
        // mengambil method comment pada article model
        $comments = $selected->comments()->get();
        // mengambil custom method total komentar pada article model
        $total_komentar = $selected->total_komentar();
        // menampung ke dalam variabel
        $variable = [
            'article' => $selected,
            'comments' => $comments,
            'total_komentar' => $total_komentar,
        ];

        // mengirim ke bagian view
        return view('article.show', $variable);
    }

    // menampilkan form edit data
    public function edit($id)
    {

        // menyeleksi data dari database untuk di tampilkan
        $selected = Article::where('id', $id)->first();

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
        // dd($title, $content);

        // mengirim ke database
        Article::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => now(),
        ]);
        // dd($title, $content, $id);
        // melakukan readirect
        return redirect("article");
    }

    // menghapus data
    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        return redirect('article');
    }
}
