@extends('layouts.app')

@section('title', 'Film módosítása')

@section('content')

<h2>Film módosítása</h2>

<form method="POST" action="{{ route('admin.filmek.update', $film->id) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="cim">Cím:</label>
        <input type="text" id="cim" name="cim" value="{{ $film->cim }}">
    </div>

    <div>
        <label for="ev">Év:</label>
        <input type="number" id="ev" name="ev" value="{{ $film->ev }}">
    </div>

    <div>
        <label for="hossz">Hossz (perc):</label>
        <input type="number" id="hossz" name="hossz" value="{{ $film->hossz }}">
    </div>

    <button type="submit">Módosítás mentése</button>
</form>

@endsection