<!-- application/views/pending_complaints_view.php -->
<div class="content">

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
					<option value="<?php echo htmlspecialchars($mess['mess_id']); ?>">
						<?php echo htmlspecialchars($mess['mess_name']); ?>
					</option>
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
					<?php if ($role === 'supervisor' || $role === 'officer'): ?>
						<th>Action</th>
					<?php endif; ?>
				</tr>
				</thead>
				<tbody>
				<?php if (!empty($pending_complaints)): foreach ($pending_complaints as $complaint): ?>
					<tr data-mess-id="<?php echo htmlspecialchars($complaint['mess_id'] ?? ''); ?>" data-campus-id="<?php echo htmlspecialchars($complaint['campus_id'] ?? ''); ?>">
						<td><?php echo htmlspecialchars($complaint['id'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($complaint['name'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($complaint['mess'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($complaint['campus'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($complaint['meal_time'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($complaint['category'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($complaint['date'] ?? ''); ?></td>
						<td>
							<button class="view-btn" data-report-url="<?php echo base_url('view-report/' . ($complaint['id'] ?? '')); ?>">View</button>
						</td>
						<?php if ($role === 'supervisor'): ?>
							<td class="center-align">
								<button class="assign-btn" data-complaint-id="<?php echo htmlspecialchars($complaint['id'] ?? ''); ?>">Assign</button>
							</td>
						<?php endif; ?>
					</tr>
				<?php endforeach; else: ?>
					<tr>
						<td colspan="<?php echo ($role === 'supervisor' || $role === 'officer') ? 9 : 8; ?>" class="center-align">
							No Pending Complaints Found
						</td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>
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
	</div>
</div>

<style>
	.content {
		padding: 15px;
		margin-top: 100px;
		margin-left: 200px;
		transition: margin-left 0.3s ease;
		display: flex;
		flex-direction: column;
	}

	body.sidebar-closed .content {
		margin-left: 0;
	}

	.heading {
		margin-top: 30px;
		margin-bottom: 30px;
	}

	.heading h2,
	.heading h3 {
		font-family: 'Poppins', sans-serif;
		text-align: center;
		color: rgb(87, 49, 125);
		margin: 10px 0;
	}

	.pending_view {
		padding: 20px;
		display: flex;
		flex-direction: column;
	}

	.filters {
		background-color: #fff;
		padding: 20px;
		border-radius: 12px;
		margin-bottom: 20px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		display: flex;
		gap: 15px;
		flex-wrap: wrap;
	}

	.filters select,
	.filters input {
		padding: 10px 15px;
		border: 1px solid #ddd;
		border-radius: 6px;
		font-size: 14px;
		flex: 1;
		min-width: 200px;
		outline: none;
		transition: border-color 0.3s;
	}

	.filters select:hover,
	.filters input:hover {
		border-color: rgb(87, 49, 125);
	}

	.filters select:focus,
	.filters input:focus {
		border-color: rgb(87, 49, 125);
		box-shadow: 0 0 0 2px rgba(87, 49, 125, 0.1);
	}

	.table-wrapper {
		overflow-x: auto;
		-webkit-overflow-scrolling: touch;
		background-color: #fff;
		border-radius: 12px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		display: block;
		width: 100%;
	}

	table {
		width: 100%;
		max-width: 100%;
		border-collapse: collapse;
		margin: 0;
	}

	th, td {
		padding: 12px 15px;
		text-align: left;
		font-size: 14px;
		white-space: nowrap;
		min-width: 100px;
	}

	th {
		background-color: rgb(87, 49, 125);
		color: white;
		font-weight: 700;
		cursor: pointer;
	}

	th:hover {
		background-color: rgb(107, 69, 145);
	}

	th.asc::after {
		content: " ↑";
	}

	th.desc::after {
		content: " ↓";
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

	.center-align button,
	.view-btn {
		background: rgb(87, 49, 125);
		color: white;
		border: none;
		padding: 8px 16px;
		border-radius: 4px;
		cursor: pointer;
		transition: background 0.3s;
		font-size: 14px;
	}

	.center-align button:hover,
	.view-btn:hover {
		background: rgb(107, 69, 145);
	}

	.modal {
		display: none;
		position: fixed;
		z-index: 1001;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.4);
	}

	.modal-content {
		background-color: #fff;
		margin: 15% auto;
		padding: 20px;
		border-radius: 12px;
		width: 80%;
		max-width: 400px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
	}

	.modal-content h3 {
		margin-top: 0;
		color: rgb(87, 49, 125);
	}

	.modal-content select,
	.modal-content input {
		width: 100%;
		margin-bottom: 15px;
		padding: 10px;
		border: 1px solid #ddd;
		border-radius: 6px;
		outline: none;
	}

	.modal-content button {
		width: 100%;
		background: rgb(87, 49, 125);
		color: white;
		border: none;
		padding: 10px;
		border-radius: 6px;
		cursor: pointer;
		transition: background 0.3s;
	}

	.modal-content button:hover {
		background: rgb(107, 69, 145);
	}

	.close {
		color: #aaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
		cursor: pointer;
	}

	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
	}

	@media (max-width: 768px) {
		.content {
			margin-left: 0;
		}

		.pending_view {
			padding: 10px;
		}

		.filters {
			flex-direction: column;
		}

		.filters select,
		.filters input {
			width: 100%;
			min-width: unset;
		}
	}
</style>

<script>
	function filterTable() {
		const searchQuery = document.getElementById("searchBar").value.toLowerCase();
		const messFilter = document.getElementById("filterMess").value;
		const campusFilter = document.getElementById("filterCampus").value;
		const rows = document.querySelectorAll("tbody tr");

		rows.forEach(row => {
			if (row.cells.length === 1) return; // Skip "No Pending Complaints" row

			const messId = row.getAttribute("data-mess-id") || "";
			const campusId = row.getAttribute("data-campus-id") || "";

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

			if (columnIndex === 0 || columnIndex === 6) { // Complaint ID or Date Occurred
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

	const modal = document.getElementById("assignModal");
	const closeBtn = document.getElementsByClassName("close")[0];
	const assignButtons = document.getElementsByClassName("assign-btn");
	const viewButtons = document.getElementsByClassName("view-btn");

	Array.from(assignButtons).forEach(button => {
		button.onclick = function() {
			const complaintId = this.getAttribute("data-complaint-id");
			document.getElementById("modalComplaintId").value = complaintId;
			modal.style.display = "block";
		};
	});

	Array.from(viewButtons).forEach(button => {
		button.onclick = function() {
			const reportUrl = this.getAttribute("data-report-url");
			window.location.href = reportUrl;
		};
	});

	closeBtn.onclick = function() {
		modal.style.display = "none";
	};

	window.onclick = function(event) {
		if (event.target === modal) modal.style.display = "none";
	};

	document.addEventListener('DOMContentLoaded', () => {
		filterTable();
		document.getElementById("searchBar").addEventListener("input", filterTable);
		document.getElementById("filterMess").addEventListener("change", filterTable);
		document.getElementById("filterCampus").addEventListener("change", filterTable);
	});
</script>
