<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.pages.homepage')
        ->with('categories', Category::all())
        ->with('new_books', Book::all()->sortByDesc('created_at')->take(4))
        ->with('random_books', Book::all()->random(4));
});

Route::resource('book', BookController::class);

Route::resource('category', CategoryController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::post('/search', [CategoryController::class, 'search'])->name('search.store');
Route::get('/search', [CategoryController::class, 'search'])->name('search.store');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('payment', [CartController::class, 'payment'])->name('cart.payment');

Route::resource('order', OrderController::class);
