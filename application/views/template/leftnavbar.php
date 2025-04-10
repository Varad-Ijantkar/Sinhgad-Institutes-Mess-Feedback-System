<?php
// Get the current controller and method from CodeIgniter's URI segments
$CI =& get_instance();
$current_controller = $CI->uri->segment(1); // e.g., 'mess_menu'
$current_method = $CI->uri->segment(2);     // e.g., '' for menu
?>

<!-- Toggle Button -->
<button class="menu-toggle" id="menuToggle">
    <i class="fas fa-bars"></i>
</button>

<!-- Overlay for mobile -->
<div class="overlay" id="overlay"></div>

<aside class="sidebar">
    <div class="sidebar-wrapper">
        <div class="sidebar-menu">
            <div class="menu-section">
                <h4 class="menu-section-title">Main</h4>
                <div class="menu-item <?php echo ($current_controller == 'student_dashboard' && !$current_method) ? 'active' : ''; ?>">
                    <div class="active-indicator"></div>
                    <a href="<?php echo site_url('student_dashboard'); ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Student Dashboard</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <h4 class="menu-section-title">Complaints</h4>
                <div class="menu-item <?php echo ($current_controller == 'complaint' && !$current_method) ? 'active' : ''; ?>">
                    <div class="active-indicator"></div>
                    <a href="<?php echo site_url('complaint'); ?>">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Register Complaint</span>
                    </a>
                </div>
                <div class="menu-item <?php echo ($current_method == 'pending_complaints') ? 'active' : ''; ?>">
                    <div class="active-indicator"></div>
                    <a href="<?php echo site_url('complaint/pending_complaints'); ?>">
                        <i class="fas fa-clock"></i>
                        <span>Pending Complaints</span>
                    </a>
                </div>
                <div class="menu-item <?php echo ($current_method == 'resolved_complaints') ? 'active' : ''; ?>">
                    <div class="active-indicator"></div>
                    <a href="<?php echo site_url('complaint/resolved_complaints'); ?>">
                        <i class="fas fa-check-circle"></i>
                        <span>Resolved Complaints</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <h4 class="menu-section-title">Feedback</h4>
                <div class="menu-item <?php echo ($current_controller == 'feedback') ? 'active' : ''; ?>">
                    <div class="active-indicator"></div>
                    <a href="<?php echo site_url('feedback'); ?>">
                        <i class="fas fa-star"></i>
                        <span>Give Feedback</span>
                    </a>
                </div>
            </div>

            <div class="menu-section">
                <h4 class="menu-section-title">Mess Menu</h4>
                <div class="menu-item <?php echo ($current_controller == 'mess_menu' && !$current_method) ? 'active' : ''; ?>">
                    <div class="active-indicator"></div>
                    <a href="<?php echo site_url('mess_menu'); ?>">
                        <i class="fas fa-utensils"></i>
                        <span>View Menu</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="user-section">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <div class="user-role">Student</div>
                    <div class="user-email"><?php echo $this->session->userdata('user_email'); ?></div>
                </div>
            </div>
            <form method="post" action="<?php echo base_url('Complaint/logout'); ?>">
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<style>
    /* Your existing CSS remains unchanged */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Roboto', Arial, sans-serif;
        background-color: #f5f5f5;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        position: relative;
    }

    .menu-toggle {
        position: fixed;
        top: 30px;
        left: 20px;
        z-index: 1002;
        background-color: #4B2E83;
        color: white;
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .menu-toggle:hover {
        background-color: #351B4A;
    }

    .sidebar {
        width: 200px;
        background: linear-gradient(180deg, #48276A 0%, #351B4A 100%);
        color: #fff;
        transition: all 0.3s ease;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        height: 100vh;
        top: 0;
        z-index: 1;
        left: -200px;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
    }

    body.sidebar-open .sidebar {
        left: 0;
    }

    .sidebar-wrapper {
        display: flex;
        flex-direction: column;
        height: 100%;
        padding-top: 120px;
    }

    .sidebar-menu {
        padding: 0;
        overflow-y: auto;
        flex-grow: 1;
        margin-top: 20px;
    }

    .menu-section {
        margin-bottom: 10px;
    }

    .menu-section-title {
        padding: 8px 15px;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 600;
    }

    .menu-item {
        position: relative;
        transition: all 0.3s;
        margin: 4px 8px;
        border-radius: 6px;
    }

    .menu-item a {
        display: flex;
        align-items: center;
        padding: 8px 10px;
        color: #fff;
        text-decoration: none;
        font-size: 10px;
        font-weight: 500;
        transition: all 0.2s;
        border-radius: 6px;
    }

    .menu-item:hover a {
        background-color: #5A3A7A;
    }

    .menu-item.active {
        background-color: #6A4C93;
    }

    .menu-item.active a {
        color: #fff;
    }

    .menu-item i {
        margin-right: 8px;
        font-size: 12px;
        width: 14px;
        text-align: center;
    }

    .user-section {
        width: 100%;
        padding: 10px 15px;
        background-color: rgba(0, 0, 0, 0.2);
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .user-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #6A4C93;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: white;
    }

    .user-details {
        display: flex;
        flex-direction: column;
    }

    .user-email {
        font-size: 9px;
        color: #fff;
        word-break: break-all;
    }

    .user-role {
        font-size: 10px;
        font-weight: 600;
        color: #6A4C93;
    }

    .logout-btn {
        width: 100%;
        padding: 8px;
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-weight: 600;
        transition: all 0.2s;
        font-size: 10px;
    }

    .logout-btn:hover {
        background-color: #c0392b;
    }

    .active-indicator {
        position: absolute;
        left: 0;
        top: 0;
        width: 3px;
        height: 100%;
        background-color: #6A4C93;
        border-radius: 0 3px 3px 0;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: none;
    }

    body.sidebar-open .overlay {
        display: block;
    }

    .content, .main-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 120px 30px 0;
        width: 100%;
        transition: all 0.3s ease;
        overflow-y: auto;
        margin-left: 0;
    }

    body.sidebar-open .content,
    body.sidebar-open .main-content {
        width: calc(100% - 200px);
        margin-left: 200px;
    }

    body:not(.sidebar-open) .content,
    body:not(.sidebar-open) .main-content {
        width: 100%;
        margin-left: 0;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 70%;
            z-index: 1001;
            left: -70%;
        }

        .content, .main-content {
            padding: 120px 15px 0;
            width: 100%;
            margin-left: 0;
        }

        body.sidebar-open .content,
        body.sidebar-open .main-content {
            width: 100%;
            margin-left: 0;
            filter: blur(2px);
            pointer-events: none;
        }

        .menu-toggle {
            top: 20px;
            left: 15px;
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
    }

    @media (min-width: 769px) {
        body.sidebar-open .content,
        body.sidebar-open .main-content {
            width: calc(100% - 200px);
            margin-left: 200px;
        }

        body:not(.sidebar-open) .content,
        body:not(.sidebar-open) .main-content {
            width: 100%;
            margin-left: 0;
        }

        .sidebar {
            left: 0;
            transform: translateX(-100%);
        }

        body.sidebar-open .sidebar {
            transform: translateX(0);
        }

        .overlay {
            display: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('menuToggle');
        const overlay = document.getElementById('overlay');

        toggleButton.addEventListener('click', function (e) {
            e.stopPropagation();
            document.body.classList.toggle('sidebar-open');
            console.log('Toggle clicked, sidebar-open:', document.body.classList.contains('sidebar-open'));
        });

        overlay.addEventListener('click', function () {
            document.body.classList.remove('sidebar-open');
            console.log('Overlay clicked, sidebar closed');
        });

        document.addEventListener('click', function (event) {
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.querySelector('.menu-toggle');

            if (window.innerWidth <= 768 && document.body.classList.contains('sidebar-open')) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    document.body.classList.remove('sidebar-open');
                    console.log('Clicked outside, sidebar closed');
                }
            }
        });

        const menuLinks = document.querySelectorAll('.sidebar-menu a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    document.body.classList.remove('sidebar-open');
                }
            });
        });

        function setInitialState() {
            if (window.innerWidth <= 768) {
                document.body.classList.remove('sidebar-open');
            } else {
                document.body.classList.add('sidebar-open');
            }
        }

        setInitialState();
        window.addEventListener('resize', setInitialState);
    });
</script>
