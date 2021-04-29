<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use GuzzleHttp\Middleware;

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::group(['middleware' => 'isAdmin'], function () {
    Route::resource('/product', ProductsController::class, ['except' => [ 'show']]);
    Route::resource('/tag', TagsController::class)->middleware(['auth']);
});
Route::resource('/product', ProductsController::class, ['only'=> ['show']]);
