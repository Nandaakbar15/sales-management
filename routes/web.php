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
    Route::get('/viewtambahtransaksi', 'App\Http\Controllers\TransaksiController@viewtambahTransaksi');
    Route::post('/tambahTransaksi', 'App\Http\Controllers\TransaksiController@tambahTransaksi');
    Route::get('/barang', 'App\Http\Controllers\BarangController@index');
    Route::get('/barang/viewtambahBarang', 'App\Http\Controllers\BarangController@create');
    Route::post('/barang/tambahBarang', 'App\Http\Controllers\BarangController@store');
    Route::get('/barang/viewubahBarang/{barang}', 'App\Http\Controllers\BarangController@edit');
    Route::put('/barang/ubahBarang/{barang}', 'App\Http\Controllers\BarangController@update');
    Route::delete('/barang/hapusBarang/{barang}', 'App\Http\Controllers\BarangController@destroy');
    Route::get('/customer', 'App\Http\Controllers\CustomerController@index');
    Route::get('/customer/viewtambahCustomer', 'App\Http\Controllers\CustomerController@create');
    Route::post('/customer/tambahCustomer', 'App\Http\Controllers\CustomerController@store');
    Route::get('/customer/viewubahCustomer/{customer}', 'App\Http\Controllers\CustomerController@edit');
    Route::put('/customer/ubahCustomer/{customer}', 'App\Http\Controllers\CustomerController@update');
    Route::delete('/customer/hapusCustomer/{customer}', 'App\Http\Controllers\CustomerController@destroy');
});