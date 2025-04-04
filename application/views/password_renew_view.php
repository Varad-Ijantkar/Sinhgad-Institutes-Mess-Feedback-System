<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Password Renewal - Sinhgad Technical Education Society</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						'primary': '#6d28d9',
						'primary-light': '#8b5cf6',
						'primary-dark': '#5b21b6'
					}
				}
			}
		}
	</script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		.password-card {
			transform: translateY(12%);
			background: rgba(255, 255, 255, 0.95);
			border-radius: 12px;
			box-shadow: 0 8px 20px rgba(109, 40, 217, 0.2), 0 4px 8px rgba(109, 40, 217, 0.1);
			backdrop-filter: blur(8px);
			transition: all 0.3s ease;
			border: 1px solid #e5e0ec;
		}

		.password-card:hover {
			box-shadow: 0 12px 25px rgba(109, 40, 217, 0.25), 0 8px 12px rgba(109, 40, 217, 0.15);
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

		.update-btn {
			background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
			transition: all 0.3s ease;
		}

		.update-btn:hover {
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

		body {
			background-image: linear-gradient(135deg, #f5f7fa 0%, #e4e8f5 100%);
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
</head>

<body class="bg-gray-100 font-sans">
<!-- Main Content -->
<div class="flex items-center justify-center min-h-screen px-4 py-12">
	<div class="password-card p-8 w-full max-w-md relative">
		<!-- Purple Circle with Icon -->
		<div class="flex justify-center">
			<div class="form-header-icon">
				<i class="fas fa-lock text-white text-xl"></i>
			</div>
		</div>

		<div class="mt-4">
			<h2 class="text-center text-2xl font-bold mb-1 text-violet-900">Renew Your Password</h2>
			<p class="text-center text-gray-600 mb-6 text-sm">Enter your new password to continue</p>

			<!-- Flash Messages -->
			<div class="hidden bg-red-50 text-red-700 p-3 rounded-lg mb-4 flex items-start">
				<i class="fas fa-exclamation-circle mr-2 mt-1"></i>
				<span>Error message goes here</span>
			</div>

			<div class="hidden bg-green-50 text-green-700 p-3 rounded-lg mb-4 flex items-start">
				<i class="fas fa-check-circle mr-2 mt-1"></i>
				<span>Success message goes here</span>
			</div>

			<form method="post" action="<?= base_url('passwordrenew/update_password'); ?>">
				<div class="mb-5">
					<label for="new_password" class="block text-xs font-medium text-gray-700 mb-1">
						<i class="fas fa-key text-violet-800 mr-2"></i>New Password
					</label>
					<div class="relative">
						<input type="password"
							   class="input-field w-full rounded-md p-3 pl-4 bg-gray-50 focus:outline-none focus:bg-white"
							   id="new_password"
							   name="new_password"
							   placeholder="Enter new password"
							   required>
					</div>
				</div>

				<div class="mb-4">
					<label for="confirm_password" class="block text-xs font-medium text-gray-700 mb-1">
						<i class="fas fa-check-circle text-violet-800 mr-2"></i>Confirm Password
					</label>
					<div class="relative">
						<input type="password"
							   class="input-field w-full rounded-md p-3 pl-4 bg-gray-50 focus:outline-none focus:bg-white"
							   id="confirm_password"
							   name="confirm_password"
							   placeholder="Confirm your password"
							   required>
						<div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
							<i class="fas fa-eye text-gray-400 hover:text-violet-800 text-sm" id="togglePassword"></i>
						</div>
					</div>
				</div>

				<div class="mb-6 flex items-center">
					<input type="checkbox" id="show_password" class="mr-2 h-4 w-4 accent-violet-600">
					<label for="show_password" class="text-sm text-gray-700">Show Password</label>
				</div>

				<button type="submit"
						class="update-btn w-full text-white py-3 rounded-md flex items-center justify-center font-medium">
					<i class="fas fa-sync-alt mr-2"></i> Update Password
				</button>
			</form>

			<div class="mt-6 pt-4 border-t border-gray-200 text-center">
				<a href="#" class="link-btn flex items-center justify-center text-sm">
					<i class="fas fa-arrow-left mr-1"></i> Back to Login
				</a>
			</div>

			<div class="mt-6 text-center text-xs text-gray-500">
				<p>© 2025 Sinhgad Technical Education Society. All rights reserved.</p>
			</div>
		</div>
	</div>
</div>

<script>
	const showPasswordCheckbox = document.getElementById('show_password');
	const newPasswordField = document.getElementById('new_password');
	const confirmPasswordField = document.getElementById('confirm_password');
	const togglePasswordIcon = document.getElementById('togglePassword');

	// Toggle password using checkbox
	showPasswordCheckbox.addEventListener('change', () => {
		const type = showPasswordCheckbox.checked ? 'text' : 'password';
		newPasswordField.type = type;
		confirmPasswordField.type = type;

		// Update eye icon
		if (showPasswordCheckbox.checked) {
			togglePasswordIcon.classList.remove('fa-eye');
			togglePasswordIcon.classList.add('fa-eye-slash');
		} else {
			togglePasswordIcon.classList.remove('fa-eye-slash');
			togglePasswordIcon.classList.add('fa-eye');
		}
	});

	// Toggle password using eye icon
	togglePasswordIcon.addEventListener('click', function() {
		showPasswordCheckbox.checked = !showPasswordCheckbox.checked;

		// Trigger the checkbox change event
		const event = new Event('change');
		showPasswordCheckbox.dispatchEvent(event);
	});
</script>
</body>

</html>
