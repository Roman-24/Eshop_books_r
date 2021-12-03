@extends('layout.app')
@section('title', "Domov")
@section('content')
    @include('layout.partials.books-list', ['tittle'=>"Nové knihy u nás", 'items'=>$new_books])
    @include('layout.partials.books-list', ['tittle'=>"Typy na knihy", 'items'=>$random_books])
@stop
