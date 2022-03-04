<?php require_once("../resources/config.php"); ?>
<?php  include('../header and footer/header.php'); ?>
<div class="container">
    <?php include ("../resources/templates/front/side_nav.php"); ?>
    <?php $query = query(" SELECT * FROM products WHERE product_id =" . escape_string($_GET['id']). " ");
    confirm($query);
    while($row = fetch_array($query)):


    ?>

<div class="col-md-9">
    <div class="row">
        <div class="col-md-7">
            <img class="img-responsive" src="../resources/<?php echo display_image($row['product_image']); ?>" alt="">
        </div>
        <div class="col-md-5">
            <div class="thumbnail">
                <div class="caption-full">
                    <h4><a  href="#"><?php echo $row['product_title']; ?></a> </h4>
<?php
if( $row['discount_percent'] >= 1 ){
    $original_price= (int)$row['product_price'];
    $discount_percent= (int)$row['discount_percent'];
    $dis_end_date= $row['dis_end_date'];
    $current_date= date("Y-m-d");
    $discount_value = ($original_price / 100) * $discount_percent;
    $discount_price = $original_price - $discount_value;
    
    if($dis_end_date > $current_date){
        echo '<h4 class="pull-right line_throw_price">'. $row['product_price'] .'</h4>
            <h4 class="pull-right discount_price">&euro;'. $discount_price .'</h4>
            <p class="percent_off">'. $discount_percent .'%  off</p>
            ';
    }else{
    echo '<h4 class="pull-right">&euro;'. $row['product_price'] .'00</h4>';
    }
}else{
    echo '<h4 class="pull-right">&euro;'. $row['product_price'] .'</h4>';
}
?>
<br>
        <hr>
        <!-- <h4 class=""><?php echo "&euro;" . $row['product_price']; ?></h4> -->
        <p> <?php echo $row['short_desc']; ?></p>
        <a class ="btn btn-primary" target="_blank" href="#">Add to cart</a>

    </div>
 
</div>

</div>


</div>
    <hr>
    <div class="row">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <p> <?php echo  $row['product_description']; ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php endwhile;?>
</div>
</div>
<?php include '../header and footer/footer.php';?>

