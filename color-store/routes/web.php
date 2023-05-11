<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController as C;
use App\Http\Controllers\ProductController as P;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\CartController as CART;
use App\Http\Controllers\OrderController as O;
use App\Http\Controllers\TagController as T;
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

Route::prefix('tags')->name('tags-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index')->middleware('role:admin');
    Route::get('/list', [T::class, 'list'])->name('list')->middleware('role:admin');

    Route::post('/create', [T::class, 'create'])->name('create')->middleware('role:admin');
    Route::delete('/delete/{tag}', [T::class, 'destroy'])->name('delete')->middleware('role:admin');
});

Route::name('front-')->group(function () {
    Route::get('/', [F::class, 'index'])->name('index');
    Route::get('/category/{cat}', [F::class, 'catColors'])->name('cat-colors');
    Route::get('/product/{product}', [F::class, 'showProduct'])->name('show-product');
    Route::get('/my-orders', [F::class, 'orders'])->name('orders')->middleware('role:admin|client');
    Route::get('/download/{order}', [F::class, 'download'])->name('download')->middleware('role:admin|client');
    Route::put('/vote/{product}', [F::class, 'vote'])->name('vote')->middleware('role:admin|client');
    Route::get('/tags-list', [F::class, 'getTagsList'])->name('tags-list')->middleware('role:admin|client');
    Route::put('/add-tag/{product}', [F::class, 'addTag'])->name('add-tag')->middleware('role:admin|client');
    Route::put('/delete-tag/{product}', [F::class, 'deleteTag'])->name('delete-tag')->middleware('role:admin|client');
    Route::post('/add-new-tag/{product}', [F::class, 'addNewTag'])->name('add-new-tag')->middleware('role:admin|client');
});

Route::prefix('cart')->name('cart-')->group(function () {
    Route::put('/add', [CART::class, 'add'])->name('add');
    Route::put('/rem', [CART::class, 'rem'])->name('rem');
    Route::put('/update', [CART::class, 'update'])->name('update');
    Route::post('/buy', [CART::class, 'buy'])->name('buy');
    Route::get('/', [CART::class, 'showCart'])->name('show');
    Route::get('/mini-cart', [CART::class, 'miniCart'])->name('mini-cart');
});

Route::prefix('cats')->name('cats-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('role:admin');
    Route::get('/create', [C::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('/create', [C::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('/edit/{cat}', [C::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('/edit/{cat}', [C::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/delete/{cat}', [C::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::delete('/delete-photo/{photo}', [C::class, 'destroyPhoto'])->name('delete-photo')->middleware('role:admin');
});

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index')->middleware('role:admin|client');
    Route::get('/colors', [P::class, 'colors'])->name('colors')->middleware('role:admin');
    Route::get('/color-name', [P::class, 'colorName'])->name('color-name')->middleware('role:admin');
    Route::get('/create', [P::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('/create', [P::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('/{product}', [P::class, 'show'])->name('show')->middleware('role:admin');
    Route::get('/edit/{product}', [P::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('/edit/{product}', [P::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/delete/{product}', [P::class, 'destroy'])->name('delete')->middleware('role:admin');
});

Route::prefix('orders')->name('orders-')->group(function () {
    Route::get('/', [O::class, 'index'])->name('index')->middleware('role:admin');
    Route::put('/status/{order}', [O::class, 'update'])->name('update')->middleware('role:admin');
    // Route::get('/create', [C::class, 'create'])->name('create')->middleware('role:admin');
    // Route::post('/create', [C::class, 'store'])->name('store')->middleware('role:admin');
    // Route::get('/edit/{cat}', [C::class, 'edit'])->name('edit')->middleware('role:admin');
    // Route::put('/edit/{cat}', [C::class, 'update'])->name('update')->middleware('role:admin');
    // Route::delete('/delete/{cat}', [C::class, 'destroy'])->name('delete')->middleware('role:admin');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
