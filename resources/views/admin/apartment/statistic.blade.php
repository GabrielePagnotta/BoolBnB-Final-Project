@extends('layouts.app')

@php
    $mostVisitsCount = 0;
    $mostVisitsDay = '';
    $leastVisitsCount = PHP_INT_MAX;
    $leastVisitsDay = '';

    foreach ($data as $row) {
        $count = $row->count;
        $date = $row->date;

        if ($count > $mostVisitsCount) {
            $mostVisitsCount = $count;
            $mostVisitsDay = $date;
        }

        if ($count < $leastVisitsCount) {
            $leastVisitsCount = $count;
            $leastVisitsDay = $date;
        }
    }
@endphp

@section('content')
    <div class="container">
        <canvas id="myChart"></canvas>
        <h4 class="mt-4">Dati:</h4>
        <div>
            <p>Giorno con più visitatori: {{ $mostVisitsDay }}</p>
        </div>
        <div>
            <p>Giorno con meno visitatori: {{ $leastVisitsDay }}</p>
        </div>
    </div>
@endsection




@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var data = {!! json_encode($data) !!};
        var dates = data.map(function(entry) {
            return entry.date;
        });
        var totals = data.map(function(entry) {
            return entry.count;
        });
        var myChart = new Chart(ctx, {
            type: 'bar', // Change to 'bar'
            data: {
                labels: dates,
                datasets: [{
                    label: 'Visualizzazioni giornaliere',
                    data: totals,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
