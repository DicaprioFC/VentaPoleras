<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('inicio');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/registro', [RegistroController::class, 'showForm'])->name('registro');
Route::post('/registro', [RegistroController::class, 'register']);


Route::get('/admin', [AdminController::class, 'showForm'])->name('admin');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');


Route::get('/cliente', [ClienteController::class, 'index']);

Route::get('/nikecliente', [ClienteController::class, 'productosNike']);

Route::get('/adidascliente', [ClienteController::class, 'productosAdidas']);

Route::get('/marathoncliente', [ClienteController::class, 'productosMarathon']);

Route::get('/marcamaracli', [ClienteController::class, 'productosMarcaMarathon']);

Route::get('/marcanikecli', [ClienteController::class, 'productosMarcaNike']);

Route::get('/otrasmarcas', [ClienteController::class, 'productosOtrasMarcas']);


Route::get('/productos', [ProductoController::class, 'porMarca'])->name('productosPorMarca');
