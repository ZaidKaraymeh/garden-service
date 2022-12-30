<?php
echo "it worked";
if (isset($_POST['comment'])) {
    $comment = $_POST['message'];

    //require database class files
    require('includes/config.php');
    echo "it worked";
    //instatiating our database objects
    $db = new config;
    $id = $_SESSION['user_data']['id'];
    $name = $_SESSION['user_data']['fullName'];
    $service = $_GET['id'];
    $comment_type = "review";

    echo "it worked";
    $db->query("INSERT INTO comment VALUES (':id',':user','service','comment','comment_type',current_timestamp(), current_timestamp()");
    $db->bindvalue(':id', $id, PDO::PARAM_STR);
    $db->bindvalue(':user', $name, PDO::PARAM_STR);
    $db->bindvalue(':service', $service, PDO::PARAM_STR);
    $db->bindvalue(':password', $comment, PDO::PARAM_STR);
    $db->execute();
    echo "it worked";
}
// header("location: services.php");

?>

</form>