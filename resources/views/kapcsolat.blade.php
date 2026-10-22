@extends('layouts.app')

@section('title', 'Kapcsolat')

@section('content')

    <h2>Kapcsolat</h2>

    <p>
        Az alábbi űrlapon keresztül üzenetet küldhet nekünk.
    </p>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('uzenet.kuldes') }}">
        @csrf

        <div>
            <label for="nev">Név:</label>
            <input type="text" id="nev" name="nev">
        </div>

        <div>
            <label for="email">E-mail cím:</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="uzenet">Üzenet:</label>
            <textarea id="uzenet" name="uzenet"></textarea>
        </div>

        <button type="submit">Küldés</button>
    </form>

@endsection