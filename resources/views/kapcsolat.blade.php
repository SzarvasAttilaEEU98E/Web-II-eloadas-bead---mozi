
@extends('layouts.app')

@section('title', 'Kapcsolat')

@push('styles')
<style>
    .contact-heading {
        border-left: 4px solid #9c1725;
        padding-left: 18px;
    }

    .contact-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        overflow: hidden;
    }

    .contact-card .card-header {
        background-color: #341b20;
        border-bottom: 1px solid #573039;
        padding: 20px 24px;
    }

    .contact-icon {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #64212a;
        border-radius: 10px;
        font-size: 1.4rem;
    }

    .contact-card .form-control {
        background-color: #202020;
        border: 1px solid #505050;
        color: #ffffff;
        padding: 12px 14px;
    }

    .contact-card .form-control:focus {
        background-color: #202020;
        border-color: #a82b3a;
        color: #ffffff;
        box-shadow: 0 0 0 0.2rem rgba(156, 23, 37, 0.2);
    }

    .contact-card .form-label {
        font-weight: 500;
    }
</style>
@endpush

@section('content')

<div class="contact-heading mb-5">
    <h1 class="fw-bold mb-2">
        <i class="bi bi-envelope me-2"></i>
        Kapcsolat
    </h1>

    <p class="text-body-secondary mb-0">
        Kérdése vagy észrevétele van az alkalmazással kapcsolatban?
        Küldjön nekünk üzenetet!
    </p>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">

        <section class="card contact-card shadow-sm">

            <div class="card-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="contact-icon">
                        <i class="bi bi-chat-left-text"></i>
                    </div>

                    <div>
                        <h2 class="h4 mb-1">Üzenet küldése</h2>
                        <p class="text-body-secondary mb-0">
                            Töltse ki az alábbi űrlapot
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

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

                <form method="POST" action="{{ route('uzenet.kuldes') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nev" class="form-label">
                            <i class="bi bi-person me-2"></i>Név
                        </label>

                        <input
                            type="text"
                            id="nev"
                            name="nev"
                            class="form-control @error('nev') is-invalid @enderror"
                            value="{{ old('nev') }}"
                            autocomplete="name"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope-at me-2"></i>E-mail cím
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="uzenet" class="form-label">
                            <i class="bi bi-chat-dots me-2"></i>Üzenet
                        </label>

                        <textarea
                            id="uzenet"
                            name="uzenet"
                            rows="6"
                            class="form-control @error('uzenet') is-invalid @enderror"
                            required>{{ old('uzenet') }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-send me-2"></i>
                            Üzenet küldése
                        </button>
                    </div>
                </form>

            </div>
        </section>

    </div>
</div>

@endsection
