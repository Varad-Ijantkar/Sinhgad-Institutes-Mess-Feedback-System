<!-- student_dashboard.php -->
<div class="content-sidebar" id="mainContent">
	<style>
		:root {
			--primary: #5A2D9C;
			--primary-light: #4B2E83;
			--secondary: #351B4A;
			--success: #059669;
			--light: #F3F4F6;
			--dark: #1F2937;
			--transition: all 0.3s ease;
		}

		/* Main Content Area */
		.content-sidebar {
			padding: 140px 20px 20px; /* Adjusted padding-top to account for header */
			transition: margin-left 0.3s ease, width 0.3s ease;
			box-sizing: border-box;
			width: 100%;
			min-height: 100vh;
		}

		/* Sidebar compatibility fix */
		body.sidebar-open .content-sidebar {
			margin-left: 200px; /* Match sidebar width */
			width: calc(100% - 200px);
		}

		.dashboard-container {
			width: 100%;
			max-width: 1400px;
			margin: 0 auto;
			padding: 1rem;
			box-sizing: border-box;
			min-height: calc(100vh - 140px); /* Adjusted for header height */
			transition: all 0.3s ease;
		}

		/* Enhanced Header Section */
		.header-section {
			position: relative;
			background: linear-gradient(135deg, var(--primary), var(--secondary));
			border-radius: 24px;
			padding: 1.5rem;
			margin-bottom: 1.5rem;
			color: white;
			overflow: hidden;
			box-shadow: 0 8px 20px -5px rgba(90, 45, 156, 0.2);
			transition: var(--transition);
		}

		.header-section:hover {
			transform: translateY(-2px);
			box-shadow: 0 12px 25px -5px rgba(90, 45, 156, 0.3);
		}

		.header-pattern {
			position: absolute;
			top: 0;
			right: 0;
			width: 150px;
			height: 150px;
			background: radial-gradient(circle at center, rgba(255,255,255,0.2) 0%, transparent 70%);
			border-radius: 50%;
			transform: translate(75px, -75px);
			opacity: 0.6;
		}

		.welcome-text {
			font-size: 1.25rem;
			font-weight: 700;
			margin-bottom: 0.75rem;
			text-shadow: 0 2px 4px rgba(0,0,0,0.1);
		}

		.student-info {
			display: flex;
			align-items: center;
			gap: 1rem;
			margin-bottom: 1rem;
		}

		.profile-avatar {
			width: 50px;
			height: 50px;
			background: rgba(255,255,255,0.2);
			backdrop-filter: blur(10px);
			border-radius: 12px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 1.25rem;
			font-weight: 600;
			box-shadow: 0 4px 12px rgba(0,0,0,0.1);
			transition: var(--transition);
		}

		.profile-avatar:hover {
			transform: scale(1.05);
			background: rgba(255,255,255,0.25);
		}

		.student-details h2 {
			font-size: 1.1rem;
			margin: 0 0 0.25rem 0;
			font-weight: 600;
		}

		.badge {
			background: rgba(255,255,255,0.2);
			backdrop-filter: blur(10px);
			padding: 0.4rem 0.8rem;
			border-radius: 6px;
			font-size: 0.75rem;
			font-weight: 500;
		}

		/* Enhanced Header Info Grid */
		.header-info-grid {
			display: grid;
			gap: 1rem;
			grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
			margin-top: 1rem;
		}

		.header-info-item {
			display: flex;
			align-items: center;
			gap: 0.75rem;
			padding: 0.75rem;
			background: rgba(255,255,255,0.1);
			backdrop-filter: blur(10px);
			border-radius: 10px;
			transition: var(--transition);
		}

		.header-info-item:hover {
			background: rgba(255,255,255,0.15);
			transform: translateY(-2px);
		}

		.header-info-icon {
			width: 36px;
			height: 36px;
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 8px;
			background: rgba(255,255,255,0.2);
			font-size: 1rem;
		}

		.header-info-label {
			font-size: 0.75rem;
			color: rgba(255,255,255,0.8);
			margin-bottom: 0.2rem;
		}

		.header-info-value {
			font-size: 0.875rem;
			font-weight: 600;
		}

		/* Enhanced Info Cards */
		.info-grid {
			display: grid;
			gap: 1rem;
			grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
			margin-bottom: 1.5rem; /* Add space before footer */
		}

		.info-card {
			background: white;
			border-radius: 16px;
			padding: 1.25rem;
			box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
			transition: var(--transition);
		}

		.info-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
		}

		.card-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 1rem;
			padding-bottom: 0.75rem;
			border-bottom: 2px solid var(--light);
		}

		.card-title {
			font-size: 1.1rem;
			font-weight: 600;
			color: var(--dark);
			margin: 0;
		}

		.info-item {
			display: flex;
			align-items: center;
			padding: 0.75rem;
			margin-bottom: 0.75rem;
			border-radius: 10px;
			transition: var(--transition);
		}

		.info-item:hover {
			background-color: var(--light);
			transform: translateX(5px);
		}

		.info-icon {
			width: 40px;
			height: 40px;
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 10px;
			margin-right: 0.75rem;
			background-color: var(--primary);
			color: white;
			font-size: 1.25rem; /* Increased for better visibility */
			line-height: 1; /* Ensure consistent vertical alignment */
			box-sizing: border-box; /* Prevent padding from affecting size */
			transition: var(--transition);
		}

		.info-icon i {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 100%;
			height: 100%;
		}

		.info-item:hover .info-icon {
			transform: scale(1.1);
			background-color: var(--primary-light);
		}

		.info-content {
			flex: 1;
			min-width: 0;
		}

		.info-label {
			font-size: 0.75rem;
			color: #6B7280;
			margin-bottom: 0.25rem;
		}

		.info-value {
			font-weight: 600;
			color: var(--dark);
			font-size: 0.875rem;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		/* Alert Styles */
		.alert {
			padding: 0.75rem 1.25rem;
			border-radius: 10px;
			margin-bottom: 1rem;
			display: flex;
			align-items: center;
			gap: 0.75rem;
			animation: slideIn 0.3s ease-out;
		}

		.alert-success {
			background-color: #DEF7EC;
			color: var(--success);
			border-left: 4px solid var(--success);
		}

		.alert-danger {
			background-color: #FDE8E8;
			color: #DC2626;
			border-left: 4px solid #DC2626;
		}

		@keyframes slideIn {
			from {
				opacity: 0;
				transform: translateY(-10px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		/* Table Styles (from your reference code) */
		.table-wrapper {
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
			border-radius: 10px;
			overflow: hidden;
			margin-bottom: 1.5rem;
		}

		.table {
			width: 100%;
			border-collapse: collapse;
		}

		.table thead th {
			background-color: var(--primary);
			color: white;
			font-weight: 600;
			padding: 15px;
			text-align: left;
		}

		.table tbody td {
			padding: 15px;
			border-bottom: 1px solid #dee2e6;
		}

		.view-btn {
			display: inline-block;
			padding: 8px 16px;
			background-color: var(--primary);
			color: white;
			border-radius: 6px;
			text-decoration: none;
			font-weight: 500;
			transition: var(--transition);
		}

		.view-btn:hover {
			background-color: var(--primary-light);
			transform: translateY(-2px);
		}

		/* Responsive Adjustments */
		@media (max-width: 768px) {
			.footer {
				padding: 15px 20px;
				background-color: #1F2937; /* Match the dark background seen in the image */
				color: white;
				text-align: center; /* Center all text and elements */
				width: 100%;
				box-sizing: border-box;
			}

			.footer-content {
				flex-direction: column;
				gap: 15px;
				align-items: center; /* Center the content horizontally */
			}

			.footer-section {
				min-width: 100%;
				display: flex;
				flex-direction: column;
				align-items: center; /* Center each section */
			}

			.footer-section h4 {
				font-size: 14px;
				font-weight: 500;
				margin-bottom: 8px;
				display: flex;
				align-items: center;
				gap: 8px;
				color: white;
			}

			.footer-section p {
				font-size: 12px;
				line-height: 1.5;
				margin: 0;
				color: rgba(255, 255, 255, 0.8); /* Slightly lighter for better contrast */
			}

			.social-icons {
				display: flex;
				justify-content: center; /* Center the social icons */
				gap: 15px;
				margin-top: 8px;
			}

			.social-icons a {
				color: white;
				font-size: 16px;
				transition: color 0.3s;
			}

			.social-icons a:hover {
				color: #6D39A2; /* Match the hover color from the second code */
			}

			.footer-bottom {
				border-top: 1px solid rgba(255, 255, 255, 0.1);
				padding-top: 10px;
				font-size: 12px;
				color: rgba(255, 255, 255, 0.6);
				text-align: center; /* Center the copyright text */
				margin-top: 15px;
			}
			.content-sidebar {
				padding: 120px 15px 0; /* Reduced padding */
				margin-left: 0 !important;
				width: 100% !important;
			}

			.dashboard-container {
				padding: 0.5rem;
				min-height: calc(100vh - 120px); /* Adjusted for mobile header height */
			}

			.header-section {
				padding: 1rem;
				border-radius: 16px;
				margin-bottom: 1rem;
			}

			.welcome-text {
				font-size: 1.1rem;
			}

			.profile-avatar {
				width: 40px;
				height: 40px;
				font-size: 1rem;
			}

			.student-details h2 {
				font-size: 1rem;
			}

			.badge {
				font-size: 0.7rem;
				padding: 0.3rem 0.6rem;
			}

			.header-info-grid {
				grid-template-columns: 1fr;
				gap: 0.75rem;
			}

			.header-info-item {
				padding: 0.6rem;
			}

			.header-info-icon {
				width: 32px;
				height: 32px;
			}

			.info-grid {
				grid-template-columns: 1fr;
				gap: 0.75rem;
			}

			.info-card {
				padding: 1rem;
				border-radius: 12px;
			}

			.card-header {
				margin-bottom: 0.75rem;
				padding-bottom: 0.5rem;
			}

			.card-title {
				font-size: 1rem;
			}

			.info-item {
				padding: 0.6rem;
				margin-bottom: 0.5rem;
			}

			.info-icon {
				width: 36px; /* Slightly smaller on mobile */
				height: 36px;
				font-size: 1.1rem; /* Adjusted for mobile */
				margin-right: 0.6rem;
			}

			.info-label {
				font-size: 0.7rem;
			}

			.info-value {
				font-size: 0.8rem;
			}

			/* Table mobile styles */
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
				color: var(--primary);
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

			.alert {
				padding: 0.6rem 1rem;
				margin-bottom: 0.75rem;
			}
		}

		@media (max-width: 456px) {
			.footer {
				padding: 10px 15px; /* Slightly reduce padding for smaller screens */
			}

			.footer-section h4 {
				font-size: 13px; /* Slightly smaller for better fit */
			}

			.footer-section p {
				font-size: 11px; /* Adjust font size for smaller screens */
			}

			.social-icons a {
				font-size: 14px; /* Smaller icons for smaller screens */
			}

			.footer-bottom {
				font-size: 11px; /* Adjust copyright text size */
			}
			.content-sidebar {
				padding: 100px 10px 0; /* Further reduced padding */
			}

			.dashboard-container {
				padding: 0.25rem;
			}

			.header-section {
				padding: 0.75rem;
				border-radius: 12px;
			}

			.welcome-text {
				font-size: 1rem;
				margin-bottom: 0.5rem;
			}

			.profile-avatar {
				width: 36px;
				height: 36px;
				font-size: 0.9rem;
			}

			.student-details h2 {
				font-size: 0.9rem;
			}

			.badge {
				font-size: 0.65rem;
				padding: 0.25rem 0.5rem;
			}

			.header-info-icon {
				width: 28px;
				height: 28px;
				font-size: 0.9rem;
			}

			.header-info-label {
				font-size: 0.65rem;
			}

			.header-info-value {
				font-size: 0.75rem;
			}

			.info-card {
				padding: 0.75rem;
			}

			.card-title {
				font-size: 0.9rem;
			}

			.info-icon {
				width: 32px;
				height: 32px;
				font-size: 1rem;
				margin-right: 0.5rem;
			}

			.info-label {
				font-size: 0.65rem;
			}

			.info-value {
				font-size: 0.75rem;
			}

			/* Smaller table elements */
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

		/* Ensure sidebar compatibility on all screen sizes */
		@media (min-width: 769px) {
			body.sidebar-open .content-sidebar {
				margin-left: 200px;
				width: calc(100% - 200px);
			}

			.table-wrapper {
				max-width: 100%;
			}

			.table {
				width: 100%;
				max-width: 100%;
			}
		}
	</style>

	<div class="dashboard-container">
		<!-- Alerts -->
		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<i class="fas fa-check-circle me-2"></i>
				<?= $this->session->flashdata('success') ?>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<i class="fas fa-exclamation-circle me-2"></i>
				<?= $this->session->flashdata('error') ?>
			</div>
		<?php endif; ?>

		<!-- Header Section -->
		<div class="header-section">
			<div class="welcome-text">Welcome back!</div>
			<div class="student-info">
				<div class="profile-avatar">
					<?php echo strtoupper(substr($student_info['name'], 0, 1)); ?>
				</div>
				<div class="student-details">
					<h2 class="h5"><?= $student_info['name'] ?></h2>
					<div class="badge badge-primary"><?= $student_info['id'] ?? 'N/A' ?></div>
				</div>
			</div>
			<div class="header-info-grid">
				<div class="header-info-item">
					<div class="header-info-icon">
						<i class="fas fa-university"></i>
					</div>
					<div>
						<div class="header-info-label">College</div>
						<div class="header-info-value"><?= $student_info['college_name'] ?></div>
					</div>
				</div>
				<div class="header-info-item">
					<div class="header-info-icon">
						<i class="fas fa-building"></i>
					</div>
					<div>
						<div class="header-info-label">Campus</div>
						<div class="header-info-value"><?= $student_info['campus_name'] ?></div>
					</div>
				</div>
				<div class="header-info-item">
					<div class="header-info-icon">
						<i class="fas fa-utensils"></i>
					</div>
					<div>
						<div class="header-info-label">Mess</div>
						<div class="header-info-value"><?= $student_info['mess_name'] ?></div>
					</div>
				</div>
			</div>
		</div>

		<!-- Info Grid -->
		<div class="info-grid">
			<!-- Contact Information -->
			<div class="info-card">
				<div class="card-header">
					<h3 class="card-title">Contact Information</h3>
					<i class="fas fa-address-card text-primary"></i>
				</div>
				<div class="info-item">
					<div class="info-icon">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="info-content">
						<div class="info-label">Email</div>
						<div class="info-value"><?= $student_info['email'] ?></div>
					</div>
				</div>
				<div class="info-item">
					<div class="info-icon">
						<i class="fas fa-phone"></i>
					</div>
					<div class="info-content">
						<div class="info-label">Phone</div>
						<div class="info-value"><?= $student_info['phone'] ?></div>
					</div>
				</div>
			</div>

			<!-- Personal Information -->
			<div class="info-card">
				<div class="card-header">
					<h3 class="card-title">Personal Information</h3>
					<i class="fas fa-user text-primary"></i>
				</div>
				<div class="info-item">
					<div class="info-icon">
						<i class="fas fa-user"></i>
					</div>
					<div class="info-content">
						<div class="info-label">Name</div>
						<div class="info-value"><?= $student_info['name'] ?></div>
					</div>
				</div>
				<div class="info-item">
					<div class="info-icon">
						<i class="fas <?= $student_info['gender'] ? 'fa-venus-mars' : 'fa-question' ?>"></i>
					</div>
					<div class="info-content">
						<div class="info-label">Gender</div>
						<div class="info-value"><?= $student_info['gender'] ? $student_info['gender'] : 'Not specified' ?></div>
					</div>
				</div>
			</div>

			<!-- Institution Information -->
			<div class="info-card">
				<div class="card-header">
					<h3 class="card-title">Institution Information</h3>
					<i class="fas fa-university text-primary"></i>
				</div>
				<div class="info-item">
					<div class="info-icon">
						<i class="fas fa-university"></i>
					</div>
					<div class="info-content">
						<div class="info-label">College</div>
						<div class="info-value"><?= $student_info['college_name'] ?></div>
					</div>
				</div>
				<div class="info-item">
					<div class="info-icon">
						<i class="fas fa-building"></i>
					</div>
					<div class="info-content">
						<div class="info-label">Campus</div>
						<div class="info-value"><?= $student_info['campus_name'] ?></div>
					</div>
				</div>
				<div class="info-item">
					<div class="info-icon">
						<i class="fas fa-utensils"></i>
					</div>
					<div class="info-content">
						<div class="info-label">Mess</div>
						<div class="info-value"><?= $student_info['mess_name'] ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
