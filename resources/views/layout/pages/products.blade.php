@extends('layout.app', $categories)

@section('title', $title)

@section('content')

    <div class="block">
        {{-- HEAD OF BLOCK --}}
        <div class="row m-0 category-selected">
            @auth
                @if(Auth::user()->hasRole("ADMIN"))
                <div class="col-3 ">
    {{--                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-book">Pridať knihu do kategórie</button>--}}
                    <a class="btn btn-warning" href="{{route('book.create')}}">Pridať knihu do kategórie</a>
                </div>
                @endif
            @endauth
            <div class="col-9">
                <h2>{{$title}}</h2>
            </div>
            <div class="col-3 ">
                <select class="form-select sort-selection" aria-label="Default select example" id="sorter">
                    <option value="">Zoradiť výsledky</option>
                    <option value="descprice">Cena vzostupne</option>
                    <option value="price">Cena zostupne</option>
                    <option value="tittle">Abecedne</option>
                </select>
            </div>
        </div>

        {{-- BOOKS --}}
        <div class="books-list">
            @foreach($books as $book)
                @include("layout.partials.book-item", $book)
            @endforeach
            @if(count($books)==0)
                <div class="information">Žiadna kniha nebola nájdená</div>
            @endif
        </div>

        {{-- PAGE NAVIGATION --}}
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="">1</a></li>
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-disabled="true">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@stop
