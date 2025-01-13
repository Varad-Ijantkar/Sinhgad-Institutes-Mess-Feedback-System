<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Student Details</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
	<style>
		html,
		body {
			height: 100%;
			margin: 0;
			box-sizing: border-box;
		}

		.main-content {
			padding: 20px;
			display: flex;
			flex-direction: column;
			align-items: center;
			font-family: 'Quicksand', sans-serif;
		}

		h2 {
			font-family: sans-serif;
			color: hsl(270, 46.20%, 28.40%);
			margin-bottom: 20px;
			text-align: center;
			font-weight: bold;
		}

		.table-wrapper {
			width: 86%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
			margin-left: 14%;
		}

		table {
			width: 95%;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
			margin-left:5%;
		}

		table,
		th,
		td {
			padding: 12px;
			border: 1px solid #ddd;
		}

		th {
			background-color: rgb(87, 49, 125);
			color: white;
			text-align: left;
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
			text-align: left;
			word-wrap: break-word;
			font-size: 14px;
		}

		.alert {
			margin-bottom: 20px;
			padding: 10px;
			border-radius: 5px;
		}

		.alert-success {
			color: #155724;
			background-color: #d4edda;
			border-color: #c3e6cb;
		}

		.alert-danger {
			color: #721c24;
			background-color: #f8d7da;
			border-color: #f5c6cb;
		}

		/* Responsive styles */
		@media (max-width: 768px) {
			.table-wrapper {
				padding: 0 10px;
			}

			table,
			s th,
			td {
				font-size: 14px;
				padding: 8px;
				height: 50;
			}


			h2 {
				font-size: 1.8rem;
			}

			.table-wrapper::-webkit-scrollbar {
				display: none;
			}
		}

		@media (max-width: 576px) {
			.table-wrapper {
				padding: 0 5px;
				margin: 0;
				width: 100%;
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
				font-size: 1.5rem;
			}
		}
	</style>
</head>

<body>
	<div class="main-content">
		<h2>Student Details</h2>

		<!-- Success/Error Messages -->
		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
		<?php endif; ?>

		<!-- Student Details Table -->
		<div class="table-wrapper">
			<table>
				<thead>
					<tr>
						<th>Email</th>
						<th>Name</th>
						<th>Phone</th>
						<th>College</th>
						<th>Campus</th>
						<th>Mess</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($students)): ?>
						<?php foreach ($students as $student): ?>
							<tr>
								<td><?php echo $student->email; ?></td>
								<td><?php echo $student->name; ?></td>
								<td><?php echo $student->phone; ?></td>
								<td><?php echo $student->college; ?></td>
								<td><?php echo $student->campus; ?></td>
								<td><?php echo $student->mess; ?></td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="6" class="text-center">No student details found</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</body>

</html>
