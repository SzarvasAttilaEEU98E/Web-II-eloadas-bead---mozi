@extends('layouts.app')

@section('title', 'Diagram')

@section('content')

<h2>Filmek összesített nézőszáma</h2>

<div style="width: 90%; max-width: 1100px; height: 500px; margin: 30px auto;">
    <canvas id="filmDiagram"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const filmCimek = @json($filmek - > pluck('cim'));
    const nezoSzamok = @json($filmek - > pluck('eloadasok_sum_nezoszam'));

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
                    title: {
                        display: true,
                        text: 'Nézőszám'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Filmek'
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'A 10 legnézettebb film',
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