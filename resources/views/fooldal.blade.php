
@extends('layouts.app')

@section('title', 'Főoldal')

@push('styles')
<style>
    .mozi-hero {
        position: relative;
        min-height: 440px;
        display: flex;
        align-items: center;
        overflow: hidden;
        border-radius: 14px;
        background-image:
            linear-gradient(
                90deg,
                rgba(0, 0, 0, 0.08) 0%,
                rgba(0, 0, 0, 0.35) 40%,
                rgba(0, 0, 0, 0.85) 72%,
                rgba(0, 0, 0, 0.9) 100%
            ),
            url('{{ asset('images/mozi-banner.jpg') }}');
        background-size: cover;
        background-position: center;
    }

    .mozi-hero-content {
        position: relative;
        z-index: 1;
        width: 55%;
        margin-left: auto;
        padding: 45px;
    }

    .mozi-hero h1 {
        font-size: clamp(2rem, 3.2vw, 3.3rem);
        font-weight: 700;
        line-height: 1.2;
    }

    .mozi-hero p {
        color: #eeeeee;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .mozi-feature-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        transition: transform 0.2s, border-color 0.2s;
    }

    .mozi-feature-card:hover {
        transform: translateY(-4px);
        border-color: #9c1725;
    }

    .mozi-feature-icon {
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #64212a;
        border-radius: 12px;
        font-size: 1.7rem;
        margin-bottom: 20px;
    }

    .mozi-feature-icon i {
        color: #ffffff;
    }

    @media (max-width: 768px) {
        .mozi-hero {
            min-height: 400px;
            background-position: 35% center;
        }

        .mozi-hero-content {
            width: 100%;
            padding: 30px;
            background: rgba(0, 0, 0, 0.55);
        }
    }
</style>
@endpush

@section('content')

<!-- FŐOLDALI BANNER -->
<section class="mozi-hero mb-5">

    <div class="mozi-hero-content">

        <h1 class="mb-4">
            Üdvözöljük a Mozi alkalmazásban!
        </h1>

        <p class="mb-4">
            Fedezze fel a filmeket, mozikat és előadásokat!
            Böngésszen az adatbázisban, tekintse meg a
            nézettségi statisztikákat, vagy vegye fel
            velünk a kapcsolatot.
        </p>

        <a href="{{ route('adatbazis') }}"
           class="btn btn-primary btn-lg px-4">
            <i class="bi bi-ticket-perforated me-2"></i>
            Filmek böngészése
        </a>

    </div>

</section>

<!-- FUNKCIÓK -->
<section class="mb-5">

    <h2 class="text-center mb-5">
        Az alkalmazás funkciói
    </h2>

    <div class="row g-4">

        <!-- ADATBÁZIS -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mozi-feature-card h-100 shadow-sm">

                <div class="card-body d-flex flex-column p-4">

                    <div class="mozi-feature-icon">
                        <i class="bi bi-film"></i>
                    </div>

                    <h3 class="h4 mb-3">
                        Filmek és mozik
                    </h3>

                    <p class="text-body-secondary">
                        Tekintse meg a filmek, mozik és előadások
                        adatait egy áttekinthető adatbázisban.
                    </p>

                    <a href="{{ route('adatbazis') }}"
                       class="btn btn-outline-primary mt-auto">
                        <i class="bi bi-database me-2"></i>
                        Adatbázis megnyitása
                    </a>

                </div>
            </div>
        </div>

        <!-- DIAGRAM -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mozi-feature-card h-100 shadow-sm">

                <div class="card-body d-flex flex-column p-4">

                    <div class="mozi-feature-icon">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>

                    <h3 class="h4 mb-3">
                        Nézettségi statisztikák
                    </h3>

                    <p class="text-body-secondary">
                        Fedezze fel a legnézettebb filmeket
                        a Chart.js segítségével készített
                        interaktív diagramon.
                    </p>

                    <a href="{{ route('diagram') }}"
                       class="btn btn-outline-primary mt-auto">
                        <i class="bi bi-bar-chart me-2"></i>
                        Diagram megtekintése
                    </a>

                </div>
            </div>
        </div>

        <!-- KAPCSOLAT -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mozi-feature-card h-100 shadow-sm">

                <div class="card-body d-flex flex-column p-4">

                    <div class="mozi-feature-icon">
                        <i class="bi bi-envelope-paper"></i>
                    </div>

                    <h3 class="h4 mb-3">
                        Kapcsolatfelvétel
                    </h3>

                    <p class="text-body-secondary">
                        Kérdése vagy észrevétele van?
                        Küldjön üzenetet a kapcsolatfelvételi
                        űrlapon keresztül!
                    </p>

                    <a href="{{ route('kapcsolat') }}"
                       class="btn btn-outline-primary mt-auto">
                        <i class="bi bi-envelope me-2"></i>
                        Kapcsolat
                    </a>

                </div>
            </div>
        </div>

    </div>

</section>

@endsection
