@extends('layout.app')
@section('content')
    <div class="block book-item preview-book">
        <div class="row m-0">
            <div class="image col-12 col-md-4" style="background-image: url(assets/book-cover.jpg)"></div>
            <div class="item-details col-12 col-md-8">
                <cite class="book-title">{{$book->tittle}}</cite>
                <div class="book-info">{{$book->author}},
                    <time datetime="2015-06-21" title="Jun 21 2015">21.6.2015</time>
                </div>
                <p class="book-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci commodi distinctio dolore eligendi ex fugiat, illum iste
                    itaque laudantium magni molestiae molestias odio quae sed, veritatis. Accusamus, doloribus! Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Ea iure praesentium sed voluptas? Accusamus atque blanditiis consequuntur cupiditate deleniti doloremque explicabo
                    iusto rem tempore. Delectus distinctio eius excepturi rerum suscipit?
                </p>
                <div class="book-price">99,99€</div>
                <button class="btn btn-primary">Pridať do košíka</button>
            </div>
        </div>
    </div>

    <div class="block">
        <h2>Podobné knihy</h2>
        <div class="books-list">
            <a href="book.html" class="book-item">
                <div class="row m-0">
                    <div class="image col-2" style="background-image: url(assets/book-cover.jpg)"></div>
                    <div class="item-details col-10">
                        <cite class="book-title">Zimné rozprávky</cite>
                        <div class="book-info">Jan Jánek,
                            <time datetime="2015-06-21" title="Jun 21 2015">21.6.2015</time>
                        </div>
                        <p class="book-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci commodi distinctio dolore eligendi ex fugiat, illum
                            iste
                            itaque laudantium magni molestiae molestias odio quae sed, veritatis. Accusamus, doloribus!
                        </p>
                        <div class="book-price">99,99€</div>
                    </div>
                </div>
            </a>
            <a href="book.html" class="book-item">
                <div class="row m-0">
                    <div class="image col-2" style="background-image: url(assets/book-cover.jpg)"></div>
                    <div class="item-details col-10">
                        <cite class="book-title">Zimné rozprávky</cite>
                        <div class="book-info">Jan Jánek,
                            <time datetime="2015-06-21" title="Jun 21 2015">21.6.2015</time>
                        </div>
                        <p class="book-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci commodi distinctio dolore eligendi ex fugiat, illum
                            iste
                            itaque laudantium magni molestiae molestias odio quae sed, veritatis. Accusamus, doloribus!
                        </p>
                        <div class="book-price">99,99€</div>
                    </div>
                </div>
            </a>
            <a href="book.html" class="book-item">
                <div class="row m-0">
                    <div class="image col-2" style="background-image: url(assets/book-cover.jpg)"></div>
                    <div class="item-details col-10">
                        <cite class="book-title">Zimné rozprávky</cite>
                        <div class="book-info">Jan Jánek,
                            <time datetime="2015-06-21" title="Jun 21 2015">21.6.2015</time>
                        </div>
                        <p class="book-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci commodi distinctio dolore eligendi ex fugiat, illum
                            iste
                            itaque laudantium magni molestiae molestias odio quae sed, veritatis. Accusamus, doloribus!
                        </p>
                        <div class="book-price">99,99€</div>
                    </div>
                </div>
            </a>
            <a href="book.html" class="book-item">
                <div class="row m-0">
                    <div class="image col-2" style="background-image: url(assets/book-cover.jpg)"></div>
                    <div class="item-details col-10">
                        <cite class="book-title">Zimné rozprávky</cite>
                        <div class="book-info">Jan Jánek,
                            <time datetime="2015-06-21" title="Jun 21 2015">21.6.2015</time>
                        </div>
                        <p class="book-description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci commodi distinctio dolore eligendi ex fugiat, illum
                            iste
                            itaque laudantium magni molestiae molestias odio quae sed, veritatis. Accusamus, doloribus!
                        </p>
                        <div class="book-price">99,99€</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@stop
