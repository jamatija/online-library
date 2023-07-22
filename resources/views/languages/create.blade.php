@extends('app')

@section('title', 'Jezik')

@section('content')

    <h1>Unesi novi jezik</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('languages.store') }}" method="POST">
        @csrf
        <label for="name">Jezik:</label>
        <input type="text" id="name" name="name"  required>
        <button type="submit">Dodaj jezik</button>
    </form>
    
@endsection
