
@extends('layouts.app')

@section('title', 'Diagram')

@push('styles')
<style>
    .diagram-heading {
        border-left: 4px solid #9c1725;
        padding-left: 18px;
    }

    .diagram-card {
        background-color: #292929;
        border: 1px solid #414141;
        border-radius: 12px;
        overflow: hidden;
    }

    .diagram-card .card-header {
        background-color: #341b20;
        border-bottom: 1px solid #573039;
        padding: 20px 24px;
    }

    .diagram-icon {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #64212a;
        border-radius: 10px;
        font-size: 1.4rem;
    }

    .diagram-container {
        position: relative;
        width: 100%;
        height: 500px;
    }

    @media (max-width: 576px) {
        .diagram-container {
            height: 420px;
        }
    }
</style>
@endpush

@section('content')

<div class="diagram-heading mb-5">
    <h1 class="fw-bold mb-2">
        <i class="bi bi-bar-chart-line me-2"></i>
        Nézettségi statisztikák
    </h1>

    <p class="text-body-secondary mb-0">
        Az alkalmazásban nyilvántartott előadások nézőszámai
        alapján készült statisztikai kimutatás.
    </p>
</div>

<section class="card diagram-card shadow-sm mb-5">

    <div class="card-header">
        <div class="d-flex align-items-center gap-3">
            <div class="diagram-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>

            <div>
                <h2 class="h4 mb-1">A 10 legnézettebb film</h2>
                <p class="text-body-secondary mb-0">
                    Összesített nézőszám filmenként
                </p>
            </div>
        </div>
    </div>

    <div class="card-body p-4">

        <p class="text-body-secondary mb-4">
            A diagram az egyes filmekhez kapcsolódó előadások
            nézőszámainak összesítésével készült.
            Az oszlopok segítségével könnyen összehasonlíthatók
            a legnépszerűbb filmek.
        </p>

        <div class="diagram-container">
            <canvas id="filmDiagram"></canvas>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const filmCimek = @json($filmek->pluck('cim'));
    const nezoSzamok = @json($filmek->pluck('eloadasok_sum_nezoszam'));

    const ctx = document.getElementById('filmDiagram');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: filmCimek,
            datasets: [{
                label: 'Összes nézőszám',
                data: nezoSzamok,
                backgroundColor: 'rgba(156, 23, 37, 0.75)',
                borderColor: 'rgba(205, 65, 82, 1)',
                borderWidth: 1,
                borderRadius: 5,
                maxBarThickness: 34
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(255, 255, 255, 0.08)'
                    },
                    ticks: {
                        color: '#cccccc',
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Nézőszám',
                        color: '#ffffff'
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#eeeeee'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Nézőszám: ' +
                                context.parsed.x.toLocaleString('hu-HU') +
                                ' fő';
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
