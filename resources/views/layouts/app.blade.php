
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Mozi') | Mozi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/darkly/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --mozi-bordo: #780d18;
            --mozi-bordo-hover: #9c1725;
        }

        body {
            background-color: #1b1b1b;
        }

        .navbar-mozi {
            background-color: var(--mozi-bordo);
            padding: 14px 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .navbar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            transition: color 0.2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #ffffff;
        }

        .navbar .nav-link i {
            margin-right: 6px;
            font-size: 0.95rem;
        }

        .navbar .btn i {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: var(--mozi-bordo);
            border-color: var(--mozi-bordo);
        }

        .btn-primary:hover {
            background-color: var(--mozi-bordo-hover);
            border-color: var(--mozi-bordo-hover);
        }

        .btn-outline-primary {
            color: #e59aa2;
            border-color: var(--mozi-bordo-hover);
        }

        .btn-outline-primary:hover {
            background-color: var(--mozi-bordo);
            border-color: var(--mozi-bordo);
            color: #ffffff;
        }

        .btn {
            transition: all 0.2s ease-in-out;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .card {
            border: 1px solid #414141;
            border-radius: 12px;
        }

        .card-header {
            padding: 16px 20px;
        }

        .card-body {
            padding: 20px;
        }

        .mozi-footer {
            background-color: #151515;
            border-top: 1px solid #333333;
        }
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-mozi">
            <div class="container">

                <a class="navbar-brand" href="{{ route('fooldal') }}">
                    <i class="bi bi-camera-reels-fill me-2"></i>Mozi
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
                            <a class="nav-link {{ request()->routeIs('fooldal') ? 'active' : '' }}"
                                href="{{ route('fooldal') }}">
                                <i class="bi bi-house-door"></i> Főoldal
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('adatbazis') ? 'active' : '' }}"
                                href="{{ route('adatbazis') }}">
                                <i class="bi bi-database"></i> Adatbázis
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('diagram') ? 'active' : '' }}"
                                href="{{ route('diagram') }}">
                                <i class="bi bi-bar-chart"></i> Diagram
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('kapcsolat') ? 'active' : '' }}"
                                href="{{ route('kapcsolat') }}">
                                <i class="bi bi-envelope"></i> Kapcsolat
                            </a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('uzenetek') ? 'active' : '' }}"
                                    href="{{ route('uzenetek') }}">
                                    <i class="bi bi-chat-left-text"></i> Üzenetek
                                </a>
                            </li>

                            @if (auth()->user()->role == 1)
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('admin*') ? 'active' : '' }}"
                                        href="{{ route('admin') }}">
                                        <i class="bi bi-gear"></i> Admin
                                    </a>
                                </li>
                            @endif
                        @endauth

                    </ul>

                    <div class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">

                        @guest
                            <a class="btn btn-outline-light" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Bejelentkezés
                            </a>

                            <a class="btn btn-light" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i>
                                Regisztráció
                            </a>
                        @endguest

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-outline-light">
                                    <i class="bi bi-box-arrow-right"></i>
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

    <footer class="mozi-footer text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">
                Készítette: Szarvas Attila – EEU98E &amp; Gaál Péter – FE6QZ4
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
