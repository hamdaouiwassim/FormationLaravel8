<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 127.0.0.1:8000
Route::get('/', [ TestController::class , 'index' ] )->name('root');
// 127.0.0.1:8000/home

Route::get('/home',[ TestController::class , 'home' ] )->name('home');


Route::get('/contact',[ TestController::class , 'contact' ] )->name('contact');


Route::get('/somme/{a}',[ TestController::class , 'somme' ] )->name('somme');



// Route::get('/post/ajouter/{title}/{description}' , [ TestController::class , 'ajouterPublication']);

Route::post('/post/ajouter' , [ PostController::class , 'ajouterPublication'])->name('AddPost');

Route::get('/posts/all' , [ PostController::class , 'postsAfficherTout'])->name('posts');

Route::get('/post/show/{id}' , [ PostController::class , 'postShow']);

Route::get('/post/form',[ PostController::class , 'AjoutForm'])->name('PostForm');

Route::get('/post/delete/{id}',[ PostController::class , 'deletePost'])->name('PostDelete');

Route::get('/post/edit/{id}',[ PostController::class , 'editPost'])->name('PostEdit');

Route::post('/post/data/update',[ PostController::class , 'updatePost'])->name('PostUpdate');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/post/chercher', [ PostController::class, 'searchPost' ])->name('searchPost');
