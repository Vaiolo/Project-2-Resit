<?php

function sendData(){
  if($_SERVER['REQUEST_METHOD']==='GET'){
    if(array_key_exists('id', $_GET) && array_key_exists('Status', $_GET)) {

    $id = $_GET['id'];
    $status = $_GET['Status'];

    $con = mysqli_connect("localhost","root","","onlineshop");

          $query = $con->prepare("UPDATE ordertrack SET Status=? WHERE HistoryID = ?");

          if(!$query) {
            die('Prepare failed' . mysqli_error($con));
          }

          $query -> bind_param('ss', $status, $id);

          if(!$query) {
            die('Prepare failed' . mysqli_error($con));
          }

          $query ->execute();

          if(!$query) {
            die('Prepare failed' . mysqli_error($con));
          }
          $query->close();
    }
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
    <?php

    //echo $_GET['id'];
  if($_SERVER['REQUEST_METHOD']==='GET'){

    //echo $_GET['id'];



    $con = mysqli_connect("localhost","root","","onlineshop");

          $query = $con->prepare("SELECT * FROM ordertrack");

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
  }

      foreach($data as $row){
    ?>
    <?php sendData(); ?>
      <table class="table table-hover">
        <tr>
          <td>ID</td>
          <td>OrderID</td>
          <td>Date</td>
          <td>Status</td>
        </tr>

        <tr>
          <td><?php echo $row['HistoryID']; ?></td>
          <td><?php echo $row['OrderID']; ?></td>
          <td><?php echo $row['Date']; ?></td>
          <td>
            <form method= "get">
              <input type="hidden" name="orders" value="1" />
              <input type="hidden" name="id" value="<?php echo $row['HistoryID']; ?>" />
                <select name="Status">
                  <option>>---Select---<</option>
                  <option value="Received"> Received</option>
                  <option value="Packed"> Packed</option>
                  <option value="Shipped"> Shipped</option>
                  <opton value="Delivered"> Delivered</option>
                </select>

                <br><br>
                <input type="submit" name="submit" value="submit" />
              </form>
          </td>
        </tr>
      </table>
    <?php
      }
    ?>
</div>
<?php
include ('footer.php');
?>
