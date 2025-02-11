<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pending Complaints</title>
	<style>
		html, body {
			height: 100%;
			margin: 0;
			box-sizing: border-box;
			font-family: 'Quicksand', sans-serif;
		}

		.pending_view {
			padding: 20px;
		}

		.heading {
			margin-top: 30px;
			margin-bottom: 30px;
		}

		.heading h2, .heading h3 {
			font-family: sans-serif;
			text-align: center;
			color: rgb(87, 49, 125);
			margin: 10px 0;
		}

		.filters {
			background-color: #fff;
			padding: 20px;
			border-radius: 12px;
			margin-bottom: 20px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
			display: flex;
			gap: 15px;
			flex-wrap: wrap;
		}

		.filters select, .filters input {
			padding: 10px 15px;
			border: 1px solid #ddd;
			border-radius: 6px;
			font-size: 14px;
			flex: 1;
			min-width: 200px;
			outline: none;
			transition: border-color 0.3s;
		}

		.filters select:hover, .filters input:hover {
			border-color: rgb(87, 49, 125);
		}

		.filters select:focus, .filters input:focus {
			border-color: rgb(87, 49, 125);
			box-shadow: 0 0 0 2px rgba(87, 49, 125, 0.1);
		}

		.table-wrapper {
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
			background-color: #fff;
			border-radius: 12px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin: 0;
		}

		table, th, td {
			border: 1px solid #ddd;
		}

		th, td {
			padding: 12px 15px;
			text-align: left;
			font-size: 14px;
		}

		th {
			background-color: rgb(87, 49, 125);
			color: white;
			font-weight: 700;
		}

		tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		tr:hover {
			background-color: #f3e5f5;
		}

		.center-align {
			text-align: center;
		}

		.center-align button {
			background: rgb(87, 49, 125);
			color: white;
			border: none;
			padding: 8px 16px;
			border-radius: 4px;
			cursor: pointer;
			transition: background 0.3s;
		}

		.center-align button:hover {
			background: rgb(107, 69, 145);
		}

		@media (max-width: 768px) {
			.pending_view {
				margin-left: 0;
				padding: 10px;
			}

			.filters {
				flex-direction: column;
			}

			.filters select, .filters input {
				width: 100%;
				min-width: unset;
			}
		}
	</style>
</head>
<body>
<div class="heading">
	<h2>Pending Complaints</h2>
	<h3>Role: <?php echo isset($role) ? $role : 'Not set'; ?></h3>
</div>
<div class="pending_view">
	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('message'); ?>
		</div>
	<?php elseif ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>

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
				<?php if (!in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head'])): ?>
					<th>Action</th>
				<?php endif; ?>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($pending_complaints)): ?>
				<?php foreach ($pending_complaints as $complaint): ?>
					<tr data-mess-id="<?php echo $complaint['mess_id']; ?>"
						data-college-id="<?php echo $complaint['college_id']; ?>">
						<td><?php echo $complaint['id']; ?></td>
						<td><?php echo $complaint['name']; ?></td>
						<td><?php echo $complaint['mess']; ?></td>
						<td><?php echo $complaint['date']; ?></td>
						<td><?php echo $complaint['meal_time']; ?></td>
						<td><?php echo $complaint['college']; ?></td>
						<td><?php echo $complaint['description']; ?></td>
						<td>
							<a href="<?php echo base_url('admin_pending_complaints/generate_report/' . $complaint['id']); ?>">View</a>
						</td>
						<?php if (!in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head'])): ?>
							<td class="center-align">
								<form method="post" action="<?php echo base_url('Admin_Pending_Complaints/mark_as_resolved'); ?>">
									<input type="hidden" name="complaint_id" value="<?php echo $complaint['id']; ?>">
									<button type="submit">Resolve</button>
								</form>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="<?php echo !in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head']) ? 8 : 7; ?>" class="center-align">
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
			// Skip the "No pending complaints" row
			if (row.cells.length === 1) return;

			const messId = row.getAttribute("data-mess-id");
			const collegeId = row.getAttribute("data-college-id");  // Changed from data-campus-id

			let matchesSearch = false;
			for (let cell of row.cells) {
				if (cell.textContent.toLowerCase().includes(searchQuery)) {
					matchesSearch = true;
					break;
				}
			}

			// Debug info - optional, can be removed in production
			console.log('Row:', {
				messId,
				messFilter,
				collegeId,
				collegeFilter,
				matchesMess: !messFilter || messId === messFilter,
				matchesCollege: !collegeFilter || collegeId === collegeFilter
			});

			// Convert to strings for comparison since select values are strings
			const matchesMess = !messFilter || messId === messFilter;
			const matchesCollege = !collegeFilter || collegeId === collegeFilter;

			row.style.display = (matchesSearch && matchesMess && matchesCollege) ? "" : "none";
		});
	}

	// Call filterTable on load and whenever filters change
	document.addEventListener('DOMContentLoaded', () => {
		filterTable();

		// Add event listeners to all filter elements
		document.getElementById("searchBar").addEventListener("input", filterTable);
		document.getElementById("filterMess").addEventListener("change", filterTable);
		document.getElementById("filterCollege").addEventListener("change", filterTable);
	});
	function sortTable() {
		const table = document.querySelector("tbody");
		const sortBy = document.getElementById("sortFilter").value;

		if (!sortBy) return;

		const rows = Array.from(table.getElementsByTagName("tr"));

		// Filter out the "No pending complaints" row if it exists
		const dataRows = rows.filter(row => row.cells.length > 1);

		// Define column indices based on table structure
		const columnIndices = {
			'id': 0,      // Complaint ID column
			'name': 1,    // Name column
			'date': 5     // Date Filed column (updated from 4 to 5 based on table structure)
		};

		const columnIndex = columnIndices[sortBy];

		if (columnIndex === undefined) return;

		dataRows.sort((a, b) => {
			const aValue = a.cells[columnIndex].textContent.trim();
			const bValue = b.cells[columnIndex].textContent.trim();

			// Handle different types of sorting
			switch(sortBy) {
				case 'id':
					// Convert to numbers for ID comparison
					return parseInt(aValue) - parseInt(bValue);

				case 'date':
					// Parse dates and handle invalid dates
					const dateA = new Date(aValue);
					const dateB = new Date(bValue);

					// Check if dates are valid
					if (isNaN(dateA.getTime()) && isNaN(dateB.getTime())) return 0;
					if (isNaN(dateA.getTime())) return 1;
					if (isNaN(dateB.getTime())) return -1;

					return dateA - dateB;

				case 'name':
					// Case-insensitive string comparison
					return aValue.toLowerCase().localeCompare(bValue.toLowerCase());

				default:
					return 0;
			}
		});

		// Clear and repopulate the table body
		while (table.firstChild) {
			table.removeChild(table.firstChild);
		}

		// Add sorted rows back
		dataRows.forEach(row => table.appendChild(row));

		// Optional: Add visual indicator for sort direction
		const headers = document.querySelectorAll('th');
		headers.forEach(header => header.classList.remove('sorted-asc', 'sorted-desc'));

		// Store the current sort state
		const currentSortOrder = table.getAttribute('data-sort-order') || 'asc';

		// If already sorted in ascending order, reverse the rows
		if (currentSortOrder === 'asc') {
			dataRows.reverse();
			table.setAttribute('data-sort-order', 'desc');
		} else {
			table.setAttribute('data-sort-order', 'asc');
		}
	}

	// Add event listener for sort dropdown
	document.addEventListener('DOMContentLoaded', () => {
		const sortFilter = document.getElementById("sortFilter");
		if (sortFilter) {
			sortFilter.addEventListener("change", sortTable);
		}
	});
	// Initial filter on page load
	document.addEventListener('DOMContentLoaded', filterTable);

</script>
</body>
</html>
