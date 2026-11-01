
@extends('layouts.app')

@section('title', 'Admin')

@push('styles')
<style>
    .admin-heading {
        border-left: 4px solid #9c1725;
        padding-left: 18px;
    }

    .admin-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        transition: transform 0.2s, border-color 0.2s;
    }

    .admin-card:hover {
        transform: translateY(-4px);
        border-color: #9c1725;
    }

    .admin-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #64212a;
        border-radius: 12px;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .admin-info {
        background-color: #292929;
        border: 1px solid #414141;
        border-left: 4px solid #9c1725;
        border-radius: 10px;
        padding: 20px;
    }
</style>
@endpush

@section('content')

<div class="admin-heading mb-5">
    <h1 class="fw-bold mb-2">
        <i class="bi bi-gear me-2"></i>
        Adminisztrációs felület
    </h1>

    <p class="text-body-secondary mb-0">
        Üdvözöljük az adminisztrációs felületen!
        Itt kezelheti a Mozi alkalmazás adatait.
    </p>
</div>

<div class="admin-info mb-5">
    <div class="d-flex align-items-start gap-3">
        <i class="bi bi-info-circle fs-3"></i>

        <div>
            <h2 class="h5 mb-2">Adatok kezelése</h2>

            <p class="text-body-secondary mb-0">
                Az adminisztrátori jogosultsággal rendelkező
                felhasználók megtekinthetik, létrehozhatják,
                módosíthatják és törölhetik a nyilvántartott
                filmeket.
            </p>
        </div>
    </div>
</div>

<div class="row g-4">

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card admin-card h-100 shadow-sm">

            <div class="card-body d-flex flex-column p-4">

                <div class="admin-icon">
                    <i class="bi bi-film"></i>
                </div>

                <h2 class="card-title h4 mb-3">
                    Filmek kezelése
                </h2>

                <p class="card-text text-body-secondary mb-4">
                    A filmek megtekintése, új film hozzáadása,
                    meglévő filmek módosítása és törlése.
                </p>

                <a href="{{ route('admin.filmek.getAll') }}"
                    class="btn btn-primary mt-auto">
                    <i class="bi bi-pencil-square me-2"></i>
                    Filmek kezelése
                </a>

            </div>
        </div>

    </div>

</div>

@endsection
