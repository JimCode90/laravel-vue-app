<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/',[LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['middleware'=>['auth']],function(){

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/main', function () {
        return view('contenido.contenido');
    })->name('main');
    Route::group(['middleware' => ['Almacenero']], function () {
        Route::get('/categoria',  [CategoriaController::class, 'index']);
        Route::post('/categoria/registrar',  [CategoriaController::class, 'store']);
        Route::put('/categoria/actualizar',  [CategoriaController::class, 'update']);
        Route::put('/categoria/desactivar',  [CategoriaController::class, 'desactivar']);
        Route::put('/categoria/activar',  [CategoriaController::class, 'activar']);

        Route::get('/categoria/selectCategoria', [CategoriaController::class, 'selectCategoria']);

        Route::get('/articulo', [ArticuloController::class, 'index']);
        Route::post('/articulo/registrar', [ArticuloController::class, 'store']);
        Route::put('/articulo/actualizar', [ArticuloController::class, 'update']);
        Route::put('/articulo/desactivar', [ArticuloController::class, 'desactivar']);
        Route::put('/articulo/activar', [ArticuloController::class, 'activar']);

        Route::get('/proveedor', [ProveedorController::class, 'index']);
        Route::post('/proveedor/registrar', [ProveedorController::class, 'store']);
        Route::put('/proveedor/actualizar', [ProveedorController::class, 'update']);

    });

    Route::group(['middleware' => ['Vendedor']], function () {
        Route::get('/cliente', [ClienteController::class, 'index']);
        Route::post('/cliente/registrar', [ClienteController::class, 'store']);
        Route::put('/cliente/actualizar', [ClienteController::class, 'update']);
    });

    Route::group(['middleware' => ['Administrador']], function () {
        Route::get('/categoria',  [CategoriaController::class, 'index']);
        Route::post('/categoria/registrar',  [CategoriaController::class, 'store']);
        Route::put('/categoria/actualizar',  [CategoriaController::class, 'update']);
        Route::put('/categoria/desactivar',  [CategoriaController::class, 'desactivar']);
        Route::put('/categoria/activar',  [CategoriaController::class, 'activar']);

        Route::get('/categoria/selectCategoria', [CategoriaController::class, 'selectCategoria']);

        Route::get('/articulo', [ArticuloController::class, 'index']);
        Route::post('/articulo/registrar', [ArticuloController::class, 'store']);
        Route::put('/articulo/actualizar', [ArticuloController::class, 'update']);
        Route::put('/articulo/desactivar', [ArticuloController::class, 'desactivar']);
        Route::put('/articulo/activar', [ArticuloController::class, 'activar']);

        Route::get('/proveedor', [ProveedorController::class, 'index']);
        Route::post('/proveedor/registrar', [ProveedorController::class, 'store']);
        Route::put('/proveedor/actualizar', [ProveedorController::class, 'update']);

        Route::get('/cliente', [ClienteController::class, 'index']);
        Route::post('/cliente/registrar', [ClienteController::class, 'store']);
        Route::put('/cliente/actualizar', [ClienteController::class, 'update']);

        Route::get('/rol', [RolController::class, 'index']);
        Route::get('/rol/selectRol', [RolController::class, 'selectRol']);

        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/registrar', [UserController::class, 'store']);
        Route::put('/user/actualizar', [UserController::class, 'update']);
        Route::put('/user/desactivar', [UserController::class, 'desactivar']);
        Route::put('/user/activar', [UserController::class, 'activar']);
    });

});


