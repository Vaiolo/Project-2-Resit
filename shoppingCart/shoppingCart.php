<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../Home/style.css">
</head>
<body>
<?php
include('../header and footer/header.php');
?>
<div id="containerCart">
    <article class="cartText">
        <h1> Your cart</h1>
    </article>
    <div id="cartItem1">
            <img class ="productImage" src=../images/pear-book-small.png style='width:100px;height:100px;'><br><br>
            <h3 class="cartproductName"> Iphone 13</h3>
        <article class="amount">
            <p> Amount </p>
            <input class ="amount" type="number" name="amount" style='width:100px;height:50px;'>
        </article>
            <h3 class="cartPrice"> &euro; 33</h3>

        <img class ="productImage1" src=../images/pear-book-small.png style='width:100px;height:100px;'><br><br>
        <h3 class="cartproductName1"> Iphone 13</h3>
        <article class="amount1">
            <p> Amount </p>
            <input class ="amount1" type="number" name="amount" style='width:100px;height:50px;'>
        </article>
        <h3 class="cartPrice1"> &euro; 33</h3>
    </div>
    <div class="buttonsCart">
        <div class="buttonCart1">
            <input class="updateButton" type="submit" value="Update">
        </div>
        <div class="buttonCart2">
            <input class="updateButton" type="submit" value="Delete">
        </div>
    </div>



</div>

</body>
