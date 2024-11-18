<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Complaints</title>
    <style>
        .total_view {
            margin-left: 280px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th,
        td {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="total_view">
        <h2>Total Complaints</h2>

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
</body>

</html>