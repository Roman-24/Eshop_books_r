@extends('layout.app')

@section('title', $book->tittle)

@section('content')
<div class="block book-item preview-book">
    <div class="row m-0">
        <div class="image col-12 col-md-4" style="background-image: url({{asset('assets/products/'.$book->img_path)}})"></div>
        <div class="item-details col-8">
            <input type="text" placeholder="Meno" class="book-title text-input" value={{$book->tittle}}>
            <input type="text" placeholder="Autor" class="book-info text-input" value="{{$book->author}}">
            <input type="date" placeholder="Datum vydania" class="book-info text-input" value="{{$book->publish_date}}">
            <textarea class="book-description text-input" rows="10" placeholder="Popis knihy">
                {{$book->description}}
            </textarea>
            <input type="number" class="book-price text-input" value="{{$book->price}}€" placeholder="price (€)">
{{--            <a class="btn btn-primary" href="{{route('book.addToCart', ['id' => $book->id])}}">Pridať do košíka</a>--}}
            <button class="btn btn-primary">Uložiť zmeny</button>
            <button class="btn btn-secondary">Vymazať knihu</button>
        </div>
    </div>
</div>
@stop
