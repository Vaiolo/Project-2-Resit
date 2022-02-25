<?php require_once("../resources/config.php"); ?>
<?php  include('../header and footer/header.php'); ?>

    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->
    <?php include ("../resources/templates/front/side_nav.php"); ?>
    <?php $query = query(" SELECT * FROM products WHERE product_id =" . escape_string($_GET['id']). " ");
    confirm($query);
    while($row = fetch_array($query)):

    ?>

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="../resources/<?php echo display_image($row['product_image']); ?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a  href="#"><?php echo $row['product_title']; ?></a> </h4>
        <hr>
        <h4 class=""><?php echo "&euro;" . $row['product_price']; ?></h4>


          
        <p> <?php echo $row['short_desc']; ?></p>

   
    <form action="">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="ADD TO CART">
        </div>
    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>


  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
        <p> <?php echo  $row['product_description']; ?> </p>




    </div>


 </div>

</div>


</div><!--Row for Tab Panel-->

</div><!-- col-md-9 ends here -->

<?php endwhile;?>

</div>

</div>
    <!-- /.container -->
<?php include '../header and footer/footer.php';?>

