<?php require_once ("../resources/config.php");?>
<?php include('../header and footer/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->


        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php get_products_in_cat_page();?>


        <!-- /.row -->



    </div>
    <!-- /.container -->
        <?php include '../header and footer/footer.php';?>

