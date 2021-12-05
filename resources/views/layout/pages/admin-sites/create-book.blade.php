@extends('layout.app')
@section('title', "Nová kniha")
@section('content')
    <div class="block book-item preview-book">
        <div class="row m-0">
            <label for="new-book-cover" class="image col-12 col-md-4"
                   style="background-image: url({{asset('assets/placeholder.jpg')}})"></label>
            <div class="item-details col-8">
                <form action="/book" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}

                    <label for="new-book-category">Kategória</label>
                    <select name="category" id="new-book-category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->id}}, {{$category->name}}</option>
                        @endforeach
                    </select>

                    <label for="new-book-name">Názov</label>
                    <input class="form-control" id="new-book-name" placeholder="Meno knihy" type="text" name="tittle"/>

                    <label for="new-book-author">Autor</label>
                    <input class="form-control" id="new-book-author" placeholder="Autor" type="text" name="author"/>

                    <label for="new-book-date">Dátum vydania</label>
                    <input class="form-control" id="new-book-date" placeholder="Dátum vydania" type="date"
                           name="publish_date"/>

                    <label for="new-book-price">Cena (€)</label>
                    <input class="form-control" id="new-book-price" placeholder="Cena (€)" type="number" name="price"/>

                    <label for="new-book-cover">Obal knihy</label>
                    <input class="form-control" accept="image/*" id="new-book-cover" type="file" name="cover"
                           onchange="previewCoverImage()"/>

                    <label for="new-book-description">Popis</label>
                    <textarea class="form-control" id="new-book-description" placeholder="Popis" type="text" rows="5"
                              name="description"></textarea>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Pridať knihu</button>
                </form>
            </div>
        </div>
    </div>

@stop
