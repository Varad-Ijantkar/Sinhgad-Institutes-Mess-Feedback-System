<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Complaints</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            box-sizing: border-box;
        }

        .content {
            padding: 20px;
            margin: 20px auto;
            margin-bottom: 24%;
        }

        .resolved_view h2 {
            font-family: sans-serif;
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 30px;
            color: hsl(270, 46.20%, 28.40%);
        }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            display: block;
            width: 86%;
            margin-left: 14%
        }

        table {;
            border-collapse: collapse;
            background-color: #fff;
			margin-left:60px;
			width:95%;
        }

        table,
        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;

        }

        th {
            background-color: rgb(87, 49, 125);
            color: white;
            text-align: left;
            font-weight: 700;
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

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .content {
                margin: 10px;
                padding: 10px;
                margin-bottom: 60%;
            }

            .table-wrapper {
                overflow-x: auto;
                margin: 0 auto;
                width: 100%;
            }

            table,
            th,
            td {
                font-size: 14px;
                padding: 8px;
                height: 50;
            }


            h2 {
                font-size: 25px;
                margin-bottom: 10px;
            }

            .table-wrapper::-webkit-scrollbar {
                display: none;
            }
        }

        @media (max-width: 576px) {

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

            .table-wrapper {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="content resolved_view">
        <h2>Resolved Complaints</h2>
		<div class="pending_view">
			<?php if ($this->session->flashdata('message')): ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
			<?php elseif ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
			<?php endif; ?>
		<div class="filters">
			<select id="filterMess" onchange="filterTable()">
				<option value="">Filter by Mess</option>
				<?php foreach ($messes as $mess): ?>
					<option value="<?php echo htmlspecialchars($mess['mess_id']); ?>">
						<?php echo htmlspecialchars($mess['mess_name']); ?>
					</option>
				<?php endforeach; ?>
			</select>
			<select id="filterCollege" onchange="filterTable()">
				<option value="">Filter by College</option>
				<?php foreach ($colleges as $college): ?>
					<option value="<?php echo htmlspecialchars($college['college_id']); ?>">
						<?php echo htmlspecialchars($college['college_name']); ?>
					</option>
				<?php endforeach; ?>
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
					<th>Date Resolved</th>
					<th>Campus</th>
					<th>Description</th>
					<th>View Report</th>
				</tr>
				</thead>
				<tbody>
				<?php if (!empty($resolved_complaints)): ?>
					<?php foreach ($resolved_complaints as $complaint): ?>
						<tr>
							<td><?php echo $complaint['id']; ?></td>
							<td><?php echo $complaint['name']; ?></td>
							<td><?php echo $complaint['mess']; ?></td>
							<td><?php echo $complaint['date']; ?></td>
							<td><?php echo $complaint['campus']; ?></td>
							<td><?php echo $complaint['description']; ?></td>
							<td>
								<a href="<?php echo base_url('admin_resolved_complaints/generate_report/' . $complaint['id']); ?>">View</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="6">No resolved complaints found</td>
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
