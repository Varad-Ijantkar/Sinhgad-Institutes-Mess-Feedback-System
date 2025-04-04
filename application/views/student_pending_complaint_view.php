<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pending Complaints</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
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

		.menu-toggle {
			position: fixed;
			top: 30px;
			left: 20px;
			z-index: 1002; /* Increased z-index to be above sidebar */
			background-color: #4B2E83;
			color: white;
			border: none;
			width: 35px;
			height: 35px;
			border-radius: 5px;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
			transition: all 0.3s ease;
		}

		.menu-toggle:hover {
			background-color: #351B4A;
		}

		.sidebar {
			width: 200px;
			background: linear-gradient(180deg, #48276A 0%, #351B4A 100%);
			color: #fff;
			transition: all 0.3s ease; /* Changed from transform to all */
			box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
			position: fixed;
			height: 100vh; /* Changed from calc(100vh - 120px) to full height */
			top: 0; /* Changed from 120px to 0 */
			z-index: 1001;
			left: -200px; /* Start offscreen instead of using transform */
			display: flex;
			flex-direction: column;
			overflow-y: auto; /* Add scroll for small screens */
		}

		body.sidebar-open .sidebar {
			left: 0; /* Move to visible position instead of using transform */
		}

		.sidebar-wrapper {
			display: flex;
			flex-direction: column;
			height: 100%;
			padding-top: 120px; /* Add padding to account for header */
		}

		.sidebar-menu {
			padding: 0;
			overflow-y: auto;
			flex-grow: 1;
			margin-top: 20px;
		}

		.menu-section {
			margin-bottom: 10px;
		}

		.menu-section-title {
			padding: 8px 15px;
			font-size: 10px;
			text-transform: uppercase;
			letter-spacing: 0.8px;
			color: rgba(255, 255, 255, 0.6);
			font-weight: 600;
		}

		.menu-item {
			position: relative;
			transition: all 0.3s;
			margin: 4px 8px;
			border-radius: 6px;
		}

		.menu-item a {
			display: flex;
			align-items: center;
			padding: 8px 10px;
			color: #fff;
			text-decoration: none;
			font-size: 10px;
			font-weight: 500;
			transition: all 0.2s;
			border-radius: 6px;
		}

		.menu-item:hover a {
			background-color: #5A3A7A;
		}

		.menu-item.active {
			background-color: #6A4C93;
		}

		.menu-item.active a {
			color: #fff;
		}

		.menu-item i {
			margin-right: 8px;
			font-size: 12px;
			width: 14px;
			text-align: center;
		}

		.user-section {
			width: 100%;
			padding: 10px 15px;
			background-color: rgba(0, 0, 0, 0.2);
			border-top: 1px solid rgba(255, 255, 255, 0.05);
		}

		.user-info {
			display: flex;
			align-items: center;
			gap: 8px;
			margin-bottom: 10px;
		}

		.user-avatar {
			width: 30px;
			height: 30px;
			border-radius: 50%;
			background-color: #6A4C93;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 14px;
			color: white;
		}

		.user-details {
			display: flex;
			flex-direction: column;
		}

		.user-email {
			font-size: 9px;
			color: #fff;
			word-break: break-all;
		}

		.user-role {
			font-size: 10px;
			font-weight: 600;
			color: #6A4C93;
		}

		.logout-btn {
			width: 100%;
			padding: 8px;
			background-color: #e74c3c;
			color: white;
			border: none;
			border-radius: 6px;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 6px;
			font-weight: 600;
			transition: all 0.2s;
			font-size: 10px;
		}

		.logout-btn:hover {
			background-color: #c0392b;
		}

		.active-indicator {
			position: absolute;
			left: 0;
			top: 0;
			width: 3px;
			height: 100%;
			background-color: #6A4C93;
			border-radius: 0 3px 3px 0;
		}

		.main-content {
			flex: 1;
			display: flex;
			flex-direction: column;
			padding: 120px 30px 0;
			width: 100%;
			transition: all 0.3s ease; /* Changed from width, margin-left to all */
			overflow-y: auto;
		}

		.table-container {
			flex: 1;
			display: flex;
			flex-direction: column;
			width: 100%;
		}

		.heading {
			font-size: 36px;
			text-align: center;
			color: #5C3287;
			margin-bottom: 30px;
			font-weight: 700;
			text-transform: uppercase;
		}

		.table-wrapper {
			overflow-x: auto;
			background-color: #fff;
			border-radius: 12px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			width: 100%;
		}

		.table {
			width: 100%;
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
			transition: background-color 0.3s;
		}

		.view-btn:hover {
			background: #502C74;
			cursor: pointer;
		}

		/* Overlay for mobile when sidebar is open */
		.overlay {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 1000;
			display: none;
		}

		body.sidebar-open .overlay {
			display: block;
		}

		/* Sidebar compatibility */
		body.sidebar-open .main-content {
			width: calc(100% - 200px);
			margin-left: 200px;
		}

		body:not(.sidebar-open) .main-content {
			width: 100%;
			margin-left: 0;
		}

		/* Responsive Styles */
		@media (max-width: 768px) {
			.sidebar {
				width: 70%;
				z-index: 1001;
				left: -70%; /* Start offscreen with correct width */
			}

			.main-content {
				padding: 120px 15px 0;
				width: 100%;
				margin-left: 0;
			}

			body.sidebar-open .main-content {
				width: 100%;
				margin-left: 0;
				filter: blur(2px);
				pointer-events: none;
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

			.menu-toggle {
				top: 20px;
				left: 15px;
				width: 40px;
				height: 40px;
				font-size: 18px;
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

		@media (min-width: 769px) {
			body.sidebar-open .main-content {
				width: calc(100% - 200px);
				margin-left: 200px;
			}

			body:not(.sidebar-open) .main-content {
				width: 100%;
				margin-left: 0;
			}

			.sidebar {
				left: 0; /* Always show on desktop */
				transform: translateX(-100%); /* Use transform for desktop */
			}

			body.sidebar-open .sidebar {
				transform: translateX(0); /* Reset transform on desktop */
			}

			.overlay {
				display: none !important; /* Never show overlay on desktop */
			}

			.table-wrapper {
				width: 100%;
			}

			.table {
				width: 100%;
			}
		}
	</style>
</head>

<body>
<!-- Overlay for mobile -->
<div class="overlay" id="overlay"></div>

<!-- Sidebar -->
<button class="menu-toggle" id="menuToggle">
	<i class="fas fa-bars"></i>
</button>

<?php
$CI =& get_instance();
$current_controller = $CI->uri->segment(1);
$current_method = $CI->uri->segment(2);
?>

<aside class="sidebar">
	<div class="sidebar-wrapper">
		<div class="sidebar-menu">
			<div class="menu-section">
				<h4 class="menu-section-title">Main</h4>
				<div class="menu-item <?php echo ($current_controller == 'student_dashboard' && !$current_method) ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('student_dashboard'); ?>">
						<i class="fas fa-tachometer-alt"></i>
						<span>Student Dashboard</span>
					</a>
				</div>
			</div>

			<div class="menu-section">
				<h4 class="menu-section-title">Complaints</h4>
				<div class="menu-item <?php echo ($current_controller == 'complaint' && !$current_method) ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('complaint'); ?>">
						<i class="fas fa-exclamation-circle"></i>
						<span>Register Complaint</span>
					</a>
				</div>
				<div class="menu-item <?php echo ($current_method == 'pending_complaints') ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('complaint/pending_complaints'); ?>">
						<i class="fas fa-clock"></i>
						<span>Pending Complaints</span>
					</a>
				</div>
				<div class="menu-item <?php echo ($current_method == 'resolved_complaints') ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('complaint/resolved_complaints'); ?>">
						<i class="fas fa-check-circle"></i>
						<span>Resolved Complaints</span>
					</a>
				</div>
			</div>

			<div class="menu-section">
				<h4 class="menu-section-title">Feedback</h4>
				<div class="menu-item <?php echo ($current_controller == 'feedback') ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('feedback'); ?>">
						<i class="fas fa-star"></i>
						<span>Give Feedback</span>
					</a>
				</div>
			</div>
		</div>

		<div class="user-section">
			<div class="user-info">
				<div class="user-avatar">
					<i class="fas fa-user"></i>
				</div>
				<div class="user-details">
					<div class="user-role">Student</div>
					<div class="user-email"><?php echo $this->session->userdata('user_email'); ?></div>
				</div>
			</div>

			<form method="post" action="<?php echo base_url('Complaint/logout'); ?>">
				<button type="submit" class="logout-btn">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span>
				</button>
			</form>
		</div>
	</div>
</aside>

<!-- Main Content -->
<div class="main-content" id="mainContent">
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
				<?php if (!empty($pending_complaints)): ?>
					<?php foreach ($pending_complaints as $complaint): ?>
						<tr data-mess-id="<?php echo isset($complaint['mess_id']) ? $complaint['mess_id'] : ''; ?>"
							data-campus-id="<?php echo isset($complaint['campus_id']) ? $complaint['campus_id'] : ''; ?>">
							<td data-label="Complaint ID"><?php echo isset($complaint['id']) ? $complaint['id'] : 'N/A'; ?></td>
							<td data-label="Name"><?php echo isset($complaint['name']) ? $complaint['name'] : 'N/A'; ?></td>
							<td data-label="Mess"><?php echo isset($complaint['mess']) ? $complaint['mess'] : 'N/A'; ?></td>
							<td data-label="Date Filed"><?php echo isset($complaint['date']) ? $complaint['date'] : 'N/A'; ?></td>
							<td data-label="Campus"><?php echo isset($complaint['campus']) ? $complaint['campus'] : 'N/A'; ?></td>
							<td data-label="Description"><?php echo isset($complaint['description']) ? $complaint['description'] : 'N/A'; ?></td>
							<td data-label="View Report">
								<a href="<?php echo base_url('complaint/generate_report/' . $complaint['id']); ?>" class="view-btn">View</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="7">No Pending Complaint Found.</td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	// Add toggle function directly via event listener
	document.addEventListener('DOMContentLoaded', function () {
		const toggleButton = document.getElementById('menuToggle');
		const overlay = document.getElementById('overlay');

		// Fix for mobile toggle
		toggleButton.addEventListener('click', function (e) {
			e.stopPropagation(); // Prevent event from bubbling
			document.body.classList.toggle('sidebar-open');
			console.log('Toggle clicked, sidebar-open:', document.body.classList.contains('sidebar-open'));
		});

		// Close sidebar when clicking on the overlay
		overlay.addEventListener('click', function () {
			document.body.classList.remove('sidebar-open');
			console.log('Overlay clicked, sidebar closed');
		});

		// Close sidebar when clicking outside on mobile
		document.addEventListener('click', function (event) {
			const sidebar = document.querySelector('.sidebar');
			const menuToggle = document.querySelector('.menu-toggle');

			// Only activate on mobile
			if (window.innerWidth <= 768 && document.body.classList.contains('sidebar-open')) {
				if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
					document.body.classList.remove('sidebar-open');
					console.log('Clicked outside, sidebar closed');
				}
			}
		});

		// Handle menu link clicks on mobile
		const menuLinks = document.querySelectorAll('.sidebar-menu a');
		menuLinks.forEach(link => {
			link.addEventListener('click', function() {
				if (window.innerWidth <= 768) {
					document.body.classList.remove('sidebar-open');
				}
			});
		});

		// Set initial state based on screen size
		function setInitialState() {
			if (window.innerWidth <= 768) {
				document.body.classList.remove('sidebar-open');
			} else {
				document.body.classList.add('sidebar-open');
			}
		}

		// Run on load
		setInitialState();

		// Run on resize
		window.addEventListener('resize', setInitialState);
	});

	function sortTable(columnIndex) {
		const table = document.querySelector("tbody");
		const rows = Array.from(table.getElementsByTagName("tr"));
		const dataRows = rows.filter(row => row.cells.length > 1);
		const header = document.querySelectorAll("thead th")[columnIndex];
		const isAscending = header.classList.contains("asc");

		dataRows.sort((a, b) => {
			const aValue = a.cells[columnIndex].textContent.trim();
			const bValue = b.cells[columnIndex].textContent.trim();

			if (columnIndex === 0 || columnIndex === 3) {
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
</script>
</body>
</html>
