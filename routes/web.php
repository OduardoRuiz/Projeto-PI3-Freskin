<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
//Product
Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');
Route::get('/product/edit/{product}',  [ProductsController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{product}', [ProductsController::class, 'update'])->name('product.update');
Route::get('/product/destroy/{product}', [ProductsController::class, 'destroy'])->name('product.destroy');
