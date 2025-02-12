<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Feedback System</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		/* Sidebar Styles */
		.sidebar {
			position: fixed;
			left: 0;
			width: 250px;
			height: 100vh;
			background-color: #fff;
			border-right: 1px solid #ddd;
			padding-top: 10px;
			transition: transform 0.3s ease;
			z-index: 1;
		}

		/* Sidebar collapsed state */
		.sidebar.closed {
			transform: translateX(-100%);
			/* Move sidebar completely off-screen */
		}

		/* Sidebar links */
		.sidebar ul {
			list-style-type: none;
			padding: 0;
		}

		.sidebar li {
			margin: 5px 0;
		}

		.sidebar a {
			text-decoration: none;
			color: black;
			font-size: 14px;
			display: block;
			padding: 8px 15px;
		}

		.sidebar a:hover {
			background-color: #f1f1f1;
		}

		/* Email and Logout button */
		.sidebar .email {
			font-size: 12px;
			color: gray;
			padding-left: 25px;
			padding-top: 20%;
			padding-bottom: 5px;
		}

		.sidebar .logout {
			padding: 10px 15px;
			background-color: #e74c3c;
			color: white;
			border: none;
			cursor: pointer;
			width: calc(100% - 30px);
			/* Adjust width */
			margin: 10px 15px;
			font-size: 12px;
			border-radius: 10px;
			cursor: pointer;
		}

		.sidebar .logout:hover {
			background-color: #c0392b;
		}

		/* Menu toggle button */
		.menu-toggle {
			display: block;
			background: none;
			color: white;
			padding: 10px;
			border: none;
			cursor: pointer;
			font-size: 16px;
			position: fixed;
			/* Position it fixed on screen */
			top: 10px;
			/* Adjust top spacing */
			left: 10px;
			/* Adjust left spacing */
			z-index: 1100;
			/* Keep above sidebar */
			border-radius: 5px;
		}

		.menu-toggle:hover {
			background-color: #351B4A;
		}

		/* Content Area Styles */
		.content-sidebar {
			margin-left: 250px;
			/* Start with sidebar width */
			padding: 20px;
			transition: margin-left 0.3s ease;
		}

		.content-sidebar.collapsed {
			margin-left: 0;
			/* Adjust content when sidebar collapsed */
		}

		/* Small screen adjustments */
		@media (max-width: 768px) {
			.sidebar {
				width: 70%;
				z-index: 3;
				/* Adjust sidebar width */
			}

			.content-sidebar {
				margin-left: 0;
				/* Ensure no gap for smaller screens */
			}
		}
	</style>
</head>

<body>

<aside>
	<div class="sidebar closed">
		<ul>
			<li><a href="<?php echo site_url('student_dashboard');?>"><strong>Student Dashboard</strong></a></li>
			<li><a href="<?php echo site_url('complaint'); ?>"><strong>Register Complaint</strong></a></li>
			<li><a href="<?php echo site_url('complaint/pending_complaints'); ?>"><strong>Pending Complaints</strong></a>
			</li>
			<li><a href="<?php echo site_url('complaint/resolved_complaints'); ?>"><strong>Resolved Complaints</strong></a>
			</li>
			<li><a href="<?php echo site_url('feedback'); ?>"><strong>Give Feedback</strong></a>
			</li>
		</ul>

		<div class="email">
			<strong>Logged in as:</strong> <br>
			<?php echo $this->session->userdata('user_email'); ?>
		</div>

		<form method="post" action="<?php echo base_url('Complaint/logout'); ?>">
			<button type="submit" class="logout" style="border-radius: 10px;">Logout</button>
		</form>
	</div>

	<!-- Content Area -->
	<div class="content-sidebar">
		<!-- Menu toggle button for small screens -->
		<button class="menu-toggle" onclick="toggleSidebar()">☰</button>
	</div>
</aside>

<script>
	// Function to toggle sidebar visibility
	function toggleSidebar() {
		const sidebar = document.querySelector('.sidebar');
		const content = document.querySelector('.content-sidebar');

		// Toggle 'open' and 'closed' classes
		sidebar.classList.toggle('closed');
		content.classList.toggle('collapsed');
	}
</script>
</body>
</html>
