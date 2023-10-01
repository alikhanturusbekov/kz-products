<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::prefix('products')->group(function () {
        //return views
        Route::get('/create', [ProductController::class, 'create']);
        Route::get('/manage', [ProductController::class, 'manage']);
        Route::get('/{product}/edit', [ProductController::class, 'edit']);

        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{product}', [ProductController::class, 'update']);
        Route::delete('/{product}', [ProductController::class, 'destroy']);
    });
});

Route::middleware('guest')->group(function () {
    // return views
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'create']);

    Route::prefix('users')->group(function () {
        Route::post('/', [UserController::class, 'store']);
        Route::post('/authenticate', [UserController::class, 'authenticate']);
    });
});
