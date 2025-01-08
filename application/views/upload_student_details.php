<div class="container"
    style="margin: 0 auto; margin-left:26%; display: flex; justify-content: center; align-items: center; height: 60vh; padding: 20px;">
    <div style="
        width: 100%; 
        max-width: 600px; 
        background-color: #f9f9f9; 
        border-radius: 8px; 
        padding: 20px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; margin-bottom: 20px;">Upload Student Details</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" style="margin-bottom: 15px;">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" style="margin-bottom: 15px;">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo site_url('ResidenceOfficer/upload_csv'); ?>" method="post"
            enctype="multipart/form-data">
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="csv_file" style="font-weight: bold;">Upload CSV File:</label>
                <input type="file" name="csv_file" id="csv_file" class="form-control"
                    style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block"
                style="
                background-color: #007bff; 
                border: none; 
                padding: 10px 15px; 
                border-radius: 5px; 
                font-size: 16px;
                cursor: pointer;">
                Upload
            </button>
        </form>
    </div>
</div>
<style>
    @media (max-width: 768px) {
        .form-container {
            padding: 15px;
            
        }

        h2 {
            font-size: 1.25rem;
        }

        .form-group input {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 0.9rem;
            padding: 8px;
        }
    }

    @media (max-width: 480px) {
        .form-container {
            padding: 10px;
        }

        h2 {
            font-size: 1.1rem;
        }

        .btn {
            font-size: 0.8rem;
            padding: 7px;
        }
    }
</style>