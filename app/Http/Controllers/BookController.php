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
use Session;

class BookController extends Controller
{
    public function index()
    {
        $booksPerPage = 10;
        $books = Book::query();

        $sort = $_GET["sort"] ?? null;
        if ($sort) {
            if (substr($sort, 0, 4) === "desc") {
                $books = $books->orderBy(substr($sort, 4), "desc")->paginate($booksPerPage);
            } else {
                $books = $books->orderBy($sort, "asc")->paginate($booksPerPage);
            }
        } else {
            $books = $books->paginate($booksPerPage);
        }

        return view('layout.pages.products', compact('books', $books))->with("categories", Category::all())->with("title", "Všetky produkty");
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
        $request->validate([
//            'category' => 'required',
            'tittle' => 'required|min:3',
            'description' => 'required',
            'author' => 'required|min:2',
            'publish_date' => 'required',
            'price' => 'required',
        ]);

        // save image to storage
        if ($request->cover) {
            $coverImage = Storage::disk('public')->put('products', $request->cover);
            $request->cover = basename($coverImage);
        }


        $book = Book::create([
            'category' => $request->category,
            'tittle' => $request->tittle,
            'description' => $request->description,
            'author' => $request->author,
            'publish_date' => $request->publish_date,
            'price' => $request->price,
            'img_path' => $request->cover
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
        return view('layout.pages.admin-sites.admin-book', compact('book', $book))
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
        $request->validate([
//            'category' => 'required',
            'tittle' => 'required|min:3',
            'description' => 'required',
            'author' => 'required|min:2',
            'publish_date' => 'required',
            'price' => 'required',
        ]);

        // save image to storage
        if ($request->cover) {
            $coverImage = Storage::disk('public')->put('products', $request->cover);
            $book->img_path = basename($coverImage);
        }
        if ($request->cover_removed == "true") {
            $book->img_path = "";
        }

        // save data to database
        $book->tittle = $request->tittle;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->publish_date = $request->publish_date;
        $book->price = $request->price;
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
