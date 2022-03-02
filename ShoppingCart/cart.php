<?php require_once("../resources/config.php"); ?>
<?php


if(isset($_GET['add']))
{

    $query = query("SELECT * FROM product WHERE ProductID=" . escape_string($_GET['add'])." ");

    while($row = fetch_array($query))
    {

        if($row['Availability'] != $_SESSION['product_' . $_GET['add']])
        {
            $_SESSION['product_' . $_GET['add']] +=1;
            redirect("checkout.php");
        }
        else
        {
            set_message("We only have" . $row['Availability'] ." " . "{$row['Name']}"." availabe");
            redirect("checkout.php");
        }


    }

    // $_SESSION['product_' . $_GET['add']] +=1;

    //redirect("index.php");

}

if(isset($_GET['remove']))
{
    $_SESSION['product_' . $_GET['remove']]--;
    if($_SESSION['product_' . $_GET['remove']] < 1)
    {
        unset($_SESSION['item_quantity']);
        unset($_SESSION['item_total']);

        redirect("checkout.php");
    }
    else
    {
        redirect("checkout.php");
    }
}

if(isset($_GET['delete']))
{

    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_quantity']);
    unset($_SESSION['item_total']);
    redirect("checkout.php");
}

function cart()
{

    $total = 0;
    $total_quantity = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;
    foreach ($_SESSION as $name => $value)
    {
        if($value > 0)

        {

            if(substr($name, 0, 8 ) == "product_")
            {

                $length = strlen($name) - 8;

                $id = substr($name, 8, $length);


                $query = query("SELECT * FROM product WHERE ProductID = " . escape_string($id). " ");

                while($row = fetch_array($query)) {
                    $sub = $row['Price'] * $value;
                    //$total = 0;
                    //$total_quantity = 0;


                    $product = <<<DELIMETER

        <tr>
                <td><img src="{$row['product_image']}"</td>

                <td>&#36;{$row['Price']}</td>
                <td>{$value}</td>
                <td>&#36;{$sub}</td>
                <td>
                    <a class='btn btn-warning' href="cart.php?remove={$row['ProductID']}"><span class='glyphicon glyphicon-minus'></span></a>
                    <a class='btn btn-success' href="cart.php?add={$row['ProductID']}"><span class='glyphicon glyphicon-plus'></span></a>
                    <a class='btn btn-danger' href = "cart.php?delete={$row['ProductID']}"><span class='glyphicon glyphicon-remove'></span></a>
                </td>

            </tr>


            <!-- *********** PAYPAL******** -->

            <input type="hidden" name="item_name_{$item_name}" value="{$row['Name']}">
            <input type="hidden" name="item_number_{$item_number}" value="{$row['ProductID']}">
            <input type="hidden" name="amount_{$amount}" value="{$row['Price']}">
            <input type="hidden" name="quantity_{$quantity}" value="{$value}">
            
DELIMETER;

                    echo $product;

                    $item_name++;
                    $item_number++;
                    $amount++;
                    $quantity++;



                }
                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $total_quantity  += $value;



            }

        }

    }



}

function show_paypal() // delimeter for not changing the quotes
{

    if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1)
    {

        $paypal_button = <<<DELIMETER

    <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
               alt="PayPal - The safer, easier way to pay online">


DELIMETER;
        return $paypal_button;


    }




}



?>
