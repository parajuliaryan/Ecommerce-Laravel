<?php

use Illuminate\Support\Facades\Route;
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
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add-to-cart');
    Route::get('remove-from-cart/{id}',[ProductController::class,'remove'])->name('remove-from-cart');
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('is_admin');
    Route::get('/edit/{id}', [ProductController::class, 'edit_page'])->name('edit.page')->middleware('is_admin');
    Route::post('/edit', [ProductController::class, 'edit'])->name('edit')->middleware('is_admin');
    Route::put('/electronic-devices/{id}', [ProductController::class, 'update'])->name('update')->middleware('is_admin');
    Route::get('/electronic-devices/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware('is_admin');
    Route::post('/electronic-devices', [ProductController::class, 'store'])->name('store')->middleware('is_admin');
});