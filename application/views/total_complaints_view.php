<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Complaints</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            box-sizing: border-box;
        }

        .content {
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
            margin-bottom: 17%;
        }

        .total_view {
            margin-left: auto;
            margin-right: auto;
        }

        .total_view h2 {
            text-align: center;
            color: black;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            background-color: #fff;
        }

        table, th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            height: 50;
        }

        th {
            background-color: rgb(87, 49, 125);
            color: white;
            text-align: left;
            font-weight: 700;
        }
        

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f3e5f5;
        }

        th, td {
            text-align: left;
            word-wrap: break-word;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .content {
                margin: 10px;
                padding: 10px;
                margin-bottom: 23%;
            }

            table, th, td {
                font-size: 14px;
                padding: 10px;
            }

            h2 {
                font-size: 25px;
                margin-bottom: 10px;
            }

            .table-wrapper::-webkit-scrollbar {
                display: none;
            }
        }

        @media (max-width: 576px) {
            table, th, td {
                font-size: 12px;
                padding: 8px;
            }

            th, td {
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>
    <div class="content total_view">
        <h2>Total Complaints</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Name</th>
                        <th>Mess</th>
                        <th>Date Filed</th>
                        <th>Campus</th>
                        <th>Status</th>
                        <th>Food Complaints</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($total_complaints)): ?>
                        <?php foreach ($total_complaints as $complaint): ?>
                            <tr>
                                <td><?php echo $complaint['id']; ?></td>
                                <td><?php echo $complaint['name']; ?></td>
                                <td><?php echo $complaint['mess']; ?></td>
                                <td><?php echo $complaint['date']; ?></td>
                                <td><?php echo $complaint['campus']; ?></td>
                                <td><?php echo $complaint['status']; ?></td>
                                <td><?php echo isset($complaint['food_complaints']) ? $complaint['food_complaints'] : 'N/A'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No complaints found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>

</html>
