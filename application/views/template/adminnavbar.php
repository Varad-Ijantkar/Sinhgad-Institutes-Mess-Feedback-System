<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Improved Sidebar with Dropdown</title>
  <style>
    :root {
      --sidebar-bg: #48276A;
      --sidebar-top-bg: rgba(255, 255, 255, 0.23);
      --sidebar-top-border: rgba(255, 255, 255, 0.2);
      --link-hover-bg: rgba(255, 255, 255, 0.2);
      --logout-bg: #d9534f;
      --font-family: 'Poppins', sans-serif;
    }
    
    body {
      font-family: var(--font-family);
      margin: 0;
      background: #f0f0f0;
    }
    
    /* Sidebar Styling */
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: 280px;
      height: 100vh;
      z-index: 11000;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      box-shadow: 2px 0 15px rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }
    
    /* Transparent Glassy Top Section */
    .sidebar-top {
      height: 168px; /* Same as header height */
      background: var(--sidebar-top-bg);
      backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
      border-bottom: 1px solid var(--sidebar-top-border);
    }
    
    /* Close Button */
    .close-btn {
      font-size: 24px;
      color: #fff;
      cursor: pointer;
      background: none;
      border: none;
      position: fixed;
      top: 20px;
      right: 20px;
      transition: transform 0.3s ease;
    }
    .close-btn:hover {
      transform: scale(1.1);
    }
    
    /* Sidebar Content */
    .sidebar-content {
      background: var(--sidebar-bg);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: calc(100% - 168px);
      padding: 15px;
      overflow: hidden;
    }
    
    /* Top Content (Menu Items) - Improved Styling */
    .sidebar-content .top-content {
      display: flex;
      flex-direction: column;
      gap: 7px;
      flex-grow: 1;
    }
    /* Common style for links and dropdown buttons in top-content */
    .sidebar-content .top-content a,
    .sidebar-content .top-content .dropdown-btn {
      display: block;
      width: 100%;
      text-decoration: none;
      color: #fff;
      font-size: 14px;
      padding: 10px 15px;
      border-radius: 8px;
      background: transparent;
      transition: background 0.3s ease, box-shadow 0.3s ease;
      letter-spacing: 0.5px;
    }
    .sidebar-content .top-content a:hover,
    .sidebar-content .top-content .dropdown-btn:hover {
      background: var(--link-hover-bg);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    
    /* Dropdown Styles */
    .dropdown {
      position: relative;
      margin: 10px 0;
    }
    .dropdown-btn {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: none;
      border: none;
      color: #fff;
      font-size: 14px;
      padding: 12px 20px;
      cursor: pointer;
      text-align: left;
      width: 100%;
      border-radius: 8px;
      transition: background 0.3s ease, box-shadow 0.3s ease;
      letter-spacing: 0.5px;
    }
    .dropdown-btn:hover {
      background: var(--link-hover-bg);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    /* Dropdown Arrow */
    .dropdown-btn .dropdown-arrow {
      margin-left: auto;
      font-size: 14px;
      transition: transform 0.3s ease;
    }
    .dropdown.active .dropdown-btn .dropdown-arrow {
      transform: rotate(180deg);
    }
    /* Dropdown content as an overlay */
    .dropdown-content {
      position: absolute;
      top: calc(100% + 5px);
      left: 0;
      width: 100%;
      background: var(--sidebar-bg);
      border: 1px solid var(--sidebar-top-border);
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      opacity: 0;
      pointer-events: none;
      transform: translateY(-10px);
      transition: opacity 0.3s ease, transform 0.3s ease;
      z-index: 2000;
    }
    .dropdown.active .dropdown-content {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
      display: flex;
      flex-direction: column;
    }
    .dropdown-content li {
      list-style: none;
    }
    .dropdown-content li a {
      display: block;
      width: 100%;
      padding: 12px 20px;
      color: #fff;
      text-decoration: none;
      transition: background 0.3s ease, box-shadow 0.3s ease;
      border-radius: 8px;
      letter-spacing: 0.5px;
    }
    .dropdown-content li a:hover {
      background: var(--link-hover-bg);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    
    /* Bottom Content (Email & Logout) */
    .sidebar-content .bottom-content {
      padding-top: 20px;
      border-top: 1px solid var(--sidebar-top-border);
      font-size: 12px;
      color: #ddd;
    }
    
    /* Logout Button */
    .logout {
      width: 100%;
      padding: 10px 15px;
      background: var(--logout-bg);
      color: white;
      border: none;
      cursor: pointer;
      margin-top: 10px;
      border-radius: 5px;
      font-size: 16px;
      transition: background 0.3s ease, transform 0.2s ease;
    }
    .logout:hover {
      background: darkred;
      transform: scale(1.02);
    }
    
    /* Toggle Button */
    .menu-toggle {
      position: fixed;
      top: 15px;
      left: 15px;
      font-size: 24px;
      background: var(--sidebar-bg);
      border: none;
      color: #fff;
      cursor: pointer;
      z-index: 12000;
      padding: 10px 15px;
      border-radius: 5px;
      transition: opacity 0.3s ease, transform 0.2s ease;
    }
    .menu-toggle:hover {
      transform: scale(1.05);
    }
    
    /* Sidebar Hidden by Default */
    .sidebar.closed {
      transform: translateX(-100%);
    }
    @media (max-width: 768px) {
      .sidebar-top{
        height: 123px;
      }
      .sidebar-content{
        height: calc(100% - 123px);
      }
      .sidebar{
        width: 250px;
      }
}
  </style>
</head>
<body>
  <!-- Sidebar -->
  <aside>
    <div class="sidebar content-sidebar closed">
      <!-- Transparent Glassy Top Section -->
      <div class="sidebar-top">
        <strong>Menu</strong>
        <button class="close-btn" onclick="toggleSidebar()">❌</button>
      </div>
  
      <!-- Sidebar Content -->
      <div class="sidebar-content">
        <div class="top-content">
          <div>
          <a href="http://localhost/mess_feedback/index.php/admin_dashboard"><strong>Dashboard</strong></a>
          </div>
          <!-- Dropdown HTML -->
          <div class="dropdown">
            <button class="dropdown-btn">
              <span class="dropdown-text">Complaints</span>
              <span class="dropdown-arrow">▼</span>
            </button>
            <ul class="dropdown-content">
              <li><a href="<?php echo site_url('admin_pending_complaints'); ?>">Pending</a></li>
              <li><a href="<?php echo site_url('admin_resolved_complaints'); ?>">Resolved</a></li>
              <li><a href="<?php echo site_url('admin_total_complaints'); ?>">Total</a></li>
            </ul>
          </div>
  
          <div>
            <a href="<?php echo site_url('admin_dashboard/mess_ratings'); ?>">
              <strong>Mess Rating</strong>
            </a>
          </div>
          <div>
            <?php if (in_array($this->session->userdata('user_role'), ['Residence Officer', 'Management', 'Estate Head'])): ?>
              <a href="<?php echo site_url('admin_dashboard/upload_student_details'); ?>">
                <strong>Upload Student Details</strong>
              </a>
            <?php endif; ?>
          </div>
          <div>
            <?php if (in_array($this->session->userdata('user_role'), ['Residence Officer','Estate Head','Management'])): ?>
              <a href="<?php echo site_url('admin_dashboard/register_student'); ?>">
                <strong>Register Student</strong>
              </a>
            <?php endif; ?>
          </div>
          <div>
            <?php if (in_array($this->session->userdata('user_role'), ['Residence Officer','Estate Head','Management'])): ?>
              <a href="<?php echo site_url('admin_dashboard/view_student_details'); ?>">
                <strong>View Student Details</strong>
              </a>
            <?php endif; ?>
          </div>
          <div>
            <?php if (in_array($this->session->userdata('user_role'), ['Residence Officer','Estate Head','Management'])): ?>
              <a href="<?php echo site_url('admin_dashboard/manage_access'); ?>">
                <strong>Manage Access</strong>
              </a>
            <?php endif; ?>
          </div>
        </div>
  
        <div class="bottom-content">
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
      </div>
    </div>
  
    <div class="content-sidebar">
      <!-- Menu toggle button for small screens -->
      <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    </div>
  </aside>
  
  <script>
    function toggleSidebar() {
      let sidebar = document.querySelector('.sidebar');
      let toggleBtn = document.querySelector('.menu-toggle');
      if (sidebar.classList.contains('closed')) {
        toggleBtn.style.opacity = "0";  // Hide the button
        sidebar.classList.remove('closed');  // Show sidebar
      } else {
        toggleBtn.style.opacity = "1";  // Show the button
        sidebar.classList.add('closed');  // Hide sidebar
      }
    }
  
    document.querySelector('.dropdown-btn').addEventListener('click', function(){
      this.parentElement.classList.toggle('active');
    });
  </script>
</body>
</html>
