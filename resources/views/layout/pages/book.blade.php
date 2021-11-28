@extends('layout.app')

@section('title', $book->tittle)

@section('content')
    <div class="block book-item preview-book">
        <div class="row m-0">
            <div class="image col-12 col-md-4" style="background-image: url({{asset('assets/products/'.$book->img_path)}})"></div>
            <div class="item-details col-12 col-md-8">
                <cite class="book-title">{{$book->tittle}}</cite>
                <div class="book-info">{{$book->author}},
                    <time datetime="{{$book->publish_date}}" title="{{$book->publish_date}}">{{$book->publish_date}}</time>
                </div>
                <p class="book-description">
                    {{$book->description}}
                </p>
                <div class="book-price">{{$book->price}}€</div>
                @auth
                    @if(Auth::user()->hasRole("ADMIN"))
{{--                @can('update', $book)--}}
                    <a class="btn btn-warning" href="{{ URL::to('book/' . $book->id . '/edit') }}">
                        Editovať
                    </a>&nbsp;&nbsp;
{{--                @endcan--}}
                    @endif
                @endauth
                <a class="btn btn-primary" href="{{route('book.addToCart', ['id' => $book->id])}}">Pridať do košíka</a>
            </div>
        </div>
    </div>

    @include('layout.partials.blocks', ['tittle'=>"Podobné knihy", 'items'=>$similar_books])
@stop
