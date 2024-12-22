<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Bulanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #b2f4f0; /* Biru muda agak tosca */
            font-family: Arial, sans-serif;
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }
        header {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Gradasi biru tosca */
            padding: 10px;
            color: white;
            text-align: center;
        }
        h1 {
            color: #f0f8ff;
        }
        .btn-secondary {
            background-color: #47b7b4; /* Biru tosca */
            border-color: #47b7b4; /* Warna border tombol */
            color: white;
        }
        .btn-secondary:hover {
            background-color: #3a9f98; /* Warna lebih gelap saat hover */
            border-color: #3a9f98; /* Warna border saat hover */
        }
        footer {
            margin-top: auto;
            background-color: #47b7b4; /* Biru tosca */
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 16px;
        }
        .table {
            background-color: white;
            color: #333;
        }
        .table thead {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Biru tosca */
            color: white;
        }
        .table tbody tr:hover {
            background-color: #d0f4f1;
        }
        .form-label {
            color: #3a9f98; /* Tosca lebih tua */
        }
        .form-select, .form-control {
            border-color: #3a9f98; /* Border lebih gelap */
        }
        #toggleChartBtn {
            background-color: #47b7b4;
            border-color: #47b7b4;
            color: white;
        }
        #toggleChartBtn:hover {
            background-color: #3a9f98;
            border-color: #3a9f98;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kas Bulanan</h1>
    </header>

    <div class="container mt-4">
        <a href="{{ route('anggotaa.dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <!-- Filter Form -->
        <form action="{{ route('kas.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" value="{{ request('tahun') }}" placeholder="Tahun">
                </div>
                <div class="col-md-3">
                    <label for="bulan_id" class="form-label">Bulan</label>
                    <select class="form-select" id="bulan_id" name="bulan_id">
                        <option value="">Pilih Bulan</option>
                        @foreach ($bulan as $bulans)
                            <option value="{{ $bulans->id }}" {{ request('bulan_id') == $bulans->id ? 'selected' : '' }}>
                                {{ $bulans->nama_bulan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-secondary">Filter</button>
                </div>
            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->bulan->nama_bulan }}</td>
                        <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button to Toggle the Chart -->
        <button id="toggleChartBtn" class="btn btn-success mb-3">Tampilkan Chart</button>

        <!-- Chart Container -->
        <div id="chartContainer" style="width: 100%; height: 400px; display: none;">
            <canvas id="kasChart"></canvas>
        </div>

    </div>

    <!-- Footer with HIMATIKA Text -->
    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <script>
        // Prepare the data for the chart
        var months = <?php echo json_encode($bulanNames); ?>;  // Array of month names
        var kasData = <?php echo json_encode($kasData); ?>;    // Array of kas data for each month

        var chartCreated = false;
        var kasChart;

        // Function to create the chart with improved appearance
        function createChart() {
            var ctx = document.getElementById('kasChart').getContext('2d');
            kasChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,  // Month names as labels
                    datasets: [{
                        label: 'Jumlah Kas',
                        data: kasData,  // Data for each month
                        backgroundColor: '#5cd3d0', // Lighter color for the bars
                        borderColor: '#47b7b4', // Border color of bars
                        borderWidth: 2,
                        hoverBackgroundColor: '#47b7b4', // Hover effect
                        hoverBorderColor: '#333', // Hover border effect
                        hoverBorderWidth: 3,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true,
                            backgroundColor: '#333',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            footerColor: '#fff',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value.toLocaleString(); // Format as currency
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: '#ddd', // Grid line color for x-axis
                                lineWidth: 0.5,
                            }
                        },
                    },
                }
            });
            chartCreated = true;
        }

        // Event listener for the button to toggle the chart visibility
        document.getElementById('toggleChartBtn').addEventListener('click', function() {
            var chartContainer = document.getElementById('chartContainer');
            if (chartContainer.style.display === 'none') {
                // Show the chart container and create the chart if not created
                chartContainer.style.display = 'block';
                if (!chartCreated) {
                    createChart();
                }
                document.getElementById('toggleChartBtn').innerText = 'Sembunyikan Chart';
            } else {
                // Hide the chart container
                chartContainer.style.display = 'none';
                document.getElementById('toggleChartBtn').innerText = 'Tampilkan Chart';
            }
        });
    </script>
</body>
</html>
