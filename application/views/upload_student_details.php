<div class="container"
    style="margin-left: 110px; display: flex; justify-content: center; align-items: center; height: 60vh;">
    <div style="width: 100%; max-width: 600px;">
        <h2 class="text-center">Upload Student Details</h2>

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
            <button style="margin-top:10px" type="submit" class="btn btn-primary btn-block">Upload</button>
        </form>
    </div>
</div>