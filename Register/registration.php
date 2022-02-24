<?php

      require 'conn.php';

       // Taking and filtering all 8 values from the form data(input)
    if(isset($_POST['submit'])){
      if (!empty($_POST['first_name'])) {
        $first_name=filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
          if (!empty($_POST['last_name'])) {
            $last_name=filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
              if (!empty($_POST['address'])) {
                $address=filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
                  if (!empty($_POST['city'])) {
                    $city=filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
                      if (!empty($_POST['country'])) {
                        $country=filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
                          if(!empty($_POST['birth'])){
                            $birth=$_POST['birth'];
                              if(!empty($_POST['email'])){
                                $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
                                  if(!empty($_POST['password'])){
                                    $password=$_POST['password'];
                                    $password=password_hash($password, PASSWORD_DEFAULT);
                                    $accountType=0;

                                      $query="SELECT Email FROM user WHERE Email=? LIMIT 1";
                                            if($statement=mysqli_prepare($conn, $query)){
                                                mysqli_stmt_bind_param($statement, 's', $email);
                                                if(mysqli_stmt_execute($statement)){
                                                    //echo "Query exectued!<br>";
                                                    $result=mysqli_stmt_get_result($statement);
                                                    mysqli_stmt_close($statement);
                                                    $row=mysqli_fetch_assoc($result);
                                                    if(is_array($row) && $row['Email']==$email){
                                                        echo "Email already used.<br>";
                                                    }
                                                    else {
                                                      // Performing insert query execution
                                                    $query = "INSERT INTO user (Firstname, Lastname, City, Address, Email, Country, DateofBirth, Password, AccountType) VALUES (?,?,?,?,?,?,?,?,?)";

                                                      if($statement = mysqli_prepare($conn, $query)){
                                                          mysqli_stmt_bind_param($statement, 'ssssssssi', $first_name, $last_name, $city, $address, $email, $country, $birth, $password, $accountType);
                                                          if(mysqli_stmt_execute($statement)){
                                                              echo "Registration Confirmed";
                                                            }else{
                                                              echo "error";
                                                              die(mysqli_error($conn));
                                                            }
                                                          } else {
                                                            echo "error: " . $query . "<br>" . mysqli_error($conn);
                                                          }
                                                            include("../Phpmailer/mail.php");
                                                    }
                                                }
                                                else {
                                                    echo "Error executing query!<br>";
                                                    die(mysqli_error($conn));}
                                            }


                                  }  else {echo "Please fill in your password!";}
                             }  else {echo "Please fill in your email!";}
                        }  else {echo "Please fill in the date of your birth!";}
                    }  else {echo "Please fill in your country!";}
                }  else {echo "Please fill in your city!";}
            }  else {echo "Please fill in your address!";}
        }  else {echo "Please fill in your last name!";}
    }  else {echo "Please fill in your first name!";}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../Home/style.css">
<body>


</body>
<div class="container_login">
    <?php include("../header and footer/header.php")?>
    <div class="description">
        <h2 id="title">REGISTER</h2>
    </div>


    <div id="registration">
        <div class="registration_box">
          <form method="post" action="registration.php">

              <label for="firstName">First Name:</label><br>
              <input type="text" name="first_name" id="firstName"><br>

              <label for="lastName">Last Name:</label><br>
              <input type="text" name="last_name" id="lastName"><br>

              <label for="Address">Address:</label><br>
              <input type="text" name="address" id="Address"><br>

               <label for="city">City:</label><br>
              <input type="text" name="city" id="city"><br>

               <label for="country">Country:</label><br>
              <input type="text" name="country" id="country"><br>

              <label for="birth">Date of birth:</label><br>
              <input type="date" name="birth" /><br>

              <label for="emailAddress">Email Address:</label><br>
              <input type="text" name="email" id="emailAddress"><br>

              <label for="password">Password:</label><br>
              <input type="password" name="password" id="password"><br>

          <input type="submit" name="submit" value="Submit" id="registeraccount">
      </form>
  </div>
</div>

    <?php
      include('../header and footer/footer.php');
    ?>
</div>
</head>
</html>
