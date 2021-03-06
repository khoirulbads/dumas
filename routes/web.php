<?php

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
    return view('login');
});


Route::post('/regis', 'Controller@register');
Route::get('/actlog', 'Controller@actlog');



Route::get('/pemilik', 'CoOwner@home');



Route::get('/admin', 'CoAdmin@home');
Route::post('/edpeng:admin={id}', 'CoAdmin@edpeng');

Route::get('/datapengguna', 'CoAdmin@dtapeng');
Route::post('/add_pengguna', 'CoAdmin@addpeng');
Route::post('/pengguna:upd={id}', 'CoAdmin@updpeng');
Route::get('/pengguna:del={id}', 'CoAdmin@delpeng');

Route::get('/datadumas', 'CoAdmin@dtadumas');

