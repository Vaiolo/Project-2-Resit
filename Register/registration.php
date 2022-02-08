<?php

      require 'conn.php';

       // Taking and filtering all 8 values from the form data(input)
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
                                                          mysqli_stmt_bind_param($statement, 'ssssssdsi', $first_name, $last_name, $city, $address, $email, $country, $birth, $password, $accountType);
                                                          if(mysqli_stmt_execute($statement)){
                                                              echo "Registration Confirmed";
                                                            }else{
                                                              echo "error";
                                                              die(mysqli_error($conn));
                                                            }
                                                          } else {
                                                            echo "error: " . $query . "<br>" . mysqli_error($conn);
                                                          }
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

?>
