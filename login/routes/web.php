<?php

use App\Http\Controllers\AuthManger;
use Illuminate\Support\Facades\Route;

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
})->name('home');
Route::get('/login', [AuthManger::class ,'login'])->name('login');
Route::post('/login', [AuthManger::class ,'loginPost'])->name('login.post');
Route::get('/registration',[AuthManger::class ,'registration'])->name('registration');
Route::post('/registration',[AuthManger::class ,'registrationPost'])->name('registration.post');

Route::get('/post', [AuthManger::class ,'post'])->name('post');
Route::post('/post', [AuthManger::class ,'postPost'])->name('post.post');
Route::get('/logout',[AuthManger::class ,'logout'])->name('logout');
