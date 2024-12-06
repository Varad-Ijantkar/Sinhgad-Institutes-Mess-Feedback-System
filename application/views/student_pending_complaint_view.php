<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Complaints</title>
    <style>
        /* Make the body and html take up 100% height */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Container for the main content, to take up remaining space */
        .content {
            flex: 1;
            /* This makes sure content takes up available space */
            padding: 20px;
            margin: 100px
        }

        .pending_view {
            margin-left: 280px;
        }

        /* Table styles */
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

    <!-- Main content area -->
    <div class="content pending_view">
        <h2>Pending Complaints</h2>

        <table>
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Name</th>
                    <th>Mess</th>
                    <th>Date Filed</th>
                    <th>Campus</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pending_complaints)): ?>
                    <?php foreach ($pending_complaints as $complaint): ?>
                        <tr>
                            <td><?php echo $complaint->id; ?></td>
                            <td><?php echo $complaint->name; ?></td>
                            <td><?php echo $complaint->mess; ?></td>
                            <td><?php echo $complaint->date; ?></td>
                            <td><?php echo $complaint->campus; ?></td>
                            <td><?php echo $complaint->food_complaints; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No pending complaints found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- The footer will be included from your template -->


</body>

</html>
