@extends('app')

@section('title', 'Format')

@section('content')

    <h1>Unesi novi format</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('formats.store') }}" method="POST">
        @csrf
        <label for="name">Format:</label>
        <input type="text" id="name" name="name"  required>
        <button type="submit">Dodaj format</button>
    </form>
    
@endsection
