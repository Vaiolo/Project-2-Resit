<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Orders History</title>
    <link rel="stylesheet" href="../Home/style.css">

</head>
<body>

  <div class="container_login">
    <?php
    session_start();
    if(isset($_SESSION['Email'])) {
        include('../header and footer/headerLOGGEDIN.php');
    } else {
        include('../header and footer/header.php');
    }


    if(!isset($_SESSION['Email'])) {
        echo "<p>You need to login first</p>";
    } else {
    ?>

    <div class="content_orders">

      <div class="order_title">
        <h2>YOUR ORDER</h2>
      </div>

      <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total</th>
            <th>Status</th>
            <th></th>
        </tr>

        <?php
                  include('config.php');
                  $query=mysqli_query($conn,"SELECT * FROM `employee`");
                  while($row=mysqli_fetch_array($query)){
                      ?>
                      <tr>
                          <td><?php echo $row['employee_name']; ?></td>
                          <td><?php echo $row['employee_email']; ?></td>
                          <td><?php echo $row['employee_contact']; ?></td>
                          <td><?php echo $row['status']; ?></td>
                          <td>
                              <a href="delete.php?id=<?php echo $row['employeeID']; ?>">Delete</a>
                          </td>
                      </tr>
                      <?php

                  }
              ?>
      </table>
    </div>
    <?php
}
    ?>


    <?php
          include('../header and footer/footer.php');
    ?>

  </div>
</body>
</html>
