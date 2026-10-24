@extends('layouts.app')

@section('title', 'Adatbázis')

@section('content')

<div class="container py-4">

    <h1 class="mb-4">Adatbázis</h1>

    <!-- FILMEK -->
    <section class="card mb-5">
        <div class="card-header">
            <h2 class="h4 mb-0">Filmek</h2>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover align-middle">
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
            </div>
        </div>
    </section>

    <!-- MOZIK -->
    <section class="card mb-5">
        <div class="card-header">
            <h2 class="h4 mb-0">Mozik</h2>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover align-middle">
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
            </div>
        </div>
    </section>

    <!-- ELŐADÁSOK -->
    <section class="card mb-5">
        <div class="card-header">
            <h2 class="h4 mb-0">Előadások</h2>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover align-middle">
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
            </div>

            <!-- LAPOZÁS -->
            <div class="mt-3">
                {{ $eloadasok->links() }}
            </div>
        </div>
    </section>

</div>

@endsection
