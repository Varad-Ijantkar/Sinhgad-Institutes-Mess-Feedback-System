<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
  }

  .sidebar {
    position: absolute;
    left: 0;
    width: 250px;
    height: 100vh;
    background-color: #fff;
    border-right: 1px solid #ddd;
    padding-top: 10px;
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
    <!-- Complaint Form -->
    <a href="<?php echo site_url('Complaint'); ?>"><strong>Complaint Form</strong></a>
    <br><br>

    <!-- Pending Complaints -->
    <a href="<?php echo site_url('Complaint/pending_complaints'); ?>"><strong>Pending
        Complaints</strong></a>
    <br><br>

    <!-- Resolved Complaints -->
    <a href="<?php echo site_url('Complaint/resolved_complaints'); ?>"><strong>Resolved Complaints</strong></a>
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
    <br>
    <!-- Display admin's email -->
    <div class="email">
      <strong>Logged in as:</strong> <br>
      <?php echo $this->session->userdata('user_email'); ?>
    </div>
    <!-- Logout button -->
    <form method="post" action="<?php echo base_url('Complaint/logout'); ?>">
      <button style="border-radius:10px;" type="submit" class="logout">Logout</button>
    </form>
  </div>
</aside>