<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
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

    Route::get('/dashboard', DashboardController::class);

    Route::post('/notification/get', [NotificationController::class, 'get']);

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

        Route::get('/articulo/buscarArticulo', [ArticuloController::class, 'buscarArticulo']);
        Route::get('/articulo/listarArticulo', [ArticuloController::class, 'listarArticulo']);

        Route::get('/articulo/listarPdf',[ArticuloController::class, 'listarPdf'])->name('articulos_pdf');

        Route::get('/proveedor', [ProveedorController::class, 'index']);
        Route::post('/proveedor/registrar', [ProveedorController::class, 'store']);
        Route::put('/proveedor/actualizar', [ProveedorController::class, 'update']);
        Route::get('/proveedor/selectProveedor', [ProveedorController::class, 'selectProveedor']);

        Route::get('/ingreso',  [IngresoController::class, 'index']);
        Route::post('/ingreso/registrar', [IngresoController::class, 'store']);
        Route::put('/ingreso/desactivar', [IngresoController::class, 'desactivar']);
        Route::get('/ingreso/obtenerCabecera', [IngresoController::class, 'obtenerCabecera']);
        Route::get('/ingreso/obtenerDetalles', [IngresoController::class, 'obtenerDetalles']);

    });

    Route::group(['middleware' => ['Vendedor']], function () {
        Route::get('/cliente', [ClienteController::class, 'index']);
        Route::post('/cliente/registrar', [ClienteController::class, 'store']);
        Route::put('/cliente/actualizar', [ClienteController::class, 'update']);

        Route::get('/cliente/selectCliente', [ClienteController::class, 'selectCliente']);

        Route::get('/articulo/buscarArticuloVenta', [ArticuloController::class, 'buscarArticulo']);
        Route::get('/articulo/listarArticuloVenta', [ArticuloController::class, 'listarArticulo']);

        Route::get('/venta', [VentaController::class, 'index']);
        Route::post('/venta/registrar', [VentaController::class, 'store']);
        Route::put('/venta/desactivar', [VentaController::class, 'desactivar']);
        Route::get('/venta/obtenerCabecera', [VentaController::class, 'obtenerCabecera']);
        Route::get('/venta/obtenerDetalles', [VentaController::class, 'obtenerDetalles']);

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

        Route::get('/articulo/listarPdf',[ArticuloController::class, 'listarPdf'])->name('articulos_pdf');

        Route::get('/proveedor', [ProveedorController::class, 'index']);
        Route::post('/proveedor/registrar', [ProveedorController::class, 'store']);
        Route::put('/proveedor/actualizar', [ProveedorController::class, 'update']);

        Route::get('/ingreso',  [IngresoController::class, 'index']);
        Route::post('/ingreso/registrar', [IngresoController::class, 'store']);
        Route::put('/ingreso/desactivar', [IngresoController::class, 'desactivar']);
        Route::get('/ingreso/obtenerCabecera', [IngresoController::class, 'obtenerCabecera']);
        Route::get('/ingreso/obtenerDetalles', [IngresoController::class, 'obtenerDetalles']);

        Route::get('/cliente', [ClienteController::class, 'index']);
        Route::post('/cliente/registrar', [ClienteController::class, 'store']);
        Route::put('/cliente/actualizar', [ClienteController::class, 'update']);


        Route::get('/venta/pdf/{id}',[VentaController::class, 'pdf'])->name('venta_pdf');

        Route::get('/rol', [RolController::class, 'index']);
        Route::get('/rol/selectRol', [RolController::class, 'selectRol']);

        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/registrar', [UserController::class, 'store']);
        Route::put('/user/actualizar', [UserController::class, 'update']);
        Route::put('/user/desactivar', [UserController::class, 'desactivar']);
        Route::put('/user/activar', [UserController::class, 'activar']);
    });

});


