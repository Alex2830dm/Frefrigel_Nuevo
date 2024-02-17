<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\EmpleadosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('home', 'home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('users', UsersController::class)->except(['show']);

    Route::resource('empleados', EmpleadosController::class);

    Route::resource('roles', RolesController::class)->except(['show']);

    Route::resource('permissions', PermissionController::class);

    Route::resource('productos', ProductsController::class)->except(['show']);
    Route::get('productos/inactives', [ProductsController::class, 'inactives'])->name('productos.inactives');
    Route::get('productos/{product}/inactive', [ProductsController::class, 'inactive'])->name('productos.inactive');
    Route::get('productos/{product}/active', [ProductsController::class, 'active'])->name('productos.active');

    Route::resource('clientes', ClientesController::class)->except(['show']);
    Route::get('clientes/inactivos', [ClientesController::class, 'inactivos'])->name('clientes.inactives');
    //Route::get('clientes/{cliente}/inactivar', [ClientesController::class, 'inactive'])->name('clientes.inactive');

    Route::prefix('ventas')->group(function () {
        Route::get('/', [VentasController::class, 'indexVentas'])->name('ventas.index');
        Route::get('/venta', [VentasController::class, 'ventas'])->name('ventas.venta');
        Route::get('/{venta}', [VentasController::class, 'showVenta'])->name('ventas.show');
        Route::post('/store', [VentasController::class, 'storeVenta'])->name('ventas.store');
    });

    Route::prefix('entradas')->group(function () {
        Route::get('/', [EntradasController::class, 'index'])->name('entradas.index');
        Route::get('/entrada', [EntradasController::class, 'entradas'])->name('entradas.entrada');
        Route::get('/{entrada}', [EntradasController::class, 'show'])->name('entradas.show');
        Route::post('/store', [EntradasController::class, 'storeEntrada'])->name('entradas.store');
    });
    Route::get("info_producto", [EntradasController::class, "datos_producto"])->name('entradas.info_producto');

    Route::prefix('categorias')->group(function () {
        Route::get('/', [ProductsController::class, 'indexCategorias'])->name('categorias.index');
        Route::get('create', [ProductsController::class, 'createCategorias'])->name('categorias.create');
        Route::post('store', [ProductsController::class, 'storeCategorias'])->name('categorias.store');
        Route::get('/{categoria}/edit', [ProductsController::class, 'editCategorias'])->name('categorias.edit');
        Route::put('/{categoria}', [ProductsController::class, 'updateCategorias'])->name('categorias.update');
        Route::delete('/{categoria}', [ProductsController::class, 'deleteCategorias'])->name('categorias.delete');
    });
    

    Route::prefix('pedidos')->group(function () {
        Route::get('/', [VentasController::class, 'indexPedidos'])->name('pedidos.index');
        Route::get('/pedido', [VentasController::class, 'pedidos'])->name('pedidos.pedido');
        Route::post('/store', [VentasController::class, 'storePedido'])->name('pedidos.store');
        Route::get('/{pedido}', [VentasController::class, 'showPedido'])->name('pedidos.show');
    });
});
