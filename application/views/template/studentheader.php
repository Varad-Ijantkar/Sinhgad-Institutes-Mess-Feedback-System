<?php
$CI =& get_instance(); // Get CI instance
$CI->load->model('Student_model'); // Load model

// Fetch student ID from session
$student_id = $CI->session->userdata('student_id');

// If no student is logged in, prevent errors
if (!$student_id) {
	echo "<p>Error: No student logged in.</p>";
	return;
}

// Fetch student details
$student_info = $CI->Student_model->get_student_header_info($student_id);
?>
<style>
	:root {
		--primary: #4F46E5;
		--secondary: #7C3AED;
		--success: #059669;
		--light: #F3F4F6;
		--dark: #1F2937;
	}

	body {
		background-color: #f0f2f5;
		font-family: 'Inter', sans-serif;
		margin: 0;
		padding: 0;
		min-height: 100vh;
	}

	/* Container Responsive Padding */
	.container {
		width: 100%;
		max-width: 1400px;
		margin: 0 auto;
		padding: 0.8rem;
		box-sizing: border-box;
	}

	/* Compact Header Section */
	.header-section {
		position: relative;
		background: linear-gradient(135deg, var(--primary), var(--secondary));
		border-radius: 12px;
		padding: 0.5rem 1rem;
		margin-bottom: 1.5rem;
		color: white;
		display: flex;
		align-items: center;
		justify-content: space-between;
		height: 70px; /* Fixed height */
	}

	/* Welcome Text and Student Info */
	.welcome-text {
		font-size: 1rem;
		font-weight: 600;
		margin-right: 1rem;
	}

	.student-info {
		display: flex;
		align-items: center;
		gap: 0.75rem;
	}

	.profile-avatar {
		width: 35px;
		height: 35px;
		background-color: rgba(255,255,255,0.2);
		border-radius: 8px;
		display: flex;
		align-items: center;
		justify-content: center;
		font-weight: 600;
	}

	.student-details h2 {
		font-size: 0.9rem;
		margin: 0;
	}

	.student-details .badge {
		font-size: 0.7rem;
	}

	/* Key Info Grid in Header */
	.header-info-grid {
		display: flex;
		align-items: center;
		gap: 1.5rem;
	}

	.header-info-item {
		display: flex;
		align-items: center;
		gap: 0.5rem;
	}

	.header-info-icon {
		width: 25px;
		height: 25px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 6px;
		background-color: rgba(255,255,255,0.2);
		color: white;
	}

	.header-info-label {
		font-size: 0.7rem;
		color: rgba(255,255,255,0.8);
	}

	.header-info-value {
		font-size: 0.8rem;
		font-weight: 500;
		color: white;
	}
</style>

<div class="container">
	<div class="header-section">
		<!--Student Info -->
		<div class="student-info">
			<div class="profile-avatar">
				<?php echo strtoupper(substr($student_info['name'], 0, 1)); ?>
			</div>
			<div class="student-details">
				<h2 class="text-white"><?= $student_info['name'] ?></h2>
				<div class="badge badge-primary"><?= $student_info['email'] ?></div>
			</div>
		</div>

		<!-- Other Information -->
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
</div>
