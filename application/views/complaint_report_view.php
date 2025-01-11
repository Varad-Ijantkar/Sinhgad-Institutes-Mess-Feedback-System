<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detailed Complaint Report</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 900px;
			margin: 20px auto;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			padding: 20px;
			border-radius: 8px;
		}
		.header {
			background-color: #007bff;
			color: #fff;
			padding: 20px;
			border-radius: 8px 8px 0 0;
		}
		.header h1 {
			margin: 0;
			font-size: 24px;
		}
		.status {
			padding: 10px;
			margin: 20px 0;
			border-radius: 4px;
			font-weight: bold;
			color: #fff; /* Ensure text is readable on bright backgrounds */
		}

		.status.pending {
			background-color:rgb(255, 209, 71); /* Bright yellow */
			border-left: 5px solid #ffc107;
		}

		.status.resolved {
			background-color: #28a745; /* Bright green */
			border-left: 5px solid #218838;
		}

		.status.escalated {
			background-color: #dc3545; /* Bright red */
			border-left: 5px solid #c82333;
		}

		.info-grid {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 10px;
			margin: 10px 0;
			background-color: #f9f9f9;
			padding: 10px;
			border-radius: 4px;
		}
		.info-item {
			display: flex;
			align-items: center;
			padding: 10px;
			background-color: #ffffff;
			border-radius: 4px;
		}
		.info-item span {
			margin-left: 10px;
			font-weight: bold;
		}
		.section {
			margin: 20px 0;
		}
		.section h2 {
			font-size: 20px;
			margin-bottom: 10px;
		}
		.photo-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
			gap: 10px;
			margin: 10px 0;
		}
		.photo-item img {
			width: 100%;
			height: auto;
			border-radius: 4px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}
		.footer {
			background-color: #f4f4f4;
			padding: 10px;
			text-align: center;
			border-radius: 0 0 8px 8px;
			font-size: 14px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="header">
		<h1>Sinhgad Institutes - Mess Complaint</h1>
		<p>Report ID: <?php echo $id; ?> | Generated: <?php echo $created_at; ?></p>
	</div>

	<div class="status <?php echo strtolower($status); ?>">
		<strong>Status:</strong> <?php echo ucfirst($status); ?>
	</div>


	<div class="section">
		<h2>Complainant Information</h2>
		<div class="info-grid">
			<div class="info-item"><strong>Email:</strong> <span><?php echo $email; ?></span></div>
			<div class="info-item"><strong>Phone:</strong> <span><?php echo $phone; ?></span></div>
			<div class="info-item"><strong>Campus:</strong> <span><?php echo $campus; ?></span></div>
			<div class="info-item"><strong>College:</strong> <span><?php echo $college; ?></span></div>
		</div>
	</div>

	<div class="section">
		<h2>Incident Details</h2>
		<div class="info-grid">
			<div class="info-item"><strong>Date of Incident:</strong> <span><?php echo $date; ?></span></div>
			<div class="info-item"><strong>Meal Time:</strong> <span><?php echo $meal_time; ?></span></div>
			<div class="info-item"><strong>Mess:</strong> <span><?php echo $mess; ?></span></div>
			<div class="info-item"><strong>Category:</strong> <span><?php echo $category; ?></span></div>
		</div>
	</div>

	<div class="section">
		<h2>Facility Assessment</h2>
		<div class="info-grid">
			<div class="info-item"><strong>Hygiene Status:</strong> <span><?php echo $hygiene; ?></span></div>
			<div class="info-item"><strong>Pest Control:</strong> <span><?php echo $pest_control; ?></span></div>
			<div class="info-item"><strong>Safety Protocols:</strong> <span><?php echo $protocols; ?></span></div>
		</div>
	</div>

	<div class="section">
		<h2>Complaint Description</h2>
		<div class="info-grid">
			<div class="info-item"><strong>Nature of Complaint:</strong></div>
			<div class="info-item" style="grid-column: span 2;"><span><?php echo nl2br($food_complaints); ?></span></div>
			<div class="info-item"><strong>Recommendations:</strong></div>
			<div class="info-item" style="grid-column: span 2;"><span><?php echo nl2br($suggestions); ?></span></div>
		</div>
	</div>
	<div class="section">
		<h2>Complaint Photos</h2>
		<?php if (!empty($photos) && is_array($photos)): ?>
			<div class="photo-grid">
				<?php foreach ($photos as $photo): ?>
					<div class="photo-item">
						<img src="<?php echo 'uploads/complaint_photos/' . htmlspecialchars($photo); ?>" alt="Complaint Photo">
					</div>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<p>No photos submitted for this complaint.</p>
		<?php endif; ?>
	</div>

	<div class="footer">
		<p>Official complaint report. Reference: <?php echo $id; ?></p>
		<strong><p>Sinhgad Institute - Mess Complaint</p></strong>
	</div>
</div>
</body>
</html>
