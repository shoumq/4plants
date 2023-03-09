<?php

use Illuminate\Support\Facades\Route;

//Route::get('/set_users', [\App\Http\Controllers\MainController::class, 'setUsers'])->name('setUsers');

//Route::get('/{any}', function () {
//    return view('index');
//})->where('any', '.*');

Auth::routes();

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/search', [App\Http\Controllers\MainController::class, 'search']);
Route::get('/product', [App\Http\Controllers\MainController::class, 'product']);

Route::get('/setimages', [App\Http\Controllers\MainController::class, 'create']);
Route::post('/setimages', [App\Http\Controllers\MainController::class, 'setImages']);
