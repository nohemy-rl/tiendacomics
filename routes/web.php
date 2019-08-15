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
    return view('home');
});
Route::resource('/sucursal', 'SucursalController');
//Route::get('/sucursal', 'SucursalController@index')->name('sucursal.index');
Route::get('/tiendas/', 'SucursalController@tiendas')->name('sucursal.tiendas');
Route::resource('/comics', 'ComicsController');
Route::get('/comics/tienda/{limit}', 'ComicsController@tienda')->name('comics.tienda');
