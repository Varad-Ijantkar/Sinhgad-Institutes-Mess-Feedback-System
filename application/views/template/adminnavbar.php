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

<body>
    <button class="toggle-btn" id="toggleSidebar">☰</button>
    <aside>
        <div class="sidebar" id="sidebar">
            <a href="http://localhost/codeigniter/index.php/admin_dashboard"><strong>Dashboard</strong></a>
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
				<a href="<?php echo site_url('admin_dashboard/mess_rating'); ?>">
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
                <?php if (in_array($this->session->userdata('user_role'), ['Residence Officer', 'Estate Head', 'Management'])): ?> <!-- Updated role -->
                    <a href="<?php echo site_url('admin_dashboard/view_student_details'); ?>">
                        <strong>View Student Details</strong>
                    </a>
                <?php endif; ?>
            </div>
            <br>
            <div>
                <?php if (in_array($this->session->userdata('user_role'), ['Residence Officer', 'Estate Head', 'Management'])): ?>
                    <a href="<?php echo site_url('admin_dashboard/manage_access'); ?>">
                        <strong>Manage Access</strong>
                    </a>
                <?php endif; ?>
            </div>
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
