<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController as C;
use App\Http\Controllers\ProductController as P;

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

Route::prefix('cats')->name('cats-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/create', [C::class, 'store'])->name('store');
    Route::get('/edit/{cat}', [C::class, 'edit'])->name('edit');
    Route::put('/edit/{cat}', [C::class, 'update'])->name('update');
    Route::delete('/delete/{cat}', [C::class, 'destroy'])->name('delete');
});

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index');
    Route::get('/colors', [P::class, 'colors'])->name('colors');
    Route::get('/color-name', [P::class, 'colorName'])->name('color-name');
    Route::get('/create', [P::class, 'create'])->name('create');
    Route::post('/create', [P::class, 'store'])->name('store');
    Route::get('/{product}', [P::class, 'show'])->name('show');
    Route::get('/edit/{product}', [P::class, 'edit'])->name('edit');
    Route::put('/edit/{product}', [P::class, 'update'])->name('update');
    Route::delete('/delete/{product}', [P::class, 'destroy'])->name('delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
