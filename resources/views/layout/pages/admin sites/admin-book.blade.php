@extends('layout.app')

@section('title', $book->tittle)

@section('content')
<div class="block book-item preview-book">
    <div class="row m-0">
        <div class="image col-12 col-md-4" style="background-image: url({{asset('assets/products/'.$book->img_path)}})"></div>
        <div class="item-details col-8">
            <form action="{{url('book', [$book->id])}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <input type="text" placeholder="Meno" class="book-title text-input" name="tittle" value="{{$book->tittle}}">
                <input type="text" placeholder="Autor" class="book-info text-input" name="author" value="{{$book->author}}">
                <input type="date" placeholder="Datum vydania" class="book-info text-input" name="publish_date" value="{{$book->publish_date}}">
                <textarea class="book-description text-input" rows="10" placeholder="Popis knihy" name="description">{{$book->description}}</textarea>
                <input type="number" class="book-price text-input" name="price" value="{{$book->price}}">
                {{--            <a class="btn btn-primary" href="{{route('book.addToCart', ['id' => $book->id])}}">Pridať do košíka</a>--}}
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
            </form>
            {{--                @can('delete', $book)--}}
            <form action="{{url('book', [$book->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-secondary" value="Vymazať knihu"/>
            </form>
            {{--                @endcan--}}
        </div>
    </div>
</div>
@stop
