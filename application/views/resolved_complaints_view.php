<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Complaints</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            box-sizing: border-box;
        }

        .content {
            padding: 20px;
            margin: 20px auto;
            margin-bottom: 24%;
        }

        .resolved_view {
            margin-left: auto;
            margin-right: auto;
        }

        .resolved_view h2 {
            text-align: center;
            color: black;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 30px;
            color: hsl(270, 46.20%, 28.40%);
        }

        .table-wrapper {
            display: flex;
			justify-content: center;
            width: 86%;
            margin-left: 14%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            background-color: #fff;
        }

        table,
        th,
        td {
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

        th,
        td {
            text-align: left;
            word-wrap: break-word;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .content {
                margin: 10px;
                padding: 10px;
                margin-bottom: 60%;
            }

            table,
            th,
            td {
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

            table,
            th,
            td {
                font-size: 12px;
                padding: 8px;
            }

            th,
            td {
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>
    <div class="content resolved_view">
        <h2>Resolved Complaints</h2>
        <div class="table-wrapper">
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
    </div>
</body>

</html>