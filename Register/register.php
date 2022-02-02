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
                <label for="firstname">First name:</label><br>
                <input type="text" name="firstname" /><br>
                <label for="lastname">Last name:</label><br>
                <input type="text" name="lastname" /><br>
                <label for="email">Email:</label><br>
                <input type="email" name="email" /><br>
                <label for="birth">Date of birth:</label><br>
                <input type="date" name="birth" /><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" /><br>
                <input type="submit" name="submit" id="registeraccount" value="Register"/>
            </form>
        </div>
    </div>

    <?php
      include('../header and footer/footer.php');
    ?>
</div>
</head>
</html>
