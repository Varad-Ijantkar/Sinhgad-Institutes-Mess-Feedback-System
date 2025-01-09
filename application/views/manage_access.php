<style>
    /* Add a container for the form background */
    .form-container {
        background-color: #f9f9f9;
        /* Light grey background */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Soft shadow */
        max-width: 500px;
        margin: 120px auto;
        margin-left: 35%;
        /* Center the form horizontally and add some space at the top */
    }

    /* Adjust the container margin-left to account for the sidebar */
    .container {
        margin: auto;
        /* Space for sidebar */
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
    .btn{
        background-color:hsl(270, 46.20%, 28.40%);
        width: 100%;
        color: white;
        padding: 10px;
        font-size: 16px;
    }


    .btn:hover {
        background-color:hsl(270, 46.20%, 48.40%);
        color: white;
    }

    /* Style for the form labels */
    .form-group label {
        font-weight: bold;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            margin-left: 10%;
            /* Remove left margin on small screens */
        }

        .form-container {
            width: 90%;
            /* Reduce form width on small screens */
        }
    }
</style>

<div class="container">
    <div class="form-container">
        <h2 class="text-center">Manage Access</h2>

        <!-- Display flashdata message -->
        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form action="<?php echo site_url('ResidenceOfficer/submit_access'); ?>" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="role">Access Type</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="Vendor">Vendor</option>
                    <option value="Supervisor">Supervisor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="action">Action</label>
                <select class="form-control" id="action" name="action" required>
                    <option value="Activate">Activate</option>
                    <option value="Deactivate">Deactivate</option>
                </select>
            </div>


            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</div>