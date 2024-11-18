<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Complaints</title>
    <style>
        .resolved_view {
            margin-left: 280px;
            /* Added px to prevent error */
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
    <div class="resolved_view">
        <h2>Resolved Complaints</h2>

        <table>
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Name</th>
                    <th>Mess</th>
                    <th>Date Resolved</th>
                    <th>Campus</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($resolved_complaints)): ?>
                    <?php foreach ($resolved_complaints as $complaint): ?>
                        <tr>
                            <td><?php echo $complaint['id']; ?></td>
                            <td><?php echo $complaint['name']; ?></td>
                            <td><?php echo $complaint['mess']; ?></td>
                            <td><?php echo $complaint['date']; ?></td>
                            <td><?php echo $complaint['campus']; ?></td>
                            <td><?php echo $complaint['description']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No resolved complaints found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>