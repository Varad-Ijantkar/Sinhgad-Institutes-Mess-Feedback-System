<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Assigned Complaints</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
	<style>
		/* === CSS Variables === */
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

		/* === Global Styles === */
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
			margin: 0;
			overflow-x: hidden; /* Prevent horizontal scrollbar */
		}

		/* === Main Content === */
		.content {
			padding: 2rem;
			margin-left: 200px; /* Default: sidebar open */
			width: calc(100% - 200px); /* Adjust width for sidebar */
			transition: margin-left 0.3s ease, width 0.3s ease;
			box-sizing: border-box; /* Ensure padding is included in width */
			min-height: calc(100vh - 60px); /* Account for header height */
		}

		.content.expanded {
			margin-left: 0; /* Sidebar closed */
			width: 100%; /* Full width when sidebar is closed */
		}

		.content.expanded {
			margin-left: 0; /* Sidebar closed */
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

		/* === Filters Section === */
		.filters-container {
			background-color: var(--card-background);
			border-radius: 16px;
			padding: 1.5rem;
			margin-bottom: 2rem;
			box-shadow: var(--shadow);
			margin-top:10%;
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

		select:hover, input:hover, select:focus, input:focus {
			border-color: var(--primary-color);
			outline: none;
			box-shadow: 0 0 0 3px var(--primary-light);
		}

		/* === Table Styles === */
		.table-wrapper {
			background-color: var(--card-background);
			border-radius: 16px;
			overflow: hidden;
			box-shadow: var(--shadow);
			max-height: calc(100vh - 200px); /* Adjust based on header and other content */
			overflow-y: auto; /* Allow vertical scrolling if table is too tall */
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
			cursor: pointer;
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

		/* === Alerts === */
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

		/* === Links and Buttons === */
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

		/* === Modal Styles === */
		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.4);
		}

		.modal-content {
			background-color: var(--card-background);
			margin: 15% auto;
			padding: 1.5rem;
			border-radius: 16px;
			width: 80%;
			max-width: 500px;
			box-shadow: var(--shadow);
		}

		.modal-content h3 {
			color: var(--primary-color);
			margin-bottom: 1rem;
		}

		.modal-content textarea {
			width: 100%;
			padding: 0.8rem;
			border: 2px solid var(--border-color);
			border-radius: 8px;
			font-family: 'Quicksand', sans-serif;
			font-size: 0.95rem;
			min-height: 100px;
		}

		.modal-content button {
			width: 100%;
			margin-top: 1rem;
		}

		.close {
			float: right;
			color: #aaa;
			font-size: 1.5rem;
			cursor: pointer;
		}

		.close:hover {
			color: var(--primary-color);
		}

		/* === Responsive Design === */
		@media (max-width: 768px) {
			.content {
				padding: 1rem;
				margin-left: 0; /* Default: full width since sidebar is closed */
				width: 100%;
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

			.sidebar.open + .content {
				margin-left: 200px; /* Shift content when sidebar is open */
				width: calc(100% - 200px);
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
				<?php if (!empty($messes)): ?>
					<?php foreach ($messes as $mess): ?>
						<option value="<?php echo htmlspecialchars($mess['mess_id']); ?>">
							<?php echo htmlspecialchars($mess['mess_name']); ?>
						</option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>
			<select id="filterCampus" onchange="filterTable()">
				<option value="">Filter by Campus</option>
				<?php if (!empty($campuses)): ?>
					<?php foreach ($campuses as $campus): ?>
						<option value="<?php echo htmlspecialchars($campus['campus_id']); ?>">
							<?php echo htmlspecialchars($campus['campus_name']); ?>
						</option>
					<?php endforeach; ?>
				<?php endif; ?>
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
				<th onclick="sortTable(5)">Date Occurred</th>
				<th onclick="sortTable(6)">Category</th>
				<th onclick="sortTable(7)">Priority</th>
				<th>View Report</th>
				<?php if ($role === 'Vendor'): ?>
					<th>Action</th>
				<?php endif; ?>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($assigned_complaints)): ?>
				<?php foreach ($assigned_complaints as $complaint): ?>
					<tr data-mess-id="<?php echo $complaint['mess_id']; ?>"
						data-campus-id="<?php echo $complaint['campus_id']; ?>">
						<td><?php echo $complaint['id']; ?></td>
						<td><?php echo $complaint['name']; ?></td>
						<td><?php echo $complaint['mess']; ?></td>
						<td><?php echo $complaint['campus']; ?></td>
						<td><?php echo $complaint['meal_time']; ?></td>
						<td><?php echo $complaint['date']; ?></td>
						<td><?php echo $complaint['category']; ?></td>
						<td><?php echo $complaint['priority'] ?: 'N/A'; ?></td>
						<td><button class="btn" onclick="showReportModal(<?php echo $complaint['id']; ?>)">View</button></td>
						<?php if ($role === 'Vendor'): ?>
							<td>
								<?php if ($complaint['status'] === 'assigned'): ?>
									<form method="post" action="<?php echo base_url('Admin_Assigned_Complaints/accept_complaint'); ?>" style="display:inline;">
										<input type="hidden" name="complaint_id" value="<?php echo $complaint['id']; ?>">
										<button type="submit" class="btn">Accept</button>
									</form>
								<?php elseif ($complaint['status'] === 'in progress'): ?>
									<button class="btn" onclick="showCompleteModal(<?php echo $complaint['id']; ?>)">Mark as Completed</button>
								<?php endif; ?>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="<?php echo $role === 'Vendor' ? 10 : 9; ?>" style="text-align: center;">
						No assigned complaints found
					</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal for Mark as Completed -->
<div id="completeModal" class="modal">
	<div class="modal-content">
		<span class="close">×</span>
		<h3>Mark Complaint as Completed</h3>
		<form method="post" action="<?php echo base_url('Admin_Assigned_Complaints/mark_as_completed'); ?>">
			<input type="hidden" name="complaint_id" id="modalComplaintId">
			<label for="remarks">Remarks (optional):</label>
			<textarea name="remarks" id="remarks" placeholder="Enter any remarks about the resolution"></textarea>
			<button type="submit" class="btn">Submit</button>
		</form>
	</div>
</div>

<script>
	// Filter table based on search and dropdowns
	function filterTable() {
		const searchQuery = document.getElementById("searchBar").value.toLowerCase();
		const messFilter = document.getElementById("filterMess").value;
		const campusFilter = document.getElementById("filterCampus").value;
		const rows = document.querySelectorAll("tbody tr");

		rows.forEach(row => {
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

	// Sort table columns
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
			} else if (columnIndex === 5) { // Date Occurred (date)
				const dateA = new Date(aValue);
				const dateB = new Date(bValue);
				return isAscending ? dateB - dateA : dateA - dateB;
			} else { // Text columns
				return isAscending ? bValue.localeCompare(aValue) : aValue.localeCompare(bValue);
			}
		});

		while (table.firstChild) table.removeChild(table.firstChild);
		dataRows.forEach(row => table.appendChild(row));

		document.querySelectorAll("thead th").forEach(th => th.classList.remove("asc", "desc"));
		header.classList.add(isAscending ? "desc" : "asc");
	}

	// Modal functionality
	const modal = document.getElementById("completeModal");
	const closeBtn = document.querySelector(".close");

	function showCompleteModal(complaintId) {
		document.getElementById("modalComplaintId").value = complaintId;
		modal.style.display = "block";
	}

	closeBtn.onclick = function() {
		modal.style.display = "none";
	};

	window.onclick = function(event) {
		if (event.target === modal) modal.style.display = "none";
	};

	// Initialize on page load
	document.addEventListener('DOMContentLoaded', () => {
		filterTable();
		document.getElementById("searchBar").addEventListener("input", filterTable);
		document.getElementById("filterMess").addEventListener("change", filterTable);
		document.getElementById("filterCampus").addEventListener("change", filterTable);
	});
</script>
</body>
</html>
