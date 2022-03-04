<?php require_once ("../../config.php");

if(isset($_GET['id'])){
    $query = query(" DELETE FROM product WHERE ProductId = " . escape_string($_GET['id']). " ");
    confirm($query);

    set_message("Product Deleted");
   redirect("../../../Home/admin/index.php?products");
} else{
    redirect("../../../Home/admin/index.php?products");
}

?>