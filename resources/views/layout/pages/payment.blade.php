@extends('layout.app')
@section('title', "Objednávka")
@section('content')
    <div class="block text-center">
        <h2>Doprava a platba</h2>
        <form action="#">
            <label for="name">Meno a priezvysko</label>
            <input class="form-control" id="name" placeholder="Jožko Mrkvička" type="text"/>

            <label for="address">Ulica a číslo domu</label>
            <input class="form-control" id="address" placeholder="Obchodná 99" type="text"/>

            <label for="city">Mesto/Obec</label>
            <input class="form-control" id="city" placeholder="Bratislava" type="text"/>

            <label for="psc">PSČ</label>
            <input class="form-control" id="psc" placeholder="811 01" type="text"/>

            <label for="email">E-mail</label>
            <input class="form-control" id="email" placeholder="jozko@fxbook.sk" type="text"/>

            <!--- Roll down selection --->
            <label for="paytment">Spôsob platby</label>
            <select class="form-select" name="paytment" id="paytment">
                <option value="visa">Visa</option>
                <option value="mastercard">Master Card</option>
                <option value="cash-on-delivery">Dobierka</option>
            </select>

            <label for="shipment-method">Spôsob doručenia</label>
            <input disabled class="form-control" id="shipment-method" value="DHL kurier" type="text"/>

            <label for="price">Na úhradu s DPH</label>
            <input disabled class="form-control" id="price" value="100 €" type="text"/>

            <div class="text-center">
                <!-- INPUT aby sa posielal dotaz na php-->
                <input type="submit" value="Zaplatiť a objednať" class="btn btn-primary">
            </div>
        </form>
    </div>
@stop
