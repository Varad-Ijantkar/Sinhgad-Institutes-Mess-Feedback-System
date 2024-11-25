<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            /* Centering the form */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .alert {
            margin-top: 10px;
            color: red;
        }

        h2 {
            margin-bottom: 30px;
        }

        .btn-primary {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <h2 class="text-center">Admin Login</h2>
        <form action="<?php echo base_url('Admin_Login/login'); ?>" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo set_value('email'); ?>" placeholder="Enter Sinhgad Email" required
                    pattern=".+@sinhgad\.edu">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                    required>
            </div>

            <div class="form-group">
                <label for="role">Access Type</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="Vendor" <?php echo set_select('role', 'Vendor'); ?>>Vendor
                    </option>
                    <option value="Supervisor" <?php echo set_select('role', 'Supervisor'); ?>>Supervisor</option>
                    <option value="Residence Officer" <?php echo set_select('role', 'Residence Officer'); ?>>Residence
                        Officer</option>
                    <option value="Campus Director" <?php echo set_select('role', 'Campus Director'); ?>>Campus Director
                    </option>
                    <option value="Committee" <?php echo set_select('role', 'Committee'); ?>>Committee</option>
                </select>
            </div>

            <?php if (!empty($login_error)): ?>
                <div class="alert alert-danger">
                    <?php echo $login_error; ?>
                </div>
            <?php endif; ?>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
			<div class="text-center mt-4"><a href="<?php echo base_url('login'); ?>">Student?</a></div>
			<div class="text-center mt-4"><a href="<?php echo base_url('get_credential'); ?>">Get Credential</a></div>
		</form>
    </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
