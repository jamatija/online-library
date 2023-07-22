@extends('app')

@section('content')


    <h1>Dodaj Autora</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('authors.store') }}" method="post">
        @csrf
        <label for="nameSurname">Ime i prezime:</label>
        <input type="text" id="nameSurname" name="nameSurname" value="{{ old('nameSurname') }}" required><br><br>


        <label for="biography">Biografija:</label>
        <input type="text" id="biography" name="biography" value="{{ old('biography') }}" required><br><br>

        <label for="wikipedia">Wikipedija:</label>
        <input type="text" id="wikipedia" name="wikipedia" value="{{ old('wikipedia') }}" required><br><br>

        <button type="submit">Unesi autora</button>
    </form>

@endsection('content')

