<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Home/style.css">
    <title>Document</title>
</head>
<body>
  <?php
  if(isset($_SESSION['Email'])) {
      include('../header and footer/headerLOGGEDIN.php');
  } else {
      include('../header and footer/header.php');
  }?>
    <form>
        <div class="form_header">
            <h1>Contact Us </h1>
            <h3>Give us a feedback on our service!</h3>
        </div>
        <div>
            <label for ="message">Message</label>
        </div>
        <div>
            <textarea name="suggestion" placeholder="Type here..."></textarea>
        </div>
        <div>
            <input class="form_submit" type="submit" value="submit" name="submit">
        </div>
    </form>
    <?php
    include '../header and footer/footer.php';?>
</body>
</html>
