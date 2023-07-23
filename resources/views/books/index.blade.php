@extends('app')

@section('title', 'Knjige')


@section('content')
    <h1>Lista knjiga</h1>

    @if (count($books) > 0)
        <table>
            <thead>
                <tr>
                    <th>Naslov</th>
                    <th>Broj stranica</th>
                    <th>Autor</th>
                    <th>Kategorije</th>
                    <th>Pismo</th>
                    <th>Jezik</th>
                    <th>Izdavač</th>
                    <th>Povez</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>

                        <td>{{ $book->title }}</td>
                        <td>{{ $book->page_count }}</td>
                        <td>
                        @foreach ($book->authors as $author)
                            <p>{{ $author->nameSurname }}</p>
                        @endforeach

                        </td>
                        
                        <td>
                        @foreach ($book->categories as $category)
                            <p>{{ $category->name }}</p>
                        @endforeach

                        </td>
                        <td>{{ $book->letter->name }}</td>
                        <td>{{ $book->language->name }}</td>
                        <td>{{ $book->publisher->name }}</td>
                        <td>{{ $book->binding->name }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}">Vidi za vise info</a>
                            <a href="{{ route('books.edit', $book->id) }}">Uredi</a>
                            <!-- Dodajte obrazac za brisanje knjige ako želite -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No books found.</p>
    @endif

    <a href="{{ route('books.create') }}">Dodaj novu knjigu</a>
@endsection
