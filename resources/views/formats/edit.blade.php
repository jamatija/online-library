@extends('app')

@section('title', 'Format')

@section('content')

    <h1>Ažuriraj format</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('formats.update', $format->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Format:</label>
        <input type="text" id="name" name="name" value="{{ $format->name }}" required>
        <button type="submit">Sačuvaj izmjene</button>
    </form>
    
@endsection
