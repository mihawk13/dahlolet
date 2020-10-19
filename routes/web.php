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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('resizeImage', 'ImageController@resizeImage');
Route::post('resizeImagePost', 'ImageController@resizeImagePost')->name('resizeImagePost');

Route::get('/profile', 'HomeController@getProfile')->name('getProfile');
Route::post('/profile', 'HomeController@postProfile')->name('postProfile');


// Dashboard Kasir
Route::middleware('isKasir')->prefix('kasir')->group(function () {
    Route::get('/dashboard', 'KasirController@Dashboard')->name('kasir.dashboard');

    // Pesanan
    // List Menu
    Route::get('/listmenu', 'KasirController@getListMenu')->name('getListMenu');
    Route::post('/listmenu', 'KasirController@cariKategori')->name('cariKategori');
    Route::patch('/listmenu', 'KasirController@cariMenu')->name('cariMenu');


    Route::post('/masukKeranjang', 'KasirController@masukKeranjang')->name('masukKeranjang');
    Route::post('/kurangiKeranjang', 'KasirController@kurangiKeranjang')->name('kurangiKeranjang');
    Route::post('/tambahKeranjang', 'KasirController@tambahKeranjang')->name('tambahKeranjang');

    // List Pesanan
    Route::get('/listpesanan', 'KasirController@getListPesanan')->name('getListPesanan');
    Route::post('listpesanan', 'KasirController@plusminusListPesanan');
    Route::patch('/listpesanan', 'KasirController@postCheckOut')->name('postCheckOut');
    Route::get('/listpesanan/{idmenu}', 'KasirController@hapusPesanan')->name('hapusPesanan');

    // Data Pesanan
    Route::get('/datapesanan', 'KasirController@getDataPesanan')->name('kasir.getDataPesanan');
    Route::get('/datapesanan/invoice/{id}', 'KasirController@getInvoice')->name('getInvoice');

});

// Dashboard Admin
Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@Dashboard')->name('admin.dashboard');
    // Users
    Route::get('/users', 'AdminController@getUsers')->name('getUsers');
    Route::post('/users', 'AdminController@postUsers')->name('postUsers');
    Route::patch('/users', 'AdminController@ubahUsers')->name('ubahUsers');
    Route::delete('/users', 'AdminController@hapusUsers')->name('hapusUsers');

    // Kategori
    Route::get('/kategori', 'AdminController@getKategori')->name('getKategori');
    Route::post('/kategori', 'AdminController@postKategori')->name('postKategori');
    Route::patch('/kategori', 'AdminController@ubahKategori')->name('ubahKategori');

    // Menu
    Route::get('/menu', 'AdminController@getMenu')->name('getMenu');
    Route::post('/menu', 'AdminController@postMenu')->name('postMenu');
    Route::patch('/menu', 'AdminController@ubahMenu')->name('ubahMenu');
    Route::put('/menu', 'AdminController@setStatus')->name('setStatus');

    Route::get('/datapesanan', 'AdminController@getDataPesanan')->name('admin.getDataPesanan');
    Route::get('/datapesanan/invoice/{id}', 'AdminController@getInvoice')->name('admin.getInvoice');
});

// Dashboard Dapur
Route::middleware('isDapur')->prefix('dapur')->group(function () {
    Route::get('/dashboard', 'DapurController@dashboard')->name('dapur.dashboard');
    Route::get('/datapesanan', 'DapurController@getDataPesanan')->name('dapur.getDataPesanan');

    Route::get('/datapesanan/invoice/{id}', 'DapurController@getInvoice')->name('dapur.getInvoice');

    Route::get('/dashboard/siapkan/{id}', 'DapurController@siapkanPesanan')->name('siapkanPesanan');
    Route::get('/dashboard/selesai/{id}', 'DapurController@selesaiPesanan')->name('selesaiPesanan');


    Route::get('/pesanan_card', 'DapurController@getPesananCard')->name('getPesananCard');
});
