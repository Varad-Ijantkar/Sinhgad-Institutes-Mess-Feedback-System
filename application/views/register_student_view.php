<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Details</title>
    <style>
        /* Add a container for the form background */
        .form-container {
            background-color: #ffffff;
            /* Light grey background */
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 15px 15px rgba(229, 219, 253, 0.5);
            /* Soft shadow */
            max-width: 500px;
            margin-top: 8%;
            /* Center the form horizontally and add some space at the top */
            transform: translateX(60%);
        }

        /* Ensure the form is centered */
        .text-center {
            text-align: center;
            font-weight: bold;
            color: hsl(270, 46.20%, 28.40%);
        }

        /* Adjust form elements */
        .form-group {
            margin-bottom: 20px;
        }

        /* Submit button */
        .btn {
            background-color: hsl(270, 46.20%, 28.40%);
            width: 100%;
            color: white;
            padding: 10px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: hsl(270, 46.20%, 48.40%);
            color: white;
        }

        /* Style for the form labels */
        .form-group label {
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                margin-left: 5%;
                margin-top: 50%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Add Student Details</h2>

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
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                </div>

                <div class="form-group">
                    <label for="college">College</label>
                    <select name="college" class="form-control" required>
                        <option value="">Select College</option>
                        <?php foreach ($options['colleges'] as $college): ?>
                            <option value="<?= $college['college_id'] ?>"><?= $college['college_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="campus">Campus</label>
                    <select name="campus" class="form-control" required>
                        <option value="">Select Campus</option>
                        <?php foreach ($options['campuses'] as $campus): ?>
                            <option value="<?= $campus['campus_id'] ?>"><?= $campus['campus_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mess">Mess Preference</label>
                    <select id="mess" name="mess" class="form-control" required>
                        <option value="">Select Mess</option>
                        <?php foreach ($options['messes'] as $mess): ?>
                            <option value="<?= $mess['mess_id'] ?>"><?= $mess['mess_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn">Register Student</button>
            </form>
        </div>
    </div>
</body>
</html>
