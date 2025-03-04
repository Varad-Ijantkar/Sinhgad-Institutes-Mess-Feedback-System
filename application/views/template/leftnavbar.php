<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Feedback System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		body {
			background-color: #f5f7fb;
		}

		.wrapper {
			display: flex;
			min-height: 100vh;
		}

		.sidebar {
			width: 240px;
			background: linear-gradient(180deg, #48276a 0%, #351B4A 100%);
			color: #fff;
			transition: all 0.3s ease;
			box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
			position: absolute;
			height: 100vh;
			z-index: 1000;
			left: 0;
		}



		.sidebar.closed {
			transform: translateX(-100%);
		}

		.sidebar-menu {
			padding: 0;
			overflow-y: auto;
			height: calc(100vh - 140px);
			position: absolute;
			top: 20px;
			width: 100%;
		}

		.menu-section {
			margin-bottom: 15px;
		}

		.menu-section-title {
			padding: 10px 20px;
			font-size: 12px;
			text-transform: uppercase;
			letter-spacing: 1px;
			color: rgba(255, 255, 255, 0.6);
			font-weight: 600;
		}

		.menu-item {
			position: relative;
			transition: all 0.3s;
			margin: 5px 12px;
			border-radius: 8px;
		}

		.menu-item a {
			display: flex;
			align-items: center;
			padding: 5px 15px;
			color: #fff;
			text-decoration: none;
			font-size: 12px;
			font-weight: 500;
			transition: all 0.2s;
			border-radius: 8px;
		}

		.menu-item:hover a {
			background-color: rgba(255, 255, 255, 0.1);
		}

		.menu-item.active {
			background-color: rgba(255, 255, 255, 0.15);
		}

		.menu-item.active a {
			color: #FFD700;
		}

		.menu-item i {
			margin-right: 12px;
			font-size: 18px;
			width: 20px;
			text-align: center;
		}

		.user-section {
			position: absolute;
			bottom: 150px;
			width: 100%;
			padding: 10px 10px;
			background-color: rgba(0, 0, 0, 0.2);
			border-top: 1px solid rgba(255, 255, 255, 0.05);
		}

		.user-info {
			display: flex;
			align-items: center;
			gap: 10px;
			margin-bottom: 15px;
			width: 90%;
			margin-left: 25px;
		}

		.user-avatar {
			width: 32px;
			height: 32px;
			border-radius: 50%;
			background-color: #6A4C93;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 20px;
			color: white;
		}

		.user-details {
			display: flex;
			flex-direction: column;
		}

		.user-email {
			font-size: 12px;
			color: rgba(255, 255, 255, 0.7);
			word-break: break-all;
		}

		.user-role {
			font-size: 14px;
			font-weight: 600;
			color: #FFD700;
		}

		.user-section form {
			margin-left: 18px;
		}

		.logout-btn {
			width: 90%;
			padding: 12px;
			background-color: #e74c3c;
			color: white;
			border: none;
			border-radius: 8px;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			font-weight: 600;
			transition: all 0.2s;
			height: 40px;
		}

		.logout-btn:hover {
			background-color: #c0392b;
		}


		.menu-toggle {
			position: fixed;
			top: 20px;
			left: 20px;
			z-index: 9999;
			background-color: #4B2E83;
			color: white;
			border: none;
			width: 45px;
			height: 45px;
			border-radius: 50%;
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

		.menu-toggle i {
			font-size: 20px;
		}

		.content.expanded {
			margin-left: 0;
		}

		/* For small screens */
		@media (max-width: 768px) {
			.sidebar {
				transform: translateX(-100%);
			}

			.sidebar.open {
				transform: translateX(0);
			}

			.content {
				margin-left: 0;
			}
		}

		/* For active menu item indicator */
		.active-indicator {
			position: absolute;
			left: 0;
			top: 0;
			width: 4px;
			height: 100%;
			background-color: #FFD700;
			border-radius: 0 4px 4px 0;
		}
	</style>
</head>

<body>
	<aside class="sidebar closed">
		<div class="sidebar-menu">
			<div class="menu-section">
				<h4 class="menu-section-title">Navigation</h4>
				<div class="menu-item">
					<a href="<?php echo site_url('student_dashboard'); ?>">
						<i class="fas fa-tachometer-alt"></i>
						<span>Student Dashboard</span>
					</a>
				</div>
			</div>

			<div class="menu-section">
				<h4 class="menu-section-title">Complaints</h4>
				<div class="menu-item">
					<a href="<?php echo site_url('complaint'); ?>">
						<i class="fas fa-file-alt"></i>
						<span>Register Complaint</span>
					</a>
				</div>
				<div class="menu-item">
					<a href="<?php echo site_url('complaint/pending_complaints'); ?>">
						<i class="fas fa-clock"></i>
						<span>Pending Complaints</span>
					</a>
				</div>
				<div class="menu-item">
					<a href="<?php echo site_url('complaint/resolved_complaints'); ?>">
						<i class="fas fa-check-circle"></i>
						<span>Resolved Complaints</span>
					</a>
				</div>
			</div>

			<div class="menu-section">
				<h4 class="menu-section-title">Services</h4>
				<div class="menu-item">
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
	</aside>

	<div class="content expanded">
		<!-- Menu toggle button for all screens -->
		<button class="menu-toggle" onclick="toggleSidebar()">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Content goes here -->
	</div>

	<script>
		function toggleSidebar() {
			const sidebar = document.querySelector('.sidebar');
			const content = document.querySelector('.content');

			sidebar.classList.toggle('closed');
			sidebar.classList.toggle('open');
			content.classList.toggle('expanded');
		}

		// For mobile view
		function checkScreenSize() {
			if (window.innerWidth <= 768) {
				document.querySelector('.sidebar').classList.add('closed');
				document.querySelector('.content').classList.add('expanded');
			}
		}

		// Check screen size on load
		window.addEventListener('load', checkScreenSize);
		// Check screen size on resize
		window.addEventListener('resize', checkScreenSize);
	</script>
</body>

</html>