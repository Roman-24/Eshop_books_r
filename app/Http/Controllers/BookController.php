<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('layout.pages.products', compact('books', $books));
    }

    /* func na pridanie do kosiku */
    public function getAddToCart(Request $request, $id){
        $book = Book::find($id);
        $old_cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($old_cart);
        $cart->add($book, $book->id);

        $request->session()->put('cart', $cart);
        dd($request->session()->get('cart', $cart));
        return redirect()->route('book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('layout.pages.book', compact('book', $book))
            ->with("categories", Category::all())
            ->with('similar_books', Book::where('category', $book->category)->get());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBookRequest $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
