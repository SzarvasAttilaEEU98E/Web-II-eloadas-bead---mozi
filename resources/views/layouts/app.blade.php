<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Mozi')</title>
</head>

<body>

    <header>
        <h1>Mozi</h1>

        <nav>
            <a href="{{ route('fooldal') }}">Főoldal</a>
            <a href="{{ route('adatbazis') }}">Adatbázis</a>
            <a href="{{ route('kapcsolat') }}">Kapcsolat</a>
            <a href="#">Diagram</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Készítette: Szarvas Attila – EEU98E</p>
    </footer>

</body>

</html>