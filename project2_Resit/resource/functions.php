<?php

function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['message'] = $msg;
    }
    else
    {
     $msg = "";
    }
}

function display_message()
{
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

}



function redirect($location)
{
    return header("Location: $location");


}

function query($sql)
{
     global $connection;
     return mysqli_query($connection, $sql);


}

function confirm ($result)
{
    global $connection;
    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }


}

function escape_string($string)

{
    global $connection;
    return mysqli_real_escape_string($connection, $string);


}

function fetch_arrray($result)
{

    return mysqli_fetch_array($result);

}

function get_product()
{
    $query = query("SELECT * FROM products");


    while ($row = fetch_arrray($query)) {

// heredoc --> put a big string of text that we can display -->make easy the work;
        //we can use any name

        $product = <<<DELIMETER
            <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">{$row['product_price']}</h4>
                                <h4><a href="product.html">{$row['product_title']}</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                             
                            </div>
                                   <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Add to cart</a> <!-- add -->
                        </div>
                    </div>
        DELIMETER;

        echo $product;


    }

}


?>
