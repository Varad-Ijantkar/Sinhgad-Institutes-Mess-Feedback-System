<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Student Details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .btn-upload {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background-color: hsl(270, 46.20%, 28.40%);
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
        }

        .btn-upload:hover {
            background-color: hsl(270, 46.20%, 38.40%);
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            h2 {
                font-size: 1.3rem;
            }

            .btn-upload {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 10px;
            }

            h2 {
                font-size: 1.1rem;
            }

            .btn-upload {
                font-size: 13px;
                padding: 8px;
            }

            .form-control {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Upload Student Details</h2>

            <!-- Success and Error Messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <!-- Upload Form -->
            <form action="<?php echo site_url('ResidenceOfficer/upload_csv'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="csv_file" class="form-label">Upload CSV File:</label>
                    <input type="file" name="csv_file" id="csv_file" class="form-control" required>
                </div>
                <button type="submit" class="btn-upload">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>
