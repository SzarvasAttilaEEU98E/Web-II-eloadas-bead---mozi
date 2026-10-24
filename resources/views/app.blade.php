
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Mozi') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet">

    @routes
    @viteReactRefresh
    @vite('resources/js/app.jsx')
    @inertiaHead

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding-bottom: 50px;
        }

        #app-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 12px 16px;
            text-align: center;
            font-family: 'Instrument Sans', sans-serif;
            font-size: 13px;
            color: #adb5bd;
            background-color: #222;
            z-index: 10;
        }
    </style>
</head>

<body class="font-sans antialiased">

    @inertia

    <footer id="app-footer">
        Készítette: Szarvas Attila – EEU98E
    </footer>

</body>

</html>
