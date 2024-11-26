<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Password Renewal</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-center">
					<h4>Renew Your Password</h4>
				</div>
				<div class="card-body">
					<!-- Display flash messages -->
					<?php if ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('error') ?>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success">
							<?= $this->session->flashdata('success') ?>
						</div>
					<?php endif; ?>

					<form method="post" action="<?= base_url('passwordrenew/update_password'); ?>">
						<div class="mb-3">
							<label for="new_password" class="form-label">New Password</label>
							<input type="password" class="form-control" id="new_password" name="new_password" required>
						</div>
						<div class="mb-3">
							<label for="confirm_password" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
						</div>
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Update Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
