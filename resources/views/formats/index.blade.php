@extends('app')

@section('title', 'Format')

@section('content')
    
    <h1>Format</h1>
    <a href="{{ route('formats.create') }}">Dodaj novi format</a>
    
    @if($formats->count() > 0)
    <table>
        
        <thead>
            <tr>
                <th>Format</th>
            </tr>
        </thead>
        
        <tbody>
            
               
                @foreach($formats as $format)
                    <tr>
                        <td>{{ $format->name }}</td>
                        <td> <a href="{{ route('formats.edit', $format->id) }}">Izmjeni</a> </td>
                        <td>
                            <form action="{{ route('formats.destroy', $format->id) }}" method="POST">
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
