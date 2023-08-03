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

// default route
Route::get('/', function () {
    return view('welcome');
});

// route menggunakan fungsi untuk menampilkan view hello
Route::get('hello', function () {
    return view('hello');
});

// route menggunakan controller --resource
Route::resource('helloController', HelloController::class);

// route custom mengggunakan controller get
Route::get('helloControllerCustom', [HelloController::class, 'Hello']);

// route custom menggunakan controller get dari /article
Route::get('article', [ArticleController::class, 'index']);

// route artikel baru
Route::get('article/create', [ArticleController::class, 'create']);

// route edit artikel
Route::get('article/{id}/edit', [ArticleController::class, 'edit']);

// menginptkan artikel baru
Route::post('article', [ArticleController::class, 'store']);

// route detail artikel
Route::get('article/{id}', [ArticleController::class, 'show']);

// mengirim perubahan edit ke database
Route::patch('article{id}', [ArticleController::class, 'update']);
