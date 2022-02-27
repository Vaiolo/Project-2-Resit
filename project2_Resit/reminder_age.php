<?php


function get_product()
{
    $query = query("SELECT * FROM products");

    $query2 = query("SELECT * FROM user");

    while ($row = fetch_arrray($query2)) {
        $age = $row['age'];


        while ($row = fetch_arrray($query)) {
            if ($age > $row['age']) {


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


            } else {
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
                                   <a class="btn btn-primary" target="_blank" href="">gay</a> <!-- add -->
                        </div>
                    </div>
        DELIMETER;
            }
        }
    }



}



?>
