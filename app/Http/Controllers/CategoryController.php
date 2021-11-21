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
        $sort = $_GET["sort"] ?? null;
        if ($sort) {
            var_dump($sort);
            $books = Book::where('category', $id)->get();
            if (substr($sort, 0, strlen($sort)) === "desc")
                $books = $books->sortByDesc(substr($sort, 4));
            else
                $books = $books->sortBy($sort);
        } else
            $books = Book::where('category', $id)->get();

        $category = Category::find($id);

        return view('layout.pages.products')->with("title", ("Knihy z kategórie: " . $category->name))->with("books", $books)->with("categories", Category::all());
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
//        $data = $request->all();
//        print(implode("|", $request->all()));
//        die($request->request->get('name'));
//        var_dump($request->input('name'));
//        $sort = $_GET["sort"] ?? null;
//        if ($sort) {
//            $books = Book::where('category', 1)->get();
//            if (substr($sort, 0, strlen($sort)) === "desc")
//                $books = $books->sortByDesc(substr($sort, 4));
//            else
//                $books = $books->sortBy($sort);
//        } else
//        $books = Book::where('author', $request->get('author'))->get();
//        print($request->get('tittle'));
        $category = $request->get('category');
        if ($category == "")
            $category = "%";
        $price = $request->get('maxprice');
        if ($price == NULL)
            $price = 9999999999999;
        $books = Book::where(DB::raw('lower(tittle)'), "like", "%" . strtolower($request->get('tittle')) . "%")
            ->where(DB::raw('lower(author)'), "like", "%" . strtolower($request->get('author')) . "%")
            ->where("category", "like", $category)
            ->where("price", "<", $price)
            ->get();

        $sort = $_GET["sort"] ?? null;
        if ($sort) {
            if (substr($sort, 0, strlen($sort)) === "desc")
                $books = $books->sortByDesc(substr($sort, 4));
            else
                $books = $books->sortBy($sort);
        }

        return view('layout.pages.products')->with("title", "Vyhľadávanie")->with("books", $books)->with("categories", Category::all());
    }
}
