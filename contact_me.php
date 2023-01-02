<?php
// Check for empty fields

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
$db = new config;

$db->query("INSERT  INTO contactus VALUES (null,'$name','$message','$email_address',current_timestamp(),current_timestamp()");
$db->execute();

return true;
?>