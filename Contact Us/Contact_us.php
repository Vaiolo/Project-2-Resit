<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Home/style.css">
    <title>Document</title>
</head>
<body>
    <?php include '../header and footer/header.php';?>
    <form>
        <div class="form_header">
            <h1>Contact Us </h1>
        </div>
        <div>
            <label for ="Name">Name</label>
        </div>
        <input class="form_text" type="text" name="name">
        <div>
            <label for ="Email">Email</label>
        </div>
        <input class="form_text" type="text" name="name">
        <div>
            <label for ="subject">Subject</label>
        </div>
        <input class="form_text" type="text" name="name">
        <div>
            <label for ="message">Message</label>
        </div>
        <div>
            <textarea name="textarea" placeholder="Type here..."></textarea>
        </div>
        <div>
            <input class="form_submit" type="submit" value="submit" name="submit">
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){
      include("../Phpmailer/mail.php");
    }
    
    include '../header and footer/footer.php';?>
</body>
</html>
