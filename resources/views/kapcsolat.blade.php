@extends('layouts.app')

@section('title', 'Kapcsolat')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-7">

        <div class="card shadow-sm">

            <div class="card-header">
                <h1 class="h3 mb-0">Kapcsolat</h1>
            </div>

            <div class="card-body p-4">

                <p class="text-body-secondary mb-4">
                    Az alábbi űrlapon keresztül üzenetet küldhet nekünk.
                </p>

                <!-- SIKERES ÜZENETKÜLDÉS -->
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

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

                <form method="POST" action="{{ route('uzenet.kuldes') }}">
                    @csrf

                    <!-- NÉV -->
                    <div class="mb-3">
                        <label for="nev" class="form-label">
                            Név
                        </label>

                        <input
                            type="text"
                            id="nev"
                            name="nev"
                            class="form-control @error('nev') is-invalid @enderror"
                            value="{{ old('nev') }}"
                            required>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            E-mail cím
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required>
                    </div>

                    <!-- ÜZENET -->
                    <div class="mb-4">
                        <label for="uzenet" class="form-label">
                            Üzenet
                        </label>

                        <textarea
                            id="uzenet"
                            name="uzenet"
                            rows="5"
                            class="form-control @error('uzenet') is-invalid @enderror"
                            required>{{ old('uzenet') }}</textarea>
                    </div>

                    <!-- KÜLDÉS -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Üzenet küldése
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection