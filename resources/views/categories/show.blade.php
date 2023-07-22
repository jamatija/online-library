@extends('app')

@section('content')


    <h1>Kategorija:</h1>
    <p><strong>Name:</strong> {{ $category->name }}</p>
    <p><strong>Description:</strong> {{ $category->description }}</p>
    <a href="{{ route('categories.edit', $category->id) }}">Izmjeni</a>

    
@endsection('content')
