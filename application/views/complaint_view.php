<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Feedback System</title>
    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

	<style>
		/* Custom CSS for responsiveness */
		.container-custom {
			max-width: 100%;
			padding: 20px;
			margin: 50px auto;
		}

		.form-custom {
			max-height: 80vh;
			overflow: auto; /* Enable scroll if the content exceeds */
		}

		/* Hide scrollbar but allow scrolling */
		.form-custom::-webkit-scrollbar {
			display: none; /* Hides the scrollbar */
		}

		.form-custom {
			-ms-overflow-style: none;  /* For Internet Explorer 10+ */
			scrollbar-width: none;  /* For Firefox */
		}

		@media (max-width: 768px) {
			.form-group label {
				font-size: 14px;
			}

			.btn {
				font-size: 16px;
			}
		}

		@media (max-width: 576px) {
			.form-group label {
				font-size: 12px;
			}

			.btn {
				font-size: 14px;
			}
		}
	</style>
</head>

<body>
    <div class="container container-custom">
        <h2 class="text-center mb-4">Food Complaint Section</h2>

        <div class="container form-custom">
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
						<option value="Sinhgad Annapurna Mess" <?php echo set_select('mess', 'Sinhgad Annapurna Mess', $student_info['mess'] == 'Sinhgad Annapurna Mess'); ?>>Sinhgad Annapurna Mess</option>
						<option value="Sinhgad Amrapali Mess" <?php echo set_select('mess', 'Sinhgad Amrapali Mess', $student_info['mess'] == 'Sinhgad Amrapali Mess'); ?>>Sinhgad Amrapali Mess</option>
						<option value="Sinhgad Deepali Mess" <?php echo set_select('mess', 'Sinhgad Deepali Mess', $student_info['mess'] == 'Sinhgad Deepali Mess'); ?>>Sinhgad Deepali Mess</option>
						<option value="Sinhgad Rakesh Mess" <?php echo set_select('mess', 'Sinhgad Rakesh Mess', $student_info['mess'] == 'Sinhgad Rakesh Mess'); ?>>Sinhgad Rakesh Mess</option>
						<option value="Sinhgad Ram Mess" <?php echo set_select('mess', 'Sinhgad Ram Mess', $student_info['mess'] == 'Sinhgad Ram Mess'); ?>>Sinhgad Ram Mess</option>
						<option value="Sinhgad Sham Mess" <?php echo set_select('mess', 'Sinhgad Sham Mess', $student_info['mess'] == 'Sinhgad Sham Mess'); ?>>Sinhgad Sham Mess</option>
						<option value="Sinhgad Generic Mess" <?php echo set_select('mess', 'Sinhgad Generic Mess', $student_info['mess'] == 'Sinhgad Generic Mess'); ?>>Sinhgad Generic Mess</option>
					</select>
					<input type="hidden" name="mess" value="<?php echo $student_info['mess']; ?>">
				</div>


				<div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="meal_time">Meal Time</label>
                    <select class="form-control" id="meal_time" name="meal_time" required>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Category of Complaints</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="Food Quality">Food Quality</option>
                        <option value="Cleanliness">Cleanliness</option>
                        <option value="Service">Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="food_complaints">Food Related Complaints</label>
                    <textarea class="form-control" id="food_complaints" name="food_complaints" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="suggestions">Any Suggestions for Improvement?</label>
                    <textarea class="form-control" id="suggestions" name="suggestions" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="complaint_photo">Upload Photo (optional)</label>
                    <input type="file" class="form-control-file" id="complaint_photo" name="complaint_photo" accept="image/*">
                </div>

                <button class="btn btn-primary btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
