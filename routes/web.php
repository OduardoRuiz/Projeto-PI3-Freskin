<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\CartsController;

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => 'isAdmin'], function () {
    Route::resource('/product', ProductsController::class, ['except' => ['show']]);
    Route::resource('/tag', TagsController::class)->middleware(['auth']);

});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/cart/add/{product}', [CartsController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{product}', [CartsController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CartsController::class, 'show'])->name('cart.show');
});
Route::resource('/product', ProductsController::class, ['only' => ['show']]);

Route::get('/{product}',[ProductsController::class, 'type']);
Route::get('/search/k/', [ProductsController::class, 'search'])->name('search');
