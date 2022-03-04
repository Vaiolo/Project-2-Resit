<?php require_once ("../resources/config.php");?>
<?php include('../header and footer/header.php');?>
<div class="container">
    <div class="row">
        <?php include ("../resources/templates/front/side_nav.php"); ?>
        <div class="col-md-9">
            <div class="row">
                <?php search(); ?>
            </div>
        </div>
    </div>
</div>
<?php include('../header and footer/footer.php');?>


