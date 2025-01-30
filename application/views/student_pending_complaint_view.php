<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pending Complaints</title>
    <script src="https://cdn.tailwindcss.com"></script>
	<style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif; /* Common clean font */
        }

        .table-container {
            padding: 0 10%;
            
        }

        .heading {
            font-size: 36px;
            text-align: center;
            color: rgb(92, 50, 135); /* Primary color */
            margin-bottom: 30px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
        }

        .table thead {
            background: #48276A; /* Strong contrast for headers */
        }

        .table thead tr th {
            font-size: 16px;
            font-weight: 700;
            color: white; /* Text color contrasting with header background */
            padding: 15px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .table tbody tr {
            background-color: white;
        }

        .table tbody tr:hover {
            background-color: #d8ebff; /* Light hover effect */
        }

        .table tbody tr td {
            font-size: 14px;
            color: #333; /* Standard text color */
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }
		.table thead tr th {
        background:rgb(85, 48, 123);
		}

        .view-btn {
            color: white;
            background: rgb(109, 57, 162); /* Matching primary button color */
            border: none;
            padding: 7px 12px;
            border-radius: 3px;
            font-size: 14px;
        }

        .view-btn:hover {
            background: rgb(80, 44, 116); /* Darker shade for hover */
            cursor: pointer;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .heading {
                font-size: 26px;
                font-bold: 600;
            }

            .table thead {
                display: none;
            }
			
            .table tbody tr {
                display: block;
                margin-bottom: 20px;
                background-color: white;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .table tbody tr td {
                display: flex;
                justify-content: space-between;
                text-align: left;
                padding: 10px 15px;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody tr td:last-child {
                border-bottom: none;
            }

            .table tbody tr td::before {
                content: attr(data-lable);
                font-weight: 600;
                flex-basis: 40%;
            }

            .table tbody tr td {
                flex-wrap: wrap;
                gap: 8px;
            }
        }
        @media (max-width: 456px) {
            .heading {
                font-size: 20px;
                
            }

            .table thead {
                display: none;
            }
			
            .table tbody tr {
                display: block;
                margin-bottom: 20px;
                background-color: white;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .table tbody tr td {
                display: flex;
                justify-content: space-between;
                text-align: left;
                padding: 10px 15px;
                border: none;
                border-bottom: 1px solid #dee2e6;
            }

            .table tbody tr td:last-child {
                border-bottom: none;
            }

            .table tbody tr td::before {
                content: attr(data-lable);
                font-weight: 600;
                flex-basis: 40%;
            }

            .table tbody tr td {
                flex-wrap: wrap;
                gap: 8px;
            }
        }
	</style>
</head>

<body class='bg-violet-100'>
	<div class="table-container ">
		<h1 class="heading">Pending Complaints</h1>
		<table class="table">
			<thead>
				<tr>
					<th>Complaint ID</th>
					<th>Name</th>
					<th>Mess</th>
					<th>Date Filed</th>
					<th>Campus</th>
					<th>Description</th>
					<th>View Report</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($pending_complaints)): ?>
					<?php foreach ($pending_complaints as $complaint): ?>
						<tr>
							<td data-lable="Complaint ID"><?php echo $complaint->id; ?></td>
							<td data-lable="Name"><?php echo $complaint->name; ?></td>
							<td data-lable="Mess"><?php echo $complaint->mess; ?></td>
							<td data-lable="Date Filed"><?php echo $complaint->date; ?></td>
							<td data-lable="Campus"><?php echo $complaint->campus; ?></td>
							<td data-lable="Description"><?php echo $complaint->food_complaints; ?></td>
							<td data-lable="View Report">
								<a href="<?php echo base_url('complaint/generate_report/' . $complaint->id); ?>"><button class='view-btn'>View</button></a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="7" style="text-align: center;">No pending complaints found</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php $this->load->view('template/footer'); ?>
</body>

</html>
