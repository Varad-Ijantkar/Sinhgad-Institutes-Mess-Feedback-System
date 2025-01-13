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
        /*margin-left: 28%;*/
        margin-top: 8%;
        /* Center the form horizontally and add some space at the top */
		transform: translateX(60%);

    }

    /* Adjust the container margin-left to account for the sidebar */
    .container {
        margin: auto;
        /* Space for sidebar */
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
        .container {
            margin-left: 0;
            /* Remove left margin on small screens */
        }

        .form-container {
            width: 90%;
            margin-left: 5%;
            margin-top: 50%;
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
