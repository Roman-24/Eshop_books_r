@extends('layout.app')
@section('content')
    <div class="block">
        <div class="row m-0 category-selected">
            <div class="col-9">
                <h2>Knihy z kategórie: xxx</h2>
                <!-- sem ešte sort dorobiť --->
            </div>
            <div class="col-3 ">
                <select class="form-select sort-selection" aria-label="Default select example">
                    <option value="1">Cena vzostupne</option>
                    <option value="2">Cena zostupne</option>
                    <option value="3">Abecedne</option>
                </select>
            </div>
        </div>
        <div class="books-list">
            <a href="#" class="book-item">
                <div class="row m-0">
                    <div class="image col-2" style="background-image: url(public/assets/book-cover.jpg)"></div>
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
            <a href="#" class="book-item">
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
            <a href="#" class="book-item">
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
            <a href="#" class="book-item">
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
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@stop
