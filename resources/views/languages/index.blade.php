@extends('app')

@section('title', 'Jezik')

@section('content')
    
    <h1>Jezik</h1>
    <a href="{{ route('languages.create') }}">Dodaj novi jezik</a>
    @if($languages->count() > 0)   
    <table>
        
        <thead>
            <tr>
                <th>Jezik</th>
            </tr>
        </thead>
        
        <tbody>
            
                @foreach($languages as $language)
                    <tr>
                        <td>{{ $language->name }}</td>
                        <td> <a href="{{ route('languages.edit', $language->id) }}">Izmjeni</a> </td>
                        <td>
                            <form action="{{ route('languages.destroy', $language->id) }}" method="POST">
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
