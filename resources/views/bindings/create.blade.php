@extends('app')

@section('title', 'Povez')

@section('content')

    <h1>Unesi novi povez</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('bindings.store') }}" method="POST">
        @csrf
        <label for="name">Povez:</label>
        <input type="text" id="name" name="name"  required>
        <button type="submit">Dodaj povez</button>
    </form>
    
@endsection
