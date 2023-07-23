@extends('app')

@section('title', 'Knjige')

@section('content')
    
    <h1>Unesi knjigu</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store') }}" method="post">
        @csrf
        <label for="title">Naslov:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required><br><br>

        <label for="page_count">Broj stranica:</label>
        <input type="number" id="page_count" name="page_count" value="{{ old('page_count') }}" required><br><br>

        <label for="quantity_count">Količina:</label>
        <input type="number" id="quantity_count" name="quantity_count" value="{{ old('quantity_count') }}" required><br><br>



        <label for="body">Natpis:</label>
        <input type="text" id="body" name="body" value="{{ old('body') }}" required><br><br>

        <label for="year">Godina:</label>
        <input type="text" id="year" name="year" value="{{ old('year') }}" required><br><br>

        

        <label for="ISBN">ISBN:</label>
        <input type="text" id="ISBN" name="ISBN" value="{{ old('ISBN') }}" required><br><br>
        
        
        <label for="authors">Autori:</label>
        <select id="authors" name="authors[]" multiple>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->nameSurname }}</option>
            @endforeach
        </select><br><br>

        <label for="categories">Kategorije:</label>
        <select id="categories" name="categories[]" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>
                

        <label for="letter_id">Pismo:</label>
        <select id="letter_id" name="letter_id">
            <option value="">Izaberi pismo</option>
            @foreach ($letters as $letter)
                <option value="{{ $letter->id }}">{{ $letter->name }}</option>
            @endforeach
        </select><br><br>

        <label for="language_id">Jezik:</label>
        <select id="language_id" name="language_id">
            <option value="">Izaberi jezik</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}">{{ $language->name }}</option>
            @endforeach
        </select><br><br>

        <label for="binding_id">Povez:</label>
        <select id="binding_id" name="binding_id">
            <option value="">Izaberi povez</option>
            @foreach ($bindings as $binding)
                <option value="{{ $binding->id }}">{{ $binding->name }}</option>
            @endforeach
        </select><br><br>

        <label for="format_id">Format:</label>
        <select id="format_id" name="format_id">
            <option value="">Izaberi format</option>
            @foreach ($formats as $format)
                <option value="{{ $format->id }}">{{ $format->name }}</option>
            @endforeach
        </select><br><br>

        <label for="publisher_id">Izdavač:</label>
        <select id="publisher_id" name="publisher_id">
            <option value="">Izaberi izdavača</option>
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Dodaj Knjigu</button>
        <a href="{{ route('books.index') }}">Vrati se na početnu</a>
        
    </form>
    @endsection
