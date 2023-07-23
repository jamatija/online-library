@extends('app')

@section('title', 'Izdavač')

@section('content')

<h1>Izdavač</h1>
<a href="{{ route('publishers.create') }}">Dodaj novog izdavača</a>
@if($publishers->count() > 0)   
<table>
        
        <thead>
            <tr>
                <th>Izdavač</th>
            </tr>
        </thead>
        
        <tbody>
            
                @foreach($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->name }}</td>
                        <td> <a href="{{ route('publishers.edit', $publisher->id) }}">Izmjeni</a> </td>
                        <td>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Obriši</button>
                            </form>
                        </td>

                    </tr>  
                @endforeach
                
            </tbody>
        </table>
        @endif
@endsection
