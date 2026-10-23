@extends('layouts.app')

@section('title', 'Filmek kezelése')

@section('content')

<h2>Filmek kezelése</h2>

<a href="{{ route('admin.filmek.create') }}">
    Új film hozzáadása
</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Év</th>
            <th>Hossz</th>
            <th>Műveletek</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($filmek as $film)
        <tr>
            <td>{{ $film->id }}</td>
            <td>{{ $film->cim }}</td>
            <td>{{ $film->ev }}</td>
            <td>{{ $film->hossz }} perc</td>

            <td>
                <a href="{{ route('admin.filmek.edit', $film->id) }}">
                    Módosítás
                </a>
                <form method="POST"
                    action="{{ route('admin.filmek.destroy', $film->id) }}"
                    style="display: inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Biztosan törölni szeretnéd ezt a filmet?')">
                        Törlés
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection