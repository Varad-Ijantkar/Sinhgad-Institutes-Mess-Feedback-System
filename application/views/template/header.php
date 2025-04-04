<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Mess Feedback System'; ?></title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/favicons/favicon16.png'); ?>" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/favicons/favicon32.png'); ?>" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/favicons/android512.png'); ?>" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/favicons/android192.png'); ?>" sizes="512x512">
	<!-- Apple Touch Icon (for iOS devices) -->
	<link rel="apple-touch-icon" href="<?php echo base_url('assets/favicons/apple.png'); ?>" sizes="192x192">

	<!-- Bootstrap and Font Awesome -->
	<link rel="stylesheet" href="https://bootswatch.com/5/simplex/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Bootstrap Icons for Footer -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<!-- Fonts for Footer -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Inter:wght@400;700&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
	<!-- Tailwind CSS -->
	<script src="https://cdn.tailwindcss.com"></script>

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		body {
			background-color: #f5f7fb;
			min-height: 100vh;
		}

		.bg-danger {
			background: #48276A;
			background-image: linear-gradient(to right, #48276A, #48276A);
			transition: opacity 300ms ease;
		}

		#header {
			height: 120px;
			padding: 10px 0;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			z-index: 999;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.header-container {
			display: flex;
			align-items: center;
			justify-content: space-between;
			flex: 1;
		}

		.header-logo {
			height: auto;
			max-height: 80px;
			max-width: 80px;
		}

		.social-links a {
			font-size: 1.2rem;
		}

		#header h2 {
			font-size: 1.5rem;
			margin: 0;
			line-height: 1.2;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		@media (min-width: 769px) {
			.header-container {
				padding-left: 70px;
			}
		}

		@media (max-width: 768px) {
			#header {
				height: 100px;
			}
			.header-logo {
				margin-left: 10px;
				max-height: 60px;
				max-width: 60px;
			}
			.social-links a {
				margin-right: 10px;
			}
			h4, h2 {
				font-size: 1rem;
				text-align: center;
			}
			#header h2 {
				font-size: 1.25rem;
			}
		}

		@media (max-width: 576px) {
			h4, h2 {
				font-size: 0.9rem;
			}
			#header h2 {
				font-size: 1rem;
			}
		}
	</style>
</head>
<body>
<!-- Header Section -->
<header id="header" class="mx-auto bg-danger">
	<div class="container header-container">
		<img src="https://cms.sinhgad.edu/SIM_Web_Assets/images/sinhgad-logo-colour-1.png"
			 alt="Sinhgad Technical Education Society, Pune" class="img-fluid header-logo">
		<h4 class="fs-6 fw-light text-white ms-3 d-none d-md-block">Sinhgad Technical Education Society, Pune</h4>
		<div class="social-links ms-auto d-flex">
			<a href="https://twitter.com/SinhgadCollege" target="_blank" class="me-2"><i class="fab fa-twitter text-white"></i></a>
			<a href="https://www.facebook.com/SinhgadInstitutes.STES" target="_blank" class="me-2"><i class="fab fa-facebook text-white"></i></a>
			<a href="https://www.instagram.com/sinhgadinstitutes/" target="_blank" class="me-2"><i class="fab fa-instagram text-white"></i></a>
			<a href="https://in.linkedin.com/school/sinhgad-institutes/" target="_blank"><i class="fab fa-linkedin text-white"></i></a>
		</div>
	</div>
	<div class="container d-flex justify-content-center mt-1">
		<h2 class="text-white fw-light"><b><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Mess Feedback System'; ?></b></h2>
	</div>
</header>
<!-- End Header -->
