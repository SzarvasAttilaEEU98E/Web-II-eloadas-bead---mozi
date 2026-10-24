<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Mozi')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/darkly/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="{{ route('fooldal') }}">
                    Mozi
                </a>

                <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Menü megnyitása">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">

                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fooldal') }}">
                                Főoldal
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adatbazis') }}">
                                Adatbázis
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kapcsolat') }}">
                                Kapcsolat
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('diagram') }}">
                                Diagram
                            </a>
                        </li>

                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('uzenetek') }}">
                                Üzenetek
                            </a>
                        </li>

                        @if (auth()->user()->role == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}">
                                Admin
                            </a>
                        </li>
                        @endif
                        @endauth

                    </ul>

                    <div class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">

                        @guest
                        <a class="btn btn-outline-light" href="{{ route('login') }}">
                            Bejelentkezés
                        </a>

                        <a class="btn btn-primary" href="{{ route('register') }}">
                            Regisztráció
                        </a>
                        @endguest

                        @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-outline-light">
                                Kijelentkezés
                            </button>
                        </form>
                        @endauth

                    </div>

                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">
                Készítette: Szarvas Attila – EEU98E & Gaál Péter - FE6QZ4
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>