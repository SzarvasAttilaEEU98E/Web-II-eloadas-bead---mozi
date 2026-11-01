
@extends('layouts.app')

@section('title', 'Adatbázis')

@push('styles')
<style>
    .database-heading {
        border-left: 4px solid #9c1725;
        padding-left: 18px;
    }

    .database-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        overflow: hidden;
    }

    .database-card .card-header {
        background-color: #341b20;
        border-bottom: 1px solid #573039;
        padding: 20px 24px;
    }

    .database-icon {
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #64212a;
        color: #ffffff;
        border-radius: 10px;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .database-table {
        margin-bottom: 0;
        --bs-table-bg: #292929;
        --bs-table-striped-bg: #303030;
        --bs-table-hover-bg: #3a292d;
        --bs-table-color: #f5f5f5;
        --bs-table-border-color: #444444;
    }

    .database-table thead th {
        background-color: #391f24;
        color: #ffffff;
        padding: 14px 16px;
        font-weight: 600;
        white-space: nowrap;
    }

    .database-table tbody td {
        padding: 13px 16px;
        vertical-align: middle;
    }

    .database-table tbody tr {
        transition: background-color 0.2s;
    }

    .database-subtitle {
        color: #b8b8b8;
        font-size: 0.95rem;
    }

    .database-badge {
        display: inline-block;
        padding: 5px 11px;
        border-radius: 8px;
        background-color: #49242c;
        color: #f1b7bf;
        font-weight: 500;
    }

    .database-pagination .pagination {
        margin-bottom: 0;
    }

    .database-pagination .page-link {
        background-color: #292929;
        border-color: #494949;
        color: #ffffff;
    }

    .database-pagination .page-link:hover {
        background-color: #64212a;
        border-color: #9c1725;
    }

    .database-pagination .page-item.active .page-link {
        background-color: #780d18;
        border-color: #780d18;
    }
</style>
@endpush

@section('content')

<!-- OLDAL FEJLÉC -->
<div class="database-heading mb-5">
    <h1 class="fw-bold mb-2">
        <i class="bi bi-database me-2"></i>
        Mozi adatbázis
    </h1>

    <p class="text-body-secondary mb-0">
        Böngésszen az alkalmazásban nyilvántartott filmek,
        mozik és előadások adatai között.
    </p>
</div>

<!-- FILMEK -->
<section class="card database-card shadow-sm mb-5">

    <div class="card-header">
        <div class="d-flex align-items-center gap-3">
            <div class="database-icon">
                <i class="bi bi-film"></i>
            </div>

            <div>
                <h2 class="h4 mb-1">Filmek</h2>
                <p class="database-subtitle mb-0">
                    Az adatbázisban szereplő filmek listája
                </p>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover database-table">
                <thead>
                    <tr>
                        <th scope="col">
                            <i class="bi bi-camera-reels me-2"></i>Cím
                        </th>
                        <th scope="col">
                            <i class="bi bi-calendar3 me-2"></i>Év
                        </th>
                        <th scope="col">
                            <i class="bi bi-clock me-2"></i>Hossz
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($filmek as $film)
                        <tr>
                            <td class="fw-semibold">
                                {{ $film->cim }}
                            </td>

                            <td>
                                {{ $film->ev }}
                            </td>

                            <td>
                                <span class="database-badge">
                                    {{ $film->hossz }} perc
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                Nincsenek megjeleníthető filmek.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- MOZIK -->
<section class="card database-card shadow-sm mb-5">

    <div class="card-header">
        <div class="d-flex align-items-center gap-3">
            <div class="database-icon">
                <i class="bi bi-building"></i>
            </div>

            <div>
                <h2 class="h4 mb-1">Mozik</h2>
                <p class="database-subtitle mb-0">
                    Mozitermek, városok és férőhelyek
                </p>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover database-table">
                <thead>
                    <tr>
                        <th scope="col">
                            <i class="bi bi-building me-2"></i>Név
                        </th>
                        <th scope="col">
                            <i class="bi bi-geo-alt me-2"></i>Város
                        </th>
                        <th scope="col">
                            <i class="bi bi-people me-2"></i>Férőhely
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($mozik as $mozi)
                        <tr>
                            <td class="fw-semibold">
                                {{ $mozi->nev }}
                            </td>

                            <td>
                                {{ $mozi->varos }}
                            </td>

                            <td>
                                <span class="database-badge">
                                    {{ $mozi->ferohely }} fő
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                Nincsenek megjeleníthető mozik.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- ELŐADÁSOK -->
<section class="card database-card shadow-sm mb-5">

    <div class="card-header">
        <div class="d-flex align-items-center gap-3">
            <div class="database-icon">
                <i class="bi bi-ticket-perforated"></i>
            </div>

            <div>
                <h2 class="h4 mb-1">Előadások</h2>
                <p class="database-subtitle mb-0">
                    Vetítések, nézőszámok és bevételi adatok
                </p>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover database-table">
                <thead>
                    <tr>
                        <th scope="col">
                            <i class="bi bi-film me-2"></i>Film
                        </th>
                        <th scope="col">
                            <i class="bi bi-building me-2"></i>Mozi
                        </th>
                        <th scope="col">
                            <i class="bi bi-calendar-event me-2"></i>Dátum
                        </th>
                        <th scope="col">
                            <i class="bi bi-people me-2"></i>Nézőszám
                        </th>
                        <th scope="col">
                            <i class="bi bi-cash-stack me-2"></i>Bevétel
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($eloadasok as $eloadas)
                        <tr>
                            <td class="fw-semibold">
                                {{ $eloadas->film->cim }}
                            </td>

                            <td>
                                {{ $eloadas->mozi->nev }}
                            </td>

                            <td class="text-nowrap">
                                {{ $eloadas->datum }}
                            </td>

                            <td>
                                <span class="database-badge">
                                    {{ $eloadas->nezoszam }} fő
                                </span>
                            </td>

                            <td class="text-nowrap">
                                {{ number_format($eloadas->bevetel, 0, ',', ' ') }} Ft
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                Nincsenek megjeleníthető előadások.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- LAPOZÁS -->
    <div class="card-footer bg-transparent border-top border-secondary py-3">
        <div class="database-pagination">
            {{ $eloadasok->links() }}
        </div>
    </div>

</section>

@endsection
