<?php
    $id=$_GET['id'];
    include('config.php');
    mysqli_query($conn,"DELETE FROM `employee` WHERE employeeID='$id'");
    header('location:ordershistory.php');
?>
