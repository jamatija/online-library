@extends('app')

@section('title', 'Izdavač')

@section('content')

    <h1>Ažuriraj izdavača</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Izdavač:</label>
        <input type="text" id="name" name="name" value="{{ $publisher->name }}" required>
        <button type="submit">Sačuvaj izmjene</button>
    </form>
    
@endsection
