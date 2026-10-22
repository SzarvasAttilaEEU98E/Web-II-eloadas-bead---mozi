@extends('layouts.app')

@section('title', 'Adatbázis')

@section('content')

    <h1>Filmek</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Cím</th>
                <th>Év</th>
                <th>Hossz</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($filmek as $film)
                <tr>
                    <td>{{ $film->cim }}</td>
                    <td>{{ $film->ev }}</td>
                    <td>{{ $film->hossz }} perc</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <h1>Mozik</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Név</th>
                <th>Város</th>
                <th>Férőhely</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($mozik as $mozi)
                <tr>
                    <td>{{ $mozi->nev }}</td>
                    <td>{{ $mozi->varos }}</td>
                    <td>{{ $mozi->ferohely }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <h1>Előadások</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Film</th>
                <th>Mozi</th>
                <th>Dátum</th>
                <th>Nézőszám</th>
                <th>Bevétel</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($eloadasok as $eloadas)
                <tr>
                    <td>{{ $eloadas->film->cim }}</td>
                    <td>{{ $eloadas->mozi->nev }}</td>
                    <td>{{ $eloadas->datum }}</td>
                    <td>{{ $eloadas->nezoszam }}</td>
                    <td>{{ $eloadas->bevetel }} Ft</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $eloadasok->links() }}

@endsection