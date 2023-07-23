@extends('app')

@section('title', 'Povez')

@section('content')
    
    <h1>Povezi</h1>
    <a href="{{ route('bindings.create') }}">Dodaj novi povez</a>
    @if($bindings->count() > 0)   
    <table>
        
        <thead>
            <tr>
                <th>Povez</th>
            </tr>
        </thead>
        
        <tbody>
            
                @foreach($bindings as $binding)
                    <tr>
                        <td>{{ $binding->name }}</td>
                        <td> <a href="{{ route('bindings.edit', $binding->id) }}">Izmjeni</a> </td>
                        <td>
                            <form action="{{ route('bindings.destroy', $binding->id) }}" method="POST">
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
