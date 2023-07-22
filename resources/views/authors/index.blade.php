@extends('app')

@section('content')


    <h1>Lista autora</h1>
    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    <a href="{{ route('authors.create') }}">Dodaj novog autora</a>
    <ul>
        @foreach ($authors as $author)
            <li>
                <a href="{{ route('authors.show', $author->id) }}">{{ $author->nameSurname }}</a>
                <a href="{{ route('authors.edit', $author->id) }}">Izmjeni</a>
                
                <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection('content')
