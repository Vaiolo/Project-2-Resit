<?php require_once ("../resources/config.php");?>
<?php include ("../resources/templates/front/header.php"); ?>

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
<?php include ("../resources/templates/front/footer.php"); ?>

