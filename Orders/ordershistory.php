<?php
    include('../Register/conn.php');
?>

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
          <td>OrderID</td>
          <td>Date</td>
          <td>Status</td>


        <?php


                  $query = $conn->prepare("SELECT * FROM ordertrack");

                  if(!$query) {
                    die('Prepare failed' . mysqli_error($con));
                  }

                  $query ->execute();

                  if(!$query) {
                    die('Prepare failed' . mysqli_error($con));
                  }
                  $result = $query->get_result();

                  $data = $result->fetch_all(MYSQLI_ASSOC);

                  $query->close();


                  foreach($data as $row){

                  //while($row=mysqli_fetch_array($query)){
                      ?>
                      <th <?php if($row['Status'] === 'Packed' || $row['Status'] === 'Shipped') {echo 'style=display:none;';} ?>></th>
                      </tr>
                      <tr>
                          <td><?php echo $row['OrderID']; ?></td>
                          <td><?php echo $row['Date']; ?></td>
                          <td><?php echo $row['Status']; ?></td>
                          <td <?php if($row['Status'] === 'Packed' || $row['Status'] === 'Shipped') {echo 'style=display:none;';} ?>>
                              <a href="delete.php?id=<?php echo $row['HistoryID']; ?>">Delete</a>
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
