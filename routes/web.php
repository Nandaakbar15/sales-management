<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.home');
});

// Route::get("/hello-world", function() {
//     return "Hello World!";
// });

Route::prefix('admin')->group(function () {
    Route::get('/home', 'App\Http\Controllers\AdminController@home')->name('admin.home');
    Route::get('/transaksi', 'App\Http\Controllers\TransaksiController@index');
    Route::get('/viewtambahtransaksi', 'App\Http\Controllers\TransaksiController@tambahTransaksi');
    Route::get('/barang', 'App\Http\Controllers\BarangController@index');
    Route::get('/barang/viewtambahBarang', 'App\Http\Controllers\BarangController@create');
    Route::post('/barang/tambahBarang', 'App\Http\Controllers\BarangController@store');
    Route::get('/viewubahBarang/{barang}', 'App\Http\Controllers\BarangController@edit');
    Route::put('/ubahBarang/{barang}', 'App\Http\Controllers\BarangController@update');
    Route::delete('/hapusBarang/{barang}', 'App\Http\Controllers\BarangController@destroy');
});