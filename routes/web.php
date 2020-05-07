<?php

use Illuminate\Support\Facades\Auth;
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


// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', 'HomeController@index');

Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost', 'ImageController@resizeImagePost')->name('resizeImagePost');

Auth::routes();


// Route::get('kasir/dashboard', 'HomeController@kasirDashboard')->name('kasir.dashboard')->middleware('isKasir');

// Dashboard Kasir
Route::middleware('isKasir')->prefix('kasir')->group(function () {
    Route::get('/dashboard', 'KasirController@Dashboard')->name('kasir.dashboard');
    // Kategori
    Route::get('/kategori', 'KasirController@getKategori')->name('getKategori');
    Route::post('/kategori', 'KasirController@postKategori')->name('postKategori');
    Route::patch('/kategori', 'KasirController@ubahKategori')->name('ubahKategori');
    // Menu
    Route::get('/menu', 'KasirController@getMenu')->name('getMenu');
    Route::post('/menu', 'KasirController@postMenu')->name('postMenu');
    Route::patch('/menu', 'KasirController@ubahMenu')->name('ubahMenu');
    Route::put('/menu', 'KasirController@setStatus')->name('setStatus');
    // Daftar Menu
    Route::get('/listmenu', 'KasirController@getListMenu')->name('getListMenu');
    Route::post('/listmenu', 'KasirController@cariKategori')->name('cariKategori');
    Route::patch('/listmenu', 'KasirController@cariMenu')->name('cariMenu');

    Route::post('/masukKeranjang', 'KasirController@masukKeranjang')->name('masukKeranjang');
    Route::post('/kurangiKeranjang', 'KasirController@kurangiKeranjang')->name('kurangiKeranjang');
    Route::post('/tambahKeranjang', 'KasirController@tambahKeranjang')->name('tambahKeranjang');
});

// Dashboard Admin
Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@Dashboard')->name('admin.dashboard');
    // Users
    Route::get('/users', 'AdminController@getUsers')->name('getUsers');
    Route::post('/users', 'AdminController@postUsers')->name('postUsers');
    Route::patch('/users', 'AdminController@ubahUsers')->name('ubahUsers');
});
