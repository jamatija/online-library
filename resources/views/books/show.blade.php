@extends('app')

@section('title', 'Knjige')


@section('content')

    <h1>Više informacija o knjizi - {{ $book->title }} </h1>

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
                            <a href="{{ route('books.edit', $book->id) }}">Uredi</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Obriši</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>


    <a href="{{ route('books.index') }}">Vrati se na početnu</a>
@endsection
