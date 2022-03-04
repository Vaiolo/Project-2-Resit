<?php
// helper functions
$upload_directory = "uploads";


function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    } else{
        $msg ="";
    }
}
function display_message(){
   if(isset($_SESSION['message'])){
       echo $_SESSION['message'];
       unset($_SESSION['message']);
   }
}
function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}
/****************************FRONT END FUNCTIONS*********************/
// get products

function get_products(){
    $query = query(" SELECT * FROM product");
    confirm($query);

    $rows = mysqli_num_rows($query); // Get total of mumber of rows from the database


    if(isset($_GET['page'])){ //get page from URL if its there

        $page = preg_replace('#[^0-9]#', '', $_GET['page']);//filter everything but numbers



    } else{// If the page url variable is not present force it to be number 1

        $page = 1;

    }


    $perPage = 6; // Items per page here

    $lastPage = ceil($rows / $perPage); // Get the value of the last page


// Be sure URL variable $page(page number) is no lower than page 1 and no higher than $lastpage

    if($page < 1){ // If it is less than 1

        $page = 1; // force if to be 1

    }elseif($page > $lastPage){ // if it is greater than $lastpage

        $page = $lastPage; // force it to be $lastpage's value

    }



    $middleNumbers = ''; // Initialize this variable

// This creates the numbers to click in between the next and back buttons


    $sub1 = $page - 1;
    $sub2 = $page - 2;
    $add1 = $page + 1;
    $add2 = $page + 2;



    if($page == 1){

        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

    } elseif ($page == $lastPage) {

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

    }elseif ($page > 2 && $page < ($lastPage -1)) {

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';




    } elseif($page > 1 && $page < $lastPage){

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub1.'">' .$sub1. '</a></li>';

        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';





    }


// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query


    $limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;




// $query2 is what we will use to to display products with out $limit variable

    $query2 = query(" SELECT * FROM product $limit");
    confirm($query2);


    $outputPagination = ""; // Initialize the pagination output variable


// if($lastPage != 1){

//    echo "Page $page of $lastPage";


// }


    // If we are not on page one we place the back link

    if($page != 1){


        $prev  = $page - 1;

        $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
    }

    // Lets append all our links to this variable that we can use this output pagination

    $outputPagination .= $middleNumbers;


// If we are not on the very last page we the place the next link

    if($page != $lastPage){


        $next = $page + 1;

        $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';

    }


// Doen with pagination



// Remember we use query 2 below :)

    while($row = fetch_array($query)){
        $product_image = display_image($row['product_image']); ?>

        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <a  href="item.php?id=<?php echo $row['ProductId'] ?>"> <img src="../resources/<?php echo $product_image ?>" alt=""> </a>
                <div class="caption">
                    <?php
                    if( $row['discount_percent'] >= 1 ){
                        $original_price= (int)$row['Price'];
                        $discount_percent= (int)$row['discount_percent'];
                        $dis_end_date= $row['dis_end_date'];
                        $current_date= date("Y-m-d");
                        $discount_value = ($original_price / 100) * $discount_percent;
                        $discount_price = $original_price - $discount_value;

                        if($dis_end_date > $current_date){
                            echo '<h4 class="pull-right line_throw_price">'. $row['Price'] .'</h4>
            <h4 class="pull-right discount_price">&euro;'. $discount_price .'</h4>
            <p class="percent_off">'. $discount_percent .'%  off</p>
            ';
                        }else{
                            echo '<h4 class="pull-right">&euro;'. $row['Price'] .'00</h4>';
                        }
                    }else{
                        echo '<h4 class="pull-right">&euro;'. $row['Price'] .'</h4>';
                    }
                    ?>
                    <h4><a href="item.php?id=<?php echo $row['ProductId'] ?>"> <?php echo $row['Name'] ?></a>
                    </h4> <br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <a href="item.php?id=<?php echo $row['product_id'] ?>" class="btn btn-default">More Info</a>
                    <a class="btn btn-primary" target="_blank" href="../ShoppingCart/cart.php?add={$row['ProductID']}">Add to cart</a>
                </div>
            </div>
        </div>
        <?php
    }
    echo "<div class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";
}


/**************************** Admin product page *********************/
function display_image($picture){
    global $upload_directory;
    return $upload_directory . DS . $picture;
}
function get_products_in_admin(){
    $query = query(" SELECT * FROM product");
    confirm($query);
    while($row = fetch_array($query)){
    $category = show_product_category_title($row['Category_ID']);
    $product_image = display_image($row['product_image']);
        $product =<<<DELIMETER
        <tr>
            <td>{$row['ProductID']}</td>
            <td>{$row['Name']} <br>
             <a href="adminhome.php?edit_product&id={$row['ProductID']}"><img width ='150' src="../../resources/{$product_image}" alt=""></a>
            </td>
            <td>{$category}</td>
            <td>{$row['Price']}</td>
            <td>{$row['Availability']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['ProductID']}"><span class="glyphicon glyphicon-remove"></span></a></td>

        </tr>

DELIMETER;
        echo $product;
    }
}
function show_product_category_title($product_category_id){
    $category_query = query("SELECT * FROM category WHERE CategoryID = '{$product_category_id}'");
    confirm($category_query);

    while ($category_row = fetch_array($category_query)){
       return  $category_row['CategoryName'];
    }
}

/******************************Add products in admin ********************/

function add_product()
{
    if (isset($_POST['publish'])) {
        $product_title = escape_string($_POST['Name']);
        $product_category_id = escape_string($_POST['Category_ID']);
        $product_price = escape_string($_POST['Price']);
        $product_description = escape_string($_POST['Description']);
      //$short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['Availability']);
        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = ($_FILES['file']['tmp_name']);

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);
        if (empty($product_title) || empty($product_price)|| empty ($product_image)) {
            echo "You can not leave it empty";
        } else {
                $query = query("INSERT INTO product(Name,Category_ID,Price,Description,Availability,product_image) VALUES ('{$product_title}','{$product_category_id}','{$product_price}','{$product_description}','{$product_quantity}','{$product_image}')");

                confirm($query);
                set_message("New Product was Added");
                redirect("adminhome.php?products");
            }

    }
}

function show_categories_add_product_page(){
    $query = query("SELECT * FROM category");
    confirm($query);
    while($row = fetch_array($query)){
        $categories_options =<<<DELIMETER
<option value="{$row['CategoryID']}">{$row['CategoryName']}</option>
DELIMETER;

        echo $categories_options;
    }
}

/*********************** Updating product code ********************/

function update_product(){
    if(isset($_POST['update'])){
        $product_title = escape_string($_POST['Name']);
        $product_category_id = escape_string($_POST['CategoryID']);
        $product_price = escape_string($_POST['Price']);
        $product_description = escape_string($_POST['Description']);
        //$short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['Availability']);
        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = ($_FILES['file']['tmp_name']);

        if(empty($product_image)){
              $get_pic = query("SELECT product_image FROM product WHERE ProductID =" .escape_string($_GET['id']). " ");
            confirm($get_pic);

            while($pic = fetch_array($get_pic)){
                $product_image = $pic['product_image'];
            }
        }


        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

        $query = "UPDATE product SET ";
        $query .= "Name          = '{$product_title}', ";
        $query .= "CategoryID    = '{$product_category_id}', ";
        $query .= "Price          = '{$product_price}', ";
        $query .= "Description    = '{$product_description}', ";
        //$query .= "short_desc             = '{$short_desc}', ";
        $query .= "Availability       = '{$product_quantity}', ";
        $query .= "product_image          = '{$product_image}' ";
        $query .= "WHERE ProductID=" . escape_string($_GET['id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("Product was updated");
        redirect("adminhome.php?products");
    }
}

/*************************Categories in Admin****************/

function show_categories_in_admin(){
    $query = query("SELECT * FROM category");
    confirm($query);
    while($row = fetch_array($query)){
        $cat_id = $row['CategoryID'];
        $cat_title = $row['CategoryName'];

        $category =<<<DELIMETER
<tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['CategoryID']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;
echo $category;
    }
}

function add_category(){
    if(isset($_POST['add_category'])){
        $cat_title = escape_string($_POST['CategoryName']);
        if(empty($cat_title) || $cat_title == " "){
            echo "This cannot be empty";
        }else {


            $insert_cat = query("INSERT INTO category(CategoryName) VALUES('{$cat_title}') ");
            confirm($insert_cat);
            set_message("Category created");

        }
    }
}

function get_categories(){
    $query = query("SELECT * FROM Category");
    confirm($query);
    while($row = fetch_array($query)){

$categories_links =<<<DELIMETER
<a href='category.php?id={$row['CategoryID']}' class='list-group-item'>{$row['CategoryName']}</a>
DELIMETER;

echo $categories_links;
    }
}

/**********************Search function**************************/
function search()
{
    if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        if (empty($search) || $search == "") {
            echo "THIS FIELD CANNOT BE BLANK";
        } else {
            $query = query("SELECT * FROM product WHERE Name LIKE '%$search%'");
            confirm($query);
            $count = mysqli_num_rows($query);
            if ($count == 0) {
                echo "<h1> NO RESULT </h1>";
            } else {


                while ($row = fetch_array($query)) {
                    $product_image = display_image($row['product_image']);
                    $search = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a  href="item.php?id={$row['ProductID']}"><img src="../resources/{$product_image}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&euro;{$row['Price']}</h4>
                                <h4><a href="item.php?id={$row['ProductID']}">{$row['Name']}</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a class="btn btn-primary" target="_blank" href="item.php?id={$row['ProductID']}">Add to cart</a>

                            </div>

                        </div>
                    </div>
DELIMETER;
                    echo $search;
                }
            }
        }


    }
}


?>
