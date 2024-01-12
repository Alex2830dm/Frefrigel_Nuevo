<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VentasController;

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
    Route::get('users/', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::POST('users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/{user}/user', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('user/{user}', [UsersController::class, 'destroy'])->name('users.delete');

    Route::get('roles/', [RolesController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('roles.store');
    Route::get('roles/{role}/rol', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RolesController::class, 'destroy'])->name('roles.delete');

    Route::resource('permissions', PermissionController::class);

    Route::get('productos', [ProductsController::class, 'index'])->name('products.index');
    Route::get('productos/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('productos/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('productos/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('productos/{product}/', [ProductsController::class, 'update'])->name('products.update');
    Route::get('productos/{product}/inactive', [ProductsController::class, 'inactive'])->name('products.inactive');
    Route::get('productos/inactive', [ProductsController::class, 'inactives'])->name('products.inactives');
    Route::get('productos/{product}/active', [ProductsController::class, 'active'])->name('products.active');
    Route::delete('productos/{product}', [ProductsController::class, 'destroy'])->name('products.delete');

    Route::resource('clientes', ClientesController::class);
    Route::get('clientes/inactivos', [ClientesController::class, 'inactivos'])->name('clientes.inactives');
    //Route::get('clientes/{cliente}/inactivar', [ClientesController::class, 'inactive'])->name('clientes.inactive');


    Route::get('ventas', [VentasController::class, 'ventas'])->name('ventas.venta');
    Route::post('ventas/store', [VentasController::class, 'storeVenta'])->name('ventas.store');
    
    /* Route::get('clientes', [ClientesController::class, 'index'])->name('clients.index');
    Route::get('clientes/create', [ClientesController::class, 'create'])->name('clients.create');
    Route::post('clientes/store', [ClientesController::class, 'store'])->name('clients.store');
    Route::get('clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clients.edit');
    Route::put('clientes/{cliente}', [ClientesController::class, 'update'])->name('clients.update');
    Route::delete('clientes/{cliente}', [ClientesController::class, 'destroy'])->name('clients.delete'); */
});
