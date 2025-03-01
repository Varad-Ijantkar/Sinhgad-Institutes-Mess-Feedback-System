<!-- ======= Header ======= -->
<style>
	.bg-danger {
		background: #48276A;
		background-image: linear-gradient(to right, #48276A, #48276A);
		transition: opacity 300ms ease;
	}

	#header {
		height: auto;
		padding: 10px 0;
		position: relative; /* Changed from sticky-top */
		z-index: 999; /* Lower than the toggle button */
	}

	/* Responsive Logo */
	.header-logo {
		height: auto;
		max-height: 80px;
		max-width: 80px;
	}

	/* Social Links Spacing */
	.social-links a {
		font-size: 1.2rem;
	}

	/* Toggle button positioning */
	.menu-toggle {
		position: fixed;
		top: 25px; /* Positioned within header height */
		left: 20px;
		z-index: 1010; /* Higher than header */
		background-color: #4B2E83;
		color: white;
		border: none;
		width: 45px;
		height: 45px;
		border-radius: 50%;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
		transition: all 0.3s ease;
	}

	/* Push header content to make room for toggle */
	@media (min-width: 769px) {
		.header-container {
			padding-left: 70px; /* Make room for toggle button */
		}
	}

	/* Adjust layout on smaller screens */
	@media (max-width: 768px) {
		.header-logo {
			margin-left: 70px; /* Make room for toggle button */
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
	}

	/* Hide large header text on extra-small screens */
	@media (max-width: 576px) {
		h4, h2 {
			font-size: 0.9rem;
		}
	}
</style>

<link rel="stylesheet" href="https://bootswatch.com/5/simplex/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Toggle button moved outside the header but visually appears within it -->
<button class="menu-toggle" onclick="toggleSidebar()">
	<i class="fas fa-bars"></i>
</button>

<header id="header" class="mx-auto bg-danger">
	<div class="container header-container d-flex align-items-center justify-content-between">
		<!-- Logo -->
		<img src="https://cms.sinhgad.edu/SIM_Web_Assets/images/sinhgad-logo-colour-1.png"
			 alt="Sinhgad Technical Education Society, Pune" class="img-fluid header-logo">

		<!-- Header Title (show on medium and larger screens) -->
		<h4 class="fs-6 fw-light text-white ms-3 d-none d-md-block">Sinhgad Technical Education Society, Pune</h4>

		<!-- Social Media Links -->
		<div class="social-links ms-auto d-flex">
			<a href="https://twitter.com/SinhgadCollege" target="_blank" class="me-2"><i class="fab fa-twitter text-white"></i></a>
			<a href="https://www.facebook.com/SinhgadInstitutes.STES" target="_blank" class="me-2"><i class="fab fa-facebook text-white"></i></a>
			<a href="https://www.instagram.com/sinhgadinstitutes/" target="_blank" class="me-2"><i class="fab fa-instagram text-white"></i></a>
			<a href="https://in.linkedin.com/school/sinhgad-institutes/" target="_blank"><i class="fab fa-linkedin text-white"></i></a>
		</div>

		<!-- Mobile Navigation Toggles -->
		<i class="mobile-nav-toggle mobile-nav-show bi bi-list text-white d-md-none"></i>
		<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x text-white"></i>
	</div>

	<!-- Title Section -->
	<div class="container d-flex justify-content-center mt-2">
		<h2 class="text-white fs-3 fw-light"><b>Mess Feedback System</b></h2>
	</div>
</header>
<!-- End Header -->
