<?php

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
});

Auth::routes();

Route::prefix('admin')->middleware('role:admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin');
});

Route::prefix('vendor')->middleware('role:vendor')->group(function() {
    Route::get('/', 'VendorController@index')->name('vendor');
});

Route::prefix('client')->middleware('role:client')->group(function() {
    Route::get('/', 'ClientController@index')->name('client');
    Route::get('/prepare_order/{product}', 'ClientController@prepareOrder')->name('client.prepare_order');
    Route::post('/submit_order', 'ClientController@submitOrder')->name('client.submit_order');
    Route::get('/orders', 'ClientController@clientOrders');
});
