@extends('layouts.app')

@section('title', 'Admin')

@section('content')
<h2>Admin oldal</h2>

<p>Üdvözöljük az adminisztrációs felületen!</p>
<a href="{{ route('admin.filmek.getAll') }}">
    Filmek kezelése
</a>
@endsection