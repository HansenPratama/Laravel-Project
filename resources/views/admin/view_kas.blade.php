<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Bulanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b2f4f0; /* Biru muda agak tosca */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4); /* Gradasi biru tosca */
            padding: 10px;
            color: white;
            text-align: center;
        }
        h1 {
            color: #f0f8ff; /* Warna putih untuk judul */
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .btn-primary, .btn-secondary, .btn-success {
            background-color: #47b7b4;
            border-color: #47b7b4;
        }
        .btn-primary:hover, .btn-secondary:hover, .btn-success:hover {
            background-color: #3a9f98;
            border-color: #3a9f98;
        }
        .form-label {
            color: #47b7b4; /* Warna label untuk form */
        }
        footer {
            background-color: #47b7b4;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 50px; /* Menjauhkan footer dari tabel */
        }
        .table thead {
            background: linear-gradient(90deg, #5cd3d0, #47b7b4);
            color: white;
        }
        .table tbody tr:hover {
            background-color: #d0f4f1;
        }
        .chart-container {
            width: 100%;
            height: 400px;
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kas Bulanan</h1>
    </header>

    <div class="container mt-4">
        <a href="{{ route('kas.create') }}" class="btn btn-primary mb-3">Tambah Kas Bulanan</a>
        <a href="{{ route('kas.download', ['tahun' => request('tahun')]) }}" class="btn btn-success mb-3">Download Excel</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <!-- Form Filter -->
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->bulan->nama_bulan }}</td>
                        <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('kas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kas.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button to Toggle the Chart -->
        <button id="toggleChartBtn" class="btn btn-success mb-3">Tampilkan Chart</button>

        <!-- Chart Container -->
        <div id="chartContainer" class="chart-container">
            <canvas id="kasChart"></canvas>
        </div>

    </div>

    <footer>
        <p>&copy; {{ date('Y') }} HIMATIKA</p>
    </footer>

    <script>
        var months = <?php echo json_encode($bulanNames); ?>;  // Array of month names
        var kasData = <?php echo json_encode($kasData); ?>;    // Array of kas data for each month

        var chartCreated = false;
        var kasChart;

        // Function to create the chart
        function createChart() {
            var ctx = document.getElementById('kasChart').getContext('2d');
            kasChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,  // Month names as labels
                    datasets: [{
                        label: 'Jumlah Kas',
                        data: kasData,  
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
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
