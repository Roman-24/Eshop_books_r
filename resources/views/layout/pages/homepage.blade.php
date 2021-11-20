@extends('layout.app')
@section('content')
    @include('layout.partials.blocks', ['tittle'=>"Odporúčané knihy pre vás"])
    @include('layout.partials.blocks', ['tittle'=>"Nové knihy u nás"])
@stop
