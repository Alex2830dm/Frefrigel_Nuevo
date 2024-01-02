<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
    Route::get('users/', [UsersController::class, 'index']);
    Route::get('users/create', function() { return view('auth.register');});
    Route::POST('users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('user/{user}/user', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('user/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('user/{user}', [UsersController::class, 'destroy'])->name('users.delete');
});
