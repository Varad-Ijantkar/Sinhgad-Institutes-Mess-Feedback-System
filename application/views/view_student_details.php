<!-- view_student_details.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Details</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
	<style>
		:root {
			--primary-color: rgb(87, 49, 125);
			--primary-light: rgba(87, 49, 125, 0.1);
			--primary-hover: rgb(107, 69, 145);
			--background-color: #f5f7fb;
			--card-background: #ffffff;
			--border-color: #e1e1e3;
			--text-color: #333333;
			--shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
		}

		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		body {
			font-family: 'Quicksand', sans-serif;
			background-color: var(--background-color);
			color: var(--text-color);
			line-height: 1.6;
		}

		.content {
			margin-left: 200px;
			margin-top: 120px;
			padding: 2rem;
			width: calc(100% - 200px);
			min-height: calc(100vh - 120px);
			transition: margin-left 0.3s ease, width 0.3s ease;
			display: flex;
			flex-direction: column;
		}

		.content.expanded {
			margin-left: 0;
			width: 100%;
		}

		.heading {
			text-align: center;
			margin-bottom: 2.5rem;
		}

		h2 {
			color: var(--primary-color);
			font-size: 2.2rem;
			font-weight: 700;
			margin-bottom: 1.5rem;
			text-align: center;
		}

		.table-wrapper {
			background-color: var(--card-background);
			border-radius: 16px;
			overflow-x: auto;
			overflow-y: auto;
			box-shadow: var(--shadow);
			flex: 1;
			width: 100%;
			margin-top: 1rem;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			min-width: 100%;
		}

		th {
			background-color: var(--primary-color);
			color: white;
			font-weight: 600;
			text-align: left;
			padding: 1rem;
			font-size: 0.95rem;
			position: sticky;
			top: 0;
			z-index: 1;
		}

		th:hover {
			background-color: var(--primary-hover);
		}

		td {
			padding: 1rem;
			border-bottom: 1px solid var(--border-color);
			font-size: 0.95rem;
		}

		tr:last-child td {
			border-bottom: none;
		}

		tr:nth-child(even) {
			background-color: rgba(87, 49, 125, 0.03);
		}

		tr:hover {
			background-color: var(--primary-light);
		}

		.alert {
			padding: 1rem;
			border-radius: 8px;
			margin-bottom: 1.5rem;
			font-weight: 500;
		}

		.alert-success {
			background-color: #d4edda;
			color: #155724;
			border: 1px solid #c3e6cb;
		}

		.alert-danger {
			background-color: #f8d7da;
			color: #721c24;
			border: 1px solid #f5c6cb;
		}

		.edit-btn {
			background-color: var(--primary-color);
			color: white;
			border: none;
			padding: 8px 16px;
			border-radius: 4px;
			cursor: pointer;
			transition: background-color 0.3s ease;
			font-size: 0.95rem;
			font-weight: 500;
		}

		.edit-btn:hover {
			background-color: var(--primary-hover);
		}

		.add-btn {
			background-color: var(--primary-color);
			color: white;
			border: none;
			padding: 12px 24px;
			border-radius: 8px;
			cursor: pointer;
			transition: background-color 0.3s ease;
			font-size: 1rem;
			font-weight: 600;
			display: block;
			width: fit-content;
			margin: 2rem auto 0;
			text-decoration: none;
		}

		.add-btn:hover {
			background-color: var(--primary-hover);
		}

		.empty-message {
			text-align: center;
			padding: 2rem;
			color: #666;
			font-style: italic;
		}

		@media (max-width: 1024px) {
			.content {
				margin-left: 0;
				width: 100%;
				margin-top: 80px;
			}
		}

		@media (max-width: 768px) {
			.content {
				padding: 1.5rem;
			}

			th, td {
				padding: 0.8rem;
				font-size: 0.9rem;
			}

			h2 {
				font-size: 1.8rem;
			}
		}

		@media (max-width: 576px) {
			.content {
				padding: 1rem;
			}

			th, td {
				font-size: 0.85rem;
				padding: 0.7rem;
			}

			h2 {
				font-size: 1.5rem;
			}

			.table-wrapper {
				border-radius: 12px;
			}
		}
	</style>
</head>
<body>
<div class="content">
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
				<th>Edit Details</th>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($students)): ?>
				<?php foreach ($students as $student): ?>
					<tr>
						<td><?php echo htmlspecialchars($student->email); ?></td>
						<td><?php echo htmlspecialchars($student->name); ?></td>
						<td><?php echo htmlspecialchars($student->phone); ?></td>
						<td><?php echo htmlspecialchars($student->college); ?></td>
						<td><?php echo htmlspecialchars($student->campus); ?></td>
						<td><?php echo htmlspecialchars($student->mess); ?></td>
						<td>
							<button class="edit-btn" data-edit-url="<?php echo base_url('admin_dashboard/edit_student_details/' . $student->id); ?>">Edit</button>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7" class="empty-message">No student details found</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	// Handle "Edit" button clicks
	document.addEventListener('DOMContentLoaded', function() {
		const editButtons = document.getElementsByClassName("edit-btn");

		Array.from(editButtons).forEach(button => {
			button.addEventListener('click', function() {
				const editUrl = this.getAttribute("data-edit-url");
				window.location.href = editUrl;
			});
		});
	});
</script>
</body>
</html>
