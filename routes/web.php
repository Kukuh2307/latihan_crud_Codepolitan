<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// contoh default route
Route::get('/', function () {
    return view('welcome');
});

// contoh route menggunakan fungsi untuk menampilkan view hello
Route::get('hello', function () {
    return view('hello');
});

// contoh route menggunakan controller --resource
Route::resource('helloController', HelloController::class);

// contoh route custom mengggunakan controller get
Route::get('helloControllerCustom', [HelloController::class, 'Hello']);

// contoh route custom menggunakan controller get dari /article
Route::get('article', [ArticleController::class, 'index']);

// route untuk menambahkan artikel baru
Route::get('article/create', [ArticleController::class, 'create']);

// route untuk menampilkan detail artikel
Route::get('article/{id}', [ArticleController::class, 'show']);
