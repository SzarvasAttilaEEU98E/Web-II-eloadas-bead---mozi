
@extends('layouts.app')

@section('title', 'Filmek kezelése')

@push('styles')
<style>
    .film-list-heading {
        border-left: 4px solid #9c1725;
        padding-left: 18px;
    }

    .film-list-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        overflow: hidden;
    }

    .film-list-card .card-header {
        background-color: #341b20;
        border-bottom: 1px solid #573039;
        padding: 20px 24px;
    }

    .film-list-icon {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #64212a;
        border-radius: 10px;
        font-size: 1.4rem;
        flex-shrink: 0;
    }

    .film-list-table {
        margin-bottom: 0;
        --bs-table-bg: #292929;
        --bs-table-striped-bg: #303030;
        --bs-table-hover-bg: #3a292d;
        --bs-table-color: #f5f5f5;
        --bs-table-border-color: #444444;
    }

    .film-list-table thead th {
        background-color: #391f24;
        color: #ffffff;
        padding: 14px 16px;
        white-space: nowrap;
    }

    .film-list-table tbody td {
        padding: 14px 16px;
        vertical-align: middle;
    }

    .film-list-badge {
        display: inline-block;
        padding: 5px 11px;
        border-radius: 8px;
        background-color: #49242c;
        color: #f1b7bf;
        font-weight: 500;
    }

    .film-list-table .btn-warning {
        color: #1b1b1b;
    }

    .film-count {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .film-count.has-screenings {
        color: #f1b7bf;
    }

    .film-count.no-screenings {
        color: #86d6a2;
    }

    .film-delete-disabled {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 6px;
        background-color: #44262b;
        color: #f1b7bf;
        font-size: 0.85rem;
        white-space: nowrap;
    }
</style>
@endpush

@section('content')

<!-- OLDAL FEJLÉC -->
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-5">

    <div class="film-list-heading">
        <h1 class="fw-bold mb-2">
            <i class="bi bi-film me-2"></i>
            Filmek kezelése
        </h1>

        <p class="text-body-secondary mb-0">
            Filmek hozzáadása, módosítása és törlése.
        </p>
    </div>

    <a href="{{ route('admin.filmek.create') }}"
       class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>
        Új film hozzáadása
    </a>

</div>

<!-- SIKERES MŰVELET -->
@if (session('success'))
    <div class="alert alert-success" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
    </div>
@endif

<!-- HIBAÜZENET -->
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ session('error') }}
    </div>
@endif

<!-- FILMEK TÁBLÁZAT -->
<section class="card film-list-card shadow-sm">

    <div class="card-header">
        <div class="d-flex align-items-center gap-3">

            <div class="film-list-icon">
                <i class="bi bi-collection-play"></i>
            </div>

            <div>
                <h2 class="h4 mb-1">Filmek listája</h2>
                <p class="text-body-secondary mb-0">
                    Az adatbázisban tárolt filmek
                </p>
            </div>

        </div>
    </div>

    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover film-list-table">

                <thead>
                    <tr>
                        <th scope="col">ID</th>

                        <th scope="col">
                            <i class="bi bi-camera-reels me-2"></i>Cím
                        </th>

                        <th scope="col">
                            <i class="bi bi-calendar3 me-2"></i>Év
                        </th>

                        <th scope="col">
                            <i class="bi bi-clock me-2"></i>Hossz
                        </th>

                        <th scope="col">
                            <i class="bi bi-ticket-perforated me-2"></i>
                            Előadások száma
                        </th>

                        <th scope="col">
                            <i class="bi bi-gear me-2"></i>Műveletek
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($filmek as $film)
                        <tr>
                            <td>{{ $film->id }}</td>

                            <td class="fw-semibold">
                                {{ $film->cim }}
                            </td>

                            <td>{{ $film->ev }}</td>

                            <td class="text-nowrap">
                                <span class="film-list-badge">
                                    {{ $film->hossz }} perc
                                </span>
                            </td>

                            <td>
                                @if ($film->eloadasok_count > 0)
                                    <span class="film-count has-screenings">
                                        <i class="bi bi-ticket-perforated me-1"></i>
                                        {{ $film->eloadasok_count }} db
                                    </span>
                                @else
                                    <span class="film-count no-screenings">
                                        <i class="bi bi-check-circle me-1"></i>
                                        0 db
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex flex-wrap align-items-center gap-2">

                                    <!-- MÓDOSÍTÁS -->
                                    <a href="{{ route('admin.filmek.edit', $film->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square me-1"></i>
                                        Módosítás
                                    </a>

                                    <!-- TÖRLÉS -->
                                    @if ($film->eloadasok_count == 0)

                                        <form method="POST"
                                              action="{{ route('admin.filmek.destroy', $film->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Biztosan törölni szeretnéd ezt a filmet?')">
                                                <i class="bi bi-trash me-1"></i>
                                                Törlés
                                            </button>
                                        </form>

                                    @else

                                        <span
                                            class="film-delete-disabled"
                                            title="A filmhez előadások tartoznak, ezért nem törölhető.">
                                            <i class="bi bi-lock-fill"></i>
                                            Nem törölhető
                                        </span>

                                    @endif

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-film fs-1 d-block mb-3 text-body-secondary"></i>
                                Jelenleg nincs film az adatbázisban.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</section>

<!-- VISSZA -->
<div class="mt-4">
    <a href="{{ route('admin') }}"
       class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>
        Vissza az admin felületre
    </a>
</div>

@endsection
