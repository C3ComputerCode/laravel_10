<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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
Route::get('/articles/add',[ArticleController::class,"add"]);
Route::post('/articles/add',[ArticleController::class,"create"]);
Route::get('/articles/delete/{id}',[ArticleController::class,"delete"]);



Route::get('/articles/update/{id}',[ArticleController::class,"edit"]);
Route::put('/articles/update/{id}',[ArticleController::class,"update"])->name('article.update');

Route::get('/category',[CategoryController::class,"index"])->name('category.index');
Route::get('/category/add',[CategoryController::class,'add'])->name('category.add');
Route::post('/category/add',[CategoryController::class,'create'])->name('category.create');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


Route::get('/articles/detail/{id}',[ArticleController::class,"detail"]);

Route::get("/articles/detail",function(){
    return "articles detail";
});

// Route::get("/article/detail/{id}",function($id){
//     return "article detail ".$id;
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

