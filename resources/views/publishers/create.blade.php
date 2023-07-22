@extends('app')

@section('title', 'Izdavač')

@section('content')

    <h1>Unesi novog izdavača</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('publishers.store') }}" method="POST">
        @csrf
        <label for="name">Izdavač:</label>
        <input type="text" id="name" name="name"  required>
        <button type="submit">Dodaj izdavača</button>
    </form>
    
@endsection
