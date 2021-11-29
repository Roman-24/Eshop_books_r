<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
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
        ->with('new_books', Book::all()->sortBy('created_at')->take(4));
});

Route::get('shopping-cart', function () {
    return view('layout.pages.shopping-cart')->with('categories', Category::all());
});

Route::resource('book', BookController::class);
//Route::get('/book', [BookController::class, 'index']);
//Route::get('/book/create', [BookController::class, 'create'])->middleware(['auth', 'can:create,book']);
//Route::post('/book/', [BookController::class, 'store'])->middleware(['auth', 'can:store,book']);
//Route::get('/book/{book}/', [BookController::class, 'show']);
//Route::get('/book/{book}/edit/', [BookController::class, 'edit'])->middleware(['auth', 'can:update,book']);
//Route::put('/book/{book}', [BookController::class, 'update'])->middleware(['auth', 'can:update,book']);
//Route::delete('/book/{book}/', [BookController::class, 'destroy'])->middleware(['auth', 'can:delete,book']);

Route::resource('category', CategoryController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::post('/search', [CategoryController::class, 'search'])->name('search.store');
Route::get('/search', [CategoryController::class, 'search'])->name('search.store');

//Route::get('/book', [BookController::class, 'getID'])->name('book.index');
//Route::get('/add-to-cart/{id}', [BookController::class, 'addToCart'])->name('book.addToCart');
Route::get('/shopping-cart', [BookController::class, 'getCart'])->name('book.shoppingCart');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');

//Route::get('/', [BookController::class, 'bookList'])->name('books.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
