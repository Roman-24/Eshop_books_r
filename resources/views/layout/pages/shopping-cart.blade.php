@extends('layout.app_light2')
@section('title', "Nákupný košík")
@section('content')
    <div class="container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="block flex flex-col w-full p-8 text-gray-800 pin-r pin-y md:w-4/5 lg:w-4/5">
                @if ($message = Session::get('success'))
                    <div class="p-3 mb-3 bg-green-400 rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                @endif
                <h2 class="text-3xl text-bold">Košík</h2>
                <div class="flex-1">
                    @foreach ($cartItems as $book)
                        <div class="book-item basket-item row m-0">
                            <div class="col-1">
                                <img src="assets/products/{{ $book->attributes->image }}" alt="{{$book->name}}" class="cover-image">
                            </div>
                            <div class="item-details col-11 basket-actions">
                                <a href="/book/{{$book->id}}" class="book-title">{{$book->name}}</a>
                                <div class="book-price">{{$book->price}}€</div>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $book->id}}">
                                    <input type="number" name="quantity" value="{{ $book->quantity }}"
                                           class="w-6 text-center bg-gray-300 number-input"/><span>ks</span>
                                    <button type="submit" class="ml-2 submit-changes"><i class="fas fa-sync-alt"></i></button>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $book->id }}" name="id">
                                    <button class="remove-item"><i class="fas fa-times-circle"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="total-price">
                        Spolu: <strong>${{ Cart::getTotal() }}</strong>
                    </div>
                    <div>
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="basket-remove-all btn btn-secondary">Remove All Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
