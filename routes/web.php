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

Route::get('/login', function () {
    return view('login');
});


Route::post('/regis', 'Controller@register');
Route::get('/actlog', 'Controller@actlog');



Route::get('/pimpinan', 'CoPimpinan@home');



Route::get('/admin', 'CoAdmin@home');
Route::post('/edpeng:admin={id}', 'CoAdmin@edpeng');

Route::get('/datapengguna', 'CoAdmin@dtapeng');
Route::post('/add_pengguna', 'CoAdmin@addpeng');
Route::post('/pengguna:upd={id}', 'CoAdmin@updpeng');
Route::get('/pengguna:del={id}', 'CoAdmin@delpeng');

Route::get('/datadumas', 'CoAdmin@dtadumas');
Route::post('/add_dumas', 'CoAdmin@adddumas');
Route::post('/dumas:sta={id}', 'CoAdmin@updstdumas');
Route::post('/dumas:upd={id}', 'CoAdmin@upddumas');
Route::get('/dumas:del={id}', 'CoAdmin@deldumas');
Route::get('/dataverdumas', 'CoAdmin@dtaverdumas');

Route::get('/datastat', 'CoAdmin@dtastat');



Route::get('/pengunjung', 'CoPengunjung@home');
Route::post('/edpeng:pengunjung={id}', 'CoPengunjung@edpeng');

Route::get('/pdatadumas', 'CoPengunjung@dtadumas');
Route::post('/add_pdumas', 'CoPengunjung@adddumas');
Route::get('/pdumas:det={id}', 'CoPengunjung@detdumas');
Route::post('/pdumas:upd={id}', 'CoPengunjung@upddumas');
Route::get('/pdumas:del={id}', 'CoPengunjung@deldumas');

Route::get('/logout', 'Controller@logout');