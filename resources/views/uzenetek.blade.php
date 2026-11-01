
@extends('layouts.app')

@section('title', 'Üzenetek')

@push('styles')
<style>
    .messages-heading {
        border-left: 4px solid #9c1725;
        padding-left: 18px;
    }

    .messages-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        overflow: hidden;
    }

    .messages-card .card-header {
        background-color: #341b20;
        border-bottom: 1px solid #573039;
        padding: 20px 24px;
    }

    .messages-icon {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #64212a;
        border-radius: 10px;
        font-size: 1.4rem;
    }

    .messages-table {
        margin-bottom: 0;
        --bs-table-bg: #292929;
        --bs-table-striped-bg: #303030;
        --bs-table-hover-bg: #3a292d;
        --bs-table-color: #f5f5f5;
        --bs-table-border-color: #444444;
    }

    .messages-table thead th {
        background-color: #391f24;
        color: #ffffff;
        padding: 14px 16px;
        white-space: nowrap;
    }

    .messages-table tbody td {
        padding: 14px 16px;
        vertical-align: middle;
    }

    .message-content {
        min-width: 250px;
        max-width: 500px;
        white-space: normal;
        overflow-wrap: anywhere;
    }

    .messages-pagination .page-link {
        background-color: #292929;
        border-color: #494949;
        color: #ffffff;
    }

    .messages-pagination .page-item.active .page-link {
        background-color: #780d18;
        border-color: #780d18;
    }
</style>
@endpush

@section('content')

<div class="messages-heading mb-5">
    <h1 class="fw-bold mb-2">
        <i class="bi bi-chat-left-text me-2"></i>
        Beérkezett üzenetek
    </h1>

    <p class="text-body-secondary mb-0">
        Az alkalmazás kapcsolatfelvételi űrlapján keresztül
        elküldött üzenetek áttekintése.
    </p>
</div>

<section class="card messages-card shadow-sm mb-5">

    <div class="card-header">
        <div class="d-flex align-items-center gap-3">
            <div class="messages-icon">
                <i class="bi bi-inbox"></i>
            </div>

            <div>
                <h2 class="h4 mb-1">Üzenetek listája</h2>
                <p class="text-body-secondary mb-0">
                    Beérkezett kapcsolatfelvételi üzenetek
                </p>
            </div>
        </div>
    </div>

    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover messages-table">
                <thead>
                    <tr>
                        <th scope="col">
                            <i class="bi bi-person me-2"></i>Név
                        </th>
                        <th scope="col">
                            <i class="bi bi-envelope me-2"></i>E-mail cím
                        </th>
                        <th scope="col">
                            <i class="bi bi-chat-text me-2"></i>Üzenet
                        </th>
                        <th scope="col">
                            <i class="bi bi-clock me-2"></i>Küldés időpontja
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($uzenetek as $uzenet)
                        <tr>
                            <td class="fw-semibold">
                                {{ $uzenet->nev }}
                            </td>

                            <td>
                                {{ $uzenet->email }}
                            </td>

                            <td class="message-content">
                                {{ $uzenet->uzenet }}
                            </td>

                            <td class="text-nowrap">
                                {{ $uzenet->created_at->format('Y.m.d. H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <i class="bi bi-inbox fs-1 d-block mb-3 text-body-secondary"></i>
                                Még nem érkezett üzenet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="card-footer bg-transparent border-top border-secondary py-3">
        <div class="messages-pagination">
            {{ $uzenetek->links() }}
        </div>
    </div>

</section>

@endsection
