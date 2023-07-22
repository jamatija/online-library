<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    
    <nav>
        <a href="{{ route('books.index') }}">Knjige</a>
        <a href="{{ route('authors.index') }}">Autori</a>
        <a href="{{ route('formats.index') }}">Format</a>
        <a href="{{ route('bindings.index') }}">Povez</a>
        <a href="{{ route('letters.index') }}">Pismo</a>
        <a href="{{ route('languages.index') }}">Jezik</a>
        <a href="{{ route('publishers.index') }}">Izdavač</a>

    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- <footer>
        <p>Footer</p>
    </footer> -->
    
</body>
</html>
