<?php require_once ("../resources/config.php"); ?>
<?php include ("../resources/templates/back/header.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">


                <?php
                if($_SERVER['REQUEST_URI'] == "/Project-2-Resit-main/admin/" ||$_SERVER['REQUEST_URI'] == "/Project-2-Resit-main/admin/adminhome.php"){
                    include ("../resources/templates/back/admin_content.php");
                }
                if(isset($_GET['orders']) == 1){
                include ("../resources/templates/back/orders.php");
                }
                if(isset($_GET['categories'])){
                    include ("../resources/templates/back/categories.php");
                }
                if(isset($_GET['products'])){
                    include ("../resources/templates/back/products.php");
                }
                if(isset($_GET['add_product'])){
                    include ("../resources/templates/back/add_product.php");
                }
                if(isset($_GET['edit_product'])){
                    include ("../resources/templates/back/edit_product.php");
                }
                ?>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include ("../resources/templates/back/footer.php"); ?>
