@extends('app')

@section('title', 'Knjige')


@section('content')
    <h1>Lista knjiga</h1>

    @if (count($books) > 0)
        <table>
            <thead>
                <tr>
                    <th>Naslov</th>
                    <th>Autor</th>
                    <th>Kategorije</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>

                        <td>{{ $book->title }}</td>
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

                        <td>
                            <a href="{{ route('books.show', $book->id) }}">Detaljnije</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Trenutno nema knjiga.</p>
    @endif

    <a href="{{ route('books.create') }}">Dodaj novu knjigu</a>
@endsection
