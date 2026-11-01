
@extends('layouts.app')

@section('title', 'Új film hozzáadása')

@push('styles')
<style>
    .film-form-heading {
        border-left: 4px solid #9c1725;
        padding-left: 18px;
    }

    .film-form-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        overflow: hidden;
    }

    .film-form-card .card-header {
        background-color: #341b20;
        border-bottom: 1px solid #573039;
        padding: 20px 24px;
    }

    .film-form-icon {
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

    .film-form-card .form-control {
        background-color: #202020;
        border: 1px solid #505050;
        color: #ffffff;
        padding: 12px 14px;
    }

    .film-form-card .form-control:focus {
        background-color: #202020;
        border-color: #a82b3a;
        color: #ffffff;
        box-shadow: 0 0 0 0.2rem rgba(156, 23, 37, 0.2);
    }

    .film-form-card .form-label {
        font-weight: 500;
    }

    .film-form-card .form-control::placeholder {
        color: #888888;
    }
</style>
@endpush

@section('content')

<div class="film-form-heading mb-5">
    <h1 class="fw-bold mb-2">
        <i class="bi bi-plus-circle me-2"></i>
        Új film hozzáadása
    </h1>

    <p class="text-body-secondary mb-0">
        Új film rögzítése a Mozi alkalmazás adatbázisában.
    </p>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-7">

        <div class="card film-form-card shadow-sm">

            <div class="card-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="film-form-icon">
                        <i class="bi bi-film"></i>
                    </div>

                    <div>
                        <h2 class="h4 mb-1">Film adatai</h2>
                        <p class="text-body-secondary mb-0">
                            Töltse ki az alábbi mezőket
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">

                <!-- VALIDÁCIÓS HIBÁK -->
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Az alábbi hibák történtek:
                        </strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.filmek.store') }}">
                    @csrf

                    <!-- FILM CÍME -->
                    <div class="mb-4">
                        <label for="cim" class="form-label">
                            <i class="bi bi-camera-reels me-2"></i>
                            Film címe
                        </label>

                        <input
                            type="text"
                            id="cim"
                            name="cim"
                            class="form-control @error('cim') is-invalid @enderror"
                            value="{{ old('cim') }}"
                            placeholder="Adja meg a film címét"
                            required>

                        @error('cim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- MEGJELENÉSI ÉV -->
                    <div class="mb-4">
                        <label for="ev" class="form-label">
                            <i class="bi bi-calendar3 me-2"></i>
                            Megjelenési év
                        </label>

                        <input
                            type="number"
                            id="ev"
                            name="ev"
                            class="form-control @error('ev') is-invalid @enderror"
                            value="{{ old('ev') }}"
                            placeholder="Például: 2025"
                            required>

                        @error('ev')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- FILM HOSSZA -->
                    <div class="mb-4">
                        <label for="hossz" class="form-label">
                            <i class="bi bi-clock me-2"></i>
                            Film hossza (perc)
                        </label>

                        <input
                            type="number"
                            id="hossz"
                            name="hossz"
                            class="form-control @error('hossz') is-invalid @enderror"
                            value="{{ old('hossz') }}"
                            placeholder="Például: 120"
                            required>

                        @error('hossz')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- GOMBOK -->
                    <div class="d-flex flex-wrap gap-2">

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>
                            Film hozzáadása
                        </button>

                        <a href="{{ route('admin.filmek.getAll') }}"
                           class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle me-2"></i>
                            Mégse
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
