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
		.pending_view { padding: 20px; }
		.heading { margin-top: 30px; margin-bottom: 30px; }
		.heading h2, .heading h3 { font-family: sans-serif; text-align: center; color: rgb(87, 49, 125); margin: 10px 0; }
		.filters { background-color: #fff; padding: 20px; border-radius: 12px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: flex; gap: 15px; flex-wrap: wrap; }
		.filters select, .filters input { padding: 10px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; flex: 1; min-width: 200px; outline: none; transition: border-color 0.3s; }
		.filters select:hover, .filters input:hover { border-color: rgb(87, 49, 125); }
		.filters select:focus, .filters input:focus { border-color: rgb(87, 49, 125); box-shadow: 0 0 0 2px rgba(87, 49, 125, 0.1); }
		.table-wrapper { overflow-x: auto; -webkit-overflow-scrolling: touch; background-color: #fff; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
		table { width: 100%; border-collapse: collapse; margin: 0; }
		table, th, td { border: 1px solid #ddd; }
		th, td { padding: 12px 15px; text-align: left; font-size: 14px; }
		th { background-color: rgb(87, 49, 125); color: white; font-weight: 700; cursor: pointer; }
		th:hover { background-color: rgb(107, 69, 145); }
		th.asc::after { content: " ↑"; }
		th.desc::after { content: " ↓"; }
		tr:nth-child(even) { background-color: #f9f9f9; }
		tr:hover { background-color: #f3e5f5; }
		.center-align { text-align: center; }
		.center-align button { background: rgb(87, 49, 125); color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; transition: background 0.3s; }
		.center-align button:hover { background: rgb(107, 69, 145); }
		@media (max-width: 768px) { .pending_view { margin-left: 0; padding: 10px; } .filters { flex-direction: column; } .filters select, .filters input { width: 100%; min-width: unset; } }

		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0,0,0,0.4);
		}
		.modal-content {
			background-color: #fff;
			margin: 15% auto;
			padding: 20px;
			border-radius: 12px;
			width: 80%;
			max-width: 400px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.2);
		}
		.modal-content h3 { margin-top: 0; color: rgb(87, 49, 125); }
		.modal-content select, .modal-content input { width: 100%; margin-bottom: 15px; padding: 10px; }
		.modal-content button { width: 100%; }
		.close { color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; }
		.close:hover, .close:focus { color: black; text-decoration: none; }
	</style>
</head>
<body>
<div class="heading">
	<h2>Pending Complaints</h2>
	<h3>Role: <?php echo isset($role) ? $role : 'Not set'; ?></h3>
</div>
<div class="pending_view">
	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
	<?php elseif ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>

	<div class="filters">
		<select id="filterMess" onchange="filterTable()">
			<option value="">Filter by Mess</option>
			<?php if (!empty($messes)): foreach ($messes as $mess): ?>
				<option value="<?php echo htmlspecialchars($mess['mess_id']); ?>"><?php echo htmlspecialchars($mess['mess_name']); ?></option>
			<?php endforeach; endif; ?>
		</select>
		<select id="filterCampus" onchange="filterTable()">
			<option value="">Filter by Campus</option>
			<?php if (!empty($campuses)): foreach ($campuses as $campus): ?>
				<option value="<?php echo htmlspecialchars($campus['campus_id']); ?>">
					<?php echo htmlspecialchars($campus['campus_name']); ?>
				</option>
			<?php endforeach; endif; ?>
		</select>
		<input type="text" id="searchBar" placeholder="Search complaints..." onkeyup="filterTable()">
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
				<th onclick="sortTable(5)">Complaint Category</th>
				<th onclick="sortTable(6)">Date Occurred</th>
				<th>View Report</th>
				<?php if ($role === 'supervisor'): ?>
					<th>Action</th>
				<?php endif; ?>
			</tr>
			</thead>
			<tbody>
			<?php if (!empty($pending_complaints)): foreach ($pending_complaints as $complaint): ?>
				<tr data-mess-id="<?php echo $complaint['mess_id']; ?>">
					<td><?php echo $complaint['id']; ?></td>
					<td><?php echo $complaint['name']; ?></td>
					<td><?php echo $complaint['mess']; ?></td>
					<td><?php echo $complaint['campus'];?></td>
					<td><?php echo $complaint['meal_time']; ?></td>
					<td><?php echo $complaint['category']; ?></td>
					<td><?php echo $complaint['date']; ?></td>
					<td><a href="<?php echo base_url('admin_pending_complaints/generate_report/' . $complaint['id']); ?>">View</a></td>
					<?php if ($role === 'supervisor'): ?>
						<td class="center-align">
							<button class="assign-btn" data-complaint-id="<?php echo $complaint['id']; ?>">Assign</button>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; else: ?>
				<tr>
					<td colspan="<?php echo $role === 'supervisor' ? 8 : 7; ?>" class="center-align">
						No pending complaints found
					</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal for Assigning Complaint -->
<div id="assignModal" class="modal">
	<div class="modal-content">
		<span class="close">×</span>
		<h3>Assign Complaint</h3>
		<form method="post" action="<?php echo base_url('Admin_Pending_Complaints/assign_complaint'); ?>">
			<input type="hidden" name="complaint_id" id="modalComplaintId">
			<label for="vendorSelect">Assign to Vendor:</label>
			<select name="vendor_id" id="vendorSelect" required>
				<option value="">Select Vendor</option>
				<?php if (!empty($vendors)): foreach ($vendors as $vendor): ?>
					<option value="<?php echo htmlspecialchars($vendor['id']); ?>">
						<?php echo htmlspecialchars($vendor['name']); ?>
					</option>
				<?php endforeach; endif; ?>
			</select>
			<label for="priority">Priority:</label>
			<select name="priority" id="priority" required>
				<option value="">Select Priority</option>
				<option value="low">Low</option>
				<option value="mid">Mid</option>
				<option value="high">High</option>
			</select>
			<button type="submit">Assign</button>
		</form>
	</div>
</div>

<script>
	function filterTable() {
		const searchQuery = document.getElementById("searchBar").value.toLowerCase();
		const messFilter = document.getElementById("filterMess").value;
		const rows = document.querySelectorAll("tbody tr");

		rows.forEach(row => {
			if (row.cells.length === 1) return;

			const messId = row.getAttribute("data-mess-id");

			let matchesSearch = false;
			for (let cell of row.cells) {
				if (cell.textContent.toLowerCase().includes(searchQuery)) {
					matchesSearch = true;
					break;
				}
			}

			const matchesMess = !messFilter || messId === messFilter;
			row.style.display = (matchesSearch && matchesMess) ? "" : "none";
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

			if (columnIndex === 0 || columnIndex === 5) { // Student ID (email) or Date Occurred
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

		// Toggle sorting direction and update indicators
		document.querySelectorAll("thead th").forEach(th => {
			th.classList.remove("asc", "desc");
		});
		header.classList.add(isAscending ? "desc" : "asc");
	}

	const modal = document.getElementById("assignModal");
	const closeBtn = document.getElementsByClassName("close")[0];
	const assignButtons = document.getElementsByClassName("assign-btn");

	Array.from(assignButtons).forEach(button => {
		button.onclick = function() {
			const complaintId = this.getAttribute("data-complaint-id");
			document.getElementById("modalComplaintId").value = complaintId;
			modal.style.display = "block";
		};
	});

	closeBtn.onclick = function() { modal.style.display = "none"; };
	window.onclick = function(event) { if (event.target === modal) modal.style.display = "none"; };

	document.addEventListener('DOMContentLoaded', () => {
		filterTable();
		document.getElementById("searchBar").addEventListener("input", filterTable);
		document.getElementById("filterMess").addEventListener("change", filterTable);
	});
</script>
</body>
</html>
