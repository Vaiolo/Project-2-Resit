
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

        <div class="box">
                <h2>Login</h2>
                <form>
                  <div class="inputBox">
                    <input type="email" name="email">
                    <label>Username</label>
                  </div>
                  <div class="inputBox">
                        <input type="text" name="text">
                        <label>Password</label>
                      </div>
                  <input type="submit" name="login" value="Login">
                  <input type="submit" name="login" value="Register" id="register">
                </form>
              </div>
    <?php
          include('../header and footer/footer.php');
    ?>

    </div>
</body>
</html>
