<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Get Credential</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-center">
					<h4>Get Credential</h4>
				</div>
				<div class="card-body">
					<!-- Display flash messages -->
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success">
							<?= $this->session->flashdata('success') ?>
						</div>
					<?php elseif ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('error') ?>
						</div>
					<?php endif; ?>

					<form method="post" action="<?= base_url('getcredentials/send_credentials'); ?>">
						<div class="mb-3">
							<label for="email" class="form-label">Enter your registered email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
						</div>
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Send Credential</button>
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
