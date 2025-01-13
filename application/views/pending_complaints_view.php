<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pending Complaints</title>
	<style>
		html,
		body {
			height: 100%;
			margin: 0;
			font-family: 'Quicksand', sans-serif;
			box-sizing: border-box;
		}

		.pending_view {
			margin-left: 280px;
			padding: 20px;
		}

		.heading {
			margin-top: 30px;
			margin-bottom: 0;
		}

		.heading h2 {
			font-family: sans-serif;
			text-align: center;
			color: rgb(87, 49, 125);
			font-weight: bolder;

		}

		.heading h3 {
			font-family: sans-serif;
			text-align: center;
			color: rgb(87, 49, 125);
		}

		.table-wrapper {
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin: 20px 0;
			background-color: #fff;
			border-radius: 12px;
		}

		table,
		th,
		td {
			padding: 12px 15px;
			border: 1px solid #ddd;
			height: 50;
		}

		th {
			background-color: rgb(87, 49, 125);
			color: white;
			text-align: left;
			font-weight: 700;
		}

		tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		tr:hover {
			background-color: #f3e5f5;
		}

		th,
		td {
			text-align: left;
			word-wrap: break-word;
			font-size: 14px;
		}

		.center-align {
			text-align: center;
		}

		.center-align button {
			background: hsl(270, 46.20%, 28.40%);
		}

		.center-align button:hover {
			background: hsl(270, 46.20%, 48.40%);
		}

		@media (max-width: 768px) {
			.pending_view {
				margin-left: 0;
				padding: 10px;
			}

			.pending_view h2,
			.pending_view h3 {
				text-align: center;
			}

			table,
			th,
			td {
				font-size: 14px;
				padding: 10px;
			}

			.table-wrapper::-webkit-scrollbar {
				display: none;
			}
		}

		@media (max-width: 576px) {

			table,
			th,
			td {
				font-size: 18px;
				padding: 8px;
				height: 50;
			}

			.table-wrapper {
				margin-left: 10px;
				margin-right: 10px;
			}

			th,
			td {
				white-space: nowrap;
			}
		}
	</style>
</head>

<body>
	<div class="heading">
		<h2>Pending Complaints</h2>
		<h3>Role: <?php echo isset($role) ? $role : 'Not set'; ?></h3>
	</div>
	<div class="pending_view">

		<!-- Display success or error message -->
		<?php if ($this->session->flashdata('message')): ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('message'); ?>
			</div>
		<?php elseif ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>

		<div class="table-wrapper">
			<table>
				<thead>
					<tr>
						<th>Complaint ID</th>
						<th>Name</th>
						<th>Mess</th>
						<th>Date Filed</th>
						<th>Campus</th>
						<th>Description</th>
						<?php if (!in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head'])): ?>
							<th class="center-align">Action</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($pending_complaints)): ?>
						<?php foreach ($pending_complaints as $complaint): ?>
							<tr>
								<td><?php echo $complaint['id']; ?></td>
								<td><?php echo $complaint['name']; ?></td>
								<td><?php echo $complaint['mess']; ?></td>
								<td><?php echo $complaint['date']; ?></td>
								<td><?php echo $complaint['campus']; ?></td>
								<td><?php echo $complaint['description']; ?></td>
								<?php if (!in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head'])): ?>
									<td class="center-align">
										<form method="post" action="<?php echo base_url('Admin_Pending_Complaints/mark_as_resolved'); ?>">
											<input type="hidden" name="complaint_id" value="<?php echo $complaint['id']; ?>">
											<button type="submit" class="btn btn-primary">Resolve</button>
										</form>
									</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="<?php echo !in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head']) ? 7 : 6; ?>">
								No pending complaints found
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>
