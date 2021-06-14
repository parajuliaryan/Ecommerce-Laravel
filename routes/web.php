<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\isAdmin;
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
    return view('index');
});

Route::get('/electronic-devices',[ProductController::class,'index']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('is_admin');
    Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update')->middleware('is_admin');
    Route::get('/edit/{id}', [ProductController::class, 'delete'])->name('delete')->middleware('is_admin');
    Route::post('/electronic-devices', [ProductController::class, 'store'])->name('store')->middleware('is_admin');
});