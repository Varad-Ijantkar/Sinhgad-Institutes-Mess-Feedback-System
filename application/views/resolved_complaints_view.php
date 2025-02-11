<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Total Complaints</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
	<style>
		:root {
			--primary-color: rgb(87, 49, 125);
			--primary-light: rgba(87, 49, 125, 0.1);
			--primary-hover: rgb(107, 69, 145);
			--background-color: #f5f5f7;
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

		html, body {
			height: 100%;
			font-family: 'Quicksand', sans-serif;
			background-color: var(--background-color);
			color: var(--text-color);
			line-height: 1.6;
		}

		.content {
			max-width: 1400px;
			margin: 0 auto;
			padding: 2rem;
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
		}

		.filters {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
			gap: 1rem;
		}

		select, input {
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

		select:hover, input:hover,
		select:focus, input:focus {
			border-color: var(--primary-color);
			outline: none;
			box-shadow: 0 0 0 3px var(--primary-light);
		}

		.table-wrapper {
			background-color: var(--card-background);
			border-radius: 16px;
			overflow: hidden;
			box-shadow: var(--shadow);
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th {
			background-color: var(--primary-color);
			color: white;
			font-weight: 600;
			text-align: left;
			padding: 1rem;
			font-size: 0.95rem;
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

		a:hover {
			color: var(--primary-hover);
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
			}

			h2 {
				font-size: 1.8rem;
			}

			.filters {
				grid-template-columns: 1fr;
			}

			th, td {
				padding: 0.8rem;
				font-size: 0.9rem;
			}
		}
	</style>
</head>
<body>
<div class="content">
	<div class="heading">
		<h2>Resolved Complaints</h2>
		<h3>Role: <?php echo isset($role) ? $role : 'Not set'; ?></h3>
	</div>

	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
	<?php elseif ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>

	<div class="filters-container">
		<div class="filters">
			<select id="filterMess" onchange="filterTable()">
				<option value="">Filter by Mess</option>
				<?php
				if (!empty($messes)) {
					foreach ($messes as $mess): ?>
						<option value="<?php echo htmlspecialchars($mess['mess_id']); ?>">
							<?php echo htmlspecialchars($mess['mess_name']); ?>
						</option>
					<?php endforeach;
				}
				?>
			</select>

			<select id="filterCollege" onchange="filterTable()">
				<option value="">Filter by College</option>
				<?php
				if (!empty($colleges)) {
					foreach ($colleges as $college): ?>
						<option value="<?php echo htmlspecialchars($college['college_id']); ?>">
							<?php echo htmlspecialchars($college['college_name']); ?>
						</option>
					<?php endforeach;
				}
				?>
			</select>

			<select id="sortFilter" onchange="sortTable()">
				<option value="">Sort By</option>
				<option value="id">Complaint ID</option>
				<option value="name">Name</option>
				<option value="date">Date Filed</option>
			</select>

			<input type="text" id="searchBar" placeholder="Search complaints..." onkeyup="filterTable()">
		</div>
	</div>

	<div class="table-wrapper">
		<table>
			<thead>
			<tr>
				<th>Complaint ID</th>
				<th>Name</th>
				<th>Mess</th>
				<th>Meal Time</th>
				<th>College</th>
				<th>Date Filed</th>
				<th>Description</th>
				<th>View Report</th>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($resolved_complaints)): ?>
				<?php foreach ($resolved_complaints as $complaint): ?>
					<tr data-mess-id="<?php echo $complaint['mess_id']; ?>"
						data-college-id="<?php echo $complaint['college_id']; ?>">
						<td><?php echo $complaint['id']; ?></td>
						<td><?php echo $complaint['name']; ?></td>
						<td><?php echo $complaint['mess']; ?></td>
						<td><?php echo $complaint['meal_time']; ?></td>
						<td><?php echo $complaint['college']; ?></td>
						<td><?php echo $complaint['date']; ?></td>
						<td><?php echo $complaint['description']; ?></td>
						<td>
							<a href="<?php echo base_url('admin_pending_complaints/generate_report/' . $complaint['id']); ?>">View</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="<?php echo !in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head']) ? 9 : 8; ?>" style="text-align: center;">
						No pending complaints found
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
		const collegeFilter = document.getElementById("filterCollege").value;
		const rows = document.querySelectorAll("tbody tr");

		rows.forEach(row => {
			if (row.cells.length === 1) return;

			const messId = row.getAttribute("data-mess-id");
			const collegeId = row.getAttribute("data-college-id");

			let matchesSearch = false;
			for (let cell of row.cells) {
				if (cell.textContent.toLowerCase().includes(searchQuery)) {
					matchesSearch = true;
					break;
				}
			}

			const matchesMess = !messFilter || messId === messFilter;
			const matchesCollege = !collegeFilter || collegeId === collegeFilter;

			row.style.display = (matchesSearch && matchesMess && matchesCollege) ? "" : "none";
		});
	}

	function sortTable() {
		const table = document.querySelector("tbody");
		const sortBy = document.getElementById("sortFilter").value;
		if (!sortBy) return;

		const rows = Array.from(table.getElementsByTagName("tr"));
		const dataRows = rows.filter(row => row.cells.length > 1);

		const columnIndices = {
			'id': 0,
			'name': 1,
			'date': 5
		};

		const columnIndex = columnIndices[sortBy];
		if (columnIndex === undefined) return;

		dataRows.sort((a, b) => {
			const aValue = a.cells[columnIndex].textContent.trim();
			const bValue = b.cells[columnIndex].textContent.trim();

			switch(sortBy) {
				case 'id':
					return parseInt(aValue) - parseInt(bValue);
				case 'date':
					const dateA = new Date(aValue);
					const dateB = new Date(bValue);
					if (isNaN(dateA.getTime()) && isNaN(dateB.getTime())) return 0;
					if (isNaN(dateA.getTime())) return 1;
					if (isNaN(dateB.getTime())) return -1;
					return dateA - dateB;
				case 'name':
					return aValue.toLowerCase().localeCompare(bValue.toLowerCase());
				default:
					return 0;
			}
		});

		while (table.firstChild) {
			table.removeChild(table.firstChild);
		}

		const currentSortOrder = table.getAttribute('data-sort-order') || 'asc';
		if (currentSortOrder === 'asc') {
			dataRows.reverse();
			table.setAttribute('data-sort-order', 'desc');
		} else {
			table.setAttribute('data-sort-order', 'asc');
		}

		dataRows.forEach(row => table.appendChild(row));
	}

	document.addEventListener('DOMContentLoaded', () => {
		filterTable();
		document.getElementById("searchBar").addEventListener("input", filterTable);
		document.getElementById("filterMess").addEventListener("change", filterTable);
		document.getElementById("filterCollege").addEventListener("change", filterTable);
		document.getElementById("sortFilter").addEventListener("change", sortTable);
	});
</script>
</body>
</html>
