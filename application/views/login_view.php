<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Feedback System Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

	<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
		<div class="card shadow p-4" style="max-width: 400px; width: 100%;">
			<!-- Step 1: Enter Email and Password -->
			<form action="" method="POST">
				<h2 class="text-center">Student Login</h2>
				<div class="mb-3">
					<label for="email" class="form-label">Email ID</label>
					<input type="email" name="email" id="email" class="form-control"
						placeholder="Enter Registered E-mail" value="<?php echo set_value('email', $email); ?>"
						required>
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" id="password" class="form-control"
						placeholder="Enter Password" value="<?php echo set_value('password'); ?>" required>
				</div>

				<!-- Show OTP input if email and password were submitted -->
				<?php if ($otpSent) { ?>
					<div class="mb-3">
						<label for="otp" class="form-label">OTP</label>
						<input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP" required>
					</div>
				<?php } ?>

				<button type="submit" class="btn btn-primary w-100 mt-3">
					<?php echo $otpSent ? "Login" : "Generate OTP"; ?>
				</button>
			</form>

			<!-- Display error messages, if any -->
			<?php if (!empty($error)) { ?>
				<div class="alert alert-danger mt-3">
					<?php echo $error; ?>
				</div>
			<?php } ?>

			<div class="text-center mt-4">
				<p>Not a Student? <a href="<?php echo base_url('admin_login'); ?>">Click here</a></p>
			</div>
			<div class="text-center mt-4">
				<p><a href="<?php echo base_url('login/get_credentials'); ?>">Get
						Credentials</a></p>
			</div>
		</div>
	</div>

	<!-- Bootstrap JS (for optional JavaScript functionality) -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>