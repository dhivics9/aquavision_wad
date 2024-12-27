@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Dashboard Row -->
        <div class="row">
            <!-- Card for Total Sensors -->
            <div class="col-md-4">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Total Sensors</h4>
                        <ul class="list-group">
                            @foreach ($sensors as $sensor)
                                <li class="list-group-item d-flex justify-content-between align-items-center"
                                    onclick="showChart('sensor1')">
                                    {{ $sensor->sensor_name }}
                                    @if ($sensor->sensor_status == 'active')
                                        <span class="badge bg-success">{{ $sensor->sensor_status }}</span>
                                    @endif
                                    @if ($sensor->sensor_status != 'active')
                                    <span class="badge bg-danger">{{ $sensor->sensor_status }}</span>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Card for Total Reports -->
            <div class="col-md-4">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="card-title text-success">Total Reports</h4>
                        <p class="text-secondary">200</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="card-title text-info">Analysis Chart</h4>
                        <p class="text-secondary">200</p>
                    </div>
                </div>
            </div>

            <!-- Chart Card -->
            {{-- <div class="col-md-4">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="card-title text-info">Analysis Chart</h4>
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let chartInstance;

        function showChart(sensorId) {
            let chartData;
            // Define data for each sensor
            switch (sensorId) {
                case 'sensor1':
                    chartData = {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'Sensor 1 Checkups',
                            data: [15, 25, 35, 45],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    };
                    break;
                case 'sensor2':
                    chartData = {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'Sensor 2 Checkups',
                            data: [20, 30, 40, 50],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    };
                    break;
                case 'sensor3':
                    chartData = {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'Sensor 3 Checkups',
                            data: [10, 20, 30, 40],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    };
                    break;
                default:
                    chartData = {};
            }

            // If there's an existing chart, destroy it before rendering a new one
            if (chartInstance) {
                chartInstance.destroy();
            }

            // Render the new chart
            const ctx = document.getElementById('myChart').getContext('2d');
            chartInstance = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Water Checkup Analysis'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#e2e2e2',
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection
