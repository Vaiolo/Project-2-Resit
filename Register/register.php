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
          <form method="post">
              <?php
              include('registration.php');
              ?> <br><br>

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

          <input type="submit" value="Submit" id="registeraccount">
      </form>
  </div>
</div>

    <?php
      include('../header and footer/footer.php');
    ?>
</div>
</head>
</html>
