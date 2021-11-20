<a href="/book/{{$book->id}}" class="book-item">
    <div class="row m-0">
        <div class="image col-2" style="background-image: url(public/assets/book-cover.jpg)"></div>
        <div class="item-details col-10">
            <cite class="book-title">{{$book->tittle}}</cite>
            <div class="book-info">{{$book->author}},
                <time datetime="{{$book->publish_date}}" title="{{$book->publish_date}}">{{$book->publish_date}}</time>
            </div>
            <p class="book-description">
                {{$book->description}}
            </p>
            <div class="book-price">{{$book->price}}€</div>
        </div>
    </div>
</a>
