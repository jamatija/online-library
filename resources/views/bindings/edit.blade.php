@extends('app')

@section('title', 'Povez')

@section('content')

    <h1>Ažuriraj povez</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('bindings.update', $binding->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Povez:</label>
        <input type="text" id="name" name="name" value="{{ $binding->name }}" required>
        <button type="submit">Sačuvaj izmjene</button>
    </form>
    
@endsection
