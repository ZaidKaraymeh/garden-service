<?php

//Include functions
include('includes/functions.php');


?>

<?php
/************** Fetching all data from database ******************/


//require database class files
require('includes/config.php');


//instatiating our database objects

$db = new PDO('mysql:host=localhost;dbname=servicesystem;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user_id = json_decode($_POST['user_id']);
$rating = json_decode($_POST['rating']);
$comment = json_decode($_POST['comment']);
$service_id = json_decode($_POST['service_id']);

echo "id:" . $user_id;
echo "var" . $_POST['user_id'];


$stmt =  $db->prepare("INSERT INTO comment (id, user, service, comment, created_at, updated_at) VALUES (null, :user,:service,:comment,current_timestamp(),current_timestamp()");
$stmt -> bindParam(':user', $user_id);
$stmt -> bindParam(':service', $service_id);
$stmt -> bindParam(':comment', $comment);
$stmt -> execute();
// $statement->execute([
//     ':user_id' => $user_id,
//     ':comment' => $comment,
//     ':service_id' => $service_id
// ]);


// $db->query("INSERT  INTO contactus VALUES (null,'$name','$message','$email_address',current_timestamp(),current_timestamp()");
// $db->execute();
// recieves post data from ajax request
if (isset($_POST['service_id']) && isset($_POST['user_id']) && isset($_POST['rating']) && isset($_POST['comment'])) {

    echo "done";


    
}
?>