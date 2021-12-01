@extends('layout.app', $categories)

@section('title', $title)

@section('content')

    <div class="block">
        {{-- HEAD OF BLOCK --}}
        <div class="row m-0 category-selected">
            <div class="col-12 col-lg-9">
                @auth
                    @if(Auth::user()->hasRole("ADMIN"))
                        <a class="btn btn-warning float-left mr-5" href="{{route('book.create')}}">Pridať knihu do kategórie</a>
                    @endif
                @endauth
                <h2 class="float-left">{{$title}}</h2>
            </div>
            <div class="col-12 col-lg-3 mt-2 mt-lg-0">
                <select class="form-select sort-selection " aria-label="Default select example" id="sorter">
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
            @if(count((array)$books)==0)
                <div class="information">Žiadna kniha nebola nájdená</div>
            @endif
        </div>

        {{-- PAGE NAVIGATION --}}
        @if ($books instanceof \Illuminate\Pagination\LengthAwarePaginator && $books->lastPage() > 1)
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ ($books->currentPage() == 1) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $books->url(1) }}" tabindex="-1" aria-disabled="true">Späť</a>
                    </li>
                    @for ($i = 1; $i <= $books->lastPage(); $i++)
                        <li class="page-item {{ ($books->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ ($books->currentPage() == $books->lastPage()) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $books->url($books->currentPage()+1) }}" aria-disabled="true">Ďalej</a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
@stop
