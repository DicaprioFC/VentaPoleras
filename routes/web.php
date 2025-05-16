<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('inicio');
});

//rutas de registro y login


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/registro', [RegistroController::class, 'showForm'])->name('registro');
Route::post('/registro', [RegistroController::class, 'register']);


Route::get('/admin', [AdminController::class, 'showForm'])->name('admin');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

//rutas de los clientes registrados

Route::get('/cliente', [ClienteController::class, 'index']);

Route::get('/nikecliente', [ClienteController::class, 'productosNike']);

Route::get('/adidascliente', [ClienteController::class, 'productosAdidas']);

Route::get('/marathoncliente', [ClienteController::class, 'productosMarathon']);

Route::get('/marcamaracli', [ClienteController::class, 'productosMarcaMarathon']);

Route::get('/marcanikecli', [ClienteController::class, 'productosMarcaNike']);

Route::get('/otrasmarcas', [ClienteController::class, 'productosOtrasMarcas']);


Route::get('/productos', [ProductoController::class, 'porMarca'])->name('productosPorMarca');


//rutas de los usuarios sin loguearse

Route::get('/usuario', [UsuarioController::class, 'index']);

Route::get('/nikeusuario', [UsuarioController::class, 'productosNike']);

Route::get('/adidasusuario', [UsuarioController::class, 'productosAdidas']);

Route::get('/marathonusuario', [UsuarioController::class, 'productosMarathon']);

Route::get('/marcamarausu', [UsuarioController::class, 'productosMarcaMarathon']);

Route::get('/marcanikeusu', [UsuarioController::class, 'productosMarcaNike']);

Route::get('/otrasmarcasusu', [UsuarioController::class, 'productosOtrasMarcas']);
