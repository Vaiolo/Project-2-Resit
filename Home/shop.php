<?php require_once("../resources/config.php"); ?>
<?php
if(isset($_SESSION['Email'])) {
    include('../header and footer/headerLOGGEDIN.php');
} else {
    include('../header and footer/header.php');
}?>

<!DOCTYPE html>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Sort products by price</h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <select name="sort_numeric" class="form-control">
                                        <option value="">--Select Option--</option>
                                        <option value="low-high" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "low-high") { echo "selected"; } ?> > Low - High</option>
                                        <option value="high-low" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "high-low") { echo "selected"; } ?> > High - Low</option>
                                    </select>
                                    <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Product image</th>
                            <th>Add to cart</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sort_option = "";
                        if(isset($_GET['sort_numeric']))
                        {
                            if($_GET['sort_numeric'] == "low-high"){
                                $sort_option = "ASC";
                            }elseif($_GET['sort_numeric'] == "high-low"){
                                $sort_option = "DESC";
                            }
                        }

                        $query = query("SELECT * FROM product  ORDER BY Price $sort_option");
                        confirm($query);


                        if(mysqli_num_rows($query) > 0)
                        {
                            foreach($query as $row)
                            {
                                ?>
                                <tr>
                                    <td><?= $row['Name']; ?></td>
                                    <td>&euro;<?= $row['Price']; ?></td>
                                    <td><img width="300" src="../resources/uploads/<?= $row['product_image']; ?>"</td>
                                    <td><a class ="btn btn-primary" target="_blank" href="#">Add to cart</a></td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="3">No Record Found</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Sort products by name</h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <select name="sort_alphabet" class="form-control">
                                        <option value="">--Select Option--</option>
                                        <option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") { echo "selected"; } ?> > Ascending</option>
                                        <option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") { echo "selected"; } ?> > Descending</option>
                                    </select>
                                    <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Product image</th>
                            <th>Add to cart</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sort_option = "";
                        if(isset($_GET['sort_alphabet']))
                        {
                            if($_GET['sort_alphabet'] == "a-z"){
                                $sort_option = "ASC";
                            }elseif($_GET['sort_alphabet'] == "z-a"){
                                $sort_option = "DESC";
                            }
                        }

                        $query = query("SELECT * FROM product  ORDER BY Name $sort_option");
                        confirm($query);


                        if(mysqli_num_rows($query) > 0)
                        {
                            foreach($query as $row)
                            {
                                ?>
                                <tr>
                                    <td><?= $row['Name']; ?></td>
                                    <td>&euro;<?= $row['Price']; ?></td>
                                    <td><img width="300" src="../resources/uploads/<?= $row['product_image']; ?>"</td>
                                    <td><a class ="btn btn-primary" target="_blank" href="#">Add to cart</a></td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="3">No Record Found</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content -->
<!--     <div class="container">-->
<!--     Page Features -->
<!--<div class="row text-center">-->
<!---->
<!--    --><?php //get_products_in_shop_page();?>
<!--     /.row -->
<!--</div>-->
<!-- /.container -->


<?php include '../header and footer/footer.php';?>
