<?php
require('includes/functions.php');
require('includes/header.php');
require("includes/config.php");
if (!isset($_SESSION['user_is_logged_in'])) {
   //go to log in page.
   header("location: login.php");
}

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
   $nameoh = test_input($_POST['serviceName']);
   $price = test_input($_POST['servicePrice']);
   $desc = test_input($_POST['ServiceDesc']);
   $p1 = '/^[a-z-A-Z]+$/i';
   $p2 = '/^[0-9]+$/';
   if (!$nameoh || !$price || !$desc || !$_FILES['fileoh']) {
      $error = true;
      echo "<div style='background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;'><h1 style='color:red'>All Fields Required</h1></div>";
      die();
   }
   if (isset($_FILES['fileoh'])) {
      if ($_FILES['fileoh']['error'] > 0) {
         echo "<div style='background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;'><h1 style='color:red'>An error occurred, the file was not uploaded!<br>(Maybe:You Did Not Choose Image)</h1></div>";
         die();
      } else {
         // getting file from user / HTML
         $file = $_FILES['fileoh'];
         $name = $file['name'];
         $main_file = $file['tmp_name'];
         // predefined file type
         $mimet = array(
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
         );
         // getting the file type
         $f_info = finfo_open(FILEINFO_MIME_TYPE);
         $type = finfo_file($f_info, $main_file);
         // image type or file type check
         if (!in_array($type, $mimet)) {
            echo "<div style='background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;'><h1 style='color:red'>Not Image</h1></div>";
            die();
         }
         // image size(MB/KB) validation
         $image_size = $file['size']; // size in byte
         $MB_2 = 2000000; // 2 MB
         if ($image_size > $MB_2) {
            echo "<div style='background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;'><h1 style='color:red'>Image is too large. Please upload Less 2MB image.</h1></div>";
            die();
         }
         // getting extention
         $ext = explode(".", $name);
         $ext = end($ext);
         // makes uinique name
         $new_name = "service-" . time() . uniqid(rand()) . "." . $ext;
         // upload path setup
         $upload_location = "img/services/";
         $new_upload_file = $upload_location . $new_name;
         // upload
         if (move_uploaded_file($main_file, $new_upload_file)) {
            $db->query("INSERT INTO service 
               VALUES (null,'$nameoh','$price','$new_name','$desc',0, NOW(),NOW())");
            $success = $db->execute();
            if ($success) {
               redirect('services.php');
               keepmsg('<div class="alert alert-success text-center">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> Customer registered successfully.
                           </div>'
               );
            } else {
               keepmsg('<div class="alert alert-danger text-center">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Sorry!</strong> Customer could not be registered.
                           </div>'
               );
            }
         }
      }
   }
}


?>

<head>
   <link rel="stylesheet" href="css/style.css">
</head>
<div class='container'
   style="background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;">
   <div class="row ">
      <div class="col-12 col-md-12 l">
         <form method='POST' enctype='multipart/form-data'>
            <div class="row my-3">
               <h4>Service name:</h4>
               <input type=text class="form-control" name='serviceName' placeholder="enter service name.." />
            </div>
            <div class="row my-3">
               <h4>Service Price:</h4>
               <div class="input-group mb-3">
                  <input type="number" class="form-control" name="servicePrice" aria-label="Amount" value="1" min="1" max="10000">
                  <div class="input-group-prepend">
                     <span class="input-group-text">BD</span>
                  </div>
               </div>
            </div>
            <div class="row my-3">
               <h4>Service picture:</h4>
               <input class="form-control" type="file" name="fileoh" id="formFile">
            </div>
            <div class="row my-3">
               <h4>Service Description: </h4>
               <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" name="ServiceDesc"
                     id="floatingTextarea2" style="height: 150px;resize:none;"></textarea>
                  <label for="floatingTextarea2">Description of Service</label>
               </div>
            </div>
            <div class="row my-4">
               <input type="submit" class="btn btn-custom btn-lg btn-block" name='save' value='ADD' />
            </div>
         </form>
      </div><!--col1-->
   </div><!--row1-->
</div><!--container-->
</body>

</html>