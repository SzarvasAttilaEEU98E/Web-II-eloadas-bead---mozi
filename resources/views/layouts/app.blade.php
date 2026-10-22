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

            @guest
                <a href="{{ route('login') }}">Bejelentkezés</a>
                <a href="{{ route('register') }}">Regisztráció</a>
            @endguest

            @auth
                <a href="{{ route('uzenetek') }}">Üzenetek</a>

                @if (auth()->user()->role == 1)
                    <a href="{{ route('admin') }}">Admin</a>
                @endif

                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Kijelentkezés</button>
                </form>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Készítette: Szarvas Attila – EEU98E , NÉV NEPTUN KÓD</p>
    </footer>

</body>

</html>