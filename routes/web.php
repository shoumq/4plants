<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//Route::get('/{any}', function () {
//    return view('index');
//})->where('any', '.*');

Auth::routes();

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/search', [App\Http\Controllers\MainController::class, 'search']);
Route::get('/product', [App\Http\Controllers\MainController::class, 'product']);
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'products'])->name('admin.products');
Route::get('/admin/users_search/', [App\Http\Controllers\AdminController::class, 'usersSearch'])->name('admin.users.search');
Route::get('/admin/product_search/', [App\Http\Controllers\AdminController::class, 'productsSearch'])->name('admin.product.search');
Route::get('/product_edit/{id}', [App\Http\Controllers\AdminController::class, 'productEdit']);

//Route::get('/setimages', [App\Http\Controllers\MainController::class, 'create']);
//Route::post('/setimages', [App\Http\Controllers\MainController::class, 'setImages']);

Route::get('flush', [App\Http\Controllers\Auth\LoginController::class, 'flush']);

Auth::routes();
