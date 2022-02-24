<?php

$conn = mysqli_connect("localhost","root","","company");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

if(isset($_POST['submit'])){
    $status=$_POST['status'];
    $sql="UPDATE employee SET status='$status'";
    if (!mysqli_query($conn,$sql)) {
        echo "data not insert";
    }
    else
    {
        echo "data is insert";
    }

}

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
              <form method="post">
 					        <select name="status">
   					        <option>>---Select---<</option>
   					        <option value="Packed"> Packed</option>
   					        <option value="Shipped"> Shipped</option>
   					        <opton value="Delivered"> Delivered</option>
 					        </select>
 					        <br><br>
 					        <input type="submit" name="submit" value="submit">
 					    </form>
            </td>
        </tr>
             <?php
                  }
              ?>
  </tbody>
</table>
</div>
