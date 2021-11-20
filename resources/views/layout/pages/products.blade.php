@extends('layout.app')

@section('title', $category->name)

@section('content')

    <div class="block">
        {{-- HEAD OF BLOCK --}}
        <div class="row m-0 category-selected">
            <div class="col-9">
                <h2>Knihy z kategórie {{$category->name}}</h2>
            </div>
            <div class="col-3 ">
                <select class="form-select sort-selection" aria-label="Default select example">
                    <option value="1">Cena vzostupne</option>
                    <option value="2">Cena zostupne</option>
                    <option value="3">Abecedne</option>
                </select>
            </div>
        </div>

        {{-- BOOKS --}}
        <div class="books-list">
            @foreach($books as $book)
                @include("layout.partials.book-item", $book)
            @endforeach
        </div>

        {{-- PAGE NAVIGATION --}}
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@stop
