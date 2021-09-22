<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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