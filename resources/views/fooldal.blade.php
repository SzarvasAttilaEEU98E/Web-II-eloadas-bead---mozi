@extends('layouts.app')

@section('title', 'Főoldal')

@section('content')

<!-- ÜDVÖZLŐ RÉSZ -->
<section class="text-center py-5 mb-5">

    <h1 class="display-4 fw-bold mb-4">
        Üdvözöljük a Mozi alkalmazásban!
    </h1>

    <p class="lead text-body-secondary mx-auto mb-4"
        style="max-width: 750px;">
        Fedezze fel a filmeket, mozikat és előadásokat!
        Böngésszen az adatbázisban, tekintse meg a nézettségi
        statisztikákat, vagy vegye fel velünk a kapcsolatot.
    </p>

    <a href="{{ route('adatbazis') }}"
        class="btn btn-primary btn-lg">
        Filmek böngészése
    </a>

</section>

<!-- FUNKCIÓK -->
<section class="mb-5">

    <h2 class="text-center mb-4">
        Az alkalmazás funkciói
    </h2>

    <div class="row g-4">

        <!-- ADATBÁZIS -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">

                <div class="card-body d-flex flex-column p-4">

                    <h3 class="card-title h4">
                        Filmek és mozik
                    </h3>

                    <p class="card-text text-body-secondary">
                        Tekintse meg a filmek, mozik és előadások
                        adatait egy áttekinthető adatbázisban.
                    </p>

                    <a href="{{ route('adatbazis') }}"
                        class="btn btn-outline-primary mt-auto">
                        Adatbázis megnyitása
                    </a>

                </div>
            </div>
        </div>

        <!-- DIAGRAM -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">

                <div class="card-body d-flex flex-column p-4">

                    <h3 class="card-title h4">
                        Nézettségi statisztikák
                    </h3>

                    <p class="card-text text-body-secondary">
                        Fedezze fel a legnézettebb filmeket
                        a Chart.js segítségével készített
                        interaktív diagramon.
                    </p>

                    <a href="{{ route('diagram') }}"
                        class="btn btn-outline-primary mt-auto">
                        Diagram megtekintése
                    </a>

                </div>
            </div>
        </div>

        <!-- KAPCSOLAT -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">

                <div class="card-body d-flex flex-column p-4">

                    <h3 class="card-title h4">
                        Kapcsolatfelvétel
                    </h3>

                    <p class="card-text text-body-secondary">
                        Kérdése vagy észrevétele van?
                        Küldjön üzenetet a kapcsolatfelvételi
                        űrlapon keresztül!
                    </p>

                    <a href="{{ route('kapcsolat') }}"
                        class="btn btn-outline-primary mt-auto">
                        Kapcsolat
                    </a>

                </div>
            </div>
        </div>

    </div>

</section>

@endsection