<?php

// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'company';

// Server is localhost with
// port number 3308
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM employee";
$result = $mysqli->query($sql);
?>
<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders
</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php   // LOOP TILL END OF DATA
          while($rows=$result->fetch_assoc())
          {
       ?>
      <tr>
          <td><?php echo $rows['employeeID'];?></td>
          <td><?php echo $rows['employee_name'];?></td>
          <td><?php echo $rows['employee_email'];?></td>
          <td><?php echo $rows['employee_contact'];?></td>
          <td>
            <form action="index.php.php" method="post">
            <select name="status">
            <option value="0"></option>
            <option value="1">Being Packed</option>
            <option value="2">Being Sent</option>
            <option value="3">Being Delivered</option>
            </select>
            </form>
          </td>
      </tr>
      <?php
           }
       ?>
       <div class="button">
        <button type="submit" name="update">Update</button>
       </div>
  </tbody>
</table>
</div>
