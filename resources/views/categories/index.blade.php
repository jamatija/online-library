@extends('app')

@section('title', 'Kategorije')

@section('content')


    <h1>Lista kategorija</h1>
    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    <a href="{{ route('categories.create') }}">Dodaj novu kategoriju</a>
    <ul>
        @if($categories->count() > 0)
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Obriši</button>
                    </form>
                </li>
            @endforeach        
        @elseif
            <p>Trenutno nema kategorija</p>
        @endif
    </ul>


@endsection('content')
