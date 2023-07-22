@extends('app')

@section('title', 'Letters')

@section('content')

    <h1>Unesi novo pismo</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('letters.store') }}" method="POST">
        @csrf
        <label for="name">Pismo:</label>
        <input type="text" id="name" name="name"  required>
        <button type="submit">Dodaj pismo</button>
    </form>
    
@endsection
