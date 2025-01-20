<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
    }

    .sidebar {
        position: absolute;
        left: 0;
        width: 250px;
        height: 76vh;
        background-color: #fff;
        border-right: 1px solid #ddd;
        padding-top: 10px;
        /*overflow-y: auto; */
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar li {
        margin: 1px 0;
        padding-left: 20px;
    }

    .sidebar a {
        text-decoration: none;
        color: black;
        font-size: 12px;
    }

    .sidebar .menu {
        margin-bottom: 5px;
        position: relative;
    }

    .sidebar .menu .vertical-line {
        position: absolute;
        left: 1px;
        top: 0;
        height: 100%;
        width: 3px;
        background-color: purple;
    }

    .content-sidebar {
        margin-left: 10px;
        padding: 20px;
    }

    .content1 {
        margin-left: 10px;
        padding: 40px;
        font-size: 12px;
    }

    /* Email and Logout button */
    .sidebar .email {
        font-size: 12px;
        padding: 10px 20px;
        color: gray;
    }

    .sidebar .logout {
        padding: 10px 20px;
        background-color: #e74c3c;
        color: white;
        border: none;
        cursor: pointer;
        width: 100%;
        text-align: left;
        font-size: 12px;
    }

    .sidebar .logout:hover {
        background-color: #c0392b;
    }
</style>

<aside>
    <div class="sidebar content-sidebar">
        <a href="http://localhost/mess-feedback/index.php/admin_dashboard"><strong>Dashboard</strong></a>
        <div class="menu">
            <div class="vertical-line"></div>
            <ul>
                <li><a href="<?php echo site_url('admin_pending_complaints'); ?>">Pending</a></li>
                <!-- Updated link -->
                <li><a href="<?php echo site_url('admin_resolved_complaints'); ?>">Resolved</a></li>
                <!-- Updated link -->
                <li><a href="<?php echo site_url('admin_total_complaints'); ?>">Total</a></li> <!-- Updated link -->
            </ul>
        </div>
        <div>
            <a href="<?php echo site_url('admin_dashboard/mess_ratings'); ?>">
                <strong>Mess Rating</strong>
            </a>
        </div>
        <br>
		<div>
			<?php if (in_array($this->session->userdata('user_role'), ['Residence Officer', 'Management', 'Estate Head'])): ?> <!-- Updated roles -->
				<a href="<?php echo site_url('admin_dashboard/upload_student_details'); ?>">
					<strong>Upload Student Details</strong>
				</a>
			<?php endif; ?>
		</div>
		<br>
		<div>
			<?php if (in_array($this->session->userdata('user_role'),['Residence Officer','Estate Head','Management'])): ?> <!-- Updated role -->
				<a href="<?php echo site_url('admin_dashboard/register_student'); ?>">
					<strong>Regsiter Student</strong>
				</a>
			<?php endif; ?>
		</div>
        <br>
		<div>
			<?php if (in_array($this->session->userdata('user_role'),['Residence Officer','Estate Head','Management'])): ?> <!-- Updated role -->
				<a href="<?php echo site_url('admin_dashboard/view_student_details'); ?>">
					<strong>View Student Details</strong>
				</a>
			<?php endif; ?>
		</div>
        <br>
        <div>
            <?php if (in_array($this->session->userdata('user_role'),['Residence Officer','Estate Head','Management'])): ?>
                <a href="<?php echo site_url('admin_dashboard/manage_access'); ?>">
                    <strong>Manage Access</strong>
                </a>
            <?php endif; ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Display admin's email -->
        <div class="email">
            <strong>Logged in as:</strong> <br>
            <?php echo $user_email; ?>
        </div>

        <!-- Logout button -->
        <form method="post" action="<?php echo base_url('Admin_Login'); ?>">
            <button style="border-radius:10px;" type="submit" class="logout">Logout</button>
        </form>
    </div>
</aside>
