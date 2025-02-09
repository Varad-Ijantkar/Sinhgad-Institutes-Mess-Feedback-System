<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .pro {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f3ff;

        }

        .dashboard {
            display: flex;
            gap: 90px;
            width: 90%;
            max-width: 1200px;
            align-items: center;
        }

        /* Card container on the left */
        .card-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 40%;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .card.pending {
            background-color: #e74c3c;
        }

        .card.resolved {
            background-color: #2ecc71;
        }

        .card.total {
            background-color: #2c3e50;
        }

        /* Pie chart container */
        .chart-container {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: none ;
            padding: 20px;
            border-radius: 10px;
            
        }

        canvas {
            max-width: 100%;
            height: auto;
        }

        /* Responsive Design */
        /* Responsive Design */
@media (max-width: 768px) {
    .dashboard {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    /* Show Pie Chart first */
    .chart-container {
        width: 100%;

    }

    /* Cards Section */
    .card-container {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .card {
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: none;
        border: 1px solid #ddd; /* Adds a light border for visibility */
        color: black;
    }

    .card h2 {
        margin: 0;
        font-size: 16px;
    }

    .card p {
        font-size: 16px;
        font-weight: bold;
    }
}

    </style>
</head>

<body>
        <div class='pro'>
    <div class="dashboard">
        <!-- Cards (Left Side) -->
        <div class="card-container">
            <div class="card pending">
                <h2>Pending</h2>
                <p><?php echo $pending_count; ?></p>
            </div>
            <div class="card resolved">
                <h2>Resolved</h2>
                <p><?php echo $resolved_count; ?></p>
            </div>
            <div class="card total">
                <h2>Total</h2>
                <p><?php echo $total_count; ?></p>
            </div>
        </div>

        <!-- Pie Chart (Right Side) -->
        <div class="chart-container">
            <canvas id="progressChart"></canvas>
        </div>
    </div>
    </div>

    <script>
        let pendingCount = <?php echo $pending_count; ?>;
        let resolvedCount = <?php echo $resolved_count; ?>;
        let totalCount = pendingCount + resolvedCount;

        let ctx = document.getElementById('progressChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [`Resolved : ${resolvedCount}`, `Pending : ${pendingCount}`],
                datasets: [{
                    data: [resolvedCount, pendingCount ],
                    backgroundColor: ['#2ecc71', '#e74c3c']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });
    </script>

</body>

</html>
