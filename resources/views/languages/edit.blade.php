@extends('app')

@section('title', 'Jezik')

@section('content')

    <h1>Ažuriraj jezik</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('languages.update', $language->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Jezik:</label>
        <input type="text" id="name" name="name" value="{{ $language->name }}" required>
        <button type="submit">Sačuvaj izmjene</button>
    </form>
    
@endsection
