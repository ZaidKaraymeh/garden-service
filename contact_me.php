<?php
// Check for empty fields
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
if (
   empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   !filter_var(
      $_POST['email'],
      FILTER_VALIDATE_EMAIL
   )
) {
   echo "No message Provided!";
   return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

require('includes/config.php');
try {
   require 'PHPMailer-master/src/Exception.php';
   require 'PHPMailer-master/src/PHPMailer.php';
   require 'PHPMailer-master/src/SMTP.php';
   $mail = new PHPMailer(true);
   //Server settings
   $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
   $mail->isSMTP();                                            //Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   $mail->Username   = 'our-email';                     //SMTP username
   $mail->Password   = 'pass';                               //SMTP password
   // ciyzuvrsxdfihphs => for s2p2website@gmail.com
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
   $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   //Recipients
   $mail->setFrom($email_address,$name);
   $mail->addAddress('our-email', "name");     //Add a recipient
   //Content
   $mail->Subject =  "contact us";
   $mail->Body    =  $message;
   $mail->send();
} 
catch (Exception $e) {
   die("Email Failed");
}
$db = new config;

$db->query("INSERT  INTO contactus VALUES (null,'$name','$message','$email_address',current_timestamp(),current_timestamp()");
$db->execute();

// // Create the email and send the message
// $to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
// $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";	
// mail($to,$email_subject,$email_body,$headers);

return true;
?>