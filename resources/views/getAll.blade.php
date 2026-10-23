@extends('layouts.app')

@section('title', 'Filmek kezelése')

@section('content')

<h2>Filmek kezelése</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Év</th>
            <th>Hossz</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($filmek as $film)
        <tr>
            <td>{{ $film->id }}</td>
            <td>{{ $film->cim }}</td>
            <td>{{ $film->ev }}</td>
            <td>{{ $film->hossz }} perc</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection