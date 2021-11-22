@extends('layout.app')
@section('title', "Nákupný košík")
@section('content')
<div class="block">
    <h2>Obsah nákupného košíka</h2>
    <div class="basket-list">
        @if(Session::has('cart'))
            dd($request->session()->get('cart', $cart));
            <a href="#" class="book-item">
                <div class="row m-0">
                    @foreach($items as $book)
                        @include('layout.partials.book-item', ['book'=>$book])
                    @endforeach
                </div>
            </a>
        @else
        @endif
    </div>
    <div class="text-center">
        <p>Spolu: {{$total_price}}</p>
        <a href="payment.html" class="btn btn-primary">Nakúpiť produkty</a>
    </div>
</div>
@stop


{{--<div class="col-0 align-self-center col-lg-2">--}}
{{--    <div class="d-flex text-center quantity-selection">--}}
{{--        <button class="btn btn-link px-2"--}}
{{--                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">--}}
{{--            <i class="fas fa-minus"></i>--}}
{{--        </button>--}}
{{--        <input id="form1" min="0" name="quantity" value="1" type="number"--}}
{{--               class="form-control form-control-sm"/>--}}
{{--        <button class="btn btn-link px-2"--}}
{{--                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">--}}
{{--            <i class="fas fa-plus"></i>--}}
{{--        </button>--}}
{{--        <div class="text-center mb-1">--}}
{{--            <button class="btn btn-link"><i class="fas fa-times"></i></button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
