@extends('app')

@section('content')


    <h1>O Autoru</h1>
    <p><strong>Name and Surname:</strong> {{ $author->nameSurname }}</p>
    <p><strong>Biography:</strong> {{ $author->biography }}</p>
    <p><strong>Wikipedia:</strong> {{ $author->wikipedia }}</p>
    <a href="{{ route('authors.edit', $author->id) }}">Edit</a>
    
@endsection('content')
