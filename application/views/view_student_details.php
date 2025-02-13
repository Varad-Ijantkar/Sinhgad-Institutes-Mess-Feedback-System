<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Student Details</title>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Quicksand', sans-serif;
  background-color: #f8f9fa;
}

.main-content {
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

h2 {
  font-size: 36px;
  text-align: center;
  color: rgb(92, 50, 135);
  margin-bottom: 30px;
  font-weight: 700;
  text-transform: uppercase;
}

.table-wrapper {
  width: 100%;
  padding: 0 10%;
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 50px;
  background-color: white;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

table thead {
  background: #48276A;
}

table thead tr th {
  font-size: 16px;
  font-weight: 700;
  color: white;
  padding: 15px;
  text-align: center;
  border: 1px solid #dee2e6;
}

table tbody tr {
  background-color: white;
}

table tbody tr:hover {
  background-color: #d8ebff;
}

table tbody tr td {
  font-size: 14px;
  color: #333;
  padding: 10px;
  text-align: center;
  border: 1px solid #dee2e6;
}

@media (max-width: 768px) {
  h2 {
    font-size: 28px;
    font-weight: 600;
  }

  .table-wrapper {
    padding: 0 10px;
  }

  table thead {
    display: none;
  }

  table tbody tr {
    display: block;
    margin-bottom: 20px;
    background-color: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 10px;
  }

  table tbody tr td {
    display: flex;
    justify-content: space-between;
    text-align: left;
    border: none;
    border-bottom: 1px solid #dee2e6;
  }

  table tbody tr td:last-child {
    border-bottom: none;
  }

  table tbody tr td::before {
    content: attr(data-label);
    font-weight: 600;
    flex-basis: 40%;
  }
}

@media (max-width: 456px) {
  h2 {
    font-size: 20px;
  }

  table tbody tr td {
    flex-wrap: wrap;
    gap: 8px;
  }
}
</style>
</head>

<body>
<div class="main-content">
  <h2>Student Details</h2>

  <!-- Success/Error Messages -->
  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"> <?php echo $this->session->flashdata('success'); ?> </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"> <?php echo $this->session->flashdata('error'); ?> </div>
  <?php endif; ?>

  <!-- Student Details Table -->
  <div class="table-wrapper">
    <table>
      <thead>
        <tr>
          <th>Email</th>
          <th>Name</th>
          <th>Phone</th>
          <th>College</th>
          <th>Campus</th>
          <th>Mess</th>
          <th>Edit Details</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($students)): ?>
          <?php foreach ($students as $student): ?>
            <tr>
              <td data-label="Email"> <?php echo $student->email; ?> </td>
              <td data-label="Name"> <?php echo $student->name; ?> </td>
              <td data-label="Phone"> <?php echo $student->phone; ?> </td>
              <td data-label="College"> <?php echo $student->college; ?> </td>
              <td data-label="Campus"> <?php echo $student->campus; ?> </td>
              <td data-label="Mess"> <?php echo $student->mess; ?> </td>
              <td data-label="Edit Details"> <a href="<?php echo base_url('admin_dashboard/edit_student_details/' . $student->id); ?>">Edit</a> </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">No student details found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
