<!-- admin_login_view.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
	.login-card {
		transform:translateY(12%);
		background: rgba(255, 255, 255, 0.95);
		border-radius: 12px; /* Slightly smaller radius */
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
		font-size: 0.875rem; /* Smaller input text */
	}

	.input-field:focus {
		border-color: #8b5cf6;
		box-shadow: 0 0 0 2px rgba(139, 92, 246, 0.2); /* Thinner focus ring */
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
		height: 48px; /* Smaller icon */
		width: 48px;
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: -40px; /* Less overlap */
		margin-bottom: 10px; /* Tighter spacing */
		box-shadow: 0 4px 12px rgba(109, 40, 217, 0.3);
	}
</style>

<div class="container mx-auto px-4 py-6 flex justify-center items-center min-h-screen">
	<div class="login-card border border-purple-200 p-6 w-full max-w-md"> <!-- Shrunk from max-w-3xl to max-w-md -->
		<div class="flex flex-col items-center">
			<div class="form-header-icon">
				<i class="fas fa-user-shield text-white text-xl"></i> <!-- Smaller icon -->
			</div>
			<h2 class="text-center text-2xl font-bold mb-1 text-violet-900">Admin Portal</h2> <!-- Smaller heading -->
			<p class="text-gray-500 mb-4 text-sm">Enter your credentials to access</p> <!-- Smaller text -->
		</div>

		<form action="<?php echo base_url('Admin_Login/login'); ?>" method="POST">
			<!-- Email Field -->
			<div class="mb-4"> <!-- Reduced margin -->
				<label for="email" class="block text-xs font-medium text-gray-700 mb-1">
					<i class="fas fa-envelope text-violet-800 mr-1"></i>Email Address
				</label>
				<div class="relative">
					<input type="email" id="email" name="email"
						   class="input-field w-full rounded-md p-2 pl-3 pr-8 bg-gray-50 focus:outline-none focus:bg-white"
						   placeholder="admin@sinhgad.edu"
						   value="<?php echo set_value('email'); ?>" required pattern=".+@sinhgad\.edu">
					<div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
						<span class="text-purple-400 text-xs">@sinhgad.edu</span>
					</div>
				</div>
				<p class="text-xs text-gray-500 mt-1">Only Sinhgad email domains are accepted</p>
			</div>

			<!-- Password Field -->
			<div class="mb-4"> <!-- Reduced margin -->
				<label for="password" class="block text-xs font-medium text-gray-700 mb-1">
					<i class="fas fa-lock text-violet-800 mr-1"></i>Password
				</label>
				<div class="relative">
					<input type="password" id="password" name="password"
						   class="input-field w-full rounded-md p-2 bg-gray-50 focus:outline-none focus:bg-white"
						   placeholder="Enter your password" required>
					<div class="absolute inset-y-0 right-0 flex items-center pr-2 cursor-pointer">
						<i class="fas fa-eye text-gray-400 hover:text-violet-800 text-sm" id="togglePassword"></i>
					</div>
				</div>
			</div>

			<!-- Error Message -->
			<?php if (!empty($login_error)): ?>
				<div class="text-xs bg-red-50 text-red-700 p-2 rounded-md mb-4 flex items-center">
					<i class="fas fa-exclamation-circle mr-1"></i> <?php echo $login_error; ?>
				</div>
			<?php endif; ?>

			<!-- Submit Button -->
			<button type="submit" class="login-btn w-full text-white py-2 px-3 rounded-md font-medium text-base">
				<i class="fas fa-sign-in-alt mr-1"></i> Sign In
			</button>
		</form>

		<!-- Links -->
		<div class="flex flex-col sm:flex-row justify-between items-center mt-4 text-xs">
			<a href="<?php echo base_url('login'); ?>" class="link-btn flex items-center mb-2 sm:mb-0">
				<i class="fas fa-user-graduate mr-1"></i> Student Login
			</a>
			<a href="<?php echo base_url('getcredentials'); ?>" class="link-btn flex items-center">
				<i class="fas fa-key mr-1"></i> Request Credentials
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
