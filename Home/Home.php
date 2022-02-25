<?php
require_once("../resources/config.php"); ?>

<?php
if(isset($_SESSION['Email'])) {
    include('../header and footer/headerLOGGEDIN.php');
} else {
    include('../header and footer/header.php');
}?>


 <!-- Page Content -->
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
<!-- /.container -->

<?php include '../header and footer/footer.php';?>

