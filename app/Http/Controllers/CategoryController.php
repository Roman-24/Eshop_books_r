<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    var $booksPerPage = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('layout.partials.aside-nav', compact('categories', $categories));
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
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $books = Book::query()->where('category', $id);

        $sort = $_GET["sort"] ?? null;
        if ($sort) {
            if (substr($sort, 0, 4) === "desc") {
                $books = $books->orderBy(substr($sort, 4), "desc")->paginate($this->booksPerPage);
            } else {
                $books = $books->orderBy($sort, "asc")->paginate($this->booksPerPage);
            }
        } else {
            $books = $books->paginate($this->booksPerPage);
        }

        $category = Category::find($id);

        return view('layout.pages.products')->with("title", ($category->name))->with("books", $books)->with("categories", Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function search(Request $request)
    {
        $books = Book::query();


        if ($request->get('multiple_params')) {
            $books = $books->where(DB::raw('lower(tittle)'), "like", "%" . strtolower($request->get('multiple_params')) . "%")
                ->orWhere(DB::raw('lower(author)'), "like", "%" . strtolower($request->get('multiple_params')) . "%");
        } else {
            $category = $request->get('category');
            if ($category == "")
                $category = "%";
            $price = $request->get('maxprice');
            if ($price == NULL)
                $price = 9999999999999;

            $books = $books->where(DB::raw('lower(tittle)'), "like", "%" . strtolower($request->get('tittle')) . "%")
                ->where(DB::raw('lower(author)'), "like", "%" . strtolower($request->get('author')) . "%")
                ->where("category", "like", $category)
                ->where("price", "<", $price);
        }

        $sort = $_GET["sort"] ?? null;
        if ($sort) {
            if (substr($sort, 0, 4) === "desc")
                $books = $books->orderBy(substr($sort, 4), "desc");
            else
                $books = $books->orderBy($sort, "asc");
        }
        $books = $books->get();

        return view('layout.pages.products')->with("title", "Vyhľadávanie")->with("books", $books)->with("categories", Category::all());
    }

    public function searchAll(Request $request)
    {
        $books = Book::query();

        $books = $books->where(DB::raw('lower(tittle)'), "like", "%" . strtolower($request->get('input')) . "%")
            ->orWhere(DB::raw('lower(author)'), "like", "%" . strtolower($request->get('input')) . "%");

        $sort = $_GET["sort"] ?? null;
        if ($sort) {
            if (substr($sort, 0, 4) === "desc")
                $books = $books->orderBy(substr($sort, 4), "desc");
            else
                $books = $books->orderBy($sort, "asc");
        }
        $books = $books->get();

        return view('layout.pages.products')->with("title", "Vyhľadávanie")->with("books", $books)->with("categories", Category::all());
    }
}
