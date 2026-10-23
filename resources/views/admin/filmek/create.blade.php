@extends('layouts.app')

@section('title', 'Új film hozzáadása')

@section('content')

<h2>Új film hozzáadása</h2>

<form method="POST" action="{{ route('admin.filmek.store') }}">
    @csrf

    <div>
        <label for="cim">Cím:</label>
        <input type="text" id="cim" name="cim">
    </div>

    <div>
        <label for="ev">Év:</label>
        <input type="number" id="ev" name="ev">
    </div>

    <div>
        <label for="hossz">Hossz (perc):</label>
        <input type="number" id="hossz" name="hossz">
    </div>

    <button type="submit">Film hozzáadása</button>

</form>

@endsection