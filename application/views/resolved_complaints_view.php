<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resolved Complaints</title>
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
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		html,
		body {
			height: 100%;
			font-family: 'Quicksand', sans-serif;
			background-color: var(--background-color);
			color: var(--text-color);
			line-height: 1.6;
			overflow-x: hidden;
		}

		.content {
			margin-left: 200px;
			margin-top: 120px;
			padding: 2rem;
			width: calc(100% - 200px);
			min-height: calc(100vh - 120px);
			transition: all 0.3s ease;
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
		}

		h3 {
			color: var(--primary-color);
			font-size: 1.4rem;
			font-weight: 600;
		}

		.filters-container {
			background-color: var(--card-background);
			border-radius: 16px;
			padding: 1.5rem;
			margin-bottom: 2rem;
			box-shadow: var(--shadow);
			width: 100%;
		}

		.filters {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 1rem;
		}

		select,
		input {
			width: 100%;
			padding: 0.8rem 1rem;
			border: 2px solid var(--border-color);
			border-radius: 8px;
			font-family: 'Quicksand', sans-serif;
			font-size: 0.95rem;
			background-color: var(--card-background);
			color: var(--text-color);
			transition: all 0.3s ease;
		}

		select:hover,
		input:hover,
		select:focus,
		input:focus {
			border-color: var(--primary-color);
			outline: none;
			box-shadow: 0 0 0 3px var(--primary-light);
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
			cursor: pointer;
			position: sticky;
			top: 0;
			z-index: 1;
		}

		th:hover {
			background-color: var(--primary-hover);
		}

		th.asc::after {
			content: " ↑";
		}

		th.desc::after {
			content: " ↓";
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
			margin-bottom: 1rem;
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

		a {
			color: var(--primary-color);
			text-decoration: none;
			font-weight: 600;
			transition: color 0.3s ease;
		}


		.btn {
			background-color: var(--primary-color);
			color: white;
			border: none;
			padding: 0.5rem 1rem;
			border-radius: 6px;
			cursor: pointer;
			font-weight: 600;
			transition: background-color 0.3s ease;
		}

		.btn:hover {
			background-color: var(--primary-hover);
		}

		@media (max-width: 768px) {
			.content {
				padding: 1rem;
				margin-left: 0;
				width: 100%;
				margin-top: 80px;
			}

			h2 {
				font-size: 1.8rem;
			}

			.filters {
				grid-template-columns: 1fr;
			}

			th,
			td {
				padding: 0.8rem;
				font-size: 0.9rem;
			}
		}
	</style>
</head>

<body>
<div class="content">

	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
	<?php elseif ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>

	<div class="filters-container">
		<div class="filters">
			<select id="filterMess" onchange="filterTable()">
				<option value="">Filter by Mess</option>
				<?php if (!empty($messes)): foreach ($messes as $mess): ?>
					<option value="<?php echo htmlspecialchars($mess['mess_id']); ?>">
						<?php echo htmlspecialchars($mess['mess_name']); ?>
					</option>
				<?php endforeach;
				endif; ?>
			</select>
			<select id="filterCampus" onchange="filterTable()">
				<option value="">Filter by Campus</option>
				<?php if (!empty($campuses)): foreach ($campuses as $campus): ?>
					<option value="<?php echo htmlspecialchars($campus['campus_id']); ?>">
						<?php echo htmlspecialchars($campus['campus_name']); ?>
					</option>
				<?php endforeach;
				endif; ?>
			</select>
			<input type="text" id="searchBar" placeholder="Search complaints..." onkeyup="filterTable()">
		</div>
	</div>

	<div class="table-wrapper">
		<table>
			<thead>
			<tr>
				<th onclick="sortTable(0)">Complaint ID</th>
				<th onclick="sortTable(1)">Name</th>
				<th onclick="sortTable(2)">Mess</th>
				<th onclick="sortTable(3)">Campus</th>
				<th onclick="sortTable(4)">Meal Time</th>
				<th onclick="sortTable(5)">Date Filed</th>
				<th onclick="sortTable(6)">Accepted At</th>
				<th onclick="sortTable(7)">Resolved At</th>
				<th onclick="sortTable(8)">Resolved By</th>
				<th onclick="sortTable(9)">Status</th>
				<th>View Report</th>
				<?php if (isset($role) && $role === 'supervisor'): ?>
					<th>Action</th>
				<?php endif; ?>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($resolved_complaints)): ?>
				<?php foreach ($resolved_complaints as $complaint): ?>
					<tr data-mess-id="<?php echo htmlspecialchars($complaint['mess_id']); ?>"
						data-campus-id="<?php echo htmlspecialchars($complaint['campus_id']); ?>">
						<td><?php echo htmlspecialchars($complaint['id']); ?></td>
						<td><?php echo htmlspecialchars($complaint['name']); ?></td>
						<td><?php echo htmlspecialchars($complaint['mess']); ?></td>
						<td><?php echo htmlspecialchars($complaint['campus']); ?></td>
						<td><?php echo htmlspecialchars($complaint['meal_time']); ?></td>
						<td><?php echo htmlspecialchars($complaint['date']); ?></td>
						<td><?php echo $complaint['accepted_at'] ? htmlspecialchars(date('Y-m-d H:i', strtotime($complaint['accepted_at']))) : 'N/A'; ?></td>
						<td><?php echo $complaint['resolved_at'] ? htmlspecialchars(date('Y-m-d H:i', strtotime($complaint['resolved_at']))) : 'N/A'; ?></td>
						<td><?php echo htmlspecialchars($complaint['vendor_name'] ?: 'N/A'); ?></td>
						<td><?php echo htmlspecialchars($complaint['status']); ?></td>
						<td><a href="<?php echo base_url('admin_resolved_complaints/generate_report/' . htmlspecialchars($complaint['id'])); ?>">View</a></td>
						<?php if (isset($role) && $role === 'supervisor'): ?>
							<td>
								<?php if ($complaint['status'] === 'completed'): ?>
									<form method="post" action="<?php echo base_url('Admin_Resolved_Complaints/mark_as_resolved'); ?>">
										<input type="hidden" name="complaint_id" value="<?php echo htmlspecialchars($complaint['id']); ?>">
										<button type="submit" class="btn">Mark as Resolved</button>
									</form>
								<?php elseif ($complaint['status'] === 'resolved'): ?>
									<span>Completed</span>
								<?php endif; ?>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="<?php echo (isset($role) && $role === 'supervisor') ? 12 : 11; ?>" style="text-align: center;">
						No completed complaints found
					</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	function filterTable() {
		const searchQuery = document.getElementById("searchBar").value.toLowerCase();
		const messFilter = document.getElementById("filterMess").value;
		const campusFilter = document.getElementById("filterCampus").value;
		const rows = document.querySelectorAll("tbody tr");

		rows.forEach(row => {
			// Skip the "No completed complaints" row
			if (row.cells.length === 1) return;

			const messId = row.getAttribute("data-mess-id");
			const campusId = row.getAttribute("data-campus-id");

			let matchesSearch = false;
			for (let cell of row.cells) {
				if (cell.textContent.toLowerCase().includes(searchQuery)) {
					matchesSearch = true;
					break;
				}
			}

			const matchesMess = !messFilter || messId === messFilter;
			const matchesCampus = !campusFilter || campusId === campusFilter;

			row.style.display = (matchesSearch && matchesMess && matchesCampus) ? "" : "none";
		});
	}

	function sortTable(columnIndex) {
		const table = document.querySelector("tbody");
		const rows = Array.from(table.getElementsByTagName("tr"));
		const dataRows = rows.filter(row => row.cells.length > 1);
		const header = document.querySelectorAll("thead th")[columnIndex];
		const isAscending = header.classList.contains("asc");

		dataRows.sort((a, b) => {
			const aValue = a.cells[columnIndex].textContent.trim();
			const bValue = b.cells[columnIndex].textContent.trim();

			if (columnIndex === 0) { // Complaint ID (numeric)
				return isAscending ? parseInt(bValue) - parseInt(aValue) : parseInt(aValue) - parseInt(bValue);
			} else if (columnIndex === 5 || columnIndex === 6 || columnIndex === 7) { // Date columns
				const dateA = aValue === 'N/A' ? 0 : new Date(aValue);
				const dateB = bValue === 'N/A' ? 0 : new Date(bValue);
				return isAscending ? dateB - dateA : dateA - dateB;
			} else { // Text columns
				return isAscending ? bValue.localeCompare(aValue) : aValue.localeCompare(bValue);
			}
		});

		// Clear table and append sorted rows
		while (table.firstChild) table.removeChild(table.firstChild);
		dataRows.forEach(row => table.appendChild(row));

		// Update sort indicators
		document.querySelectorAll("thead th").forEach(th => {
			th.classList.remove("asc", "desc");
		});
		header.classList.add(isAscending ? "desc" : "asc");
	}

	document.addEventListener('DOMContentLoaded', () => {
		filterTable();
	});
</script>
</body>

</html>
