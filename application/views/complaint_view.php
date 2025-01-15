<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Feedback System</title>
	<!-- Bootstrap CDN -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

	<style>
		/* Custom CSS to adjust container size */

		.container-custom {
			max-width: 1000px;
			margin-top: 5%;
			margin-bottom: 10%;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			color: #48276A;
		}

		.form-custom {
			max-height: 80vh;
			overflow-y: auto;
			width: 100%;
			scrollbar-width: none;
			-ms-overflow-style: none;
		}

		.form-custom::-webkit-scrollbar {
			display: none;
		}

		.form-custom button {
			background: hsl(270, 46.20%, 28.40%);
		}

		.form-custom button:hover {
			background: hsl(270, 46.20%, 48.40%);
		}
		@media screen and (max-width: 1024px) {
            .container-custom {
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media screen and (max-width: 768px) {
            .container-custom {
                max-width: 95%;
                padding: 15px;
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .form-custom {
                max-height: 75vh;
            }
        }

        @media screen and (max-width: 480px) {
            .container-custom {
                max-width: 100%;
                padding: 10px;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .form-custom {
                max-height: 70vh;
            }
        }
	</style>
</head>

<body>
<div class="container container-custom">
	<h2 class="text-center mb-4">Food Complaint Section</h2>

	<div class="container form-custom">
		<?php if (isset($message)) {
			echo "<div class='alert alert-info'>$message</div>";
		} ?>

		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
		<?php elseif ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
		<?php endif; ?>

		<!-- Display validation errors -->
		<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

		<form action="<?php echo site_url('complaint/submit'); ?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email"
					   value="<?php echo set_value('email', $student_info['email']); ?>" readonly>
			</div>

			<div class="form-group">
				<label for="name">Name of Student</label>
				<input type="text" class="form-control" id="name" name="name"
					   value="<?php echo set_value('name', $student_info['name']); ?>" readonly>
			</div>

			<div class="form-group">
				<label for="phone">Phone Number</label>
				<input type="text" class="form-control" id="phone" name="phone"
					   value="<?php echo set_value('phone', $student_info['phone']); ?>" readonly>
			</div>

			<div class="form-group">
				<label for="college">College Name and Class</label>
				<select class="form-control" id="college" name="college" disabled>
					<option value="NBNSTIC" <?php echo set_select('college', 'NBNSTIC', $student_info['college'] == 'NBNSTIC'); ?>>NBNSTIC</option>
					<option value="SCOE" <?php echo set_select('college', 'SCOE', $student_info['college'] == 'SCOE'); ?>>SCOE</option>
					<option value="SIOM" <?php echo set_select('college', 'SIOM', $student_info['college'] == 'SIOM'); ?>>SIOM</option>
					<option value="SKN" <?php echo set_select('college', 'SKN', $student_info['college'] == 'SKN'); ?>>SKN</option>
				</select>
				<input type="hidden" name="college" value="<?php echo $student_info['college']; ?>">
			</div>

			<div class="form-group">
				<label for="campus">Select Campus</label>
				<select class="form-control" id="campus" name="campus" disabled>
					<option value="Ambegaon" <?php echo set_select('campus', 'Ambegaon', $student_info['campus'] == 'Ambegaon'); ?>>Ambegaon</option>
					<option value="Vadgaon" <?php echo set_select('campus', 'Vadgaon', $student_info['campus'] == 'Vadgaon'); ?>>Vadgaon</option>
				</select>
				<input type="hidden" name="campus" value="<?php echo $student_info['campus']; ?>">
			</div>

			<div class="form-group">
				<label for="mess">Select Mess</label>
				<select class="form-control" id="mess" name="mess" disabled>
					<option value="Om Sai Mess" <?php echo set_select('mess', 'Om Sai Mess', $student_info['mess'] == 'Om Sai Mess'); ?>>Om Sai Mess</option>
					<option value="Vatsalya Mess" <?php echo set_select('mess', 'Vatsalya Mess', $student_info['mess'] == 'Vatsalya Mess'); ?>>Vatsalya Mess</option>
					<option value="Annapoorna - I Mess" <?php echo set_select('mess', 'Annapoorna - I Mess', $student_info['mess'] == 'Annapoorna - I Mess'); ?>>Annapoorna - I Mess</option>
					<option value="Annapoorna - II Mess" <?php echo set_select('mess', 'Annapoorna - II Mess', $student_info['mess'] == 'Annapoorna - II Mess'); ?>>Annapoorna - II Mess</option>
					<option value="Ashwini Mess" <?php echo set_select('mess', 'Ashwini Mess', $student_info['mess'] == 'Ashwini Mess'); ?>>Ashwini Mess</option>
					<option value="Nandinee Mess" <?php echo set_select('mess', 'Nandinee Mess', $student_info['mess'] == 'Nandinee Mess'); ?>>Nandinee Mess</option>
					<option value="Abhilasha Mess" <?php echo set_select('mess', 'Abhilasha Mess', $student_info['mess'] == 'Abhilasha Mess'); ?>>Abhilasha Mess</option>
					<option value="Geetanjali Mess" <?php echo set_select('mess', 'Geetanjali Mess', $student_info['mess'] == 'Geetanjali Mess'); ?>>Geetanjali Mess</option>
					<option value="Rohini Mess" <?php echo set_select('mess', 'Rohini Mess', $student_info['mess'] == 'Rohini Mess'); ?>>Rohini Mess</option>
					<option value="Laxmi Mess" <?php echo set_select('mess', 'Laxmi Mess', $student_info['mess'] == 'Laxmi Mess'); ?>>Laxmi Mess</option>
					<option value="Shree Ganesh Mess" <?php echo set_select('mess', 'Shree Ganesh Mess', $student_info['mess'] == 'Shree Ganesh Mess'); ?>>Shree Ganesh Mess</option>
					<option value="Sahdev Mess" <?php echo set_select('mess', 'Sahdev Mess', $student_info['mess'] == 'Sahdev Mess'); ?>>Sahdev Mess</option>
					<option value="Arjun Mess" <?php echo set_select('mess', 'Arjun Mess', $student_info['mess'] == 'Arjun Mess'); ?>>Arjun Mess</option>
					<option value="Indrajit Mess" <?php echo set_select('mess', 'Indrajit Mess', $student_info['mess'] == 'Indrajit Mess'); ?>>Indrajit Mess</option>
					<option value="Kamala Mess" <?php echo set_select('mess', 'Kamala Mess', $student_info['mess'] == 'Kamala Mess'); ?>>Kamala Mess</option>
					<option value="Sharada Mess" <?php echo set_select('mess', 'Sharada Mess', $student_info['mess'] == 'Sharada Mess'); ?>>Sharada Mess</option>
					<option value="Amrapali Mess (Girls)" <?php echo set_select('mess', 'Amrapali Mess (Girls)', $student_info['mess'] == 'Amrapali Mess (Girls)'); ?>>Amrapali Mess (Girls)</option>
					<option value="Annapoorna (Boys)" <?php echo set_select('mess', 'Annapoorna (Boys)', $student_info['mess'] == 'Annapoorna (Boys)'); ?>>Annapoorna (Boys)</option>
				</select>
				<input type="hidden" name="mess" value="<?php echo $student_info['mess']; ?>">
			</div>

			<div class="form-group">
				<label for="date">Date</label>
				<input type="date" class="form-control" id="date" name="date"
					   value="<?php echo set_value('date'); ?>" required>
			</div>

			<div class="form-group">
				<label for="meal_time">Meal Time</label>
				<select class="form-control" id="meal_time" name="meal_time" required>
					<option value="Breakfast" <?php echo set_select('meal_time', 'Breakfast'); ?>>Breakfast</option>
					<option value="Lunch" <?php echo set_select('meal_time', 'Lunch'); ?>>Lunch</option>
					<option value="Dinner" <?php echo set_select('meal_time', 'Dinner'); ?>>Dinner</option>
				</select>
			</div>

			<div class="form-group">
				<label for="category">Category of Complaints</label>
				<select class="form-control" id="category" name="category" required>
					<option value="Food Quality" <?php echo set_select('category', 'Food Quality'); ?>>Food Quality
					</option>
					<option value="Cleanliness" <?php echo set_select('category', 'Cleanliness'); ?>>Cleanliness
					</option>
					<option value="Service" <?php echo set_select('category', 'Service'); ?>>Service</option>
				</select>
			</div>

			<div class="form-group">
				<label for="hygiene">Hygiene Environment in Dining Hall</label>
				<select class="form-control" id="hygiene" name="hygiene" required>
					<option value="No" <?php echo set_select('hygiene', 'No'); ?>>No</option>
					<option value="Yes" <?php echo set_select('hygiene', 'Yes'); ?>>Yes</option>
				</select>
			</div>

			<div class="form-group">
				<label for="pest_control">Pest Control Done in Dining Hall</label>
				<select class="form-control" id="pest_control" name="pest_control" required>
					<option value="No" <?php echo set_select('pest_control', 'No'); ?>>No</option>
					<option value="Yes" <?php echo set_select('pest_control', 'Yes'); ?>>Yes</option>
				</select>
			</div>

			<div class="form-group">
				<label for="protocols">Follow Necessary Protocols</label>
				<select class="form-control" id="protocols" name="protocols" required>
					<option value="No" <?php echo set_select('protocols', 'No'); ?>>No</option>
					<option value="Yes" <?php echo set_select('protocols', 'Yes'); ?>>Yes</option>
				</select>
			</div>

			<div class="form-group">
				<label for="food_complaints">Food Related Complaints</label>
				<textarea class="form-control" id="food_complaints" name="food_complaints"
						  rows="4"><?php echo set_value('food_complaints'); ?></textarea>
			</div>

			<div class="form-group">
				<label for="suggestions">Any Suggestions for Improvement?</label>
				<textarea class="form-control" id="suggestions" name="suggestions"
						  rows="4"><?php echo set_value('suggestions'); ?></textarea>
			</div>

			<div class="form-group">
				<label for="complaint_photo">Upload Photo (optional)</label>
				<input type="file" class="form-control-file" id="complaint_photo" name="complaint_photo"
					   accept="image/*">
				<small class="form-text text-muted">Only JPEG, PNG, and JPG files are allowed.</small>
			</div>

			<button class="btn btn-primary btn-block" type="submit" style="font-weight: bold;">Submit</button>
		</form>
	</div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
