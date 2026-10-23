@extends('layouts.app')

@section('title', 'Film módosítása')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-7">

        <div class="card shadow-sm">

            <div class="card-header">
                <h1 class="h3 mb-0">Film módosítása</h1>
            </div>

            <div class="card-body p-4">

                <!-- VALIDÁCIÓS HIBÁK -->
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Az alábbi hibák történtek:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('admin.filmek.update', $film->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- FILM CÍME -->
                    <div class="mb-3">
                        <label for="cim" class="form-label">
                            Film címe
                        </label>

                        <input
                            type="text"
                            id="cim"
                            name="cim"
                            class="form-control @error('cim') is-invalid @enderror"
                            value="{{ old('cim', $film->cim) }}"
                            required>
                    </div>

                    <!-- MEGJELENÉSI ÉV -->
                    <div class="mb-3">
                        <label for="ev" class="form-label">
                            Megjelenési év
                        </label>

                        <input
                            type="number"
                            id="ev"
                            name="ev"
                            class="form-control @error('ev') is-invalid @enderror"
                            value="{{ old('ev', $film->ev) }}"
                            required>
                    </div>

                    <!-- FILM HOSSZA -->
                    <div class="mb-4">
                        <label for="hossz" class="form-label">
                            Film hossza (perc)
                        </label>

                        <input
                            type="number"
                            id="hossz"
                            name="hossz"
                            class="form-control @error('hossz') is-invalid @enderror"
                            value="{{ old('hossz', $film->hossz) }}"
                            required>
                    </div>

                    <!-- GOMBOK -->
                    <div class="d-flex flex-wrap gap-2">

                        <button type="submit" class="btn btn-primary">
                            Módosítás mentése
                        </button>

                        <a href="{{ route('admin.filmek.getAll') }}"
                            class="btn btn-outline-secondary">
                            Mégse
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection