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


//website
Route::get('/', 'CoWebsite@home');
Route::get('/kontak', 'CoWebsite@kontak');
Route::get('/tentang', 'CoWebsite@tentang');
Route::post('/add-saran', 'CoWebsite@addsaran');

Route::get('/auth', 'Controller@login');
Route::get('/forpass', function () {
    return view('forpass');
});
Route::post('/sendpass', 'Controller@sendpass');
Route::post('/regis', 'Controller@register');
Route::post('/regis:pengunjung', 'Controller@regispeng');
Route::get('/actlog', 'Controller@actlog');



Route::get('/pimpinan', 'CoPimpinan@home');
Route::post('/edpeng:pimpinan={id}', 'CoPimpinan@edpeng');

Route::get('/odatadumas', 'CoPimpinan@dtadumas');
Route::get('/odataverdumas', 'CoPimpinan@dtaverdumas');
Route::get('/odataprodumas', 'CoPimpinan@dtaproses');
Route::get('/odatatladumas', 'CoPimpinan@dtaselesai');

Route::get('/odatastat', 'CoPimpinan@dtastat');



Route::get('/admin', 'CoAdmin@home');
Route::post('/edpeng:admin={id}', 'CoAdmin@edpeng');
Route::post('/edsetting', 'CoAdmin@edsetting');

Route::get('/datasosmed', 'CoAdmin@dtasosmed');
Route::post('/add_sosmed', 'CoAdmin@addsosmed');
Route::post('/sosmed:upd={id}', 'CoAdmin@updsosmed');
Route::get('/sosmed:del={id}', 'CoAdmin@delsosmed');

Route::get('/datakategori', 'CoAdmin@dtakat');
Route::post('/add_kategori', 'CoAdmin@addkat');
Route::post('/kategori:upd={id}', 'CoAdmin@updkat');
Route::get('/kategori:del={id}', 'CoAdmin@delkat');

Route::get('/datapengguna', 'CoAdmin@dtapeng');
Route::post('/add_pengguna', 'CoAdmin@addpeng');
Route::post('/pengguna:upd={id}', 'CoAdmin@updpeng');
Route::get('/pengguna:del={id}', 'CoAdmin@delpeng');

Route::get('/datadumas', 'CoAdmin@dtadumas');
Route::post('/add_dumas', 'CoAdmin@adddumas');
Route::post('/dumas:upd={id}', 'CoAdmin@upddumas');
Route::get('/dumas:del={id}', 'CoAdmin@deldumas');

Route::post('/dumas:verifikasi={id}', 'CoAdmin@verifikasidumas');

Route::get('/dataverdumas', 'CoAdmin@dtaverdumas');
Route::post('/dumas:proses', 'CoAdmin@prosesdumas');

Route::get('/dataprodumas', 'CoAdmin@dtaproses');
Route::post('/dumas:tindak={id}', 'CoAdmin@tindakdumas');

Route::get('/datatladumas', 'CoAdmin@dtaselesai');

Route::get('/datastat', 'CoAdmin@dtastat');




// Route::get('/kirim', 'CoPengunjung@kirim');
Route::get('/pengunjung', 'CoPengunjung@home');
Route::post('/edpeng:pengunjung={id}', 'CoPengunjung@edpeng');

Route::get('/pdatadumas', 'CoPengunjung@dtadumas');
Route::post('/add_pdumas', 'CoPengunjung@adddumas');
Route::get('/pdumas:det={id}', 'CoPengunjung@detdumas');
Route::post('/pdumas:upd={id}', 'CoPengunjung@upddumas');
Route::get('/pdumas:del={id}', 'CoPengunjung@deldumas');

Route::get('/pdataresdumas', 'CoPengunjung@dtaresdumas');
Route::post('/dumas:respon', 'CoPengunjung@resdumas');

Route::get('/pdatastat', 'CoPengunjung@dtastat');




Route::get('/logout', 'Controller@logout');
