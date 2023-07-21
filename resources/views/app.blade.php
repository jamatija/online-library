<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    
    <nav>
        <p>Nav menu</p>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>Footer</p>
    </footer>
    
</body>
</html>
