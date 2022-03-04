<?php require_once ("../resources/config.php");?>
<?php include('../header and footer/header.php');?>
<div class="container">
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <h3>Latest Products</h3>
        </div>
    </div>
    <div class="row text-center">
        <?php get_products_in_cat_page();?>
    </div>
    <?php include '../header and footer/footer.php';?>

