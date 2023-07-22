@extends('app')

@section('title', 'Pismo')

@section('content')

    <h1>Ažuriraj pismo</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('letters.update', $letter->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Pismo:</label>
        <input type="text" id="name" name="name" value="{{ $letter->name }}" required>
        <button type="submit">Sačuvaj izmjene</button>
    </form>
    
@endsection
