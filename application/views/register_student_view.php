<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Details</title>
    <style>
            :root {
                --primary-color:hsl(270, 46.20%, 28.40%);
                --primary-hover:hsl(270, 46.20%, 48.40%);
                --background: #f8fafc;
                --card-background: #ffffff;
                --text-color: #1f2937;
                --border-color: #e5e7eb;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: var(--background);
                color: var(--text-color);
                margin: 0;
                min-height: 100vh;
                place-items: center;
            }

            .form-container {
                background: var(--card-background);
                padding: 1.5rem;
                border-radius: 0.75rem;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
                width: 100%;
                max-width: 600px;
                margin-top:5%;
            }

            .title {
                font-size: 1.5rem;
                font-weight: 600;
                margin: 0 0 1.5rem;
                text-align: center;
                color: var(--text-color);
            }

            .row {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
                margin-bottom: 1rem;
            }

            .full-width {
                grid-column: 1 / -1;
            }

            .field {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            }

            label {
                font-size: 0.875rem;
                font-weight: 500;
                color: var(--text-color);
            }

            input, select {
                padding: 0.5rem;
                border: 1px solid var(--border-color);
                border-radius: 0.375rem;
                font-size: 0.875rem;
                transition: border-color 0.15s ease;
            }

            input:focus, select:focus {
                outline: none;
                border-color: var(--primary-color);
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            }

            #btnn {
                background: var(--primary-color);
                color: white;
                border: none;
                padding: 0.625rem;
                border-radius: 0.375rem;
                font-weight: 500;
                cursor: pointer;
                transition: background-color 0.15s ease;
                width: 100%;
                margin-top:5%;
            }

            #btnn:hover {
                background: var(--primary-hover);
            }

			.form-control {
				appearance: none;
				-webkit-appearance: none;
				-moz-appearance: none;
				background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
				background-repeat: no-repeat;
				background-position: right 0.5rem center;
				background-size: 1.5em 1.5em;
				padding-right: 2rem;
				border: 1px solid var(--border-color);
				border-radius: 0.375rem;
				font-size: 0.875rem;
				transition: border-color 0.15s ease;
			}

			.form-control:focus {
				outline: none;
				border-color: var(--primary-color);
				box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
			}

            @media (max-width: 640px) {
                .row {
                    grid-template-columns: 1fr;
                }
            }
        </style>
</head>
<body>
    <div class="form-container">
        <h2 class="title">Add Student Details</h2>

        <!-- Display Success or Error Messages -->
        <?php if ($this->session->flashdata('success')): ?>
        <div style="padding: 1rem; background-color: #d4edda; color: #155724; margin-bottom: 1rem; border: 1px solid #c3e6cb; border-radius: 0.25rem;">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php elseif ($this->session->flashdata('error')): ?>
        <div style="padding: 1rem; background-color: #f8d7da; color: #721c24; margin-bottom: 1rem; border: 1px solid #f5c6cb; border-radius: 0.25rem;">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <form action="<?php echo base_url('admin_dashboard/register_student'); ?>" method="POST">
            <!-- Name -->
            <div class="row">
                <div class="field full-width">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="" placeholder="Enter full name" required>
                </div>
            </div>

            <!-- Email and Phone -->
            <div class="row">
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="" placeholder="Enter email" required>
                </div>
                <div class="field">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="" placeholder="Enter phone number" required>
                </div>
            </div>

            <!-- College -->
            <div class="field" style="margin-bottom: 1rem" >
                <label for="college">College</label>
				<select name="college" class="form-control">
					<option value="">Select College</option>
					<?php foreach ($options['colleges'] as $college): ?>
						<option value="<?= $college['college_id'] ?>"><?= $college['college_name'] ?></option>
					<?php endforeach; ?>
				</select>
            </div>

            <!-- Campus -->
            <div class="field" style="margin-bottom: 1rem" >
                <label for="campus">Campus</label>
				<select name="campus" class="form-control">
					<option value="">Select Campus</option>
					<?php foreach ($options['campuses'] as $campus): ?>
						<option value="<?= $campus['campus_id'] ?>"><?= $campus['campus_name'] ?></option>
					<?php endforeach; ?>
				</select>
            </div>

            <!-- Mess -->
			<div class="field">
				<label for="mess">Mess Preference</label>
				<select id="mess" name="mess" class="form-control" required>
					<option value="">Select Mess</option>
					<?php foreach ($options['messes'] as $mess): ?>
						<option value="<?= $mess['mess_id'] ?>"><?= $mess['mess_name'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

            <!-- Submit Button -->
            <button id="btnn" type="submit">Register Student</button>
        </form>
    </div>
</body>
</html>
