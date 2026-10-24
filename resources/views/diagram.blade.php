@extends('layouts.app')

@section('title', 'Diagram')

@section('content')

<h1 class="mb-4">Nézettségi statisztikák</h1>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h2 class="h4 mb-0">A 10 legnézettebb film</h2>
    </div>

    <div class="card-body">

        <p class="text-body-secondary mb-4">
            A diagram az adatbázisban szereplő előadások
            összesített nézőszáma alapján készült.
        </p>

        <div style="position: relative; width: 100%; height: 500px;">
            <canvas id="filmDiagram"></canvas>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const filmCimek = @json($filmek -> pluck('cim'));
    const nezoSzamok = @json($filmek -> pluck('eloadasok_sum_nezoszam'));

    const ctx = document.getElementById('filmDiagram');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: filmCimek,
            datasets: [{
                label: 'Összes nézőszám',
                data: nezoSzamok,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        color: '#ffffff'
                    },
                    title: {
                        display: true,
                        text: 'Nézőszám',
                        color: '#ffffff'
                    }
                },
                y: {
                    ticks: {
                        color: '#ffffff'
                    },
                    title: {
                        display: true,
                        text: 'Filmek',
                        color: '#ffffff'
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'A 10 legnézettebb film',
                    color: '#ffffff',
                    font: {
                        size: 20
                    }
                },
                legend: {
                    display: false
                }
            }
        }
    });
</script>

@endsection