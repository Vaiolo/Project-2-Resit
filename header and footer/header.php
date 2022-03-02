<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NHL WEBSHOP</title>
    <link href="style.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<header>
        <div class="left_header">
            <h3 class="header_logo">NHL WEBSHOP</h3>
        </div>
        <div class="right_header">
            <ul>
                <li class="li_header"><a href="../Home/Home.php">Home</a></li>
                <li class="li_header"><a href="../Home/shop.php">Shop</a></li>
                <li class="li_header"><a href="../Login/Login.php">Login</a></li>
                <li class="li_header"><a href="../Register/registration.php">Registration</a></li>
                <li class="li_header"><a href="../Orders/ordershistory.php">Orders</a></li>
                <li class="li_header"><a href="../Contact Us/Contact_us.php">Contact us</a></li>
            </ul>
        </div>
        <form action="search.php" method="post">
        <div class="search">
            <input class="header_search" type="text" name="search" placeholder="Search here"><input class="header_submit" type="submit" name="submit" value="Search">
        </div>
    </form>
</header>
