@extends('app')

@section('content')


    <h1>Izmmjeni Autora</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nameSurname">Ime i prezime:</label>
        <input type="text" id="nameSurname" name="nameSurname" value="{{ $author->nameSurname }}" required><br><br>

        <label for="biography">Biografija:</label>
        <input type="text" id="biography" name="biography" value="{{ $author->biography }}" required><br><br>

        <label for="wikipedia">Wikipedija:</label>
        <input type="text" id="wikipedia" name="wikipedia" value="{{ $author->wikipedia }}" required><br><br>

        <button type="submit">Sačuvaj izmjene</button>
    </form>

@endsection('content')

