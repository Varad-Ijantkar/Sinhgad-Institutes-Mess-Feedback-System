<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Feedback System Login</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-grey-100">

	<div class='flex items-center justify-center min-h-[78vh]'>
		<div class="bg-white border border-purple-300 rounded-lg p-6 max-w-md w-1/2" style="box-shadow: 0 4px 6px rgba(139, 92, 246, 0.5);">
			<h2 class="text-center text-2xl font-bold mb-4 text-violet-950">Student Login</h2>
			<form action="" method="POST">
				<!-- Email Input -->
				<div class="mb-3">
					<label for="email" class="block text-sm font-medium text-gray-700 mb-1">Registered Email</label>
					<input type="email" name="email" id="email" class="w-full border border-purple-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-700" 
						placeholder="Enter Registered E-mail" value="<?php echo set_value('email', $email); ?>" required>
				</div>

				<!-- Password Input -->
				<div class="mb-3">
					<label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
					<input type="password" name="password" id="password" class="w-full border border-purple-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-700" 
						placeholder="Enter Password" value="<?php echo set_value('password'); ?>" required>
				</div>

				<!-- OTP Input (if OTP is sent) -->
				<?php if ($otpSent) { ?>
					<div class="mb-3">
						<label for="otp" class="block text-sm font-medium text-gray-700 mb-1">Enter Received OTP</label>
						<input type="text" name="otp" id="otp" class="otp-field w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-700" 
							placeholder="Enter OTP" maxlength="4" required>
					</div>
				<?php } ?>

				<!-- Submit Button -->
				<button type="submit" class="w-full bg-violet-900 text-white py-2 rounded-lg hover:bg-violet-700 transition mt-3">
					<?php echo $otpSent ? "Login" : "Generate OTP"; ?>
				</button>
			</form>

			<!-- Error Messages -->
			<?php if (!empty($error)) { ?>
				<div class="text-sm text-red-700 mt-2">
					⚠️ <?php echo $error; ?>
				</div>
			<?php } ?>

			<!-- Links -->
			<div class="text-center mt-4">
				<p>Not a Student? <a href="<?php echo base_url('admin_login'); ?>" class="text-blue-800 hover:underline">Click here </a></p>
			</div>
			<div class="text-center mt-2">
				<p><a href="<?php echo base_url('getcredentials'); ?>" class="text-blue-800 hover:underline">Get Credentials</a></p>
			</div>
		</div>
	</div>

</body>

</html>
