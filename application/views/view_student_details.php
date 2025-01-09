<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Student Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		/* Adjust content to accommodate the navigation menu */
		.main-content {
			margin-left: 250px; /* Offset by the width of the navigation menu */
			padding: 20px;
			box-sizing: border-box;
			overflow-x: auto; /* Prevent horizontal overflow */
		}

		.container {
			max-width: calc(100% - 250px); /* Ensure content stays within the viewport */
		}

		table {
			width: 100%;
		}

		/* Responsive adjustments for smaller screens */
		@media (max-width: 768px) {
			.main-content {
				margin-left: 0;
			}

			.container {
				max-width: 100%;
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
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
