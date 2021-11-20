@extends('layout.app')
@section('content')
<div class="block">
    <h2>Obsah nákupného košíka</h2>
    <div class="basket-list">
        <a href="#" class="book-item">
            <div class="row m-0">
                <div class="image col-4 col-lg-2" style="background-image: url(assets/book-cover.jpg)"></div>
                <div class="item-details col-8 col-lg-8">
                    <cite class="book-title">Zimné rozprávky</cite>
                    <div class="book-info">Jan Jánek,
                        <time datetime="2015-06-21" title="Jun 21 2015">21.6.2015</time>
                    </div>
                    <p class="book-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab adipisci commodi
                        distinctio dolore eligendi ex fugiat, illum iste
                        itaque laudantium magni molestiae molestias odio quae sed, veritatis. Accusamus,
                        doloribus!
                    </p>
                    <div class="book-price">99,99€</div>
                </div>
                <div class="col-0 align-self-center col-lg-2">
                    <div class="d-flex text-center quantity-selection ">
                        <button class="btn btn-link px-2"
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input id="form1" min="0" name="quantity" value="1" type="number"
                               class="form-control form-control-sm"/>
                        <button class="btn btn-link px-2"
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="text-center mb-1">
                            <button class="btn btn-link"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="text-center">
        <a href="payment.html" class="btn btn-primary">Nakúpiť produkty</a>
    </div>
</div>
@stop
