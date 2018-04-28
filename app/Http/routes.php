<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('almacen/tipoProducto','tipoProductoController');
Route::resource('almacen/producto','ProductoController');
Route::resource('almacen/proveedor','ProveedorController');
Route::resource('almacen/productoVistas','ProductoVistasController');
Route::resource('almacen/tipoProductoVistas','TipoProductoVistasController');
Route::resource('almacen/proveedorVistas','ProveedorVistasController');
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/{slug?}', 'HomeController@index');
