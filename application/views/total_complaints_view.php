<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Complaints</title>
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
            margin: 0 auto;
        }

        .total_view {
            width: 100%;
        }

        .total_view h2 {
            font-family: sans-serif;
            text-align: center;
            color: hsl(270, 46.20%, 28.40%);
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            display: block;
            margin: 0 auto;
            width: 86%;
            margin-left: 14%;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
			margin-left:60px
        }

        table,
        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background-color: rgb(87, 49, 125);
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f3e5f5;
        }

        th,
        td {
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .content {
                padding: 10px;
            }

            .table-wrapper {
                padding: 0 10px;
            }

            table,
            th,
            td {
                font-size: 14px;
                padding: 10px;
            }

            h2 {
                font-size: 25px;
            }

            .table-wrapper::-webkit-scrollbar {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .table-wrapper {
                padding: 0 5px;
                margin-left: 8px;
                width: 95%;
            }

            table,
            th,
            td {
                font-size: 14px;
                padding: 8px;
                height: 50;
            }

            th,
            td {
                white-space: nowrap;
            }

            h2 {
                font-size: 20px;
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
					<th>Food Complaints</th>
					<th>Status</th>
					<th>View Report</th>
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
							<td><?php echo isset($complaint['food_complaints']) ? $complaint['food_complaints'] : 'N/A'; ?></td>
							<td><?php echo $complaint['status']; ?></td>
							<td>
								<a href="<?php echo base_url('admin_resolved_complaints/generate_report/' . $complaint['id']); ?>">View</a>
							</td>
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
</body>

</html>
