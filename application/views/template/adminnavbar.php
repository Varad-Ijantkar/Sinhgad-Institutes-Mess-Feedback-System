<!-- application/views/admin_sidebar.php -->
<?php
// Get the current controller and method from CodeIgniter's URI segments
$CI =& get_instance();
$current_controller = $CI->uri->segment(1); // e.g., 'admin_dashboard'
$current_method = $CI->uri->segment(2);     // e.g., 'upload_student_details'
?>

<!-- Toggle Button (Positioned outside the sidebar) -->
<div class="sidebar-toggle-btn" onclick="toggleSidebar()">
	<i class="fas fa-bars"></i>
</div>

<aside class="sidebar">
	<div class="sidebar-wrapper">
		<div class="sidebar-menu">
			<div class="menu-section">
				<h4 class="menu-section-title">Main</h4>
				<div class="menu-item <?php echo ($current_controller == 'admin_dashboard' && !$current_method) ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('admin_dashboard'); ?>">
						<i class="fas fa-tachometer-alt"></i>
						<span>Dashboard</span>
					</a>
				</div>
			</div>

			<div class="menu-section">
				<h4 class="menu-section-title">Complaints</h4>
				<?php if (in_array($this->session->userdata('user_role'), ['Supervisor', 'Residence Officer', 'Management', 'Estate Head'])): ?>
					<div class="menu-item <?php echo ($current_controller == 'admin_pending_complaints') ? 'active' : ''; ?>">
						<div class="active-indicator"></div>
						<a href="<?php echo site_url('admin_pending_complaints'); ?>">
							<i class="fas fa-clock"></i>
							<span>Pending</span>
						</a>
					</div>
				<?php endif; ?>

				<?php if (in_array($this->session->userdata('user_role'), ['Vendor'])): ?>
					<div class="menu-item <?php echo ($current_controller == 'admin_assigned_complaints') ? 'active' : ''; ?>">
						<div class="active-indicator"></div>
						<a href="<?php echo site_url('admin_assigned_complaints'); ?>">
							<i class="fas fa-tasks"></i>
							<span>Assigned</span>
						</a>
					</div>
				<?php endif; ?>

				<div class="menu-item <?php echo ($current_controller == 'admin_resolved_complaints') ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('admin_resolved_complaints'); ?>">
						<i class="fas fa-check-circle"></i>
						<span>Resolved</span>
					</a>
				</div>

				<div class="menu-item <?php echo ($current_controller == 'admin_total_complaints') ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('admin_total_complaints'); ?>">
						<i class="fas fa-list-alt"></i>
						<span>Total</span>
					</a>
				</div>
			</div>

			<div class="menu-section">
				<h4 class="menu-section-title">Services</h4>
				<div class="menu-item <?php echo ($current_controller == 'admin_dashboard' && $current_method == 'mess_ratings') ? 'active' : ''; ?>">
					<div class="active-indicator"></div>
					<a href="<?php echo site_url('admin_dashboard/mess_ratings'); ?>">
						<i class="fas fa-star"></i>
						<span>Mess Rating</span>
					</a>
				</div>
			</div>

			<?php if (in_array($this->session->userdata('user_role'), ['Residence Officer', 'Management', 'Estate Head'])): ?>
				<div class="menu-section">
					<h4 class="menu-section-title">Student Management</h4>
					<div class="menu-item <?php echo ($current_controller == 'admin_dashboard' && $current_method == 'upload_student_details') ? 'active' : ''; ?>">
						<div class="active-indicator"></div>
						<a href="<?php echo site_url('admin_dashboard/upload_student_details'); ?>">
							<i class="fas fa-upload"></i>
							<span>Upload Student Details</span>
						</a>
					</div>

					<div class="menu-item <?php echo ($current_controller == 'admin_dashboard' && $current_method == 'register_student') ? 'active' : ''; ?>">
						<div class="active-indicator"></div>
						<a href="<?php echo site_url('admin_dashboard/register_student'); ?>">
							<i class="fas fa-user-plus"></i>
							<span>Register Student</span>
						</a>
					</div>

					<div class="menu-item <?php echo ($current_controller == 'admin_dashboard' && $current_method == 'view_student_details') ? 'active' : ''; ?>">
						<div class="active-indicator"></div>
						<a href="<?php echo site_url('admin_dashboard/view_student_details'); ?>">
							<i class="fas fa-address-card"></i>
							<span>View Student Details</span>
						</a>
					</div>
				</div>
			<?php endif; ?>

			<?php if (in_array($this->session->userdata('user_role'), ['Residence Officer', 'Estate Head', 'Management'])): ?>
				<div class="menu-section">
					<h4 class="menu-section-title">Administration</h4>
					<div class="menu-item <?php echo ($current_controller == 'admin_dashboard' && $current_method == 'manage_access') ? 'active' : ''; ?>">
						<div class="active-indicator"></div>
						<a href="<?php echo site_url('admin_dashboard/manage_access'); ?>">
							<i class="fas fa-lock"></i>
							<span>Manage Access</span>
						</a>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<div class="user-section">
			<div class="user-info">
				<div class="user-avatar">
					<i class="fas fa-user"></i>
				</div>
				<div class="user-details">
					<div class="user-role"><?php echo $this->session->userdata('user_role'); ?></div>
					<div class="user-email"><?php echo isset($user_email) ? $user_email : 'Not set'; ?></div>
				</div>
			</div>

			<form method="post" action="<?php echo base_url('admin_dashboard/logout'); ?>">
				<button type="submit" class="logout-btn">
					<i class="fas fa-sign-out-alt"></i>
					<span>Logout</span>
				</button>
			</form>
		</div>
	</div>
</aside>

<style>
	.sidebar {
		width: 200px;
		background: linear-gradient(180deg, #48276A 0%, #351B4A 100%);
		color: #fff;
		transition: all 0.3s ease;
		box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
		position: fixed;
		height: 100vh;
		z-index: 998; /* Above content, below toggle button */
		left: 0;
		top: 0;
		display: flex;
		flex-direction: column;
	}

	.sidebar.closed {
		transform: translateX(-200px);
	}

	.sidebar.open {
		transform: translateX(0);
	}

	/* Toggle Button Styles */
	.sidebar-toggle-btn {
		position: fixed;
		left: 15px;
		top: 20px; /* Adjusted to avoid overlap with assumed navbar */
		background-color: #48276A;
		color: white;
		width: 40px;
		height: 40px;
		border-radius: 20%;
		display: flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
		z-index: 1001; /* Above sidebar */
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		transition: all 0.3s ease;
	}

	.sidebar-toggle-btn:hover {
		background-color: #6A4C93;
	}

	.sidebar-wrapper {
		display: flex;
		flex-direction: column;
		height: 100%;
	}

	.sidebar-menu {
		padding: 0;
		overflow-y: auto;
		flex-grow: 1;
		margin-top: 60%; /* Adjusted for assumed navbar height */
	}

	.menu-section {
		margin-bottom: 10px;
	}

	.menu-section-title {
		padding: 8px 15px;
		font-size: 10px;
		text-transform: uppercase;
		letter-spacing: 0.8px;
		color: rgba(255, 255, 255, 0.6);
		font-weight: 600;
	}

	.menu-item {
		position: relative;
		transition: all 0.3s;
		margin: 4px 8px;
		border-radius: 6px;
	}

	.menu-item a {
		display: flex;
		align-items: center;
		padding: 8px 10px;
		color: #fff;
		text-decoration: none;
		font-size: 10px;
		font-weight: 500;
		transition: all 0.2s;
		border-radius: 6px;
	}

	.menu-item:hover a {
		background-color: #5A3A7A;
	}

	.menu-item.active {
		background-color: #6A4C93;
	}

	.menu-item.active a {
		color: #fff;
	}

	.menu-item i {
		margin-right: 8px;
		font-size: 12px;
		width: 14px;
		text-align: center;
	}

	.user-section {
		width: 100%;
		padding: 10px 15px;
		background-color: rgba(0, 0, 0, 0.2);
		border-top: 1px solid rgba(255, 255, 255, 0.05);
	}

	.user-info {
		display: flex;
		align-items: center;
		gap: 8px;
		margin-bottom: 10px;
	}

	.user-avatar {
		width: 30px;
		height: 30px;
		border-radius: 50%;
		background-color: #6A4C93;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 14px;
		color: white;
	}

	.user-details {
		display: flex;
		flex-direction: column;
	}

	.user-email {
		font-size: 9px;
		color: #fff;
		word-break: break-all;
	}

	.user-role {
		font-size: 10px;
		font-weight: 600;
	}

	.logout-btn {
		width: 100%;
		padding: 8px;
		background-color: #e74c3c;
		color: white;
		border: none;
		border-radius: 6px;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 6px;
		font-weight: 600;
		transition: all 0.2s;
		font-size: 10px;
	}

	.logout-btn:hover {
		background-color: #c0392b;
	}

	.active-indicator {
		position: absolute;
		left: 0;
		top: 0;
		width: 3px;
		height: 100%;
		background-color: #6A4C93;
		border-radius: 0 3px 3px 0;
	}

	@media (max-width: 768px) {
		.sidebar {
			transform: translateX(-200px);
		}

		.sidebar.open {
			transform: translateX(0);
		}

		.sidebar-toggle-btn {
			left: 15px;
		}

		body.sidebar-open .sidebar-toggle-btn {
			left: 210px;
		}
	}
</style>

<script>
	function toggleSidebar() {
		const sidebar = document.querySelector('.sidebar');
		const content = document.querySelector('.content') || document.querySelector('.container'); // Flexible targeting
		const body = document.body;

		if (sidebar && content) {
			sidebar.classList.toggle('closed');
			sidebar.classList.toggle('open');
			content.classList.toggle('expanded');

			// Toggle body classes for responsive positioning
			if (sidebar.classList.contains('closed')) {
				body.classList.add('sidebar-closed');
				body.classList.remove('sidebar-open');
			} else {
				body.classList.add('sidebar-open');
				body.classList.remove('sidebar-closed');
			}
		}
	}

	function checkScreenSize() {
		const sidebar = document.querySelector('.sidebar');
		const content = document.querySelector('.content') || document.querySelector('.container'); // Flexible targeting
		const body = document.body;

		if (window.innerWidth <= 768) {
			if (sidebar && content) {
				sidebar.classList.add('closed');
				sidebar.classList.remove('open');
				content.classList.add('expanded');
				body.classList.add('sidebar-closed');
				body.classList.remove('sidebar-open');
			}
		} else {
			if (sidebar && content) {
				sidebar.classList.remove('closed');
				sidebar.classList.add('open');
				content.classList.remove('expanded');
				body.classList.remove('sidebar-closed');
				body.classList.add('sidebar-open');
			}
		}
	}

	window.addEventListener('load', checkScreenSize);
	window.addEventListener('resize', checkScreenSize);
</script>
