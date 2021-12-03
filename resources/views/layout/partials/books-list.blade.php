<section class="block">
    <h2>{{$tittle}}</h2>
    <div class="books-list">
        @foreach($items as $book)
            @include('layout.partials.book-item', $book)
        @endforeach
    </div>
</section>
