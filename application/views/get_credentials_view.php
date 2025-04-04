<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Get Credential</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
	<style>
		/* Ensure body takes full height and matches background */
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
			background-color: #f5f7fb; /* Match other pages */
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		/* Center the form and account for header */
		.form-container {
			max-width: 450px;
			margin: 0 auto;
			padding: 8rem 1rem 2rem; /* Increased top padding to 8rem (128px) to clear header */
			position: relative;
			z-index: 10;
			min-height: calc(100vh - 120px); /* Ensure it fits viewport minus header */
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.card {
			border-radius: 16px;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
			overflow: hidden;
			background: white;
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}

		.card:hover {
			transform: translateY(-5px);
			box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
		}

		.header-curve {
			height: 15px;
			background: #5a2d9c;
			border-radius: 0 0 50% 50% / 0 0 100% 100%;
			margin-top: -8px;
		}

		.input-field {
			transition: all 0.2s ease;
			border: 2px solid transparent;
		}

		.input-field:focus {
			border-color: #5a2d9c;
			box-shadow: 0 0 0 3px rgba(90, 45, 156, 0.2);
		}

		.btn-send {
			background: #5a2d9c;
			transition: all 0.3s ease;
			position: relative;
			overflow: hidden;
		}

		.btn-send:hover {
			background: #4b2e83;
			transform: translateY(-2px);
		}

		.btn-send:before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
			transition: 0.5s;
		}

		.btn-send:hover:before {
			left: 100%;
		}
	</style>
</head>
<body>
<!-- Main form container -->
<div class="form-container">
	<div class="card">
		<!-- Header with deeper purple -->
		<div class="bg-[#5a2d9c] py-7 px-8 relative">
			<!-- Fixed positioning for decorative circles -->
			<div class="fixed-circle absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                         w-20 h-20 bg-[#7b4fc4] rounded-full flex items-center justify-center opacity-20"></div>
			<div class="fixed-circle absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                         w-14 h-14 bg-[#7b4fc4] rounded-full flex items-center justify-center opacity-40"></div>
			<h2 class="text-center text-white text-2xl font-bold mt-4 mb-1 relative z-10">Get Your Credentials</h2>
			<p class="text-center text-indigo-100 text-sm relative z-10">We'll send your login details to your email</p>
		</div>

		<div class="header-curve"></div>

		<!-- Form Section with padding -->
		<div class="p-8">
			<!-- Flash Messages -->
			<?php if ($this->session->flashdata('success')): ?>
				<div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
					<i class="fas fa-check-circle text-green-500 mr-3"></i>
					<span><?= $this->session->flashdata('success') ?></span>
				</div>
			<?php elseif ($this->session->flashdata('error')): ?>
				<div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
					<i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
					<span><?= $this->session->flashdata('error') ?></span>
				</div>
			<?php endif; ?>

			<form method="post" action="<?= base_url('getcredentials/send_credentials'); ?>" class="space-y-6">
				<!-- Email Input -->
				<div>
					<label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
					<div class="relative">
						<div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
							<i class="fas fa-envelope text-gray-400"></i>
						</div>
						<input type="email" id="email" name="email"
							   class="input-field block w-full pl-10 pr-3 py-3 border bg-gray-50 rounded-lg outline-none"
							   placeholder="Enter your registered email" required>
					</div>
				</div>

				<!-- Submit Button -->
				<button type="submit"
						class="btn-send w-full text-white py-3 rounded-lg font-medium flex items-center justify-center">
					<i class="fas fa-paper-plane mr-2"></i>
					Send Credentials
				</button>

				<!-- Support Link -->
				<div class="text-center text-sm text-gray-500">
					<span>Need help? </span>
					<a href="#" class="text-[#5a2d9c] hover:text-[#4b2e83] font-medium transition-colors">Contact Support</a>
				</div>
			</form>
		</div>
	</div>

	<!-- Footer text -->
	<div class="text-center text-gray-500 text-xs mt-4 mb-6">
		<p>Secure credential recovery system • Protected by encryption</p>
	</div>
</div>
</body>
</html>
