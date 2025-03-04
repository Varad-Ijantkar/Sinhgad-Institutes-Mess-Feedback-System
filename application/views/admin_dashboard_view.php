<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 20px;
            flex-direction: column;
            margin-left: 0;
            transition: all 0.3s ease;
            /* Adjust this based on the width of your sidebar */
        }

        .content.expanded {
            margin-left: 250px;
            /* Shift right when sidebar is closed */
        }

        .card-container {
            display: flex;
            justify-content: center;
            /* Center the cards horizontally */
            width: 100%;
            max-width: 1000px;
            flex-wrap: wrap;
            /* Allow cards to wrap */
            gap: 20px;
            /* Add space between cards */
            transform: translateY(250px);
        }

        .card {
            padding: 30px;
            border-radius: 5px;
            width: 30%;
            text-align: center;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Card colors */
        .card.pending {
            background-color: #e74c3c;
            /* Red */
        }

        .card.resolved {
            background-color: #2ecc71;
            /* Green */
        }

        .card.total {
            background-color: #2c3e50;
            /* Black */
        }

        /* Hover animations */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .card.pending:hover {
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.5);
        }

        .card.resolved:hover {
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.5);
        }

        .card.total:hover {
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                /* Stack cards vertically on smaller screens */
                align-items: center;
            }

            .card {
                width: 80%;
                /* Make cards wider on smaller screens */
            }
        }

        @media (max-width: 576px) {
            .card {
                width: 90%;
                /* Full width on very small screens */
            }
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    <div class="content">
        <div class="card-container">
            <div class="card pending">
                <h2>Pending</h2>
                <p>
                    <?php echo $pending_count; ?>
                </p>
            </div>
            <div class="card resolved">
                <h2>Resolved</h2>
                <p>
                    <?php echo $resolved_count; ?>
                </p>
            </div>
            <div class="card total">
                <h2>Total</h2>
                <p>
                    <?php echo $total_count; ?>
                </p>
            </div>
        </div>
    </div>

</body>

</html>