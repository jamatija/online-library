@extends('app')

@section('content')


    <h1>Napravi kategoriju</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categories.update') }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Naziv:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required><br><br>

        <label for="description">Opis:</label>
        <input type="text" id="description" name="description" value="{{ old('description') }}" required><br><br>
        <button type="submit">Sačuvaj</button>
    </form>

@endsection('content')

