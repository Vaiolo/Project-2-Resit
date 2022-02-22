<?php require_once ("../resources/config.php");?>
<?php include ("../resources/templates/front/header.php"); ?>

    <!-- Page Content -->
    <div class="container">
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
        <?php include ("../resources/templates/front/footer.php"); ?>

