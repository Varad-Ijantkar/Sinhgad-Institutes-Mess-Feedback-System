<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Credentials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php $this->load->view('template/header'); ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center">Retrieve Temporary Password</h2>
            <form action="<?php echo base_url('login/get_temp_password'); ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Enter your email:</label>
                    <input type="email" id="email" name="email" class="form-control"
                        placeholder="Enter Registered Email" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Get Temporary Password</button>
            </form>
        </div>
    </div>

    <?php $this->load->view('template/footer'); ?>
</body>

</html>