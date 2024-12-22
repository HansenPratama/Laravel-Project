<!-- resources/views/kas/chart.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Chart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>Kas Bulanan Chart</h1>

        <a href="{{ route('kas.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Kas</a>

        <!-- Chart Container -->
        <div style="width: 100%; height: 400px;">
            <canvas id="kasChart"></canvas>
        </div>

    </div>

    <script>
        // Prepare the data for the chart
        var months = <?php echo json_encode($bulanNames); ?>;  // Array of month names
        var kasData = <?php echo json_encode($kasDataFinal); ?>;    // Array of kas data for each month

        // Create the chart
        var ctx = document.getElementById('kasChart').getContext('2d');
        var kasChart = new Chart(ctx, {
            type: 'bar', // Bar chart type
            data: {
                labels: months, // Months as labels
                datasets: [{
                    label: 'Total Kas',
                    data: Object.values(kasData), // Total kas data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
