<?php

use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
Route::get('/', ['uses' => 'App\Http\Controllers\ProductosController@index']);
Route::group(['prefix' => 'productos'], function () {
    Route::get('formProducto', ['uses' => 'App\Http\Controllers\ProductosController@new']);
    Route::post('crearProducto', ['uses' => 'App\Http\Controllers\ProductosController@guardar'])->name('productos.guardar');
    Route::get('editProducto/{id}', ['uses' => 'App\Http\Controllers\ProductosController@editProducto']);
    Route::post('editGuardar/', ['uses' => 'App\Http\Controllers\ProductosController@editGuardar'])->name('productos.editGuardar');
    Route::post('deleteProducto', ['uses' => 'App\Http\Controllers\ProductosController@deleteProducto']);
    Route::delete('productos{producto}', 'App\Http\Controllers\ProductosController@eliminar')->name('productos.eliminar');
});
Route::group(['prefix' => 'ventas'], function () {
    Route::get('/', ['uses' => 'App\Http\Controllers\VentasController@index']);
    Route::get('formVenta', ['uses' => 'App\Http\Controllers\VentasController@new']);
    Route::post('crearVenta', ['uses' => 'App\Http\Controllers\VentasController@guardar'])->name('ventas.guardar');
});
