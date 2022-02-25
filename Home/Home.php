<?php
require_once("../resources/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
if(isset($_SESSION['Email'])) {
    include('../header and footer/headerLOGGEDIN.php');
} else {
    include('../header and footer/header.php');
}?>

<div class="container">

<div class="row">

   <?php include ("../resources/templates/front/side_nav.php"); ?>

   <div class="col-md-9">

       <div class="row">
       <?php get_products() ?>

       </div><!--row ends here -->

   </div>

</div>

</div>
<?php include '../header and footer/footer.php';?>
</body>
</html>
