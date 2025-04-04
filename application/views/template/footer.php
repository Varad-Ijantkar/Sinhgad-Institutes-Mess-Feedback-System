<style>
	:root {
		--font-default: "Open Sans", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
		--font-secondary: "Inter", sans-serif;
		--color-default: #212529;
		--color-primary: #7c4dff;
		--purple-dark: #3a2b59;
		--purple-darker: #2d1f47;
		--black-gradient-start: #222222; /* Changed to off-black */
		--black-gradient-end: #000000; /* Changed to lighter off-black */
		--footer-text: rgba(255, 255, 255, 0.85);
		--footer-heading: #ffffff;
		--footer-link: rgba(255, 255, 255, 0.7);
		--footer-link-hover: #7c4dff;
		--footer-border: rgba(255, 255, 255, 0.1);
		scroll-behavior: smooth;
	}

	/* Footer Styles with Unique Class Names */
	.student-footer {
		background: linear-gradient(to bottom, var(--black-gradient-start), var(--black-gradient-end));
		padding: 35px 0 15px;
		color: var(--footer-text);
		font-size: 14px;
		position: relative;
		box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
	}

	.student-footer::before {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		height: 1px;
		background: linear-gradient(90deg, transparent, var(--purple-dark), transparent);
	}

	.student-footer h4 {
		font-size: 16px;
		font-weight: 600;
		color: var(--footer-heading);
		margin-bottom: 15px;
		position: relative;
		padding-bottom: 8px;
		letter-spacing: 0.5px;
	}

	.student-footer h4::after {
		content: "";
		position: absolute;
		left: 0;
		bottom: 0;
		width: 30px;
		height: 2px;
		background: linear-gradient(90deg, var(--color-primary), var(--purple-dark));
	}

	.student-footer p {
		margin: 0 0 8px;
		line-height: 1.5;
	}

	.student-footer .student-footer-content {
		display: flex;
		justify-content: space-between;
		flex-wrap: wrap;
	}

	.student-footer .student-footer-info-item {
		margin-right: 20px;
		margin-bottom: 20px;
		flex: 1;
		min-width: 200px;
	}

	.student-footer .student-footer-icon-box {
		display: flex;
		align-items: flex-start;
		margin-bottom: 15px;
	}

	.student-footer .student-footer-icon {
		font-size: 18px;
		color: var(--color-primary);
		margin-right: 12px;
		height: 36px;
		width: 36px;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: rgba(124, 77, 255, 0.1);
		border-radius: 50%;
		flex-shrink: 0;
		transition: all 0.3s ease;
	}

	.student-footer .student-footer-icon-box:hover .student-footer-icon {
		background-color: rgba(124, 77, 255, 0.2);
		transform: translateY(-2px);
	}

	.student-footer .student-footer-info {
		flex: 1;
	}

	.student-footer strong {
		color: var(--footer-heading);
		font-weight: 600;
	}

	.student-footer .student-footer-social-links {
		display: flex;
		gap: 12px;
	}

	.student-footer .student-footer-social-links a {
		width: 36px;
		height: 36px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		background-color: rgba(255, 255, 255, 0.08);
		font-size: 16px;
		color: var(--footer-text);
		transition: all 0.3s ease;
		position: relative;
		overflow: hidden;
	}

	.student-footer .student-footer-social-links a::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: var(--color-primary);
		border-radius: 50%;
		transform: scale(0);
		transition: transform 0.3s ease;
		z-index: -1;
	}

	.student-footer .student-footer-social-links a:hover {
		color: #ffffff;
		transform: translateY(-3px);
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
	}

	.student-footer .student-footer-social-links a:hover::before {
		transform: scale(1);
	}

	.student-footer .student-footer-social-links svg {
		width: 16px;
		height: 16px;
		z-index: 1;
	}

	.student-footer .student-footer-copyright {
		text-align: center;
		padding-top: 20px;
		margin-top: 20px;
		border-top: 1px solid var(--footer-border);
		font-size: 13px;
	}

	.student-footer .student-footer-copyright a {
		color: var(--footer-heading);
		font-weight: 600;
		transition: color 0.3s ease;
	}

	.student-footer .student-footer-copyright a:hover {
		color: var(--color-primary);
	}

	.student-footer .student-footer-version {
		color: var(--footer-link);
		font-size: 11px;
		margin-top: 5px;
	}

	.student-footer .student-footer-container {
		max-width: 1140px;
		margin: 0 auto;
		padding: 0 15px;
	}

	/* Mobile Optimization with Unique Class Names */
	@media (max-width: 768px) {
		.student-footer {
			padding: 18px 0 8px; /* More compact padding */
			font-size: 12px; /* Smaller font */
			text-align: center; /* Center-align content */
		}

		.student-footer h4 {
			font-size: 14px;
			margin-bottom: 6px;
			padding-bottom: 4px;
		}

		.student-footer h4::after {
			width: 25px; /* Smaller underline */
			height: 1px; /* Thinner underline */
			left: 50%; /* Center the underline */
			transform: translateX(-50%); /* Center the underline */
		}

		.student-footer .student-footer-content {
			display: flex !important; /* Force flexbox */
			flex-direction: column !important; /* Force single column */
			gap: 15px; /* Adds gap instead of margins */
			justify-content: center; /* Center content */
		}

		.student-footer .student-footer-info-item {
			margin-bottom: 8px;
			min-width: auto; /* Remove min-width constraint */
			margin-right: 0; /* Remove right margin */
			text-align: center; /* Center text */
		}

		.student-footer .student-footer-icon-box {
			margin-bottom: 6px;
			flex-direction: column; /* Stack icon and text */
			align-items: center; /* Center items */
		}

		.student-footer .student-footer-icon {
			height: 26px; /* Smaller icon */
			width: 26px;
			font-size: 13px;
			margin-right: 0; /* Remove right margin */
			margin-bottom: 5px; /* Add bottom margin */
		}

		.student-footer p {
			margin: 0 0 4px;
			line-height: 1.3;
		}

		.student-footer .student-footer-social-links {
			gap: 6px;
			justify-content: center; /* Center social links */
		}

		.student-footer .student-footer-social-links a {
			width: 28px; /* Smaller social icons */
			height: 28px;
			font-size: 13px;
		}

		.student-footer .student-footer-copyright {
			padding-top: 8px;
			margin-top: 8px;
			font-size: 11px;
		}

		.student-footer .student-footer-version {
			font-size: 9px;
			margin-top: 3px;
		}

		.student-footer .student-footer-container {
			padding: 0 8px;
		}
	}

	/* For even smaller screens */
	@media (max-width: 480px) {
		.student-footer {
			padding: 15px 0 6px;
		}

		.student-footer .student-footer-info-item {
			width: 100%; /* Full width */
			margin-right: 0;
			margin-bottom: 6px;
		}

		.student-footer .student-footer-icon {
			height: 24px; /* Even smaller icons */
			width: 24px;
		}

		.student-footer .student-footer-social-links a {
			width: 26px;
			height: 26px;
		}

		.student-footer .student-footer-icon-box {
			align-items: center;
		}

		.student-footer .student-footer-content {
			gap: 10px;
		}
	}
</style>
<footer class="student-footer">
	<div class="student-footer-container">
		<div class="student-footer-content">
			<div class="student-footer-info-item">
				<div class="student-footer-icon-box">
					<div class="student-footer-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
							<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
						</svg>
					</div>
					<div class="student-footer-info">
						<h4>Address</h4>
						<p>
							19/15, Erandawane Smt. Khilare Marg,<br>
							Off Karve Road, Pune 411004
						</p>
					</div>
				</div>
			</div>

			<div class="student-footer-info-item">
				<div class="student-footer-icon-box">
					<div class="student-footer-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
							<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
							<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
						</svg>
					</div>
					<div class="student-footer-info">
						<h4>Opening Hours</h4>
						<p><strong>Monday - Saturday:</strong> 9:00 AM - 6:00 PM<br>
							<strong>Sunday:</strong> Closed</p>
					</div>
				</div>
			</div>

			<div class="student-footer-info-item">
				<div class="student-footer-icon-box">
					<div class="student-footer-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
							<path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5"/>
						</svg>
					</div>
					<div class="student-footer-info">
						<h4>Follow Us</h4>
						<div class="student-footer-social-links">
							<a href="https://twitter.com/SinhgadCollege" aria-label="Twitter">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
									<path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
								</svg>
							</a>
							<a href="https://www.facebook.com/SinhgadInstitutes.STES" aria-label="Facebook">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
									<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
								</svg>
							</a>
							<a href="https://www.instagram.com/sinhgadinstitutes/" aria-label="Instagram">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
									<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
								</svg>
							</a>
							<a href="https://in.linkedin.com/school/sinhgad-institutes/" aria-label="LinkedIn">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
									<path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="student-footer-container">
		<div class="student-footer-copyright">
			© 2025 <a href="#">Sinhgad Technical Education Society</a>. All Rights Reserved.
			<div class="student-footer-version">Version 2.01.01</div>
		</div>
	</div>
</footer>
