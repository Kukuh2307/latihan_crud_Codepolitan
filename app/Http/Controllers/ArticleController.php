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

        // untuk memisahkan format \n
        $storage = explode("\n", $storage);

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

        // proses memasukkan data,langkah pertama membaca file
        $storage = Storage::get('articles.txt');
        $storage = explode("\n", $storage);

        // menampung data inputan dalam array 
        $input_data = [
            count($storage) + 1,
            $title,
            $content,
            date("Y:m:d H:i:s")
        ];

        // menggabungkan array menjadi 1 string
        $input_data = implode(',', $input_data);
        // @dd($input_data);

        // menggabungkan data lama dengan inputan baru
        array_push($storage, $input_data);
        // @dd($storage);

        // menggabungkan data array menjadi 1 string
        $storage = implode("\n", $storage);
        // @dd($storage);

        // menyimpan data baru ke dalam file dengan cara menimpa data lama dengan data baru
        Storage::write('articles.txt', $storage);

        // redirect ke halaman awal
        return redirect('article');
    }
}
