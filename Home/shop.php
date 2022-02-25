<?php require_once("../resources/config.php"); ?>
<?php
if(isset($_SESSION['Email'])) {
    include('../header and footer/headerLOGGEDIN.php');
} else {
    include('../header and footer/header.php');
}?>

<!DOCTYPE html>

<!-- Page Content -->
     <div class="container">



<!-- Page Features -->
<div class="row text-center">

    <?php get_products_in_shop_page();?>


<!-- /.row -->



</div>
<!-- /.container -->


<?php include '../header and footer/footer.php';?>
