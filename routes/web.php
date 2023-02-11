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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/CRUD_Productos', [App\Http\Controllers\ProductosController::class, 'Home_Productos'])->name('Home_Productos');
Route::post('/Crear_Productos', [App\Http\Controllers\ProductosController::class, 'Crear_Productos'])->name('Crear_Productos');
Route::get('/Eliminar_Productos', [App\Http\Controllers\ProductosController::class, 'Eliminar_Productos'])->name('Eliminar_Productos');
Route::get('/Lista_Productos', [App\Http\Controllers\ProductosController::class, 'Lista_Productos'])->name('Lista_Productos');

Route::get('/CRUD_Ventas', [App\Http\Controllers\VentasController::class, 'Home_Ventas'])->name('Home_Ventas');
Route::post('/Crear_Ventas', [App\Http\Controllers\VentasController::class, 'Crear_Ventas'])->name('Crear_Ventas');
//Route::get('/Eliminar_Productos', [App\Http\Controllers\ProductosController::class, 'Eliminar_Productos'])->name('Eliminar_Productos');
//Route::get('/Lista_Productos', [App\Http\Controllers\ProductosController::class, 'Lista_Productos'])->name('Lista_Productos');
