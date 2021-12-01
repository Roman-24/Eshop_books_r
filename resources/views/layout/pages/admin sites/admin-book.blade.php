@extends('layout.app')

@section('title', $book->tittle)

@section('content')
    <div class="block book-item preview-book">
        <div class="row m-0">
            <label for="cover" class="image col-12 col-md-4" style="background-image: url({{ asset('storage/products/'.$book->img_path) }})">
            </label>
            <div class="item-details col-8">
                <form action="{{url('book', [$book->id])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    <input type="text" placeholder="Meno" class="book-title text-input" name="tittle" value="{{$book->tittle}}">
                    <input type="text" placeholder="Autor" class="book-info text-input" name="author" value="{{$book->author}}">
                    <input type="date" placeholder="Datum vydania" class="book-info text-input" name="publish_date" value="{{$book->publish_date}}">
                    <textarea class="book-description text-input" rows="10" placeholder="Popis knihy" name="description">{{$book->description}}</textarea>
                    <input type="number" class="book-price text-input" name="price" value="{{$book->price}}">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
                    <label for="cover" class="btn btn-secondary">Zmeniť fotku knihy</label>
                    <input id="cover" name="cover" style="visibility:hidden;" type="file" onchange="previewCoverImage()">
                </form>

                <form action="{{url('book', [$book->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-secondary" value="Vymazať knihu"/>
                </form>
            </div>
        </div>
    </div>
@stop
