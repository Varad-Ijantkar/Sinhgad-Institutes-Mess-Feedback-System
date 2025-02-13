<style>
	:root {
		--primary: #4F46E5;
		--primary-light: #6366F1;
		--secondary: #7C3AED;
		--success: #059669;
		--light: #F3F4F6;
		--dark: #1F2937;
		--transition: all 0.3s ease;
	}

	body {
		background-color: #f0f2f5;
		font-family: 'Inter', system-ui, -apple-system, sans-serif;
		margin: 0;
		padding: 0;
		min-height: 100vh;
		color: var(--dark);
	}

	.dashboard-container {
		width: 100%;
		max-width: 1400px;
		margin: 0 auto;
		padding: 1rem;
		box-sizing: border-box;
	}

	/* Enhanced Header Section */
	.header-section {
		position: relative;
		background: linear-gradient(135deg, var(--primary), var(--secondary));
		border-radius: 16px;
		padding: 2rem;
		margin-bottom: 2rem;
		color: white;
		overflow: hidden;
		box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.2);
		transition: var(--transition);
	}

	.header-section:hover {
		transform: translateY(-2px);
		box-shadow: 0 15px 30px -5px rgba(79, 70, 229, 0.3);
	}

	.header-pattern {
		position: absolute;
		top: 0;
		right: 0;
		width: 200px;
		height: 200px;
		background: radial-gradient(circle at center, rgba(255,255,255,0.2) 0%, transparent 70%);
		border-radius: 50%;
		transform: translate(100px, -100px);
		opacity: 0.6;
	}

	.welcome-text {
		font-size: 1.5rem;
		font-weight: 700;
		margin-bottom: 1rem;
		text-shadow: 0 2px 4px rgba(0,0,0,0.1);
	}

	.student-info {
		display: flex;
		align-items: center;
		gap: 1.5rem;
		margin-bottom: 1.5rem;
	}

	.profile-avatar {
		width: 60px;
		height: 60px;
		background: rgba(255,255,255,0.2);
		backdrop-filter: blur(10px);
		border-radius: 15px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 1.5rem;
		font-weight: 600;
		box-shadow: 0 4px 12px rgba(0,0,0,0.1);
		transition: var(--transition);
	}

	.profile-avatar:hover {
		transform: scale(1.05);
		background: rgba(255,255,255,0.25);
	}

	.student-details h2 {
		font-size: 1.25rem;
		margin: 0 0 0.5rem 0;
		font-weight: 600;
	}

	.badge {
		background: rgba(255,255,255,0.2);
		backdrop-filter: blur(10px);
		padding: 0.5rem 1rem;
		border-radius: 8px;
		font-size: 0.875rem;
		font-weight: 500;
	}

	/* Enhanced Header Info Grid */
	.header-info-grid {
		display: grid;
		gap: 1.5rem;
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		margin-top: 1.5rem;
	}

	.header-info-item {
		display: flex;
		align-items: center;
		gap: 1rem;
		padding: 1rem;
		background: rgba(255,255,255,0.1);
		backdrop-filter: blur(10px);
		border-radius: 12px;
		transition: var(--transition);
	}

	.header-info-item:hover {
		background: rgba(255,255,255,0.15);
		transform: translateY(-2px);
	}

	.header-info-icon {
		width: 40px;
		height: 40px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 10px;
		background: rgba(255,255,255,0.2);
		font-size: 1.1rem;
	}

	.header-info-label {
		font-size: 0.875rem;
		color: rgba(255,255,255,0.8);
		margin-bottom: 0.25rem;
	}

	.header-info-value {
		font-size: 1rem;
		font-weight: 600;
	}

	/* Enhanced Info Cards */
	.info-grid {
		display: grid;
		gap: 1.5rem;
		grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
	}

	.info-card {
		background: white;
		border-radius: 16px;
		padding: 1.5rem;
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
		margin-bottom: 1.5rem;
		padding-bottom: 1rem;
		border-bottom: 2px solid var(--light);
	}

	.card-title {
		font-size: 1.25rem;
		font-weight: 600;
		color: var(--dark);
		margin: 0;
	}

	.info-item {
		display: flex;
		align-items: center;
		padding: 1rem;
		margin-bottom: 1rem;
		border-radius: 12px;
		transition: var(--transition);
	}

	.info-item:hover {
		background-color: var(--light);
		transform: translateX(5px);
	}

	.info-icon {
		width: 45px;
		height: 45px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 12px;
		margin-right: 1rem;
		background-color: var(--primary);
		color: white;
		font-size: 1.1rem;
		transition: var(--transition);
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
		font-size: 0.875rem;
		color: #6B7280;
		margin-bottom: 0.35rem;
	}

	.info-value {
		font-weight: 600;
		color: var(--dark);
		font-size: 1rem;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	/* Alert Styles */
	.alert {
		padding: 1rem 1.5rem;
		border-radius: 12px;
		margin-bottom: 1.5rem;
		display: flex;
		align-items: center;
		gap: 1rem;
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

	/* Responsive Adjustments */
	@media (max-width: 768px) {
		.dashboard-container {
			padding: 0.5rem;
		}

		.header-section {
			padding: 1.5rem;
			border-radius: 12px;
		}

		.profile-avatar {
			width: 50px;
			height: 50px;
			font-size: 1.25rem;
		}

		.header-info-grid {
			grid-template-columns: 1fr;
			gap: 1rem;
		}

		.info-grid {
			grid-template-columns: 1fr;
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
		<div class="header-section m-2">
			<div class="welcome-text">Welcome back!</div>
			<div class="student-info">
				<div class="profile-avatar">
					<?php echo strtoupper(substr($student_info['name'], 0, 1)); ?>
				</div>
				<div class="student-details">
					<h2 class="h5"><?= $student_info['name'] ?></h2>
					<div class="badge badge-primary"><?= $student_info['id'] ?></div>
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
