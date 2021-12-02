@extends('layout.app')

@section('title', $book->tittle)

@section('content')
    <div class="block book-item preview-book">
        <div class="row m-0">
            <div class="image col-12 col-md-4" style="background-image: url({{asset(strlen($book->img_path)>0?'storage/products/'.$book->img_path:"assets/placeholder.jpg")}})"></div>
            <div class="item-details col-12 col-md-8">
                <div class="item-details-top">
                    <cite class="book-title">{{$book->tittle}}</cite>
                    <div class="book-info">{{$book->author}},
                        <time datetime="{{$book->publish_date}}" title="{{$book->publish_date}}">{{date('d.m.Y', strtotime($book->publish_date))}}</time>
                    </div>
                    <p class="book-description">
                        {{$book->description}}
                    </p>
                </div>
                <div class="book-price">{{$book->price}}€</div>
                @auth
                    @if(Auth::user()->hasRole("ADMIN"))
                        <a class="btn btn-secondary" href="{{ URL::to('book/' . $book->id . '/edit') }}">
                            Upraviť knihu
                        </a>
                    @endif
                @endauth
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $book->id }}" name="id">
                    <input type="hidden" value="{{ $book->tittle }}" name="name">
                    <input type="hidden" value="{{ $book->price }}" name="price">
                    <input type="hidden" value="{{ $book->img_path }}" name="image">
                    <input type="number" id="quantity" name="quantity" class="form-control input-number input-quantity" value="{{ is_null($book->quantity) ?? 1 }}" min="1" max="100">
                    <button class="btn btn-primary">Pridať do košíka</button>
                </form>
            </div>
        </div>
    </div>
    @include('layout.partials.blocks', ['tittle'=>"Podobné knihy", 'items'=>$similar_books])
@stop
