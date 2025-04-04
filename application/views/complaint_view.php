<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Feedback System</title>
	<!-- Bootstrap 5 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome for icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<style>
		:root {
			--primary-color: #48276A;
			--primary-light: #6a3e96;
			--primary-dark: #361c50;
			--secondary-color: #f8f9fa;
			--text-color: #333;
			--border-radius: 8px;
			--box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		body {
			font-family: 'Poppins', sans-serif;
			background-color: #f5f5f5;
			color: var(--text-color);
			line-height: 1.6;
			margin: 0;
			overflow-x: hidden; /* Prevent horizontal scrolling */
		}

		.page-container {
			max-width: 1000px;
			margin: 140px auto 40px;
			background-color: #fff;
			border-radius: var(--border-radius);
			box-shadow: var(--box-shadow);
			overflow: hidden;
			min-height: calc(100vh - 180px);
		}

		.header {
			background-color: var(--primary-color);
			color: white;
			padding: 20px 30px;
			border-radius: var(--border-radius) var(--border-radius) 0 0;
		}

		.header h2 {
			margin: 0;
			font-weight: 600;
			font-size: 1.8rem;
		}

		.form-container {
			padding: 30px;
			max-height: 80vh;
			overflow-y: auto;
			scrollbar-width: thin;
		}

		.form-container::-webkit-scrollbar {
			width: 6px;
		}

		.form-container::-webkit-scrollbar-thumb {
			background-color: var(--primary-light);
			border-radius: 10px;
		}

		.form-label {
			font-weight: 500;
			color: var(--primary-dark);
			margin-bottom: 8px;
		}

		.form-control, .form-select {
			border-radius: var(--border-radius);
			border: 1px solid #ced4da;
			padding: 10px 15px;
			transition: all 0.3s;
			height: 48px;
			font-size: 0.9rem;
			width: 100%; /* Ensure full width */
		}

		input[type="date"].form-control {
			height: 48px;
			padding: 10px 15px;
		}

		.form-control:focus, .form-select:focus {
			border-color: var(--primary-light);
			box-shadow: 0 0 0 0.25rem rgba(72, 39, 106, 0.25);
		}

		textarea.form-control {
			height: auto;
			min-height: 120px;
			font-size: 0.9rem;
		}

		.readonly-field {
			background-color: var(--secondary-color);
		}

		.section-divider {
			margin: 30px 0 20px;
			border-top: 1px solid #eee;
			position: relative;
		}

		.section-title {
			display: inline-block;
			background: white;
			padding: 0 15px;
			position: relative;
			top: -12px;
			font-size: 0.9rem;
			color: var(--primary-color);
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 1px;
		}

		.submit-btn {
			background-color: #48276A !important;
			border: none;
			border-radius: var(--border-radius);
			padding: 12px 20px;
			font-weight: 600;
			letter-spacing: 0.5px;
			transition: all 0.3s;
			height: 48px;
			color: white !important;
			width: 100%; /* Full width for better tap target */
			min-height: 44px; /* Minimum tap target size */
		}

		.submit-btn:hover, .submit-btn:focus {
			background-color: var(--primary-light) !important;
			transform: translateY(-2px);
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			color: white !important;
		}

		.upload-box {
			border: 2px dashed #ddd;
			border-radius: var(--border-radius);
			padding: 20px;
			text-align: center;
			cursor: pointer;
			transition: all 0.3s;
			min-height: 150px;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		.upload-box:hover {
			border-color: var(--primary-light);
		}

		.upload-icon {
			font-size: 2rem;
			color: var(--primary-color);
			margin-bottom: 10px;
		}

		.form-field-group {
			margin-bottom: 20px;
		}

		.alert {
			border-radius: var(--border-radius);
			padding: 15px;
			margin-bottom: 20px;
			font-size: 0.9rem;
		}

		.row {
			margin-bottom: 15px;
		}

		.row .form-control,
		.row .form-select {
			width: 100%;
		}

		/* Tablet (768px and below) */
		@media screen and (max-width: 768px) {
			.page-container {
				margin: 120px 15px 20px; /* Increased from 100px to 120px */
				max-width: none;
				min-height: calc(100vh - 140px);
			}


			.header {
				padding: 15px 20px;
			}

			.header h2 {
				font-size: 1.5rem;
			}

			.form-container {
				padding: 20px;
				max-height: calc(100vh - 120px); /* Adjusted for smaller screens */
			}

			.form-control, .form-select {
				height: 44px;
				font-size: 0.85rem;
				padding: 8px 12px;
			}

			input[type="date"].form-control {
				height: 44px;
				padding: 8px 12px;
			}

			textarea.form-control {
				min-height: 100px;
				font-size: 0.85rem;
			}

			.submit-btn {
				height: 44px;
				font-size: 0.9rem;
				padding: 10px 15px;
			}

			.upload-box {
				min-height: 120px;
				padding: 15px;
			}

			.upload-icon {
				font-size: 1.5rem;
			}

			.upload-box p, .upload-box small {
				font-size: 0.8rem;
			}

			.form-label {
				font-size: 0.85rem;
			}

			.section-title {
				font-size: 0.8rem;
			}

			.row .col-md-6, .row .col-md-4, .row .col-md-12 {
				margin-bottom: 15px;
			}
		}

		/* Mobile (576px and below) */
		@media screen and (max-width: 576px) {
			.page-container {
				margin: 110px 10px 15px; /* Increased from 90px to 110px */
				min-height: calc(100vh - 125px);
			}

			.header {
				padding: 10px 15px;
			}

			.header h2 {
				font-size: 1.3rem;
			}

			.form-container {
				padding: 15px;
				max-height: calc(100vh - 100px); /* Adjusted for mobile viewport */
			}

			.form-control, .form-select {
				height: 40px;
				font-size: 0.8rem;
				padding: 6px 10px;
			}

			input[type="date"].form-control {
				height: 40px;
				padding: 6px 10px;
			}

			textarea.form-control {
				min-height: 80px;
				font-size: 0.8rem;
			}

			.submit-btn {
				height: 40px;
				font-size: 0.85rem;
				padding: 8px 12px;
			}

			.upload-box {
				min-height: 100px;
				padding: 10px;
			}

			.upload-icon {
				font-size: 1.2rem;
			}

			.upload-box p, .upload-box small {
				font-size: 0.75rem;
			}

			.form-label {
				font-size: 0.8rem;
			}

			.section-title {
				font-size: 0.75rem;
			}

			.alert {
				font-size: 0.8rem;
				padding: 10px;
			}

			.section-divider {
				margin: 20px 0 15px;
			}
		}

		/* Extra small devices (below 400px) */
		/* Footer fix for complaint registration page - add to your CSS */

		@media screen and (max-width: 768px) {
			/* Reset the footer layout */
			.page-container {
				margin: 100px 15px 20px; /* Increased top margin from 80px to 100px */
				max-width: none;
				min-height: calc(100vh - 120px);
			}

			.header {
				padding: 15px 20px;
			}

			.header h2 {
				font-size: 1.5rem;
				/* Ensure text wraps if needed */
				word-wrap: break-word;
				overflow-wrap: break-word;
			}

			footer {
				padding: 20px 0;
				text-align: center;
				background-color: #222;
				color: white;
			}

			/* Force vertical column layout */
			footer .footer-content,
			footer .row {
				display: flex !important;
				flex-direction: column !important;
				align-items: center !important;
				justify-content: center !important;
				gap: 15px !important;
			}

			/* Address section styling */
			footer .footer-section,
			footer > div {
				width: 100% !important;
				text-align: center !important;
				margin-bottom: 15px !important;
			}

			/* Section titles */
			footer h3,
			footer .footer-section h3 {
				font-size: 1.1rem !important;
				margin-bottom: 10px !important;
				color: white !important;
				font-weight: bold !important;
			}

			/* Section text */
			footer p,
			footer address,
			footer .footer-section p {
				font-size: 0.8rem !important;
				margin: 3px 0 !important;
			}

			/* Social icons */
			footer .social-icons {
				display: flex !important;
				justify-content: center !important;
				gap: 15px !important;
				margin-top: 10px !important;
			}

			/* Icons sizing */
			footer .social-icons a {
				font-size: 1.1rem !important;
				color: white !important;
			}

			/* Copyright section */
			footer .copyright {
				width: 100% !important;
				text-align: center !important;
				padding-top: 15px !important;
				border-top: 1px solid #333 !important;
				font-size: 0.8rem !important;
				margin-top: 10px !important;
			}
		}

		/* Extra small devices (below 576px) */
		@media screen and (max-width: 576px) {

			.page-container {
				margin: 90px 10px 15px; /* Increased top margin from 70px to 90px */
				min-height: calc(100vh - 105px);
			}

			.header {
				padding: 12px 15px; /* Slightly increased padding */
			}

			.header h2 {
				font-size: 1.3rem;
				line-height: 1.3; /* Improved line height for better readability */
			}

			footer h3,
			footer .footer-section h3 {
				font-size: 1rem !important;
			}

			footer p,
			footer address,
			footer .footer-section p {
				font-size: 0.75rem !important;
			}

			footer .social-icons a {
				font-size: 1rem !important;
			}
		}

		/* Very small screens (below 400px) */
		@media screen and (max-width: 400px) {
			.page-container {
				margin: 110px 8px 15px; /* Increased from 80px to 100px */
			}

			/* Make the first section have more padding */
			.form-container {
				padding-top: 20px; /* Add extra padding at the top of the form container */
			}

			.header h2 {
				font-size: 1.2rem; /* Slightly smaller font */
			}

			footer {
				padding: 15px 0 !important;
			}

			footer .footer-content,
			footer .row {
				gap: 10px !important;
			}

			footer .footer-section {
				margin-bottom: 10px !important;
			}

			footer h3,
			footer .footer-section h3 {
				font-size: 0.9rem !important;
				margin-bottom: 5px !important;
			}

			footer p,
			footer address,
			footer .footer-section p {
				font-size: 0.7rem !important;
				margin: 2px 0 !important;
			}

			footer .social-icons {
				gap: 10px !important;
			}

			footer .social-icons a {
				font-size: 0.9rem !important;
			}

			footer .copyright {
				font-size: 0.7rem !important;
				padding-top: 10px !important;
			}
		}
	</style>
</head>

<body>
<div class="page-container">
	<div class="header">
		<h2><i class="fas fa-utensils me-2"></i>Food Complaint Section</h2>
	</div>

	<div class="form-container">
		<?php if (isset($message)): ?>
			<div class="alert alert-info">
				<i class="fas fa-info-circle me-2"></i><?php echo $message; ?>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<i class="fas fa-check-circle me-2"></i><?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php elseif ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<i class="fas fa-exclamation-circle me-2"></i><?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>

		<?php echo validation_errors('<div class="alert alert-danger"><i class="fas fa-exclamation-triangle me-2"></i>', '</div>'); ?>

		<form action="<?php echo site_url('complaint/submit'); ?>" method="POST" enctype="multipart/form-data">
			<!-- Student Information Section -->
			<div class="section-divider">
				<span class="section-title">Student Information</span>
			</div>

			<div class="row">
				<div class="col-md-6 form-field-group">
					<label for="name" class="form-label">Name</label>
					<input type="text" class="form-control readonly-field" id="name" name="name"
						   value="<?php echo set_value('name', $student_info['name']); ?>" readonly>
				</div>

				<div class="col-md-6 form-field-group">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control readonly-field" id="email" name="email"
						   value="<?= isset($student_info['email']) ? htmlspecialchars($student_info['email']) : ''; ?>" readonly>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-field-group">
					<label for="phone" class="form-label">Phone Number</label>
					<input type="text" class="form-control readonly-field" id="phone" name="phone"
						   value="<?php echo set_value('phone', $student_info['phone']); ?>" readonly>
				</div>

				<div class="col-md-6 form-field-group">
					<label class="form-label">College</label>
					<input type="text" class="form-control readonly-field"
						   value="<?php echo isset($student_info['college_name']) ? $student_info['college_name'] : ''; ?>" readonly>
					<input type="hidden" name="college_id"
						   value="<?php echo isset($student_info['college_id']) ? $student_info['college_id'] : ''; ?>">
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-field-group">
					<label class="form-label">Campus</label>
					<input type="text" class="form-control readonly-field"
						   value="<?php echo isset($student_info['campus_name']) ? $student_info['campus_name'] : ''; ?>" readonly>
					<input type="hidden" name="campus_id"
						   value="<?php echo isset($student_info['campus_id']) ? $student_info['campus_id'] : ''; ?>">
				</div>

				<div class="col-md-6 form-field-group">
					<label class="form-label">Mess</label>
					<input type="text" class="form-control readonly-field"
						   value="<?php echo isset($student_info['mess_name']) ? $student_info['mess_name'] : ''; ?>" readonly>
					<input type="hidden" name="mess_id"
						   value="<?php echo isset($student_info['mess_id']) ? $student_info['mess_id'] : ''; ?>">
				</div>
			</div>

			<!-- Complaint Details Section -->
			<div class="section-divider">
				<span class="section-title">Complaint Details</span>
			</div>

			<div class="row">
				<div class="col-md-6 form-field-group">
					<label for="date" class="form-label">Date of Incident</label>
					<input type="date" class="form-control" id="date" name="date"
						   value="<?php echo set_value('date'); ?>" required>
				</div>

				<div class="col-md-6 form-field-group">
					<label for="meal_time" class="form-label">Meal Time</label>
					<select class="form-select" id="meal_time" name="meal_time" required>
						<option value="" disabled selected>Select meal time</option>
						<option value="Breakfast" <?php echo set_select('meal_time', 'Breakfast'); ?>>Breakfast</option>
						<option value="Lunch" <?php echo set_select('meal_time', 'Lunch'); ?>>Lunch</option>
						<option value="Dinner" <?php echo set_select('meal_time', 'Dinner'); ?>>Dinner</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 form-field-group">
					<label for="category" class="form-label">Category of Complaint</label>
					<select class="form-select" id="category" name="category" required>
						<option value="" disabled selected>Select complaint category</option>
						<option value="Food Quality" <?php echo set_select('category', 'Food Quality'); ?>>Food Quality</option>
						<option value="Cleanliness" <?php echo set_select('category', 'Cleanliness'); ?>>Cleanliness</option>
						<option value="Service" <?php echo set_select('category', 'Service'); ?>>Service</option>
					</select>
				</div>
			</div>

			<!-- Environment Assessment Section -->
			<div class="section-divider">
				<span class="section-title">Environment Assessment</span>
			</div>

			<div class="row">
				<div class="col-md-4 form-field-group">
					<label for="hygiene" class="form-label">Hygiene Environment in Dining Hall</label>
					<select class="form-select" id="hygiene" name="hygiene" required>
						<option value="" disabled selected>Select an option</option>
						<option value="Yes" <?php echo set_select('hygiene', 'Yes'); ?>>Yes</option>
						<option value="No" <?php echo set_select('hygiene', 'No'); ?>>No</option>
					</select>
				</div>

				<div class="col-md-4 form-field-group">
					<label for="pest_control" class="form-label">Pest Control Done in Dining Hall</label>
					<select class="form-select" id="pest_control" name="pest_control" required>
						<option value="" disabled selected>Select an option</option>
						<option value="Yes" <?php echo set_select('pest_control', 'Yes'); ?>>Yes</option>
						<option value="No" <?php echo set_select('pest_control', 'No'); ?>>No</option>
					</select>
				</div>

				<div class="col-md-4 form-field-group">
					<label for="protocols" class="form-label">Follow Necessary Protocols</label>
					<select class="form-select" id="protocols" name="protocols" required>
						<option value="" disabled selected>Select an option</option>
						<option value="Yes" <?php echo set_select('protocols', 'Yes'); ?>>Yes</option>
						<option value="No" <?php echo set_select('protocols', 'No'); ?>>No</option>
					</select>
				</div>
			</div>

			<!-- Complaint Description Section -->
			<div class="section-divider">
				<span class="section-title">Detailed Description</span>
			</div>

			<div class="form-field-group">
				<label for="food_complaints" class="form-label">Food Related Complaints</label>
				<textarea class="form-control" id="food_complaints" name="food_complaints"
						  rows="4" placeholder="Please describe your food-related complaint in detail..."><?php echo set_value('food_complaints'); ?></textarea>
			</div>

			<div class="form-field-group">
				<label for="suggestions" class="form-label">Suggestions for Improvement</label>
				<textarea class="form-control" id="suggestions" name="suggestions"
						  rows="4" placeholder="Do you have any suggestions for improvement?"><?php echo set_value('suggestions'); ?></textarea>
			</div>

			<div class="form-field-group">
				<label for="complaint_photo" class="form-label">Supporting Evidence (Optional)</label>
				<div class="upload-box" id="upload-area">
					<i class="fas fa-cloud-upload-alt upload-icon"></i>
					<p class="mb-2">Drag & drop an image here or click to browse</p>
					<small class="text-muted">Accepted formats: JPEG, PNG, JPG</small>
					<input type="file" class="form-control d-none" id="complaint_photo" name="complaint_photo"
						   accept="image/jpeg, image/png, image/jpg">
				</div>
			</div>

			<div class="d-grid gap-2 mt-4">
				<button class="submit-btn" type="submit">
					<i class="fas fa-paper-plane me-2"></i>Submit Complaint
				</button>
			</div>
		</form>
	</div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	document.getElementById('upload-area').addEventListener('click', function() {
		document.getElementById('complaint_photo').click();
	});

	document.getElementById('complaint_photo').addEventListener('change', function() {
		const fileName = this.files[0]?.name;
		if (fileName) {
			const uploadArea = document.getElementById('upload-area');
			uploadArea.innerHTML = `
                    <i class="fas fa-file-image upload-icon"></i>
                    <p class="mb-2">${fileName}</p>
                    <small class="text-muted">Click to change file</small>
                `;
		}
	});

	document.addEventListener('DOMContentLoaded', function() {
		const today = new Date().toISOString().split('T')[0];
		const dateInput = document.getElementById('date');
		if (!dateInput.value) {
			dateInput.value = today;
		}
		dateInput.max = today;
	});
</script>
</body>

</html>
