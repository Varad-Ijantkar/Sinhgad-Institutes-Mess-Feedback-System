<style>
    /* Add a container for the form background */
    .form-container {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin-top: 5%;
        margin-left: 28%;
    }

    /* Adjust the container margin-left to account for the sidebar */
    .container {
        margin: auto;
    }
    .heading {
        color: hsl(270, 46.20%, 28.40%);
        margin-top: 7%;
        font-weight: bold;
    }

    /* Ensure the form is centered */
    .text-center {
        text-align: center;
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
        border: none;
        border-radius: 5px;
        cursor: pointer;
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
        .container {
            margin-left: 0;
        }

        .form-container {
            width: 90%;
            margin-left: 5%;
            margin-top: 50%;
        }
    }
</style>
<div class="container">
    <h2 class="heading text-center">Upload Student Details</h2>
    <div class="form-container">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?php echo site_url('ResidenceOfficer/upload_csv'); ?>" method="post"
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="csv_file">Upload CSV File:</label>
                <input type="file" name="csv_file" id="csv_file" class="form-control" required>
            </div>
            <button style="margin-top:10px" type="submit" class="btn btn-block">Upload</button>
        </form>
    </div>
</div>