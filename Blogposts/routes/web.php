<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/client/post/add',[PostController::class,'create'])->name('addPost');
Route::get('/client/posts',[PostController::class,'index'])->name('myposts')->middleware('auth');

route::post('/client/post/add/db',[PostController::class,'store'])->name('addPostDb')->middleware('auth');
route::get('/posts',[PostController::class,'PostsList'])->name('postsList');
route::get('/post/{id}/show',[PostController::class,'ShowPost'])->name('postShow');
route::post('/post/comment/db',[PostController::class,'AddComment'])->name('AddComment')->middleware('auth');
