<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'src/Exception.php';
        require 'src/PHPMailer.php';
        require 'src/SMTP.php';


       if(isset($_POST['submit'])) {


               $mail = new PHPMailer;
               $mail->isSMTP();
                               $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
               $mail->SMTPDebug = 0; //change to 0 to stop showing u debug messages
               $mail->Host = "smtp.gmail.com";
               $mail->Port = "587"; // typically 587
               $mail->SMTPSecure = 'tls'; // ssl is depracated
               $mail->SMTPAuth = true;
               $mail->Username = "groupabooking@gmail.com";
               $mail->Password = "Toucangiant2021";
               $mail->setFrom("groupabooking@gmail.com", "Fake Amazon");
               $mail->addAddress($_POST['email']);
               $mail->Subject = 'Your registration was successful!';
               $mail->msgHTML("Dear" . $_POST['first_name'] . ",

                Thank you for completing your registration with us.

                Regards,
                The team"); // remove if you do not want to send HTML email
               $mail->AltBody = 'HTML not supported';

               $mail->send();


       }

?>
