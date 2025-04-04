<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resolved Complaints</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Google Fonts (Roboto) -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<!-- Font Awesome for icons (used in footer) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}

		body {
			font-family: 'Roboto', Arial, sans-serif;
			background-color: #f5f5f5;
			display: flex;
			flex-direction: column;
			min-height: 100vh;
			position: relative;
		}

		/* Main Content Area - adjusts based on sidebar */
		.main-content {
			flex: 1;
			display: flex;
			flex-direction: column;
			padding: 120px 30px 0px;
			width: calc(100% - 200px);
			transition: margin-left 0.3s ease, width 0.3s ease;
			overflow-y: auto;
			margin-bottom: 0;
		}

		/* Table Container */
		.table-container {
			flex: 1;
			display: flex;
			flex-direction: column;
			width: 100%;
			max-width: 100%;
		}

		.heading {
			font-size: 36px;
			text-align: center;
			color: #5C3287;
			margin-bottom: 30px;
			font-weight: 700;
			text-transform: uppercase;
			letter-spacing: 1.5px;
		}

		/* Table Wrapper */
		.table-wrapper {
			margin-bottom: 0;
			overflow-x: auto;
			background-color: #fff;
			border-radius: 12px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			width: 100%;
			max-width: 100%;
		}

		.table {
			width: 100%;
			max-width: 100%;
			border-collapse: collapse;
			margin: 0;
		}

		.table, .table th, .table td {
			border: 1px solid #ddd;
		}

		.table th,
		.table td {
			padding: 15px 20px;
			text-align: center;
			font-size: 16px;
		}

		.table th {
			background-color: #48276A;
			color: white;
			font-weight: 700;
			cursor: pointer;
		}

		.table th:hover {
			background-color: #6B4591;
		}

		.table th.asc::after {
			content: " ↑";
		}

		.table th.desc::after {
			content: " ↓";
		}

		.table tbody tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		.table tbody tr:hover {
			background-color: #d8ebff;
		}

		.table tbody tr td {
			font-size: 14px;
			color: #333;
			overflow-wrap: break-word;
		}

		.table tbody tr td[colspan="7"] {
			padding: 40px;
			font-size: 18px;
			color: #666;
			text-align: center;
			background-color: #f9f9f9;
			border: none;
		}

		.view-btn {
			color: white;
			background: #6D39A2;
			border: none;
			padding: 8px 16px;
			border-radius: 3px;
			font-size: 14px;
			text-decoration: none;
			display: inline-block;
			transition: background-color 0.3s, transform 0.2s ease;
		}

		.view-btn:hover {
			background: #502C74;
			cursor: pointer;
			transform: translateY(-1px);
		}

		.view-btn:active {
			transform: translateY(0);
		}

		/* Footer styles */
		.footer-section {
			background-color: #212121;
			color: white;
			text-align: center;
			padding: 20px 0;
			margin-top: auto;
		}

		/* Added footer section styles from the second code */
		.footer-section h4 {
			font-size: 16px;
			font-weight: 500;
			margin-bottom: 10px;
			display: flex;
			align-items: center;
			gap: 8px;
		}

		.footer-section h4 i {
			font-size: 18px;
		}

		.footer-section p {
			font-size: 14px;
			line-height: 1.5;
			margin: 0;
		}

		.social-icons {
			display: flex;
			gap: 15px;
		}

		.social-icons a {
			color: white;
			font-size: 18px;
			transition: color 0.3s;
		}

		.social-icons a:hover {
			color: #6D39A2;
		}

		.footer-bottom {
			border-top: 1px solid rgba(255, 255, 255, 0.1);
			padding-top: 10px;
			text-align: left;
			font-size: 14px;
		}

		/* Sidebar collapsed state */
		body.sidebar-collapsed .main-content {
			width: calc(100% - 60px);
			margin-left: 60px;
		}

		/* Responsive Styles */
		@media (max-width: 768px) {
			.main-content {
				padding: 120px 15px 0;
				width: 100%;
				margin-left: 0;
			}

			body.sidebar-collapsed .main-content {
				width: 100%;
				margin-left: 0;
			}

			.heading {
				font-size: 28px;
				font-weight: 600;
				margin-bottom: 20px;
			}

			.table-wrapper {
				box-shadow: none;
			}

			.table {
				display: block;
				width: 100%;
			}

			.table thead {
				display: none;
			}

			.table tbody {
				display: block;
				width: 100%;
			}

			.table tbody tr {
				display: block;
				margin-bottom: 20px;
				background-color: white;
				box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
				border-radius: 8px;
				width: 100%;
			}

			.table tbody tr td {
				display: flex;
				justify-content: space-between;
				align-items: center;
				text-align: left;
				padding: 12px 15px;
				border: none;
				border-bottom: 1px solid #dee2e6;
				font-size: 13px;
				width: 100%;
			}

			.table tbody tr td:last-child {
				border-bottom: none;
			}

			.table tbody tr td::before {
				content: attr(data-label);
				font-weight: 600;
				flex-basis: 40%;
				color: #5C3287;
			}

			.table tbody tr td {
				flex-wrap: wrap;
				gap: 8px;
			}

			.table tbody tr td[colspan="7"] {
				padding: 20px;
				font-size: 16px;
				justify-content: center;
			}

			.view-btn {
				padding: 6px 12px;
				font-size: 13px;
				min-width: 60px;
				text-align: center;
			}

			/* Added mobile footer styles from the second code */
			.footer {
				padding: 15px 20px;
			}

			.footer-content {
				flex-direction: column;
				gap: 15px;
			}

			.footer-section {
				min-width: 100%;
			}

			.footer-section h4 {
				font-size: 14px;
			}

			.footer-section p {
				font-size: 12px;
			}

			.social-icons a {
				font-size: 16px;
			}

			.footer-bottom {
				font-size: 12px;
			}
		}

		@media (max-width: 456px) {
			.main-content {
				padding: 140px 10px 0;
			}

			.heading {
				font-size: 20px;
				margin-bottom: 15px;
			}

			.table tbody tr td {
				padding: 10px 12px;
				font-size: 12px;
			}

			.table tbody tr td::before {
				flex-basis: 50%;
			}

			.table tbody tr td[colspan="7"] {
				padding: 15px;
				font-size: 14px;
			}

			.view-btn {
				padding: 5px 10px;
				font-size: 12px;
				min-width: 50px;
			}
		}
	</style>
</head>

<body class='bg-violet-100'>
<!-- Note: Header and nav menu are imported from controller, not included here -->

<div class="main-content">
	<div class="table-container">
		<div class="table-wrapper">
			<table class="table">
				<thead>
				<tr>
					<th onclick="sortTable(0)">Complaint ID</th>
					<th onclick="sortTable(1)">Name</th>
					<th onclick="sortTable(2)">Mess</th>
					<th onclick="sortTable(3)">Date Filed</th>
					<th onclick="sortTable(4)">Campus</th>
					<th onclick="sortTable(5)">Description</th>
					<th>View Report</th>
				</tr>
				</thead>
				<tbody>
				<?php if (!empty($resolved_complaints)): ?>
					<?php foreach ($resolved_complaints as $complaint): ?>
						<tr>
							<td data-label="Complaint ID"><?php echo $complaint->id; ?></td>
							<td data-label="Name"><?php echo $complaint->name; ?></td>
							<td data-label="Mess"><?php echo $complaint->mess; ?></td>
							<td data-label="Date Filed"><?php echo $complaint->date; ?></td>
							<td data-label="Campus"><?php echo $complaint->campus; ?></td>
							<td data-label="Description"><?php echo $complaint->food_complaints; ?></td>
							<td data-label="View Report">
								<a href="<?php echo base_url('complaint/generate_report/' . $complaint->id); ?>" class="view-btn">View</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="7">No resolved complaints found</td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Note: Footer is imported from controller, not included here -->

<script>
	// Sort Table
	function sortTable(columnIndex) {
		const table = document.querySelector("tbody");
		const rows = Array.from(table.getElementsByTagName("tr"));
		const dataRows = rows.filter(row => row.cells.length > 1);
		const header = document.querySelectorAll("thead th")[columnIndex];
		const isAscending = header.classList.contains("asc");

		dataRows.sort((a, b) => {
			const aValue = a.cells[columnIndex].textContent.trim();
			const bValue = b.cells[columnIndex].textContent.trim();

			if (columnIndex === 0 || columnIndex === 3) { // Complaint ID or Date Filed
				return isAscending ?
					new Date(bValue) - new Date(aValue) || bValue.localeCompare(aValue) :
					new Date(aValue) - new Date(bValue) || aValue.localeCompare(bValue);
			}
			return isAscending ?
				bValue.localeCompare(aValue) :
				aValue.localeCompare(bValue);
		});

		while (table.firstChild) table.removeChild(table.firstChild);
		dataRows.forEach(row => table.appendChild(row));

		document.querySelectorAll("thead th").forEach(th => {
			th.classList.remove("asc", "desc");
		});
		header.classList.add(isAscending ? "desc" : "asc");
	}

	// Sidebar toggle functionality
	document.addEventListener('DOMContentLoaded', function() {
		// Get the sidebar toggle button
		const sidebarToggle = document.querySelector('.nav-toggle, [class*="menu"], .sidebar-toggle');

		// Check if toggle element exists
		if (sidebarToggle) {
			sidebarToggle.addEventListener('click', function() {
				// Toggle the sidebar collapsed class
				document.body.classList.toggle('sidebar-collapsed');

				// Adjust main content width and margin
				const mainContent = document.querySelector('.main-content');
				if (document.body.classList.contains('sidebar-collapsed')) {
					mainContent.style.width = 'calc(100% - 60px)';
					mainContent.style.marginLeft = '60px';
				} else {
					mainContent.style.width = 'calc(100% - 204px)';
					mainContent.style.marginLeft = '204px';
				}
			});
		}

		// Initial check for sidebar state on page load
		setTimeout(function() {
			if (document.body.classList.contains('sidebar-collapsed') ||
				document.body.classList.contains('sidebar-hidden')) {
				const mainContent = document.querySelector('.main-content');
				if (mainContent) {
					mainContent.style.width = 'calc(100% - 60px)';
					mainContent.style.marginLeft = '60px';
				}
				document.body.classList.add('sidebar-collapsed');
			}
		}, 100);
	});
</script>
</body>
</html>
