<?php require_once("../resources/config.php"); ?>
<?php require_once("cart.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Checkout</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <?php
  if(isset($_SESSION['Email'])) {
      include('../header and footer/headerLOGGEDIN.php');
  } else {
      include('../header and footer/header.php');
  }?>

<?php echo display_message();  ?>

<!-- Page Content start here -->
    <div class="container">

        <h1>Checkout</h1>

        <!--<form action=""> -->

        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="sb-e0u0114087049@business.example.com">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="upload" value="1">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-total</th>

                </tr>
                </thead>
                <tbody>
                <?php cart(); ?>
                </tbody>
            </table>
            <?php echo show_paypal();  ?>
        </form>
    <!--  ***********CART TOTALS start here************* -->


        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>
            <table class="table table-bordered" cellspacing="0">
                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td>
                        <span class="amount">

                        <?php
                        echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0" ; //when no products in the cart value set 0
                        ?>

                        </span>
                    </td>
                </tr>
                <tr class="shipping">
                    <th>Shipping and Handling</th>
                    <td>Free Shipping</td>
                </tr>

                <tr class="order-total">
                    <th>Order Total</th>
                    <td>
                        <strong><span class="amount">

                    <?php
                    echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0" ; //when no products in the cart value set 0
                    ?>

                        </span></strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!--------CART TOTALS end here ------>

</div>

<!--Main Content end here-->
<?php include '../header and footer/footer.php';?>


</body>
</html>
