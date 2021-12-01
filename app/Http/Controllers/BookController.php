<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use Session;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('layout.pages.products', compact('books', $books));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.pages.admin sites.create-book')->with("categories", Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBookRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'title' => 'required|min:3',
//            'description' => 'required',
//        ]);
//        @todo pridat validáciu 2 ??

        $book = Book::create([
            'category' => $request->category,
            'tittle' => $request->tittle,
            'description' => $request->description,
            'author' => $request->author,
            'publish_date' => $request->publish_date,
            'price' => $request->price,
            'img_path' => $request->img_path,
        ]);

        return redirect('/book/' . $book->id);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('layout.pages.admin sites.admin-book', compact('book', $book))
            ->with("categories", Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBookRequest $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Book $book)
    {
        // save image to storage
        $coverImage = Storage::disk('public')->put('products', $request->cover);

        // save data to database
        $book->tittle = $request->tittle;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->publish_date = $request->publish_date;
        $book->price = $request->price;
        $book->img_path = basename($coverImage);
        $book->save();

        if (Cache::has('book-' . $book->id)) {
            Cache::forget('book-' . $book->id);
        }
        $request->session()->flash('message', 'Kniha bola úspešne zmenená.');

        return redirect('/book/' . $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book)
    {
        $book->delete();
        if (Cache::has('task-' . $book->id)) {
            Cache::forget('task-' . $book->id);
        }
        $request->session()->flash('message', 'Úloha bola úspešne vymazaná.');
        return redirect('/');
    }
}
