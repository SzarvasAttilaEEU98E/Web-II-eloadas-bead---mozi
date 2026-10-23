@extends('layouts.app')

@section('title', 'Üzenetek')

@section('content')

<h1 class="mb-4">Beérkezett üzenetek</h1>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h2 class="h4 mb-0">Üzenetek listája</h2>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-dark table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">Név</th>
                        <th scope="col">E-mail cím</th>
                        <th scope="col">Üzenet</th>
                        <th scope="col">Küldés időpontja</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($uzenetek as $uzenet)
                    <tr>
                        <td>{{ $uzenet->nev }}</td>

                        <td>
                            {{ $uzenet->email }}
                        </td>

                        <td style="min-width: 250px; max-width: 500px; white-space: normal; overflow-wrap: anywhere;">
                            {{ $uzenet->uzenet }}
                        </td>

                        <td class="text-nowrap">
                            {{ $uzenet->created_at->format('Y.m.d. H:i') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            Még nem érkezett üzenet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <!-- LAPOZÁS -->
        <div class="d-flex flex-wrap justify-content-center mt-4">
            {{ $uzenetek->links() }}
        </div>

    </div>
</div>

@endsection