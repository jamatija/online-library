@extends('app')

@section('title', 'Knjige')

@section('content')
    
    <h1>Create Book</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store') }}" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required><br><br>

        <label for="page_count">Page Count:</label>
        <input type="number" id="page_count" name="page_count" value="{{ old('page_count') }}" required><br><br>

        <label for="quantity_count">Quantity Count:</label>
        <input type="number" id="quantity_count" name="quantity_count" value="{{ old('quantity_count') }}" required><br><br>

        <label for="rented_count">Rented Count:</label>
        <input type="number" id="rented_count" name="rented_count" value="{{ old('rented_count') }}" required><br><br>

        <label for="body">Body:</label>
        <input type="text" id="body" name="body" value="{{ old('body') }}" required><br><br>

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" value="{{ old('year') }}" required><br><br>

        <label for="pdf">PDF:</label>
        <input type="text" id="pdf" name="pdf" value="{{ old('pdf') }}" required><br><br>

        <label for="ISBN">ISBN:</label>
        <input type="text" id="ISBN" name="ISBN" value="{{ old('ISBN') }}" required><br><br>
        
        
        <label for="authors">Authors:</label>
        <select id="authors" name="authors[]" multiple>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select><br><br>

        <label for="categories">Categories:</label>
        <select id="categories" name="categories[]" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>
                

        <label for="letter_id">Letter:</label>
        <select id="letter_id" name="letter_id">
            <option value="">Select Letter</option>
            @foreach ($letters as $letter)
                <option value="{{ $letter->id }}">{{ $letter->name }}</option>
            @endforeach
        </select><br><br>

        <label for="language_id">Language:</label>
        <select id="language_id" name="language_id">
            <option value="">Select Language</option>
            @foreach ($languages as $language)
                <option value="{{ $language->id }}">{{ $language->name }}</option>
            @endforeach
        </select><br><br>

        <label for="binding_id">Binding:</label>
        <select id="binding_id" name="binding_id">
            <option value="">Select Binding</option>
            @foreach ($bindings as $binding)
                <option value="{{ $binding->id }}">{{ $binding->name }}</option>
            @endforeach
        </select><br><br>

        <label for="format_id">Format:</label>
        <select id="format_id" name="format_id">
            <option value="">Select Format</option>
            @foreach ($formats as $format)
                <option value="{{ $format->id }}">{{ $format->name }}</option>
            @endforeach
        </select><br><br>

        <label for="publisher_id">Publisher:</label>
        <select id="publisher_id" name="publisher_id">
            <option value="">Select Publisher</option>
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Sačuvaj</button>
    </form>
    @endsection
