<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;



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
    /**adicionado rota pagamento*/
    Route::get('/cart/payment', [CartsController::class, 'payment'])->name('cart.payment');
    Route::get('/cart', [CartsController::class, 'show'])->name('cart.show');

    /**Rotas do pedido, uma para adicionar outra para mostrar */
    Route::post('/order/add', [OrderController::class, 'add'])->name('order.add');
    Route::get('/order', [OrderController::class, 'show'])->name('order.show');

    Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('user.profile');
    Route::post('/profile/add', [ProfileController::class, 'create'])->name('user.add');
});
Route::resource('/product', ProductsController::class, ['only' => ['show']]);
Route::get('/{product}',[ProductsController::class, 'type']);
Route::get('/search/k/', [ProductsController::class, 'search'])->name('search');
Route::get('/products/produtos', [ProductsController::class, 'products'])->name('products');
Route::get('/sobre/institucional', [ProductsController::class, 'sobre'])->name('sobre');

