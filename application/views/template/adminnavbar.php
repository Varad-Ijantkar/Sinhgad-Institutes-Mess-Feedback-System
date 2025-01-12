<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sidebar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .sidebar {
            position: absolute;
            left: 15;
            width: 250px;
            height: 78vh;
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
            padding: 10px 10px;
            color: gray;
            margin-top: 100%;
        }

        .sidebar .logout {
            padding: 10px 20px;
            background-color: hsl(270, 46.20%, 28.40%);
            color: white;
            border: none;
            cursor: pointer;
            width: 85%;
            text-align: left;
            font-size: 12px;
        }

        .sidebar .logout:hover {
            background-color: hsl(270, 46.20%, 48.40%);
        }

        /* Toggle button styles for small screens */
        .toggle-btn {
            display: none;
            position: fixed;
            top: 20px;
            left: 10px;
            font-size: 20px;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1100;
            color: white;
        }

        /* Small screen adjustments */
        @media (max-width: 768px) {
            .toggle-btn {
                display: block;
            }

            .sidebar {
                transform: translateX(-110%);
            }

            .sidebar.active {
                transform: translateX(0);
            }


        }
    </style>
</head>

<body>
    <!-- Toggle Button (Visible only on small screens) -->
    <button class="toggle-btn" id="toggleSidebar">☰</button>

<aside>
    <div class="sidebar content-sidebar">
        <a href="http://localhost/codeigniter/index.php/admin_dashboard"><strong>Dashboard</strong></a>
        <div class="menu">
            <div class="vertical-line"></div>
            <ul>
                <li><a href="<?php echo site_url('Admin_Pending_Complaints'); ?>">Pending</a></li>
                <!-- Updated link -->
                <li><a href="<?php echo site_url('Admin_Resolved_Complaints'); ?>">Resolved</a></li>
                <!-- Updated link -->
                <li><a href="<?php echo site_url('Admin_Total_Complaints'); ?>">Total</a></li> <!-- Updated link -->
            </ul>
        </div>
		<div>
			<?php if (in_array($this->session->userdata('user_role'), ['Residence Officer', 'Management', 'Estate Head'])): ?> <!-- Updated roles -->
				<a href="<?php echo site_url('ResidenceOfficer/upload_student_details'); ?>">
					<strong>Upload Student Details</strong>
				</a>
			<?php endif; ?>
		</div>
		<br>
		<div>
			<?php if (in_array($this->session->userdata('user_role'),['Residence Officer','Estate Head','Management'])): ?> <!-- Updated role -->
				<a href="<?php echo site_url('ResidenceOfficer/view_student_details'); ?>">
					<strong>View Student Details</strong>
				</a>
			<?php endif; ?>
		</div>
        <br>
        <div>
            <?php if (in_array($this->session->userdata('user_role'),['Residence Officer','Estate Head','Management'])): ?>
                <a href="<?php echo site_url('ResidenceOfficer/manage_access'); ?>">
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

    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>