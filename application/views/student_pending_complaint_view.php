<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pending Complaints</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
	<style>
		/* General reset for body and html */
		html,
		body {
			height: 100%;
			margin: 0;
			box-sizing: border-box;
		}

		/* Responsive container for content */
		.content {
			padding: 20px;
			margin: 20px auto;
			max-width: 1200px;
		}

		.pending_view {
			margin-left: auto;
			margin-right: auto;
		}

		.pending_view h2 {
			text-align: center;
			color: black;
			font-weight: bold;
		}

		/* Wrapper for making the table scrollable */
		.table-wrapper {
			overflow-x: auto;
			/* Enable horizontal scroll */
			-webkit-overflow-scrolling: touch;
			/* Smooth scrolling on mobile */
		}

		/* Table styles */
		table {
			width: 100%;
			border-collapse: collapse;
			margin: 20px 0;
			background-color: #fff;
			border-radius: 12px;
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
		}

		table,
		th,
		td {
			padding: 12px 15px;
			border: 1px solid #ddd;
		}

		th {
			background-color:rgb(87, 49, 125);
			/* Purple */
			color: white;
			text-align: left;
			font-weight: 700;
		}

		tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		tr:hover {
			background-color: #f1f1f1;
		}

		th,
		td {
			text-align: left;
			word-wrap: break-word;
			font-size: 14px;
		}

		/* Styling for hover effect on rows */
		tr:hover {
			background-color: #f3e5f5;
		}

		/* Responsive styles */
		@media (max-width: 768px) {
			.content {
				margin: 10px;
				padding: 10px;
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
				/* Prevent text wrapping on small screens */
			}
		}
	</style>
</head>

<body>

<!-- Main content area -->
<div class="content pending_view">
	<h2>Pending Complaints</h2>

	<div class="table-wrapper">
		<table>
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
			<?php if (!empty($pending_complaints)): ?>
				<?php foreach ($pending_complaints as $complaint): ?>
					<tr>
						<td><?php echo $complaint->id; ?></td>
						<td><?php echo $complaint->name; ?></td>
						<td><?php echo $complaint->mess; ?></td>
						<td><?php echo $complaint->date; ?></td>
						<td><?php echo $complaint->campus; ?></td>
						<td><?php echo $complaint->food_complaints; ?></td>
						<td>
							<a href="<?php echo base_url('complaint/generate_report/' . $complaint->id); ?>">View</a> <!-- Updated View hyperlink -->
						</td>

					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7">No pending complaints found</td> <!-- Updated colspan to 7 -->
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
</body>
<?php $this->load->view('template/footer'); ?>
</html>
