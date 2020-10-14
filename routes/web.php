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
    // Kategori
    Route::get('/kategori', 'KasirController@getKategori')->name('getKategori');
    Route::post('/kategori', 'KasirController@postKategori')->name('postKategori');
    Route::patch('/kategori', 'KasirController@ubahKategori')->name('ubahKategori');
    // Menu
    Route::get('/menu', 'KasirController@getMenu')->name('getMenu');
    Route::post('/menu', 'KasirController@postMenu')->name('postMenu');
    Route::patch('/menu', 'KasirController@ubahMenu')->name('ubahMenu');
    Route::put('/menu', 'KasirController@setStatus')->name('setStatus');

    // Pesanan
    // List Menu
    Route::get('/listmenu', 'PesananController@getListMenu')->name('getListMenu');
    Route::post('/listmenu', 'PesananController@cariKategori')->name('cariKategori');
    Route::patch('/listmenu', 'PesananController@cariMenu')->name('cariMenu');


    Route::post('/masukKeranjang', 'PesananController@masukKeranjang')->name('masukKeranjang');
    Route::post('/kurangiKeranjang', 'PesananController@kurangiKeranjang')->name('kurangiKeranjang');
    Route::post('/tambahKeranjang', 'PesananController@tambahKeranjang')->name('tambahKeranjang');

    // List Pesanan
    Route::get('/listpesanan', 'PesananController@getListPesanan')->name('getListPesanan');
    Route::post('listpesanan', 'PesananController@plusminusListPesanan');
    Route::patch('/listpesanan', 'PesananController@postCheckOut')->name('postCheckOut');
    Route::get('/listpesanan/{idmenu}', 'PesananController@hapusPesanan')->name('hapusPesanan');

    // Data Pesanan
    Route::get('/datapesanan', 'PesananController@getDataPesanan')->name('kasir.getDataPesanan');
    Route::get('/datapesanan/invoice/{id}', 'PesananController@getInvoice')->name('getInvoice');

});

// Dashboard Admin
Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@Dashboard')->name('admin.dashboard');
    // Users
    Route::get('/users', 'AdminController@getUsers')->name('getUsers');
    Route::post('/users', 'AdminController@postUsers')->name('postUsers');
    Route::patch('/users', 'AdminController@ubahUsers')->name('ubahUsers');
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
