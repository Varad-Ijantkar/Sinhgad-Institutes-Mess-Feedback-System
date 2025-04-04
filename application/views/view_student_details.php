<!-- view_student_details.php -->
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
					<td colspan="7" style="text-align: center;">No student details found</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

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
		margin-bottom: 1rem;
		font-family: 'Quicksand', sans-serif;
	}

	.table-wrapper {
		background-color: var(--card-background);
		border-radius: 16px;
		overflow-x: auto;
		overflow-y: auto;
		box-shadow: var(--shadow);
		flex: 1;
		width: 100%;
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
		font-family: 'Quicksand', sans-serif;
	}

	th:hover {
		background-color: var(--primary-hover);
	}

	td {
		padding: 1rem;
		border-bottom: 1px solid var(--border-color);
		font-size: 0.95rem;
		font-family: 'Quicksand', sans-serif;
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
		margin-bottom: 1rem;
		font-weight: 500;
		font-family: 'Quicksand', sans-serif;
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

	a {
		color: var(--primary-color);
		text-decoration: none;
		font-weight: 600;
		transition: color 0.3s ease;
		font-family: 'Quicksand', sans-serif;
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
		font-family: 'Quicksand', sans-serif;
	}

	.edit-btn:hover {
		background-color: var(--primary-hover);
	}

	@media (max-width: 768px) {
		.content {
			padding: 1rem;
			margin-left: 0;
			width: 100%;
		}

<<<<<<< HEAD
		th, td {
			padding: 0.8rem;
			font-size: 0.9rem;
=======
		.main-content {
			padding: 20px;
			/* display: flex; */
			flex-direction: column;
			align-items: center;
			font-family: 'Quicksand', sans-serif;
>>>>>>> 653082fe90c7982545e175e46d78242fe8873695
		}
		.content {
			justify-content: center;
			align-items: center;
			flex-grow: 1;
			padding: 20px;
			flex-direction: column;
			margin-left: 0;
			transition: all 0.3s ease;
		}

		.content.expanded {
			margin-left: 250px;
		}
		.content {
			justify-content: center;
			align-items: center;
			flex-grow: 1;
			padding: 20px;
			flex-direction: column;
			margin-left: 0;
			transition: all 0.3s ease;
		}

		.content.expanded {
			margin-left: 250px;
		}

		h2 {
			font-size: 1.8rem;
		}
	}

	@media (max-width: 576px) {
		th, td {
			font-size: 0.85rem;
			padding: 0.6rem;
		}

<<<<<<< HEAD
		h2 {
			font-size: 1.5rem;
=======
		.table-wrapper {
			width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
			margin: 0;
<<<<<<< Updated upstream
=======
>>>>>>> 653082fe90c7982545e175e46d78242fe8873695
>>>>>>> Stashed changes
		}
	}
</style>

<<<<<<< HEAD
<script>
	// Handle "Edit" button clicks
	const editButtons = document.getElementsByClassName("edit-btn");

	Array.from(editButtons).forEach(button => {
		button.onclick = function() {
			const editUrl = this.getAttribute("data-edit-url");
			window.location.href = editUrl;
		};
	});
</script>
=======
		table {
			width: 100%;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
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
    <div class="main-content content">
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
                        <th>Edit Details</th> <!-- New Column -->
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
								<td><a href="<?php echo base_url('admin_dashboard/edit_student_details/' . $student->id); ?>">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No student details found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
		<!-- <a href='admin_dashboard/add_student_details'>Add Student Details+</a> -->
    </div>
</body>
</html>
>>>>>>> 653082fe90c7982545e175e46d78242fe8873695
