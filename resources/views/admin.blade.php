@extends('layouts.app')

@section('title', 'Admin')

@section('content')

<div class="mb-4">
    <h1>Adminisztrációs felület</h1>
    <p class="text-body-secondary">
        Üdvözöljük az adminisztrációs felületen!
        Itt kezelheti a Mozi alkalmazás adatait.
    </p>
</div>

<div class="row g-4">

    <!-- FILMEK KEZELÉSE -->
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">

            <div class="card-body d-flex flex-column">

                <h2 class="card-title h4">
                    Filmek kezelése
                </h2>

                <p class="card-text text-body-secondary">
                    A filmek megtekintése, új film hozzáadása,
                    meglévő filmek módosítása és törlése.
                </p>

                <a href="{{ route('admin.filmek.getAll') }}"
                    class="btn btn-primary mt-auto">
                    Filmek kezelése
                </a>

            </div>
        </div>
    </div>

</div>

@endsection