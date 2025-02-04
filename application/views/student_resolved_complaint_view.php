<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Complaints</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
        }

        .table-container {
            padding: 0 10%;

        }

        .heading {
            font-size: 36px;
            text-align: center;
            color: #5c3287; /* Primary color */
            margin-bottom: 30px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
  
        }

        .table thead {
            background: #48276A;
        }

        .table thead tr th {
            font-size: 16px;
            font-weight: 700;
            color: white;
            padding: 15px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .table tbody tr {
            background-color: white;
            transition: background-color 0.3s ease;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .table tbody tr td {
            font-size: 14px;
            color: #333;
            padding: 12px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .view-btn {
            color: white;
            background: #6d39a2;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .view-btn:hover {
            background: #5a2d8a;
            transform: translateY(-1px);
        }

        .view-btn:active {
            transform: translateY(0);
        }
        .table thead tr th {
        background: #48276A;
		}
        /* Responsive Styles */
        @media (max-width: 768px) {
            .heading {
                font-size: 28px;
                font-weight: 600;
            }

            .table thead {
                display: none;
            }

            .table tbody tr {
                display: block;
                margin-bottom: 20px;
                background-color: white;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .table tbody tr td {
                display: flex;
                justify-content: space-between;
                text-align: left;
                padding: 10px 15px;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody tr td:last-child {
                border-bottom: none;
            }

            .table tbody tr td::before {
                content: attr(data-lable);
                font-weight: 600;
                flex-basis: 40%;
            }

            .table tbody tr td {
                flex-wrap: wrap;
                gap: 8px;
            }
        }
        @media (max-width: 456px) {
            .heading {
                font-size: 20px;
            }

            .table thead {
                display: none;
            }

            .table tbody tr {
                display: block;
                margin-bottom: 20px;
                background-color: white;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .table tbody tr td {
                display: flex;
                justify-content: space-between;
                text-align: left;
                padding: 10px 15px;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody tr td:last-child {
                border-bottom: none;
            }

            .table tbody tr td::before {
                content: attr(data-lable);
                font-weight: 600;
                flex-basis: 40%;
            }

            .table tbody tr td {
                flex-wrap: wrap;
                gap: 8px;
            }
        }
    </style>
</head>

<body  class='bg-violet-100'>
    <div class="table-container ">
        <h1 class="heading">Resolved Complaints</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Name</th>
                    <th>Mess</th>
                    <th>Date Filed</th>
                    <th>Campus</th>
                    <th>Description</th>
                    <th>View Report</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($resolved_complaints)): ?>
                    <?php foreach ($resolved_complaints as $complaint): ?>
                        <tr>
                            <td data-lable="Complaint ID"><?php echo $complaint->id; ?></td>
                            <td data-lable="Name"><?php echo $complaint->name; ?></td>
                            <td data-lable="Mess"><?php echo $complaint->mess; ?></td>
                            <td data-lable="Date Filed"><?php echo $complaint->date; ?></td>
                            <td data-lable="Campus"><?php echo $complaint->campus; ?></td>
                            <td data-lable="Description"><?php echo $complaint->food_complaints; ?></td>
                            <td data-lable="View Report">
                                <a href="<?php echo base_url('complaint/generate_report/' . $complaint->id); ?>">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No resolved complaints found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
