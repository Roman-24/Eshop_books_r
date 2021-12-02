@extends('layout.app_light2')
@section('title', "Objednávka")
@section('content')
    <section class="block text-center">
        <h2>Doprava a platba</h2>
        <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="name">Meno a priezvysko</label>
            <input class="form-control" id="name" placeholder="Jožko Mrkvička" type="text" name="name" value=""/>

            <label for="address">Ulica a číslo domu</label>
            <input class="form-control" id="address" placeholder="Obchodná 99" type="text" name="address" value=""/>

            <label for="city">Mesto/Obec</label>
            <input class="form-control" id="city" placeholder="Bratislava" type="text" name="city" value=""/>

            <label for="psc">PSČ</label>
            <input class="form-control" id="psc" placeholder="811 01" type="text" name="psc" value=""/>

            <label for="email">E-mail</label>
            <input class="form-control" id="email" placeholder="jozko@fxbook.sk" type="text" name="email" value=""/>

            <!--- Roll down selection --->
            <label for="paytment-type">Spôsob platby</label>
            <select class="form-select" name="paytment-type" id="paytment-type">
                <option value="visa">Visa</option>
                <option value="mastercard">Master Card</option>
                <option value="cash-on-delivery">Dobierka</option>
            </select>

            <label for="shipment-method">Spôsob doručenia</label>
            <select class="form-select" name="shipment-method" id="shipment-method">
                <option value="visa">DHL kurier</option>
                <option value="visa">UPS kurier</option>
                <option value="visa">Slovenská pošta</option>
            </select>

            <label for="price">Na úhradu s DPH</label>
            <input disabled class="form-control" id="price" value="{{$totalCArtPrice}} €" type="text" name="price"/>

            <button class="btn btn-secondary text-center">Zaplatiť a objednať</button>
        </form>
    </section>
@stop
