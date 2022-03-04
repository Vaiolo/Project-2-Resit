<?php
require_once("../resources/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
    <style>
        /* discount css */
        h4.pull-right.line_throw_price {
            text-decoration: line-through;
            padding: 0px 10px;
            font-size: 15px;
            opacity: 0.7;
        }
        p.percent_off {
            text-align: end;
            display: block;
            position: absolute;
            right: 17px;
            opacity: 0.7;
            top: 1px;
            font-size: 12px;
        }
        h4.pull-right.discount_price {
            display: block;
        }
        .caption {
            position: relative;
        }
    </style>
</head>
<body>

<?php
if(isset($_SESSION['Email'])) {
    include('../header and footer/headerLOGGEDIN.php');
} else {
    include('../header and footer/header.php');
}?>

<div class="container">
    <div class="row">
        <?php include ("../resources/templates/front/side_nav.php"); ?>
        <div class="col-md-9">
            <div class="row">
                <?php get_products() ?>
            </div>
        </div>
    </div>
</div>
<?php include '../header and footer/footer.php';?>
</body>
</html>
