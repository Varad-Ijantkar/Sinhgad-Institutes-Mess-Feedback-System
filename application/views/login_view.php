<!-- login_view.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
	.login-card {
		transform:translateY(12%);
		background: rgba(255, 255, 255, 0.95);
		border-radius: 12px;
		box-shadow: 0 8px 20px rgba(124, 58, 237, 0.2), 0 4px 8px rgba(124, 58, 237, 0.1);
		backdrop-filter: blur(8px);
		transition: all 0.3s ease;
	}

	.login-card:hover {
		box-shadow: 0 12px 25px rgba(124, 58, 237, 0.25), 0 8px 12px rgba(124, 58, 237, 0.15);
	}

	.input-field {
		transition: all 0.2s ease;
		border: 1px solid #e2d8f3;
		font-size: 0.875rem;
	}

	.input-field:focus {
		border-color: #8b5cf6;
		box-shadow: 0 0 0 2px rgba(139, 92, 246, 0.2);
		outline: none;
		background: white;
	}

	.login-btn {
		background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
		transition: all 0.3s ease;
	}

	.login-btn:hover {
		background: linear-gradient(135deg, #9f75ff 0%, #7c3aed 100%);
		transform: translateY(-1px);
		box-shadow: 0 3px 10px rgba(109, 40, 217, 0.3);
	}

	.link-btn {
		color: #6d28d9;
		transition: all 0.2s ease;
	}

	.link-btn:hover {
		color: #8b5cf6;
		text-decoration: underline;
	}

	.form-header-icon {
		background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
		height: 48px;
		width: 48px;
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: -40px;
		margin-bottom: 10px;
		box-shadow: 0 4px 12px rgba(109, 40, 217, 0.3);
	}
</style>

<div class="container mx-auto px-4 py-6 flex justify-center items-center min-h-screen">
	<div class="login-card border border-purple-200 p-6 w-full max-w-md">
		<div class="flex flex-col items-center">
			<div class="form-header-icon">
				<i class="fas fa-user-graduate text-white text-xl"></i> <!-- Changed icon to student-themed -->
			</div>
			<h2 class="text-center text-2xl font-bold mb-1 text-violet-900">Student Login</h2>
			<p class="text-gray-500 mb-4 text-sm">Enter your credentials to access</p>
		</div>

		<form action="" method="POST">
			<!-- Email Field -->
			<div class="mb-4">
				<label for="email" class="block text-xs font-medium text-gray-700 mb-1">
					<i class="fas fa-envelope text-violet-800 mr-1"></i> Registered Email
				</label>
				<input type="email" name="email" id="email"
					   class="input-field w-full rounded-md p-2 pl-3 bg-gray-50 focus:outline-none focus:bg-white"
					   placeholder="Enter Registered E-mail"
					   value="<?php echo set_value('email', $email); ?>" required>
			</div>

			<!-- Password Field -->
			<div class="mb-4">
				<label for="password" class="block text-xs font-medium text-gray-700 mb-1">
					<i class="fas fa-lock text-violet-800 mr-1"></i> Password
				</label>
				<div class="relative">
					<input type="password" name="password" id="password"
						   class="input-field w-full rounded-md p-2 bg-gray-50 focus:outline-none focus:bg-white"
						   placeholder="Enter Password"
						   value="<?php echo set_value('password'); ?>" required>
					<div class="absolute inset-y-0 right-0 flex items-center pr-2 cursor-pointer">
						<i class="fas fa-eye text-gray-400 hover:text-violet-800 text-sm" id="togglePassword"></i>
					</div>
				</div>
			</div>

			<!-- OTP Input (if OTP is sent) -->
			<?php if ($otpSent) { ?>
				<div class="mb-4">
					<label for="otp" class="block text-xs font-medium text-gray-700 mb-1">
						<i class="fas fa-key text-violet-800 mr-1"></i> Enter Received OTP
					</label>
					<input type="text" name="otp" id="otp"
						   class="input-field w-full rounded-md p-2 bg-gray-50 focus:outline-none focus:bg-white"
						   placeholder="Enter OTP" maxlength="4" required>
				</div>
			<?php } ?>

			<!-- Error Messages -->
			<?php if (!empty($error)) { ?>
				<div class="text-xs bg-red-50 text-red-700 p-2 rounded-md mb-4 flex items-center">
					<i class="fas fa-exclamation-circle mr-1"></i> <?php echo $error; ?>
				</div>
			<?php } ?>

			<!-- Submit Button -->
			<button type="submit" class="login-btn w-full text-white py-2 px-3 rounded-md font-medium text-base">
				<i class="fas fa-sign-in-alt mr-1"></i> <?php echo $otpSent ? "Login" : "Generate OTP"; ?>
			</button>
		</form>

		<!-- Links -->
		<div class="flex flex-col sm:flex-row justify-between items-center mt-4 text-xs">
			<a href="<?php echo base_url('Admin_Login'); ?>" class="link-btn flex items-center mb-2 sm:mb-0">
				<i class="fas fa-user-shield mr-1"></i> Admin Login
			</a>
			<a href="<?php echo base_url('getcredentials'); ?>" class="link-btn flex items-center">
				<i class="fas fa-key mr-1"></i> Get Credentials
			</a>
		</div>

		<div class="mt-6 pt-4 border-t border-gray-200 text-center text-xs text-gray-500">
			<p>© <?php echo date('Y'); ?> Sinhgad Technical Education Society. All rights reserved.</p>
		</div>
	</div>
</div>

<script>
	// Toggle password visibility
	document.getElementById('togglePassword').addEventListener('click', function() {
		const passwordInput = document.getElementById('password');
		const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
		passwordInput.setAttribute('type', type);
		this.classList.toggle('fa-eye');
		this.classList.toggle('fa-eye-slash');
	});
</script>
