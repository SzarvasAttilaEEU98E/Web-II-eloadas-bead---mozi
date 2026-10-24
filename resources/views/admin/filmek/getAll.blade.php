@extends('layouts.app')

@section('title', 'Filmek kezelése')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="mb-1">Filmek kezelése</h1>
        <p class="text-body-secondary mb-0">
            Filmek hozzáadása, módosítása és törlése.
        </p>
    </div>

    <a href="{{ route('admin.filmek.create') }}"
        class="btn btn-primary">
        + Új film hozzáadása
    </a>
</div>

<!-- SIKERES MŰVELET -->
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- HIBAÜZENET -->
@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif

<div class="card shadow-sm">

    <div class="card-header">
        <h2 class="h4 mb-0">Filmek listája</h2>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cím</th>
                        <th scope="col">Év</th>
                        <th scope="col">Hossz</th>
                        <th scope="col">Műveletek</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($filmek as $film)
                    <tr>
                        <td>{{ $film->id }}</td>

                        <td>{{ $film->cim }}</td>

                        <td>{{ $film->ev }}</td>

                        <td class="text-nowrap">
                            {{ $film->hossz }} perc
                        </td>

                        <td>
                            <div class="d-flex flex-wrap gap-2">

                                <!-- MÓDOSÍTÁS -->
                                <a href="{{ route('admin.filmek.edit', $film->id) }}"
                                    class="btn btn-warning btn-sm">
                                    Módosítás
                                </a>

                                <!-- TÖRLÉS -->
                                <form method="POST"
                                    action="{{ route('admin.filmek.destroy', $film->id) }}">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Biztosan törölni szeretnéd ezt a filmet?')">
                                        Törlés
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Jelenleg nincs film az adatbázisban.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

<div class="mt-4">
    <a href="{{ route('admin') }}"
        class="btn btn-outline-secondary">
        Vissza az admin felületre
    </a>
</div>

@endsection