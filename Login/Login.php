<?php
session_start();


require_once "../Register/conn.php";

$email = $password = $id = "";
$email_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["Email"]))){
        $email_err = "Please enter username.";
    } else{
        $email = trim($_POST["Email"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty($email_err) && empty($password_err)){

        $query = "SELECT UserID, Email, Password, AccountType FROM user WHERE Email = ?";

        if($stmt = mysqli_prepare($conn, $query)){

            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = $email;

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);


                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password, $accountType);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){


                            $_SESSION["loggedin"] = true;
                            $_SESSION["Email"] = $email;
                            $_SESSION['UserID'] = $id;

                            if ($accountType == "Admin") {

                                header("Location: ../admin/adminhome.php");
                                }

                            elseif ($accountType == "User") {
                                // Redirect user to welcome page
                                header("Location: ../Home/Home.php");
                            }

                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }


    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" href="../Home/style.css">
    <style>

</style>
</head>
<body>

  <div class="container_login">
  <?php
        include('../header and footer/header.php');
  ?>

  <?php
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <div class="box">
                <h2>Login</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <label>Email</label>
                  <div class="inputBox">
                    <input type="text" name="Email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                  </div>

                  <label>Password</label>
                  <div class="inputBox">
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                  </div>
                  <input type="submit" name="login" value="Login">
                  <div>
                  <a href="../Register/registration.php" style="color: inherit"; >Register</a>
                </div>
                </form>
              </div>
    <?php
          include('../header and footer/footer.php');
    ?>

    </div>
</body>
</html>
