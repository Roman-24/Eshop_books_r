@extends('layout.app', $categories)

@section('title', $title)

@section('content')

    <div class="block">
        {{-- HEAD OF BLOCK --}}
        <div class="row m-0 category-selected">
            <div class="col-3 ">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-book">Pridať knihu do kategórie</button>
            </div>
            <div class="col-6">
                <h2>{{$title}}</h2>
            </div>
            <div class="col-3 ">
                <select class="form-select sort-selection" aria-label="Default select example" id="sorter">
                    <option value="">Zoradiť výsledky</option>
                    <option value="descprice">Cena vzostupne</option>
                    <option value="price">Cena zostupne</option>
                    <option value="name">Abecedne</option>
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

<div class="modal fade" id="new-book" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="#">
            <div class="modal-header">
                <h5 class="modal-title">Pridať novú knihu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="new-book-name">Názov</label>
                <input class="form-control" id="new-book-name" placeholder="Meno knihy" type="text"/>

                <label for="new-book-author">Autor</label>
                <input class="form-control" id="new-book-author" placeholder="Autor" type="text"/>

                <label for="new-book-date">Dátum vydania</label>
                <input class="form-control" id="new-book-date" placeholder="Dátum vydania" type="date"/>

                <label for="new-book-price">Cena (€)</label>
                <input class="form-control" id="new-book-price" placeholder="Cena (€)" type="number"/>

                <label for="new-book-cover">Obal knihy</label>
                <input class="form-control" id="new-book-cover" type="file"/>

                <label for="new-book-description">Popis</label>
                <textarea class="form-control" id="new-book-description" placeholder="Popis" type="text" rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Pridať knihu"/>
            </div>
        </form>
    </div>
</div>
