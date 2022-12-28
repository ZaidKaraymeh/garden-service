<?php
$submit = $_POST['sub'];
if (isset($submit)) 
{
  if (
    (($_FILES["picfile"]["type"] == "image/gif")
      || ($_FILES["picfile"]["type"] == "image/jpeg")
      || ($_FILES["picfile"]["type"] == "image/pjpeg")
      || ($_FILES["picfile"]["type"] == "image/png"))
    && ($_FILES["picfile"]["size"] < 500000)) {
    if ($_FILES["picfile"]["error"] > 0) {
      echo "Return Code: " . $_FILES["picfile"]["error"] . "<br />";
    }
    else {
      /*How to ensure uniquness of filename?*/
      $fdetails = explode(".", $_FILES["picfile"]["name"]);
      $fext = end($fdetails);

      $fn = "pic" . time() . uniqid(rand()) . ".$fext";

      if (move_uploaded_file($_FILES["picfile"]["tmp_name"], "userpic/$fn")) {
        header("location: editProfile.php");
      } 
      else 
      {
        echo "Failed to store file";
      }
    }
  } 
  else {
    echo "Invalid file";
  }
  session_start();
  $user = $_SESSION['activeuser'];
  require('connection.php');
  try {
    $sql = "insert into pic values(NULL, '$fn', '$user')";
    $r = $db->exec($sql);
    $db = null;
  } catch (PDOException $ex) {
    die($ex->getmessage());
  }
} 
else {

}
?>
