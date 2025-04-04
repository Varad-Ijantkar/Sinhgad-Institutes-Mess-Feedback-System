<!-- admin_dashboard_view.php -->
<div class="dashboard-content">
	<div class="dashboard-header">
		<h1>Dashboard Overview</h1>
		<p class="dashboard-subtitle">Welcome back, Admin</p>
	</div>

	<div class="card-container">
		<div class="card pending">
			<div class="card-icon">
				<i class="fas fa-clock"></i>
			</div>
			<div class="card-content">
				<h2>Pending</h2>
				<p class="card-value"><?php echo isset($pending_count) ? $pending_count : '0'; ?></p>
				<p class="card-label">Tickets awaiting action</p>
			</div>
		</div>

		<div class="card resolved">
			<div class="card-icon">
				<i class="fas fa-check-circle"></i>
			</div>
			<div class="card-content">
				<h2>Resolved</h2>
				<p class="card-value"><?php echo isset($resolved_count) ? $resolved_count : '0'; ?></p>
				<p class="card-label">Completed tickets</p>
			</div>
		</div>

		<div class="card total">
			<div class="card-icon">
				<i class="fas fa-ticket-alt"></i>
			</div>
			<div class="card-content">
				<h2>Total</h2>
				<p class="card-value"><?php echo isset($total_count) ? $total_count : '0'; ?></p>
				<p class="card-label">All tickets</p>
			</div>
		</div>
	</div>

	<div class="recent-activity">
		<h2>Recent Activity</h2>
		<div class="activity-placeholder">
			<p>No recent activity to display</p>
		</div>
	</div>
</div>

<style>
	/* Font import */
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
	@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		font-family: 'Poppins', Arial, sans-serif;
		height: 100vh;
		background-color: #f5f7fa;
		color: #333;
		overflow-x: hidden;
	}

	.dashboard-content {
		padding: 140px 2rem 2rem;
		width: calc(100% - 200px);
		margin-left: 200px;
		min-height: 100vh;
		transition: all 0.3s ease;
		display: flex;
		flex-direction: column;
		gap: 2rem;
		position: relative;
	}

	body.sidebar-closed .dashboard-content {
		width: 100%;
		margin-left: 0;
	}

	.dashboard-header {
		margin-bottom: 1.5rem;
	}

	.dashboard-header h1 {
		margin: 0;
		font-size: 2rem;
		font-weight: 600;
		color: #2c3e50;
	}

	.dashboard-subtitle {
		margin: 0.5rem 0 0;
		color: #7f8c8d;
		font-size: 0.95rem;
	}

	.card-container {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
		gap: 1.5rem;
		width: 100%;
		max-width: 1000px;
		justify-content: center;
		flex-wrap: wrap;
		margin: 0 auto; /* Center the container */
	}

	.card {
		display: flex;
		border-radius: 12px;
		padding: 1.5rem;
		color: white;
		box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
		transition: transform 0.3s ease, box-shadow 0.3s ease;
		overflow: hidden;
		position: relative;
	}

	.card::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 60%);
		z-index: 1;
	}

	.card-icon {
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 2.5rem;
		margin-right: 1.5rem;
		z-index: 2;
	}

	.card-content {
		flex-grow: 1;
		z-index: 2;
	}

	.card h2 {
		margin: 0 0 0.5rem;
		font-size: 1.2rem;
		font-weight: 500;
	}

	.card-value {
		margin: 0.5rem 0;
		font-size: 2.5rem;
		font-weight: 700;
	}

	.card-label {
		margin: 0;
		font-size: 0.85rem;
		opacity: 0.8;
	}

	.card.pending {
		background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
	}

	.card.resolved {
		background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
	}

	.card.total {
		background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
	}

	.card:hover {
		transform: translateY(-5px);
		box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
	}

	.card.pending:hover {
		box-shadow: 0 15px 30px rgba(231, 76, 60, 0.2);
	}

	.card.resolved:hover {
		box-shadow: 0 15px 30px rgba(46, 204, 113, 0.2);
	}

	.card.total:hover {
		box-shadow: 0 15px 30px rgba(44, 62, 80, 0.2);
	}

	.recent-activity {
		background: white;
		border-radius: 12px;
		padding: 1.5rem;
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
	}

	.recent-activity h2 {
		margin-top: 0;
		color: #2c3e50;
		font-size: 1.2rem;
		font-weight: 600;
	}

	.activity-placeholder {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 150px;
		background-color: #f9f9f9;
		border-radius: 8px;
		color: #95a5a6;
	}

	/* Responsive Breakpoints */
	@media (max-width: 1200px) {
		.card-container {
			grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
		}
	}

	@media (max-width: 992px) {
		.dashboard-content {
			padding: 120px 1.5rem 1.5rem;
		}
		.card {
			padding: 1.2rem;
		}
	}

	@media (max-width: 768px) {
		.dashboard-content {
			width: 100%;
			margin-left: 0;
			padding: 80px 1rem 1rem;
		}
		body.sidebar-closed .dashboard-content {
			width: 100%;
			margin-left: 0;
		}
		.card-container {
			grid-template-columns: 1fr;
		}
		.card {
			max-width: 100%;
		}
	}

	@media (max-width: 576px) {
		.dashboard-header h1 {
			font-size: 1.5rem;
		}
		.card-value {
			font-size: 2rem;
		}
		.card-icon {
			font-size: 2rem;
		}
	}
</style>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		window.toggleSidebar = function() {
			const sidebar = document.querySelector('.sidebar');
			if (sidebar) {
				sidebar.classList.toggle('closed');
				document.body.classList.toggle('sidebar-closed');
			}
		};

		function checkScreenSize() {
			const sidebar = document.querySelector('.sidebar');
			if (sidebar) {
				if (window.innerWidth <= 768) {
					sidebar.classList.add('closed');
					document.body.classList.add('sidebar-closed');
				} else {
					sidebar.classList.remove('closed');
					document.body.classList.remove('sidebar-closed');
				}
			}
		}

		checkScreenSize();
		window.addEventListener('resize', checkScreenSize);
	});
</script>
