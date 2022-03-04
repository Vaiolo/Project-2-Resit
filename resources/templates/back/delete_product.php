<?php require_once ("../../config.php");

if(isset($_GET['id'])){
    $query = query(" DELETE FROM product WHERE ProductID = " . escape_string($_GET['id']). " ");
    confirm($query);

    set_message("Product Deleted");
   redirect("../admin/adminhome.php?products");
} else{
    redirect("../admin/adminhome.php?products");
}

?>
