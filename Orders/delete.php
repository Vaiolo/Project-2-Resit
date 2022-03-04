<?php
    $id=$_GET['id'];
    include('../Register/conn.php');
    mysqli_query($conn,"DELETE FROM ordertrack WHERE HistoryID='$id'");
    header('location:ordershistory.php');
?>
