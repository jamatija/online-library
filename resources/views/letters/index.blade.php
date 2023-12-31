@extends('app')

@section('title', 'Pismo')

@section('content')
    
    <h1>Pismo</h1>
    <a href="{{ route('letters.create') }}">Dodaj novo pismo</a>
    @if($letters->count() > 0)   
    <table>
        
        <thead>
            <tr>
                <th>Pismo</th>
            </tr>
        </thead>
        
        <tbody>
            
                @foreach($letters as $letter)
                    <tr>
                        <td>{{ $letter->name }}</td>
                        <td> <a href="{{ route('letters.edit', $letter->id) }}">Izmjeni</a> </td>
                        <td>
                            <form action="{{ route('letters.destroy', $letter->id) }}" method="POST">
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
