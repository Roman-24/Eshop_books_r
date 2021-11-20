@extends('layout.app')
@section('title', "Domov")
@section('content')
    @include('layout.partials.blocks', ['tittle'=>"Odporúčané knihy pre vás"])
    @include('layout.partials.blocks', ['tittle'=>"Nové knihy u nás"])
@stop
