@extends('layouts.app')

@section('title', 'Üzenetek')

@section('content')

    <h2>Üzenetek</h2>

    <table>
        <thead>
            <tr>
                <th>Név</th>
                <th>E-mail cím</th>
                <th>Üzenet</th>
                <th>Küldés időpontja</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($uzenetek as $uzenet)
                <tr>
                    <td>{{ $uzenet->nev }}</td>
                    <td>{{ $uzenet->email }}</td>
                    <td>{{ $uzenet->uzenet }}</td>
                    <td>{{ $uzenet->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $uzenetek->links() }}

@endsection