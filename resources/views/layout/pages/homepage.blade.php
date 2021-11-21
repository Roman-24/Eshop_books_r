@extends('layout.app')
@section('title', "Domov")
@section('content')
{{--    @include('layout.partials.blocks', ['tittle'=>"Odporúčané knihy pre vás", 'items'=>$new_books])--}}
    @include('layout.partials.blocks', ['tittle'=>"Nové knihy u nás", 'items'=>$new_books])
@stop
