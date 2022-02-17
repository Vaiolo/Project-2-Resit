<?php require_once("resource/config.php"); ?>
<?php


if(isset($_GET['add']))
{

    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add'])." ");

    while($row = fetch_arrray($query))
    {

        if($row['product_quantity'] != $_SESSION['product_' . $_GET['add']])
        {
            $_SESSION['product_' . $_GET['add']] +=1;
            redirect("checkout.php");
        }
        else
        {
            set_message("We only have" . $row['product_quantity'] ." " . "{$row['product_title']}"." availabe");
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


    foreach ($_SESSION as $name => $value)
    {
        if($value > 0)

        {

            if(substr($name, 0, 8 ) == "product_")
            {

                $length = strlen($name) - 8;

                $id = substr($name, 8, $length);


                $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). " ");

                while($row = fetch_arrray($query))
                {
                    $sub = $row['product_price'] * $value;
                    $total = 0;
                    $total_quantity = 0;

                    $product = <<<DELIMETER
        
        <tr>
                <td><img src="{$row['product_image']}"</td>
                
                <td>&#36;{$row['product_price']}</td>
                <td>{$value}</td>
                <td>&#36;{$sub}</td>
                <td>
                    <a class='btn btn-warning' href="cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a>      
                    <a class='btn btn-success' href="cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a>
                    <a class='btn btn-danger' href = "cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a>
                </td>
              
            </tr>
        
DELIMETER;

                    echo $product;

                   $_SESSION['item_total'] = $total += $sub;
                    $_SESSION['item_quantity'] = $total_quantity  += $value;

                }

            }

        }

    }



}



?>