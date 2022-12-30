<?php
//admin session
session_start();
//admin session
if (!isset($_SESSION['user_is_logged_in'])) {
   //go to log in page.
   header("location: login.php");
}

require("includes/config.php");
$db = new config;

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$error = false;

if (isset($_POST['save'])) {

   $name = test_input($_POST['serviceName']);
   $price = test_input($_POST['servicePrice']);
   $desc = $_POST['ServiceDesc'];
   // $rating = test_input($_POST['rating']);

   $p1 = '/^[a-z-A-Z]+$/i';
   $p2 = '/^[0-9]+$/';

   if (!$name || !$price || !$desc || !$_FILES['file']) {
      $error = true;
      echo "please enter all required fields";
   }

   if (!$error) {
      // || !$photo
      // $target_path = "images/";
      // $target_path = $target_path . basename($_FILES['file']['name']);
      // if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
      //    $photo = basename($_FILES['file']['name']);
      // }
   }

   $result = $db->query("INSERT 
      INTO service 
      VALUES (null,'$name','$price','uploaded_image/user_default.jpg','$desc', current_timestamp(),current_timestamp())");

   $success = $db->execute($result);
   if ($success) {

      header('Location: services.php');

      keepmsg('<div class="alert alert-success text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Customer registered successfully.
        </div>');

   } else {

      keepmsg('<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> Customer could not be registered.
        </div>');
   }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>services</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<body>
   <div class='container '>
      <div class="row ">

         <div class="col-12 col-md-12 l">
            <form method='POST' enctype='multipart/form-data'>
               <h4>Service name:</h4>
               <input type=text class="form-control" name='serviceName' placeholder="enter service name.." />

               <h4>Service Price:</h4>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text">BD</span>
                  </div>
                  <input type="text" class="form-control" name="servicePrice" aria-label="Amount">
                  <div class="input-group-append">
                     <span class="input-group-text">.000</span>
                  </div>
               </div>
               <h4>Service picture:</h4>
               <input class="form-control" type="file" name="file" id="formFile"><br>
               <input type='submit' class="btn btn-info" name='upload' value='upload' />

               <h4>Service Description: </h4>
               <input type=text class="form-control" name='ServiceDesc' placeholder="Enter Service description..." />
               <br>
               <input type="submit" class="btn btn-info btn-lg btn-block" name='save' value='save' />

            </form>

         </div><!--col1-->


      </div><!--row1-->

   </div><!--container-->
</body>

</html>