<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/article",function(){
//     return "article list";
// });

Route::get('/articles',[ArticleController::class,"index"]);

Route::get('/articles/detail/{id}',[ArticleController::class,"detail"]);

Route::get("/articles/detail",function(){
    return "articles detail";
});

// Route::get("/article/detail/{id}",function($id){
//     return "article detail ".$id;
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
