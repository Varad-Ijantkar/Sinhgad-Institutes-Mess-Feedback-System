<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Student Details</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: 'Quicksand', sans-serif;
			box-sizing: border-box;
		}

		.main-content {
			padding: 20px;
			margin-left: -16%;
			display: flex;
			justify-content: center;
		}

		.main-content h2{
			color: hsl(270, 46.20%, 28.40%);
			margin-left: 28%;
		}
		.table-wrapper {
			-webkit-overflow-scrolling: touch;
			display: flex;
			justify-content: center;
            width: 155%;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin: 20px 0;
			background-color: #fff;
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
		}

		table,
		th,
		td {
			padding: 12px 15px;
			border: 1px solid #ddd;
			height: 50px;
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

		@media (max-width: 768px) {
			.main-content {
				margin-left: 0;
				padding: 10px;
			}

			.container {
				max-width: 100%;
			}

			table,
			th,
			td {
				font-size: 14px;
				padding: 10px;
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
	<div class="main-content">
		<div class="container">
			<h2 class="text-center mb-4">Student Details</h2>

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
